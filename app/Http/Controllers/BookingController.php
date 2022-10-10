<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookingAddRequest;
use App\Http\Requests\BookingEditRequest;
use App\Models\Booking;
use Illuminate\Http\Request;
use Exception;
class BookingController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.booking.list";
		$query = Booking::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Booking::search($query, $search); // search table records
		}
		$query->join("customers", "booking.customers_id", "=", "customers.id");
		$query->join("agent", "booking.agent_id", "=", "agent.id");
		$orderby = $request->orderby ?? "booking.code_booking";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Booking::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Booking::query();
		$record = $query->findOrFail($rec_id, Booking::viewFields());
		return $this->renderView("pages.booking.view", ["data" => $record]);
	}
	

	/**
     * Display Master Detail Pages
	 * @param string $rec_id //master record id
     * @return \Illuminate\View\View
     */
	function masterDetail($rec_id = null){
		return View("pages.booking.detail-pages", ["masterRecordId" => $rec_id]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.booking.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(BookingAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//Validate Details_Booking form data
		$detailsBookingPostData = $request->details_booking;
		$detailsBookingValidator = validator()->make($detailsBookingPostData, ["*.room_id" => "required",
				"*.price" => "required",
				"*.qty" => "required|numeric",
				"*.total" => "required|numeric"]);
		if ($detailsBookingValidator->fails()) {
			return $detailsBookingValidator->errors();
		}
		$detailsBookingValidData = $detailsBookingValidator->valid();
		$detailsBookingModeldata = array_values($detailsBookingValidData);
		$modeldata['code_booking'] = "booking-".datetime_now();
		
		//save Booking record
		$record = Booking::create($modeldata);
		$rec_id = $record->code_booking;
		
		// set details_booking.code_details_booking to booking $rec_id
		foreach ($detailsBookingModeldata as &$data) {
			$data['code_details_booking'] = $rec_id;
		}
		
		//Save Details_Booking record
		\App\Models\Details_Booking::insert($detailsBookingModeldata);
		return $this->redirect("booking", "Tambah Data Berhasil");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(BookingEditRequest $request, $rec_id = null){
		$query = Booking::query();
		$record = $query->findOrFail($rec_id, Booking::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("booking", "Ubah Data Berhasil");
		}
		return $this->renderView("pages.booking.edit", ["data" => $record, "rec_id" => $rec_id]);
	}
	

	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
	 * @param  \Illuminate\Http\Request
	 * @param string $rec_id //can be separated by comma 
     * @return \Illuminate\Http\Response
     */
	function delete(Request $request, $rec_id = null){
		$arr_id = explode(",", $rec_id);
		$query = Booking::query();
		$query->whereIn("code_booking", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Hapus Data Berhasil");
	}
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function booking_calendar(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.booking.booking_calendar";
		$query = Booking::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Booking::search($query, $search); // search table records
		}
		$query->join("customers", "booking.customers_id", "=", "customers.id");
		$query->join("agent", "booking.agent_id", "=", "agent.id");
		$query->join("payment_status", "booking.payment_status_id", "=", "payment_status.id");
		$query->join("details_booking", "booking.code_booking", "=", "details_booking.code_details_booking");
		$orderby = $request->orderby ?? "booking.code_booking";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Booking::bookingCalendarFields());
		return $this->renderView($view, compact("records"));
	}
}

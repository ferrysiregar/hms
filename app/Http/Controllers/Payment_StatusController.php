<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Payment_StatusAddRequest;
use App\Http\Requests\Payment_StatusEditRequest;
use App\Models\Payment_Status;
use Illuminate\Http\Request;
use Exception;
class Payment_StatusController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.payment_status.list";
		$query = Payment_Status::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Payment_Status::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "payment_status.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Payment_Status::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Payment_Status::query();
		$record = $query->findOrFail($rec_id, Payment_Status::viewFields());
		return $this->renderView("pages.payment_status.view", ["data" => $record]);
	}
	

	/**
     * Display Master Detail Pages
	 * @param string $rec_id //master record id
     * @return \Illuminate\View\View
     */
	function masterDetail($rec_id = null){
		return View("pages.payment_status.detail-pages", ["masterRecordId" => $rec_id]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.payment_status.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(Payment_StatusAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save Payment_Status record
		$record = Payment_Status::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("payment_status", "Tambah Data Berhasil");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(Payment_StatusEditRequest $request, $rec_id = null){
		$query = Payment_Status::query();
		$record = $query->findOrFail($rec_id, Payment_Status::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("payment_status", "Ubah Data Berhasil");
		}
		return $this->renderView("pages.payment_status.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Payment_Status::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Hapus Data Berhasil");
	}
}

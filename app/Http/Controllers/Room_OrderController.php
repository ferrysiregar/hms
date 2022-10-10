<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Room_OrderAddRequest;
use App\Http\Requests\Room_OrderEditRequest;
use App\Models\Room_Order;
use Illuminate\Http\Request;
use Exception;
class Room_OrderController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.room_order.list";
		$query = Room_Order::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Room_Order::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "room_order.code_room_order";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Room_Order::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Room_Order::query();
		$record = $query->findOrFail($rec_id, Room_Order::viewFields());
		return $this->renderView("pages.room_order.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.room_order.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(Room_OrderAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		$modeldata['code_room_order'] = "add-".datetime_now();
		$modeldata['date'] = datetime_now();
		
		//save Room_Order record
		$record = Room_Order::create($modeldata);
		$rec_id = $record->code_room_order;
		return $this->redirect("room_order", "Tambah Data Berhasil");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(Room_OrderEditRequest $request, $rec_id = null){
		$query = Room_Order::query();
		$record = $query->findOrFail($rec_id, Room_Order::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("room_order", "Ubah Data Berhasil");
		}
		return $this->renderView("pages.room_order.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Room_Order::query();
		$query->whereIn("code_room_order", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Hapus Data Berhasil");
	}
}

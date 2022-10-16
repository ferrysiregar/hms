<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Room_CapacityAddRequest;
use App\Http\Requests\Room_CapacityEditRequest;
use App\Models\Room_Capacity;
use Illuminate\Http\Request;
use Exception;
class Room_CapacityController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.room_capacity.list";
		$query = Room_Capacity::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Room_Capacity::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "room_capacity.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Room_Capacity::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Room_Capacity::query();
		$record = $query->findOrFail($rec_id, Room_Capacity::viewFields());
		return $this->renderView("pages.room_capacity.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.room_capacity.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(Room_CapacityAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save Room_Capacity record
		$record = Room_Capacity::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("room_capacity", "Tambah Data Berhasil");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(Room_CapacityEditRequest $request, $rec_id = null){
		$query = Room_Capacity::query();
		$record = $query->findOrFail($rec_id, Room_Capacity::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("room_capacity", "Ubah Data Berhasil");
		}
		return $this->renderView("pages.room_capacity.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Room_Capacity::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Hapus Data Berhasil");
	}
}

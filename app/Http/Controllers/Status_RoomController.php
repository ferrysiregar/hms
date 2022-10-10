<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Status_RoomAddRequest;
use App\Http\Requests\Status_RoomEditRequest;
use App\Models\Status_Room;
use Illuminate\Http\Request;
use Exception;
class Status_RoomController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.status_room.list";
		$query = Status_Room::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Status_Room::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "status_room.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Status_Room::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Status_Room::query();
		$record = $query->findOrFail($rec_id, Status_Room::viewFields());
		return $this->renderView("pages.status_room.view", ["data" => $record]);
	}
	

	/**
     * Display Master Detail Pages
	 * @param string $rec_id //master record id
     * @return \Illuminate\View\View
     */
	function masterDetail($rec_id = null){
		return View("pages.status_room.detail-pages", ["masterRecordId" => $rec_id]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.status_room.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(Status_RoomAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save Status_Room record
		$record = Status_Room::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("status_room", "Tambah Data Berhasil");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(Status_RoomEditRequest $request, $rec_id = null){
		$query = Status_Room::query();
		$record = $query->findOrFail($rec_id, Status_Room::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("status_room", "Ubah Data Berhasil");
		}
		return $this->renderView("pages.status_room.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Status_Room::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Hapus Data Berhasil");
	}
}

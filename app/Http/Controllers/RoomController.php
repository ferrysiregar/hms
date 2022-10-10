<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoomAddRequest;
use App\Http\Requests\RoomEditRequest;
use App\Models\Room;
use Illuminate\Http\Request;
use Exception;
class RoomController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.room.list";
		$query = Room::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Room::search($query, $search); // search table records
		}
		$query->join("room_type", "room.room_type_id", "=", "room_type.id");
		$query->join("room_facilities", "room.room_facilities_id", "=", "room_facilities.id");
		$query->join("status_room", "room.status_room_id", "=", "status_room.id");
		$orderby = $request->orderby ?? "room.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Room::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Room::query();
		$record = $query->findOrFail($rec_id, Room::viewFields());
		return $this->renderView("pages.room.view", ["data" => $record]);
	}
	

	/**
     * Display Master Detail Pages
	 * @param string $rec_id //master record id
     * @return \Illuminate\View\View
     */
	function masterDetail($rec_id = null){
		return View("pages.room.detail-pages", ["masterRecordId" => $rec_id]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.room.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(RoomAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		$modeldata['kode_room'] = "ROOM-".random_num(10);
		
		//save Room record
		$record = Room::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("room", "Tambah Data Berhasil");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(RoomEditRequest $request, $rec_id = null){
		$query = Room::query();
		$record = $query->findOrFail($rec_id, Room::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("room", "Ubah Data Berhasil");
		}
		return $this->renderView("pages.room.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Room::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Hapus Data Berhasil");
	}
}

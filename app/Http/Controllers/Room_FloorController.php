<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Room_FloorAddRequest;
use App\Http\Requests\Room_FloorEditRequest;
use App\Models\Room_Floor;
use Illuminate\Http\Request;
use Exception;
class Room_FloorController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.room_floor.list";
		$query = Room_Floor::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Room_Floor::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "room_floor.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Room_Floor::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Room_Floor::query();
		$record = $query->findOrFail($rec_id, Room_Floor::viewFields());
		return $this->renderView("pages.room_floor.view", ["data" => $record]);
	}
	

	/**
     * Display Master Detail Pages
	 * @param string $rec_id //master record id
     * @return \Illuminate\View\View
     */
	function masterDetail($rec_id = null){
		return View("pages.room_floor.detail-pages", ["masterRecordId" => $rec_id]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.room_floor.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(Room_FloorAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save Room_Floor record
		$record = Room_Floor::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("room_floor", "Tambah Data Berhasil");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(Room_FloorEditRequest $request, $rec_id = null){
		$query = Room_Floor::query();
		$record = $query->findOrFail($rec_id, Room_Floor::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("room_floor", "Ubah Data Berhasil");
		}
		return $this->renderView("pages.room_floor.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Room_Floor::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Hapus Data Berhasil");
	}
}

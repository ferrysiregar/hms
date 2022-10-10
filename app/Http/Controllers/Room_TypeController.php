<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Room_TypeAddRequest;
use App\Http\Requests\Room_TypeEditRequest;
use App\Models\Room_Type;
use Illuminate\Http\Request;
use Exception;
class Room_TypeController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.room_type.list";
		$query = Room_Type::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Room_Type::search($query, $search); // search table records
		}
		$query->join("room_floor", "room_type.floor_id", "=", "room_floor.id");
		$orderby = $request->orderby ?? "room_type.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Room_Type::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Room_Type::query();
		$record = $query->findOrFail($rec_id, Room_Type::viewFields());
		return $this->renderView("pages.room_type.view", ["data" => $record]);
	}
	

	/**
     * Display Master Detail Pages
	 * @param string $rec_id //master record id
     * @return \Illuminate\View\View
     */
	function masterDetail($rec_id = null){
		return View("pages.room_type.detail-pages", ["masterRecordId" => $rec_id]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.room_type.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(Room_TypeAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save Room_Type record
		$record = Room_Type::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("room_type", "Tambah Data Berhasil");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(Room_TypeEditRequest $request, $rec_id = null){
		$query = Room_Type::query();
		$record = $query->findOrFail($rec_id, Room_Type::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("room_type", "Ubah Data Berhasil");
		}
		return $this->renderView("pages.room_type.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Room_Type::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Hapus Data Berhasil");
	}
}

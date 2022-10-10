<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Room_ImageAddRequest;
use App\Http\Requests\Room_ImageEditRequest;
use App\Models\Room_Image;
use Illuminate\Http\Request;
use Exception;
class Room_ImageController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.room_image.list";
		$query = Room_Image::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Room_Image::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "room_image.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Room_Image::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Room_Image::query();
		$record = $query->findOrFail($rec_id, Room_Image::viewFields());
		return $this->renderView("pages.room_image.view", ["data" => $record]);
	}
	

	/**
     * Display Master Detail Pages
	 * @param string $rec_id //master record id
     * @return \Illuminate\View\View
     */
	function masterDetail($rec_id = null){
		return View("pages.room_image.detail-pages", ["masterRecordId" => $rec_id]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.room_image.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(Room_ImageAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		if( array_key_exists("room_image", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['room_image'], "room_image");
			$modeldata['room_image'] = $fileInfo['filepath'];
		}
		
		//save Room_Image record
		$record = Room_Image::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("room_image", "Tambah Data Berhasil");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(Room_ImageEditRequest $request, $rec_id = null){
		$query = Room_Image::query();
		$record = $query->findOrFail($rec_id, Room_Image::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
		
		if( array_key_exists("room_image", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['room_image'], "room_image");
			$modeldata['room_image'] = $fileInfo['filepath'];
		}
			$record->update($modeldata);
			return $this->redirect("room_image", "Ubah Data Berhasil");
		}
		return $this->renderView("pages.room_image.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Room_Image::query();
		$query->whereIn("id", $arr_id);
		$records = $query->get(['room_image']); //get records files to be deleted before delete
		$query->delete();
		foreach($records as $record){
			$this->deleteRecordFiles($record['room_image'], "room_image"); //delete file after record delete
		}
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Hapus Data Berhasil");
	}
}

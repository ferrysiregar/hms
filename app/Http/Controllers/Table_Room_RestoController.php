<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Table_Room_RestoAddRequest;
use App\Http\Requests\Table_Room_RestoEditRequest;
use App\Models\Table_Room_Resto;
use Illuminate\Http\Request;
use Exception;
class Table_Room_RestoController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.table_room_resto.list";
		$query = Table_Room_Resto::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Table_Room_Resto::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "table_room_resto.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Table_Room_Resto::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Table_Room_Resto::query();
		$record = $query->findOrFail($rec_id, Table_Room_Resto::viewFields());
		return $this->renderView("pages.table_room_resto.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.table_room_resto.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(Table_Room_RestoAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save Table_Room_Resto record
		$record = Table_Room_Resto::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("table_room_resto", "Tambah Data Berhasil");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(Table_Room_RestoEditRequest $request, $rec_id = null){
		$query = Table_Room_Resto::query();
		$record = $query->findOrFail($rec_id, Table_Room_Resto::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("table_room_resto", "Ubah Data Berhasil");
		}
		return $this->renderView("pages.table_room_resto.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Table_Room_Resto::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Hapus Data Berhasil");
	}
}

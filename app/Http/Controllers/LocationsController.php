<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\LocationsAddRequest;
use App\Http\Requests\LocationsEditRequest;
use App\Models\Locations;
use Illuminate\Http\Request;
use Exception;
class LocationsController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.locations.list";
		$query = Locations::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Locations::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "locations.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Locations::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Locations::query();
		$record = $query->findOrFail($rec_id, Locations::viewFields());
		return $this->renderView("pages.locations.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.locations.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(LocationsAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save Locations record
		$record = Locations::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("locations", "Tambah Data Berhasil");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(LocationsEditRequest $request, $rec_id = null){
		$query = Locations::query();
		$record = $query->findOrFail($rec_id, Locations::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("locations", "Ubah Data Berhasil");
		}
		return $this->renderView("pages.locations.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Locations::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Hapus Data Berhasil");
	}
}

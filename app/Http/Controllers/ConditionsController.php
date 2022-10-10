<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConditionsAddRequest;
use App\Http\Requests\ConditionsEditRequest;
use App\Models\Conditions;
use Illuminate\Http\Request;
use Exception;
class ConditionsController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.conditions.list";
		$query = Conditions::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Conditions::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "conditions.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Conditions::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Conditions::query();
		$record = $query->findOrFail($rec_id, Conditions::viewFields());
		return $this->renderView("pages.conditions.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.conditions.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(ConditionsAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save Conditions record
		$record = Conditions::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("conditions", "Tambah Data Berhasil");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(ConditionsEditRequest $request, $rec_id = null){
		$query = Conditions::query();
		$record = $query->findOrFail($rec_id, Conditions::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("conditions", "Ubah Data Berhasil");
		}
		return $this->renderView("pages.conditions.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Conditions::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Hapus Data Berhasil");
	}
}

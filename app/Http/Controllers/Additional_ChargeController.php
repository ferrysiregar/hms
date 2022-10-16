<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Additional_ChargeAddRequest;
use App\Http\Requests\Additional_ChargeEditRequest;
use App\Models\Additional_Charge;
use Illuminate\Http\Request;
use Exception;
class Additional_ChargeController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.additional_charge.list";
		$query = Additional_Charge::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Additional_Charge::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "additional_charge.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Additional_Charge::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Additional_Charge::query();
		$record = $query->findOrFail($rec_id, Additional_Charge::viewFields());
		return $this->renderView("pages.additional_charge.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.additional_charge.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(Additional_ChargeAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save Additional_Charge record
		$record = Additional_Charge::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("additional_charge", "Tambah Data Berhasil");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(Additional_ChargeEditRequest $request, $rec_id = null){
		$query = Additional_Charge::query();
		$record = $query->findOrFail($rec_id, Additional_Charge::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("additional_charge", "Ubah Data Berhasil");
		}
		return $this->renderView("pages.additional_charge.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Additional_Charge::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Hapus Data Berhasil");
	}
}

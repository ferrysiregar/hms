<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Hk_Stok_InAddRequest;
use App\Http\Requests\Hk_Stok_InEditRequest;
use App\Models\Hk_Stok_In;
use Illuminate\Http\Request;
use Exception;
class Hk_Stok_InController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.hk_stok_in.list";
		$query = Hk_Stok_In::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Hk_Stok_In::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "hk_stok_in.code_stok_in";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Hk_Stok_In::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Hk_Stok_In::query();
		$record = $query->findOrFail($rec_id, Hk_Stok_In::viewFields());
		return $this->renderView("pages.hk_stok_in.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.hk_stok_in.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(Hk_Stok_InAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//Validate Details_Hk_Stok_In form data
		$detailsHkStokInPostData = $request->details_hk_stok_in;
		$detailsHkStokInValidator = validator()->make($detailsHkStokInPostData, ["*.item" => "required",
				"*.qty" => "required|numeric",
				"*.conditions" => "required",
				"*.locations" => "required"]);
		if ($detailsHkStokInValidator->fails()) {
			return $detailsHkStokInValidator->errors();
		}
		$detailsHkStokInValidData = $detailsHkStokInValidator->valid();
		$detailsHkStokInModeldata = array_values($detailsHkStokInValidData);
		$modeldata['code_stok_in'] = "Stockin-".random_num(10);
		
		//save Hk_Stok_In record
		$record = Hk_Stok_In::create($modeldata);
		$rec_id = $record->code_stok_in;
		
		// set details_hk_stok_in.code_dethk_stokin to hk_stok_in $rec_id
		foreach ($detailsHkStokInModeldata as &$data) {
			$data['code_dethk_stokin'] = $rec_id;
		}
		
		//Save Details_Hk_Stok_In record
		\App\Models\Details_Hk_Stok_In::insert($detailsHkStokInModeldata);
		return $this->redirect("hk_stok_in", "Tambah Data Berhasil");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(Hk_Stok_InEditRequest $request, $rec_id = null){
		$query = Hk_Stok_In::query();
		$record = $query->findOrFail($rec_id, Hk_Stok_In::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("hk_stok_in", "Ubah Data Berhasil");
		}
		return $this->renderView("pages.hk_stok_in.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Hk_Stok_In::query();
		$query->whereIn("code_stok_in", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Hapus Data Berhasil");
	}
}

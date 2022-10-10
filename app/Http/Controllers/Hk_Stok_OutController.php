<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Hk_Stok_OutAddRequest;
use App\Http\Requests\Hk_Stok_OutEditRequest;
use App\Models\Hk_Stok_Out;
use Illuminate\Http\Request;
use Exception;
class Hk_Stok_OutController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.hk_stok_out.list";
		$query = Hk_Stok_Out::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Hk_Stok_Out::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "hk_stok_out.code_stock_out";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Hk_Stok_Out::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Hk_Stok_Out::query();
		$record = $query->findOrFail($rec_id, Hk_Stok_Out::viewFields());
		return $this->renderView("pages.hk_stok_out.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.hk_stok_out.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(Hk_Stok_OutAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//Validate Details_Hk_Stok_Out form data
		$detailsHkStokOutPostData = $request->details_hk_stok_out;
		$detailsHkStokOutValidator = validator()->make($detailsHkStokOutPostData, ["*.item" => "required",
				"*.qty" => "required|numeric",
				"*.conditions" => "required",
				"*.locations" => "required",
				"*.desc_locations" => "nullable|string"]);
		if ($detailsHkStokOutValidator->fails()) {
			return $detailsHkStokOutValidator->errors();
		}
		$detailsHkStokOutValidData = $detailsHkStokOutValidator->valid();
		$detailsHkStokOutModeldata = array_values($detailsHkStokOutValidData);
		$modeldata['code_stock_out'] = "Stockout-".random_num(10);
		
		//save Hk_Stok_Out record
		$record = Hk_Stok_Out::create($modeldata);
		$rec_id = $record->code_stock_out;
		
		// set details_hk_stok_out.code_dethk_stokout to hk_stok_out $rec_id
		foreach ($detailsHkStokOutModeldata as &$data) {
			$data['code_dethk_stokout'] = $rec_id;
		}
		
		//Save Details_Hk_Stok_Out record
		\App\Models\Details_Hk_Stok_Out::insert($detailsHkStokOutModeldata);
		return $this->redirect("hk_stok_out", "Tambah Data Berhasil");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(Hk_Stok_OutEditRequest $request, $rec_id = null){
		$query = Hk_Stok_Out::query();
		$record = $query->findOrFail($rec_id, Hk_Stok_Out::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("hk_stok_out", "Ubah Data Berhasil");
		}
		return $this->renderView("pages.hk_stok_out.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Hk_Stok_Out::query();
		$query->whereIn("code_stock_out", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Hapus Data Berhasil");
	}
}

<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Trans_PurchaseAddRequest;
use App\Http\Requests\Trans_PurchaseEditRequest;
use App\Models\Trans_Purchase;
use Illuminate\Http\Request;
use Exception;
class Trans_PurchaseController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.trans_purchase.list";
		$query = Trans_Purchase::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Trans_Purchase::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "trans_purchase.code_trans_purchase";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Trans_Purchase::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Trans_Purchase::query();
		$record = $query->findOrFail($rec_id, Trans_Purchase::viewFields());
		return $this->renderView("pages.trans_purchase.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.trans_purchase.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(Trans_PurchaseAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		$modeldata['code_trans_purchase'] = "Purchase-".datetime_now();
		
		//save Trans_Purchase record
		$record = Trans_Purchase::create($modeldata);
		$rec_id = $record->code_trans_purchase;
		return $this->redirect("trans_purchase", "Tambah Data Berhasil");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(Trans_PurchaseEditRequest $request, $rec_id = null){
		$query = Trans_Purchase::query();
		$record = $query->findOrFail($rec_id, Trans_Purchase::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("trans_purchase", "Ubah Data Berhasil");
		}
		return $this->renderView("pages.trans_purchase.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Trans_Purchase::query();
		$query->whereIn("code_trans_purchase", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Hapus Data Berhasil");
	}
}

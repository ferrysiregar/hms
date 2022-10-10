<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Purchase_ItemsAddRequest;
use App\Http\Requests\Purchase_ItemsEditRequest;
use App\Models\Purchase_Items;
use Illuminate\Http\Request;
use Exception;
class Purchase_ItemsController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.purchase_items.list";
		$query = Purchase_Items::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Purchase_Items::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "purchase_items.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Purchase_Items::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Purchase_Items::query();
		$record = $query->findOrFail($rec_id, Purchase_Items::viewFields());
		return $this->renderView("pages.purchase_items.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.purchase_items.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(Purchase_ItemsAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save Purchase_Items record
		$record = Purchase_Items::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("purchase_items", "Tambah Data Berhasil");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(Purchase_ItemsEditRequest $request, $rec_id = null){
		$query = Purchase_Items::query();
		$record = $query->findOrFail($rec_id, Purchase_Items::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("purchase_items", "Ubah Data Berhasil");
		}
		return $this->renderView("pages.purchase_items.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Purchase_Items::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Hapus Data Berhasil");
	}
}

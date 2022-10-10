<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierAddRequest;
use App\Http\Requests\SupplierEditRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Exception;
class SupplierController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.supplier.list";
		$query = Supplier::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Supplier::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "supplier.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Supplier::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Supplier::query();
		$record = $query->findOrFail($rec_id, Supplier::viewFields());
		return $this->renderView("pages.supplier.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.supplier.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(SupplierAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save Supplier record
		$record = Supplier::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("supplier", "Tambah Data Berhasil");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(SupplierEditRequest $request, $rec_id = null){
		$query = Supplier::query();
		$record = $query->findOrFail($rec_id, Supplier::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("supplier", "Ubah Data Berhasil");
		}
		return $this->renderView("pages.supplier.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Supplier::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Hapus Data Berhasil");
	}
}

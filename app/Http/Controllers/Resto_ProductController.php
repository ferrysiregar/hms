<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Resto_ProductAddRequest;
use App\Http\Requests\Resto_ProductEditRequest;
use App\Models\Resto_Product;
use Illuminate\Http\Request;
use Exception;
class Resto_ProductController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.resto_product.list";
		$query = Resto_Product::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Resto_Product::search($query, $search); // search table records
		}
		$query->join("resto_product_locations", "resto_product.product_locations", "=", "resto_product_locations.id");
		$orderby = $request->orderby ?? "resto_product.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Resto_Product::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Resto_Product::query();
		$record = $query->findOrFail($rec_id, Resto_Product::viewFields());
		return $this->renderView("pages.resto_product.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.resto_product.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(Resto_ProductAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		$modeldata['code_product_resto'] = "Prod-".random_num(10);
		
		//save Resto_Product record
		$record = Resto_Product::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("resto_product", "Tambah Data Berhasil");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(Resto_ProductEditRequest $request, $rec_id = null){
		$query = Resto_Product::query();
		$record = $query->findOrFail($rec_id, Resto_Product::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("resto_product", "Ubah Data Berhasil");
		}
		return $this->renderView("pages.resto_product.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Resto_Product::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Hapus Data Berhasil");
	}
}

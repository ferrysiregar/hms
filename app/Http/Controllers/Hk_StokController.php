<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Hk_StokAddRequest;
use App\Http\Requests\Hk_StokEditRequest;
use App\Models\Hk_Stok;
use Illuminate\Http\Request;
use Exception;
class Hk_StokController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.hk_stok.list";
		$query = Hk_Stok::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Hk_Stok::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "hk_stok.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Hk_Stok::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Hk_Stok::query();
		$record = $query->findOrFail($rec_id, Hk_Stok::viewFields());
		return $this->renderView("pages.hk_stok.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.hk_stok.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(Hk_StokAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		$modeldata['code_items'] = "items-".random_num(10);
		
		//save Hk_Stok record
		$record = Hk_Stok::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("hk_stok", "Tambah Data Berhasil");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(Hk_StokEditRequest $request, $rec_id = null){
		$query = Hk_Stok::query();
		$record = $query->findOrFail($rec_id, Hk_Stok::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("hk_stok", "Ubah Data Berhasil");
		}
		return $this->renderView("pages.hk_stok.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Hk_Stok::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Hapus Data Berhasil");
	}
}

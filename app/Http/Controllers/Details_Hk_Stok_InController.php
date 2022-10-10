<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Details_Hk_Stok_InAddRequest;
use App\Http\Requests\Details_Hk_Stok_InEditRequest;
use App\Models\Details_Hk_Stok_In;
use Illuminate\Http\Request;
use Exception;
class Details_Hk_Stok_InController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.details_hk_stok_in.list";
		$query = Details_Hk_Stok_In::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Details_Hk_Stok_In::search($query, $search); // search table records
		}
		$query->join("conditions", "details_hk_stok_in.conditions", "=", "conditions.id");
		$query->join("locations", "details_hk_stok_in.locations", "=", "locations.id");
		$orderby = $request->orderby ?? "details_hk_stok_in.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Details_Hk_Stok_In::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Details_Hk_Stok_In::query();
		$record = $query->findOrFail($rec_id, Details_Hk_Stok_In::viewFields());
		return $this->renderView("pages.details_hk_stok_in.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return view("pages.details_hk_stok_in.add");
	}
	

	/**
     * Insert multiple record into the database table
     * @return \Illuminate\Http\Response
     */
	function store(Details_Hk_Stok_InAddRequest $request){
		$postdata = $request->input("row");
		$modeldata = array_values($postdata);
		Details_Hk_Stok_In::insert($modeldata);
		return $this->redirect("details_hk_stok_in", "Tambah Data Berhasil");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(Details_Hk_Stok_InEditRequest $request, $rec_id = null){
		$query = Details_Hk_Stok_In::query();
		$record = $query->findOrFail($rec_id, Details_Hk_Stok_In::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("details_hk_stok_in", "Ubah Data Berhasil");
		}
		return $this->renderView("pages.details_hk_stok_in.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Details_Hk_Stok_In::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Hapus Data Berhasil");
	}
}

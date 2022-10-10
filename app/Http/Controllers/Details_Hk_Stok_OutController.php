<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Details_Hk_Stok_OutAddRequest;
use App\Http\Requests\Details_Hk_Stok_OutEditRequest;
use App\Models\Details_Hk_Stok_Out;
use Illuminate\Http\Request;
use Exception;
class Details_Hk_Stok_OutController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.details_hk_stok_out.list";
		$query = Details_Hk_Stok_Out::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Details_Hk_Stok_Out::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "details_hk_stok_out.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Details_Hk_Stok_Out::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Details_Hk_Stok_Out::query();
		$record = $query->findOrFail($rec_id, Details_Hk_Stok_Out::viewFields());
		return $this->renderView("pages.details_hk_stok_out.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return view("pages.details_hk_stok_out.add");
	}
	

	/**
     * Insert multiple record into the database table
     * @return \Illuminate\Http\Response
     */
	function store(Details_Hk_Stok_OutAddRequest $request){
		$postdata = $request->input("row");
		$modeldata = array_values($postdata);
		Details_Hk_Stok_Out::insert($modeldata);
		return $this->redirect("details_hk_stok_out", "Tambah Data Berhasil");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(Details_Hk_Stok_OutEditRequest $request, $rec_id = null){
		$query = Details_Hk_Stok_Out::query();
		$record = $query->findOrFail($rec_id, Details_Hk_Stok_Out::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("details_hk_stok_out", "Ubah Data Berhasil");
		}
		return $this->renderView("pages.details_hk_stok_out.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Details_Hk_Stok_Out::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Hapus Data Berhasil");
	}
}

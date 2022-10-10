<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Detils_Purchase_OrderAddRequest;
use App\Http\Requests\Detils_Purchase_OrderEditRequest;
use App\Models\Detils_Purchase_Order;
use Illuminate\Http\Request;
use Exception;
class Detils_Purchase_OrderController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.detils_purchase_order.list";
		$query = Detils_Purchase_Order::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Detils_Purchase_Order::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "detils_purchase_order.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Detils_Purchase_Order::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Detils_Purchase_Order::query();
		$record = $query->findOrFail($rec_id, Detils_Purchase_Order::viewFields());
		return $this->renderView("pages.detils_purchase_order.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.detils_purchase_order.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(Detils_Purchase_OrderAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save Detils_Purchase_Order record
		$record = Detils_Purchase_Order::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("detils_purchase_order", "Tambah Data Berhasil");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(Detils_Purchase_OrderEditRequest $request, $rec_id = null){
		$query = Detils_Purchase_Order::query();
		$record = $query->findOrFail($rec_id, Detils_Purchase_Order::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("detils_purchase_order", "Ubah Data Berhasil");
		}
		return $this->renderView("pages.detils_purchase_order.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Detils_Purchase_Order::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Hapus Data Berhasil");
	}
}

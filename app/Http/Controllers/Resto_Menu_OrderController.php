<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Resto_Menu_OrderAddRequest;
use App\Http\Requests\Resto_Menu_OrderEditRequest;
use App\Models\Resto_Menu_Order;
use Illuminate\Http\Request;
use Exception;
class Resto_Menu_OrderController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.resto_menu_order.list";
		$query = Resto_Menu_Order::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Resto_Menu_Order::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "resto_menu_order.code_transactions";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Resto_Menu_Order::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Resto_Menu_Order::query();
		$record = $query->findOrFail($rec_id, Resto_Menu_Order::viewFields());
		return $this->renderView("pages.resto_menu_order.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.resto_menu_order.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(Resto_Menu_OrderAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		$modeldata['code_transactions'] = "Trans".datetime_now();
		$modeldata['date'] = datetime_now();
		
		//save Resto_Menu_Order record
		$record = Resto_Menu_Order::create($modeldata);
		$rec_id = $record->code_transactions;
		return $this->redirect("resto_menu_order", "Tambah Data Berhasil");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(Resto_Menu_OrderEditRequest $request, $rec_id = null){
		$query = Resto_Menu_Order::query();
		$record = $query->findOrFail($rec_id, Resto_Menu_Order::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("resto_menu_order", "Ubah Data Berhasil");
		}
		return $this->renderView("pages.resto_menu_order.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Resto_Menu_Order::query();
		$query->whereIn("code_transactions", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Hapus Data Berhasil");
	}
}

<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionAddRequest;
use App\Http\Requests\TransactionEditRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Exception;
class TransactionController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.transaction.list";
		$query = Transaction::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Transaction::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "transaction.transaction_code";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Transaction::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Transaction::query();
		$record = $query->findOrFail($rec_id, Transaction::viewFields());
		return $this->renderView("pages.transaction.view", ["data" => $record]);
	}
	

	/**
     * Display Master Detail Pages
	 * @param string $rec_id //master record id
     * @return \Illuminate\View\View
     */
	function masterDetail($rec_id = null){
		return View("pages.transaction.detail-pages", ["masterRecordId" => $rec_id]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.transaction.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(TransactionAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//Validate Details_Transaction form data
		$detailsTransactionPostData = $request->details_transaction;
		$detailsTransactionValidator = validator()->make($detailsTransactionPostData, ["*.room_id" => "required",
				"*.price" => "required",
				"*.checkin_date" => "required|date",
				"*.checkin_time" => "required",
				"*.checkout_date" => "required|date",
				"*.checkout_time" => "required",
				"*.totals" => "required|numeric"]);
		if ($detailsTransactionValidator->fails()) {
			return $detailsTransactionValidator->errors();
		}
		$detailsTransactionValidData = $detailsTransactionValidator->valid();
		$detailsTransactionModeldata = array_values($detailsTransactionValidData);
		$modeldata['transaction_code'] = "trans-".timestamp();
		
		//save Transaction record
		$record = Transaction::create($modeldata);
		$rec_id = $record->transaction_code;
		
		// set details_transaction.code_details_transaction to transaction $rec_id
		foreach ($detailsTransactionModeldata as &$data) {
			$data['code_details_transaction'] = $rec_id;
		}
		
		//Save Details_Transaction record
		\App\Models\Details_Transaction::insert($detailsTransactionModeldata);
		return $this->redirect("transaction", "Tambah Data Berhasil");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(TransactionEditRequest $request, $rec_id = null){
		$query = Transaction::query();
		$record = $query->findOrFail($rec_id, Transaction::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("transaction", "Ubah Data Berhasil");
		}
		return $this->renderView("pages.transaction.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Transaction::query();
		$query->whereIn("transaction_code", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Hapus Data Berhasil");
	}
}

<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cashbon_EmployeeAddRequest;
use App\Http\Requests\Cashbon_EmployeeEditRequest;
use App\Models\Cashbon_Employee;
use Illuminate\Http\Request;
use Exception;
class Cashbon_EmployeeController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.cashbon_employee.list";
		$query = Cashbon_Employee::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Cashbon_Employee::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "cashbon_employee.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Cashbon_Employee::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Cashbon_Employee::query();
		$record = $query->findOrFail($rec_id, Cashbon_Employee::viewFields());
		return $this->renderView("pages.cashbon_employee.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.cashbon_employee.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(Cashbon_EmployeeAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save Cashbon_Employee record
		$record = Cashbon_Employee::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("cashbon_employee", "Tambah Data Berhasil");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(Cashbon_EmployeeEditRequest $request, $rec_id = null){
		$query = Cashbon_Employee::query();
		$record = $query->findOrFail($rec_id, Cashbon_Employee::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("cashbon_employee", "Ubah Data Berhasil");
		}
		return $this->renderView("pages.cashbon_employee.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Cashbon_Employee::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Hapus Data Berhasil");
	}
}

<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeAddRequest;
use App\Http\Requests\EmployeeEditRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Exception;
class EmployeeController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.employee.list";
		$query = Employee::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Employee::search($query, $search); // search table records
		}
		$query->join("department", "employee.department", "=", "department.id");
		$query->join("job_title", "employee.job_title", "=", "job_title.id");
		$query->join("contract_status", "employee.contract_status", "=", "contract_status.id");
		$orderby = $request->orderby ?? "employee.nik";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Employee::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Employee::query();
		$record = $query->findOrFail($rec_id, Employee::viewFields());
		return $this->renderView("pages.employee.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.employee.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(EmployeeAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save Employee record
		$record = Employee::create($modeldata);
		$rec_id = $record->nik;
		return $this->redirect("employee", "Tambah Data Berhasil");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(EmployeeEditRequest $request, $rec_id = null){
		$query = Employee::query();
		$record = $query->findOrFail($rec_id, Employee::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("employee", "Ubah Data Berhasil");
		}
		return $this->renderView("pages.employee.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Employee::query();
		$query->whereIn("nik", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Hapus Data Berhasil");
	}
}

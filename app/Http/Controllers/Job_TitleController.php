<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Job_TitleAddRequest;
use App\Http\Requests\Job_TitleEditRequest;
use App\Models\Job_Title;
use Illuminate\Http\Request;
use Exception;
class Job_TitleController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.job_title.list";
		$query = Job_Title::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Job_Title::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "job_title.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Job_Title::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Job_Title::query();
		$record = $query->findOrFail($rec_id, Job_Title::viewFields());
		return $this->renderView("pages.job_title.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.job_title.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(Job_TitleAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save Job_Title record
		$record = Job_Title::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("job_title", "Tambah Data Berhasil");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(Job_TitleEditRequest $request, $rec_id = null){
		$query = Job_Title::query();
		$record = $query->findOrFail($rec_id, Job_Title::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("job_title", "Ubah Data Berhasil");
		}
		return $this->renderView("pages.job_title.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Job_Title::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Hapus Data Berhasil");
	}
}

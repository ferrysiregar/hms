<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Employee extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'employee';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'nik';
	public $incrementing = false;
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'nik','name','department','job_title','born','address','work_start_date','contract_status','salary'
	];
	

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
	public $timestamps = false;
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				employee.nik LIKE ?  OR 
				employee.name LIKE ?  OR 
				employee.born LIKE ?  OR 
				employee.address LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%"
		];
		//setting search conditions
		$query->whereRaw($search_condition, $search_params);
	}
	

	/**
     * return list page fields of the model.
     * 
     * @return array
     */
	public static function listFields(){
		return [ 
			"employee.nik AS nik",
			"employee.name AS name",
			"employee.department AS department",
			"department.department_name AS department_department_name",
			"employee.job_title AS job_title",
			"job_title.job_title_name AS job_title_job_title_name",
			"employee.born AS born",
			"employee.address AS address",
			"employee.work_start_date AS work_start_date",
			"employee.contract_status AS contract_status",
			"contract_status.contract_status_name AS contract_status_contract_status_name",
			"employee.salary AS salary" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"employee.nik AS nik",
			"employee.name AS name",
			"employee.department AS department",
			"department.department_name AS department_department_name",
			"employee.job_title AS job_title",
			"job_title.job_title_name AS job_title_job_title_name",
			"employee.born AS born",
			"employee.address AS address",
			"employee.work_start_date AS work_start_date",
			"employee.contract_status AS contract_status",
			"contract_status.contract_status_name AS contract_status_contract_status_name",
			"employee.salary AS salary" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"nik",
			"name",
			"department",
			"job_title",
			"born",
			"address",
			"work_start_date",
			"contract_status",
			"salary" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"nik",
			"name",
			"department",
			"job_title",
			"born",
			"address",
			"work_start_date",
			"contract_status",
			"salary" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"nik",
			"name",
			"department",
			"job_title",
			"born",
			"address",
			"work_start_date",
			"contract_status",
			"salary" 
		];
	}
}

<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Cashbon_Employee extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'cashbon_employee';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'id';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'date','employee_name','salary_employee','cashbon_value','calc_month_payment','payment_per_month','cashbon_description'
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
				cashbon_description LIKE ? 
		)';
		$search_params = [
			"%$text%"
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
			"id",
			"date",
			"employee_name",
			"salary_employee",
			"cashbon_value",
			"calc_month_payment",
			"payment_per_month",
			"cashbon_description" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"id",
			"date",
			"employee_name",
			"salary_employee",
			"cashbon_value",
			"calc_month_payment",
			"payment_per_month",
			"cashbon_description" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"id",
			"date",
			"employee_name",
			"salary_employee",
			"cashbon_value",
			"calc_month_payment",
			"payment_per_month",
			"cashbon_description" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"id",
			"date",
			"employee_name",
			"salary_employee",
			"cashbon_value",
			"calc_month_payment",
			"payment_per_month",
			"cashbon_description" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"id",
			"date",
			"employee_name",
			"salary_employee",
			"cashbon_value",
			"calc_month_payment",
			"payment_per_month",
			"cashbon_description" 
		];
	}
}

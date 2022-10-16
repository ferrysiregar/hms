<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\DB;

class Customers extends Model
{


	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'customers';


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
		'identity_number', 'customer_name', 'company', 'address', 'phone', 'email'
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
	public static function search($query, $text)
	{
		//search table record 
		$search_condition = '(
				identity_number LIKE ?  OR 
				customer_name LIKE ?  OR 
				company LIKE ?  OR 
				address LIKE ?  OR 
				phone LIKE ?  OR 
				email LIKE ? 
		)';
		$search_params = [
			"%$text%", "%$text%", "%$text%", "%$text%", "%$text%", "%$text%"
		];
		//setting search conditions
		$query->whereRaw($search_condition, $search_params);
	}


	public static function scopeFilter($query, $params)
	{
		return $query->where('customer_name', 'like', "%$params%");
	}


	/**
	 * return list page fields of the model.
	 * 
	 * @return array
	 */
	public static function listFields()
	{
		return [
			"id",
			"identity_number",
			"customer_name",
			"company",
			"address",
			"phone",
			"email"
		];
	}


	/**
	 * return exportList page fields of the model.
	 * 
	 * @return array
	 */
	public static function exportListFields()
	{
		return [
			"id",
			"identity_number",
			"customer_name",
			"company",
			"address",
			"phone",
			"email"
		];
	}


	/**
	 * return view page fields of the model.
	 * 
	 * @return array
	 */
	public static function viewFields()
	{
		return [
			"id",
			"identity_number",
			"customer_name",
			"company",
			"address",
			"phone",
			"email"
		];
	}


	/**
	 * return exportView page fields of the model.
	 * 
	 * @return array
	 */
	public static function exportViewFields()
	{
		return [
			"id",
			"identity_number",
			"customer_name",
			"company",
			"address",
			"phone",
			"email"
		];
	}


	/**
	 * return edit page fields of the model.
	 * 
	 * @return array
	 */
	public static function editFields()
	{
		return [
			"id",
			"identity_number",
			"customer_name",
			"company",
			"address",
			"phone",
			"email"
		];
	}
}

<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Details_Transaction extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'details_transaction';
	

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
		'code_details_transaction','room_id','price','checkin_date','checkin_time','checkout_date','checkout_time','totals'
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
				code_details_transaction LIKE ? 
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
			"code_details_transaction",
			"room_id",
			"price",
			"checkin_date",
			"checkin_time",
			"checkout_date",
			"checkout_time",
			"totals" 
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
			"code_details_transaction",
			"room_id",
			"price",
			"checkin_date",
			"checkin_time",
			"checkout_date",
			"checkout_time",
			"totals" 
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
			"code_details_transaction",
			"room_id",
			"price",
			"checkin_date",
			"checkin_time",
			"checkout_date",
			"checkout_time",
			"totals" 
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
			"code_details_transaction",
			"room_id",
			"price",
			"checkin_date",
			"checkin_time",
			"checkout_date",
			"checkout_time",
			"totals" 
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
			"code_details_transaction",
			"room_id",
			"price",
			"checkin_date",
			"checkin_time",
			"checkout_date",
			"checkout_time",
			"totals" 
		];
	}
}

<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Details_Booking extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'details_booking';
	

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
		'code_details_booking','room_id','price','qty','total'
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
				details_booking.code_details_booking LIKE ? 
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
			"details_booking.id AS id",
			"details_booking.code_details_booking AS code_details_booking",
			"details_booking.room_id AS room_id",
			"room.room_name AS room_room_name",
			"details_booking.price AS price",
			"details_booking.qty AS qty",
			"details_booking.total AS total" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"details_booking.id AS id",
			"details_booking.code_details_booking AS code_details_booking",
			"details_booking.room_id AS room_id",
			"room.room_name AS room_room_name",
			"details_booking.price AS price",
			"details_booking.qty AS qty",
			"details_booking.total AS total" 
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
			"code_details_booking",
			"room_id",
			"price",
			"qty",
			"total" 
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
			"code_details_booking",
			"room_id",
			"price",
			"qty",
			"total" 
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
			"code_details_booking",
			"room_id",
			"price",
			"qty",
			"total" 
		];
	}
}

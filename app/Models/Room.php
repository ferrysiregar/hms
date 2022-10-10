<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Room extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'room';
	

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
		'kode_room','room_name','room_type_id','room_facilities_id','price_basic','price_sales','status_room_id','photo_room_id'
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
				room.kode_room LIKE ?  OR 
				room.room_name LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%"
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
			"room.id AS id",
			"room.kode_room AS kode_room",
			"room.room_name AS room_name",
			"room.room_type_id AS room_type_id",
			"room_type.room_type AS room_type_room_type",
			"room.room_facilities_id AS room_facilities_id",
			"room_facilities.facilities AS room_facilities_facilities",
			"room.price_basic AS price_basic",
			"room.price_sales AS price_sales",
			"room.status_room_id AS status_room_id",
			"status_room.status_room AS status_room_status_room",
			"room.photo_room_id AS photo_room_id" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"room.id AS id",
			"room.kode_room AS kode_room",
			"room.room_name AS room_name",
			"room.room_type_id AS room_type_id",
			"room_type.room_type AS room_type_room_type",
			"room.room_facilities_id AS room_facilities_id",
			"room_facilities.facilities AS room_facilities_facilities",
			"room.price_basic AS price_basic",
			"room.price_sales AS price_sales",
			"room.status_room_id AS status_room_id",
			"status_room.status_room AS status_room_status_room",
			"room.photo_room_id AS photo_room_id" 
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
			"kode_room",
			"room_name",
			"room_type_id",
			"room_facilities_id",
			"price_basic",
			"price_sales",
			"status_room_id",
			"photo_room_id" 
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
			"kode_room",
			"room_name",
			"room_type_id",
			"room_facilities_id",
			"price_basic",
			"price_sales",
			"status_room_id",
			"photo_room_id" 
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
			"kode_room",
			"room_name",
			"room_type_id",
			"room_facilities_id",
			"price_basic",
			"price_sales",
			"status_room_id",
			"photo_room_id" 
		];
	}
}

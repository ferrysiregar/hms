<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Details_Hk_Stok_In extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'details_hk_stok_in';
	

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
		'code_dethk_stokin','item','qty','conditions','locations'
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
				details_hk_stok_in.code_dethk_stokin LIKE ?  OR 
				details_hk_stok_in.item LIKE ? 
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
			"details_hk_stok_in.id AS id",
			"details_hk_stok_in.code_dethk_stokin AS code_dethk_stokin",
			"details_hk_stok_in.item AS item",
			"details_hk_stok_in.qty AS qty",
			"details_hk_stok_in.conditions AS conditions",
			"conditions.conditions_name AS conditions_conditions_name",
			"details_hk_stok_in.locations AS locations",
			"locations.locations_name AS locations_locations_name" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"details_hk_stok_in.id AS id",
			"details_hk_stok_in.code_dethk_stokin AS code_dethk_stokin",
			"details_hk_stok_in.item AS item",
			"details_hk_stok_in.qty AS qty",
			"details_hk_stok_in.conditions AS conditions",
			"conditions.conditions_name AS conditions_conditions_name",
			"details_hk_stok_in.locations AS locations",
			"locations.locations_name AS locations_locations_name" 
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
			"code_dethk_stokin",
			"item",
			"qty",
			"conditions",
			"locations" 
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
			"code_dethk_stokin",
			"item",
			"qty",
			"conditions",
			"locations" 
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
			"code_dethk_stokin",
			"item",
			"qty",
			"conditions",
			"locations" 
		];
	}
}

<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Resto_Product extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'resto_product';
	

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
		'code_product_resto','product_name','price_basic','price_sales','stock','product_locations'
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
				resto_product.code_product_resto LIKE ?  OR 
				resto_product.product_name LIKE ? 
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
			"resto_product.id AS id",
			"resto_product.code_product_resto AS code_product_resto",
			"resto_product.product_name AS product_name",
			"resto_product.price_basic AS price_basic",
			"resto_product.price_sales AS price_sales",
			"resto_product.stock AS stock",
			"resto_product.product_locations AS product_locations",
			"resto_product_locations.product_locations AS resto_product_locations_product_locations" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"resto_product.id AS id",
			"resto_product.code_product_resto AS code_product_resto",
			"resto_product.product_name AS product_name",
			"resto_product.price_basic AS price_basic",
			"resto_product.price_sales AS price_sales",
			"resto_product.stock AS stock",
			"resto_product.product_locations AS product_locations",
			"resto_product_locations.product_locations AS resto_product_locations_product_locations" 
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
			"code_product_resto",
			"product_name",
			"price_basic",
			"price_sales",
			"stock",
			"product_locations" 
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
			"code_product_resto",
			"product_name",
			"price_basic",
			"price_sales",
			"stock",
			"product_locations" 
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
			"code_product_resto",
			"product_name",
			"price_basic",
			"price_sales",
			"stock",
			"product_locations" 
		];
	}
}

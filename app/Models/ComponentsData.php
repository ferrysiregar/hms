<?php 
namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * Components data Model
 * Use for getting values from the database for page components
 * Support raw query builder
 * @category Model
 */
class ComponentsData{
	

	/**
     * customers_id_option_list Model Action
     * @return array
     */
	function customers_id_option_list(){
		$sqltext = "SELECT  DISTINCT id AS value,customer_name AS label FROM customers";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * agent_id_option_list Model Action
     * @return array
     */
	function agent_id_option_list(){
		$sqltext = "SELECT  DISTINCT id AS value,agent AS label FROM agent";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * payment_status_id_option_list Model Action
     * @return array
     */
	function payment_status_id_option_list(){
		$sqltext = "SELECT  DISTINCT id AS value,payment_status AS label FROM payment_status";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * employee_name_option_list Model Action
     * @return array
     */
	function employee_name_option_list(){
		$sqltext = "SELECT  DISTINCT nik AS value,name AS label FROM employee";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * salary_employee_option_list Model Action
     * @return array
     */
	function salary_employee_option_list($value = null){
		$lookup_value = request()->lookup ?? $value;
		$sqltext = "SELECT  DISTINCT salary AS value,salary AS label FROM employee WHERE nik=:lookup_employee_name" ;
		$query_params = [];
		$query_params['lookup_employee_name'] = $lookup_value;
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * room_id_option_list Model Action
     * @return array
     */
	function room_id_option_list(){
		$sqltext = "SELECT id as value, room_name as label FROM room";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * price_option_list Model Action
     * @return array
     */
	function price_option_list($value = null){
		$lookup_value = request()->lookup ?? $value;
		$sqltext = "SELECT  DISTINCT price_sales AS value,price_sales AS label FROM room WHERE id=:lookup_room_id" ;
		$query_params = [];
		$query_params['lookup_room_id'] = $lookup_value;
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * item_option_list Model Action
     * @return array
     */
	function item_option_list(){
		$sqltext = "SELECT  DISTINCT items AS value,items AS label FROM hk_stok";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * conditions_option_list Model Action
     * @return array
     */
	function conditions_option_list(){
		$sqltext = "SELECT  DISTINCT conditions_name AS value,conditions_name AS label FROM conditions";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * locations_option_list Model Action
     * @return array
     */
	function locations_option_list(){
		$sqltext = "SELECT  DISTINCT locations_name AS value,locations_name AS label FROM locations";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * product_name_option_list Model Action
     * @return array
     */
	function product_name_option_list(){
		$sqltext = "SELECT  DISTINCT product_name AS value,product_name AS label FROM resto_product ORDER BY id";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * details_menu_order_price_option_list Model Action
     * @return array
     */
	function details_menu_order_price_option_list($value = null){
		$lookup_value = request()->lookup ?? $value;
		$sqltext = "SELECT  DISTINCT price_sales AS value,price_sales AS label FROM resto_product WHERE product_name=:lookup_product_name" ;
		$query_params = [];
		$query_params['lookup_product_name'] = $lookup_value;
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * details_room_order_product_name_option_list Model Action
     * @return array
     */
	function details_room_order_product_name_option_list(){
		$sqltext = "SELECT  DISTINCT id AS value,product_name AS label FROM resto_product";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * details_room_order_price_option_list Model Action
     * @return array
     */
	function details_room_order_price_option_list($value = null){
		$lookup_value = request()->lookup ?? $value;
		$sqltext = "SELECT  DISTINCT price_sales AS value,price_sales AS label FROM resto_product WHERE id=:lookup_product_name" ;
		$query_params = [];
		$query_params['lookup_product_name'] = $lookup_value;
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * details_transaction_room_id_option_list Model Action
     * @return array
     */
	function details_transaction_room_id_option_list(){
		$sqltext = "SELECT id AS value,room_name AS label FROM room";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * items_name_option_list Model Action
     * @return array
     */
	function items_name_option_list(){
		$sqltext = "SELECT  DISTINCT code_purchase_items AS value,items_name AS label FROM purchase_items";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * units_option_list Model Action
     * @return array
     */
	function units_option_list($value = null){
		$lookup_value = request()->lookup ?? $value;
		$sqltext = "SELECT  DISTINCT code_purchase_items AS value,units AS label FROM purchase_items WHERE items_name=:lookup_items_name" ;
		$query_params = [];
		$query_params['lookup_items_name'] = $lookup_value;
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * department_option_list Model Action
     * @return array
     */
	function department_option_list(){
		$sqltext = "SELECT  DISTINCT id AS value,department_name AS label FROM department";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * job_title_option_list Model Action
     * @return array
     */
	function job_title_option_list(){
		$sqltext = "SELECT  DISTINCT id AS value,job_title_name AS label FROM job_title";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * contract_status_option_list Model Action
     * @return array
     */
	function contract_status_option_list(){
		$sqltext = "SELECT  DISTINCT id AS value,contract_status_name AS label FROM contract_status";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * permission_id_option_list Model Action
     * @return array
     */
	function permission_id_option_list(){
		$sqltext = "SELECT id as value, name as label FROM permissions";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * role_id_option_list Model Action
     * @return array
     */
	function role_id_option_list(){
		$sqltext = "SELECT id as value, name as label FROM roles";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * table_option_list Model Action
     * @return array
     */
	function table_option_list(){
		$sqltext = "SELECT  DISTINCT id AS value,table_room_name AS label FROM table_room_resto";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * product_locations_option_list Model Action
     * @return array
     */
	function product_locations_option_list(){
		$sqltext = "SELECT  DISTINCT id AS value,product_locations AS label FROM resto_product_locations";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * room_type_id_option_list Model Action
     * @return array
     */
	function room_type_id_option_list(){
		$sqltext = "SELECT  DISTINCT id AS value,room_type AS label FROM room_type";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * room_facilities_id_option_list Model Action
     * @return array
     */
	function room_facilities_id_option_list(){
		$sqltext = "SELECT  DISTINCT id AS value,facilities AS label FROM room_facilities";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * status_room_id_option_list Model Action
     * @return array
     */
	function status_room_id_option_list(){
		$sqltext = "SELECT  DISTINCT id AS value,status_room AS label FROM status_room";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * photo_room_id_option_list Model Action
     * @return array
     */
	function photo_room_id_option_list(){
		$sqltext = "SELECT  DISTINCT id AS value,room_image AS label FROM room_image";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * room_name_option_list Model Action
     * @return array
     */
	function room_name_option_list(){
		$sqltext = "SELECT  DISTINCT id AS value,room_name AS label FROM room";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * payment_status_option_list Model Action
     * @return array
     */
	function payment_status_option_list(){
		$sqltext = "SELECT  DISTINCT payment_status AS value,payment_status AS label FROM payment_status";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * floor_id_option_list Model Action
     * @return array
     */
	function floor_id_option_list(){
		$sqltext = "SELECT  DISTINCT id AS value,floor AS label FROM room_floor";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * supplier_option_list Model Action
     * @return array
     */
	function supplier_option_list(){
		$sqltext = "SELECT  DISTINCT code_supplier AS value,name_supplier AS label FROM supplier";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * transaction_customers_id_option_list Model Action
     * @return array
     */
	function transaction_customers_id_option_list(){
		$sqltext = "SELECT id as value, customer_name as label FROM customers";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * transaction_agent_id_option_list Model Action
     * @return array
     */
	function transaction_agent_id_option_list(){
		$sqltext = "SELECT id AS value,agent AS label FROM agent";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * transaction_payment_status_id_option_list Model Action
     * @return array
     */
	function transaction_payment_status_id_option_list(){
		$sqltext = "SELECT id AS value,payment_status AS label FROM payment_status";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * Check if value already exist in Users table
	 * @param string $value
     * @return bool
     */
	function users_user_name_value_exist(Request $request){
		$value = trim($request->value);
		$exist = DB::table('users')->where('user_name', $value)->value('user_name');   
		if($exist){
			return true;
		}
		return false;
	}
	

	/**
     * Check if value already exist in Users table
	 * @param string $value
     * @return bool
     */
	function users_email_value_exist(Request $request){
		$value = trim($request->value);
		$exist = DB::table('users')->where('email', $value)->value('email');   
		if($exist){
			return true;
		}
		return false;
	}
}

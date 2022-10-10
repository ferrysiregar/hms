<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Booking extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'booking';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'code_booking';
	public $incrementing = false;
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'code_booking','customers_id','agent_id','checkin_date','checkin_time','checkout_date','checkout_time','payment_status_id'
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
				booking.code_booking LIKE ? 
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
			"booking.code_booking AS code_booking",
			"booking.customers_id AS customers_id",
			"customers.customer_name AS customers_customer_name",
			"booking.agent_id AS agent_id",
			"agent.agent AS agent_agent",
			"booking.checkin_date AS checkin_date",
			"booking.checkin_time AS checkin_time",
			"booking.checkout_date AS checkout_date",
			"booking.checkout_time AS checkout_time",
			"booking.payment_status_id AS payment_status_id" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"booking.code_booking AS code_booking",
			"booking.customers_id AS customers_id",
			"customers.customer_name AS customers_customer_name",
			"booking.agent_id AS agent_id",
			"agent.agent AS agent_agent",
			"booking.checkin_date AS checkin_date",
			"booking.checkin_time AS checkin_time",
			"booking.checkout_date AS checkout_date",
			"booking.checkout_time AS checkout_time",
			"booking.payment_status_id AS payment_status_id" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"code_booking",
			"customers_id",
			"agent_id",
			"checkin_date",
			"checkin_time",
			"checkout_date",
			"checkout_time",
			"payment_status_id" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"code_booking",
			"customers_id",
			"agent_id",
			"checkin_date",
			"checkin_time",
			"checkout_date",
			"checkout_time",
			"payment_status_id" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"code_booking",
			"customers_id",
			"agent_id",
			"checkin_date",
			"checkin_time",
			"checkout_date",
			"checkout_time",
			"payment_status_id" 
		];
	}
	

	/**
     * return bookingCalendar page fields of the model.
     * 
     * @return array
     */
	public static function bookingCalendarFields(){
		return [ 
			"booking.code_booking AS code_booking",
			"booking.customers_id AS customers_id",
			"customers.customer_name AS customers_customer_name",
			"booking.agent_id AS agent_id",
			"agent.agent AS agent_agent",
			"booking.checkin_date AS checkin_date",
			"booking.checkin_time AS checkin_time",
			"booking.checkout_date AS checkout_date",
			"booking.checkout_time AS checkout_time",
			"booking.payment_status_id AS payment_status_id",
			"payment_status.payment_status AS payment_status_payment_status",
			"details_booking.id AS details_booking_id",
			"details_booking.room_id AS details_booking_room_id",
			"details_booking.price AS details_booking_price",
			"details_booking.qty AS details_booking_qty",
			"details_booking.total AS details_booking_total" 
		];
	}
	

	/**
     * return exportBookingCalendar page fields of the model.
     * 
     * @return array
     */
	public static function exportBookingCalendarFields(){
		return [ 
			"booking.code_booking AS code_booking",
			"booking.customers_id AS customers_id",
			"customers.customer_name AS customers_customer_name",
			"booking.agent_id AS agent_id",
			"agent.agent AS agent_agent",
			"booking.checkin_date AS checkin_date",
			"booking.checkin_time AS checkin_time",
			"booking.checkout_date AS checkout_date",
			"booking.checkout_time AS checkout_time",
			"booking.payment_status_id AS payment_status_id",
			"payment_status.payment_status AS payment_status_payment_status",
			"details_booking.id AS details_booking_id",
			"details_booking.room_id AS details_booking_room_id",
			"details_booking.price AS details_booking_price",
			"details_booking.qty AS details_booking_qty",
			"details_booking.total AS details_booking_total" 
		];
	}
}

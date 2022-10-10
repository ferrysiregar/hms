<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

	
	Route::get('', 'HomeController@index')->name('index');
	Route::get('home', 'HomeController@index')->name('home');




/* routes for Agent Controller */	
	Route::get('agent', 'AgentController@index')->name('agent.index');
	Route::get('agent/index', 'AgentController@index')->name('agent.index');
	Route::get('agent/index/{filter?}/{filtervalue?}', 'AgentController@index')->name('agent.index');	
	Route::get('agent/view/{rec_id}', 'AgentController@view')->name('agent.view');
	Route::get('agent/masterdetail/{rec_id}', 'AgentController@masterDetail')->name('agent.masterdetail');	
	Route::get('agent/add', 'AgentController@add')->name('agent.add');
	Route::post('agent/store', 'AgentController@store')->name('agent.store');
		
	Route::any('agent/edit/{rec_id}', 'AgentController@edit')->name('agent.edit');	
	Route::get('agent/delete/{rec_id}', 'AgentController@delete');

/* routes for Booking Controller */	
	Route::get('booking', 'BookingController@index')->name('booking.index');
	Route::get('booking/index', 'BookingController@index')->name('booking.index');
	Route::get('booking/index/{filter?}/{filtervalue?}', 'BookingController@index')->name('booking.index');	
	Route::get('booking/view/{rec_id}', 'BookingController@view')->name('booking.view');
	Route::get('booking/masterdetail/{rec_id}', 'BookingController@masterDetail')->name('booking.masterdetail');	
	Route::get('booking/add', 'BookingController@add')->name('booking.add');
	Route::post('booking/store', 'BookingController@store')->name('booking.store');
		
	Route::any('booking/edit/{rec_id}', 'BookingController@edit')->name('booking.edit');	
	Route::get('booking/delete/{rec_id}', 'BookingController@delete');	
	Route::get('booking/booking_calendar', 'BookingController@booking_calendar');
	Route::get('booking/booking_calendar/{filter?}/{filtervalue?}', 'BookingController@booking_calendar');

/* routes for Conditions Controller */	
	Route::get('conditions', 'ConditionsController@index')->name('conditions.index');
	Route::get('conditions/index', 'ConditionsController@index')->name('conditions.index');
	Route::get('conditions/index/{filter?}/{filtervalue?}', 'ConditionsController@index')->name('conditions.index');	
	Route::get('conditions/view/{rec_id}', 'ConditionsController@view')->name('conditions.view');	
	Route::get('conditions/add', 'ConditionsController@add')->name('conditions.add');
	Route::post('conditions/store', 'ConditionsController@store')->name('conditions.store');
		
	Route::any('conditions/edit/{rec_id}', 'ConditionsController@edit')->name('conditions.edit');	
	Route::get('conditions/delete/{rec_id}', 'ConditionsController@delete');

/* routes for Customers Controller */	
	Route::get('customers', 'CustomersController@index')->name('customers.index');
	Route::get('customers/index', 'CustomersController@index')->name('customers.index');
	Route::get('customers/index/{filter?}/{filtervalue?}', 'CustomersController@index')->name('customers.index');	
	Route::get('customers/view/{rec_id}', 'CustomersController@view')->name('customers.view');
	Route::get('customers/masterdetail/{rec_id}', 'CustomersController@masterDetail')->name('customers.masterdetail');	
	Route::get('customers/add', 'CustomersController@add')->name('customers.add');
	Route::post('customers/store', 'CustomersController@store')->name('customers.store');
		
	Route::any('customers/edit/{rec_id}', 'CustomersController@edit')->name('customers.edit');	
	Route::get('customers/delete/{rec_id}', 'CustomersController@delete');

/* routes for Details_Booking Controller */	
	Route::get('details_booking', 'Details_BookingController@index')->name('details_booking.index');
	Route::get('details_booking/index', 'Details_BookingController@index')->name('details_booking.index');
	Route::get('details_booking/index/{filter?}/{filtervalue?}', 'Details_BookingController@index')->name('details_booking.index');	
	Route::get('details_booking/view/{rec_id}', 'Details_BookingController@view')->name('details_booking.view');	
	Route::get('details_booking/add', 'Details_BookingController@add')->name('details_booking.add');
	Route::post('details_booking/store', 'Details_BookingController@store')->name('details_booking.store');
		
	Route::any('details_booking/edit/{rec_id}', 'Details_BookingController@edit')->name('details_booking.edit');	
	Route::get('details_booking/delete/{rec_id}', 'Details_BookingController@delete');

/* routes for Details_Hk_Stok_In Controller */	
	Route::get('details_hk_stok_in', 'Details_Hk_Stok_InController@index')->name('details_hk_stok_in.index');
	Route::get('details_hk_stok_in/index', 'Details_Hk_Stok_InController@index')->name('details_hk_stok_in.index');
	Route::get('details_hk_stok_in/index/{filter?}/{filtervalue?}', 'Details_Hk_Stok_InController@index')->name('details_hk_stok_in.index');	
	Route::get('details_hk_stok_in/view/{rec_id}', 'Details_Hk_Stok_InController@view')->name('details_hk_stok_in.view');	
	Route::get('details_hk_stok_in/add', 'Details_Hk_Stok_InController@add')->name('details_hk_stok_in.add');
	Route::post('details_hk_stok_in/store', 'Details_Hk_Stok_InController@store')->name('details_hk_stok_in.store');
		
	Route::any('details_hk_stok_in/edit/{rec_id}', 'Details_Hk_Stok_InController@edit')->name('details_hk_stok_in.edit');	
	Route::get('details_hk_stok_in/delete/{rec_id}', 'Details_Hk_Stok_InController@delete');

/* routes for Details_Menu_Order Controller */	
	Route::get('details_menu_order', 'Details_Menu_OrderController@index')->name('details_menu_order.index');
	Route::get('details_menu_order/index', 'Details_Menu_OrderController@index')->name('details_menu_order.index');
	Route::get('details_menu_order/index/{filter?}/{filtervalue?}', 'Details_Menu_OrderController@index')->name('details_menu_order.index');	
	Route::get('details_menu_order/view/{rec_id}', 'Details_Menu_OrderController@view')->name('details_menu_order.view');	
	Route::get('details_menu_order/add', 'Details_Menu_OrderController@add')->name('details_menu_order.add');
	Route::post('details_menu_order/store', 'Details_Menu_OrderController@store')->name('details_menu_order.store');
		
	Route::any('details_menu_order/edit/{rec_id}', 'Details_Menu_OrderController@edit')->name('details_menu_order.edit');	
	Route::get('details_menu_order/delete/{rec_id}', 'Details_Menu_OrderController@delete');

/* routes for Details_Room_Order Controller */	
	Route::get('details_room_order', 'Details_Room_OrderController@index')->name('details_room_order.index');
	Route::get('details_room_order/index', 'Details_Room_OrderController@index')->name('details_room_order.index');
	Route::get('details_room_order/index/{filter?}/{filtervalue?}', 'Details_Room_OrderController@index')->name('details_room_order.index');	
	Route::get('details_room_order/view/{rec_id}', 'Details_Room_OrderController@view')->name('details_room_order.view');	
	Route::get('details_room_order/add', 'Details_Room_OrderController@add')->name('details_room_order.add');
	Route::post('details_room_order/store', 'Details_Room_OrderController@store')->name('details_room_order.store');
		
	Route::any('details_room_order/edit/{rec_id}', 'Details_Room_OrderController@edit')->name('details_room_order.edit');	
	Route::get('details_room_order/delete/{rec_id}', 'Details_Room_OrderController@delete');

/* routes for Details_Transaction Controller */	
	Route::get('details_transaction', 'Details_TransactionController@index')->name('details_transaction.index');
	Route::get('details_transaction/index', 'Details_TransactionController@index')->name('details_transaction.index');
	Route::get('details_transaction/index/{filter?}/{filtervalue?}', 'Details_TransactionController@index')->name('details_transaction.index');	
	Route::get('details_transaction/view/{rec_id}', 'Details_TransactionController@view')->name('details_transaction.view');	
	Route::get('details_transaction/add', 'Details_TransactionController@add')->name('details_transaction.add');
	Route::post('details_transaction/store', 'Details_TransactionController@store')->name('details_transaction.store');
		
	Route::any('details_transaction/edit/{rec_id}', 'Details_TransactionController@edit')->name('details_transaction.edit');	
	Route::get('details_transaction/delete/{rec_id}', 'Details_TransactionController@delete');

/* routes for Hk_Stok Controller */	
	Route::get('hk_stok', 'Hk_StokController@index')->name('hk_stok.index');
	Route::get('hk_stok/index', 'Hk_StokController@index')->name('hk_stok.index');
	Route::get('hk_stok/index/{filter?}/{filtervalue?}', 'Hk_StokController@index')->name('hk_stok.index');	
	Route::get('hk_stok/view/{rec_id}', 'Hk_StokController@view')->name('hk_stok.view');	
	Route::get('hk_stok/add', 'Hk_StokController@add')->name('hk_stok.add');
	Route::post('hk_stok/store', 'Hk_StokController@store')->name('hk_stok.store');
		
	Route::any('hk_stok/edit/{rec_id}', 'Hk_StokController@edit')->name('hk_stok.edit');	
	Route::get('hk_stok/delete/{rec_id}', 'Hk_StokController@delete');

/* routes for Hk_Stok_In Controller */	
	Route::get('hk_stok_in', 'Hk_Stok_InController@index')->name('hk_stok_in.index');
	Route::get('hk_stok_in/index', 'Hk_Stok_InController@index')->name('hk_stok_in.index');
	Route::get('hk_stok_in/index/{filter?}/{filtervalue?}', 'Hk_Stok_InController@index')->name('hk_stok_in.index');	
	Route::get('hk_stok_in/view/{rec_id}', 'Hk_Stok_InController@view')->name('hk_stok_in.view');	
	Route::get('hk_stok_in/add', 'Hk_Stok_InController@add')->name('hk_stok_in.add');
	Route::post('hk_stok_in/store', 'Hk_Stok_InController@store')->name('hk_stok_in.store');
		
	Route::any('hk_stok_in/edit/{rec_id}', 'Hk_Stok_InController@edit')->name('hk_stok_in.edit');	
	Route::get('hk_stok_in/delete/{rec_id}', 'Hk_Stok_InController@delete');

/* routes for Locations Controller */	
	Route::get('locations', 'LocationsController@index')->name('locations.index');
	Route::get('locations/index', 'LocationsController@index')->name('locations.index');
	Route::get('locations/index/{filter?}/{filtervalue?}', 'LocationsController@index')->name('locations.index');	
	Route::get('locations/view/{rec_id}', 'LocationsController@view')->name('locations.view');	
	Route::get('locations/add', 'LocationsController@add')->name('locations.add');
	Route::post('locations/store', 'LocationsController@store')->name('locations.store');
		
	Route::any('locations/edit/{rec_id}', 'LocationsController@edit')->name('locations.edit');	
	Route::get('locations/delete/{rec_id}', 'LocationsController@delete');

/* routes for Model_Has_Permissions Controller */	
	Route::get('model_has_permissions', 'Model_Has_PermissionsController@index')->name('model_has_permissions.index');
	Route::get('model_has_permissions/index', 'Model_Has_PermissionsController@index')->name('model_has_permissions.index');
	Route::get('model_has_permissions/index/{filter?}/{filtervalue?}', 'Model_Has_PermissionsController@index')->name('model_has_permissions.index');	
	Route::get('model_has_permissions/view/{rec_id}', 'Model_Has_PermissionsController@view')->name('model_has_permissions.view');	
	Route::get('model_has_permissions/add', 'Model_Has_PermissionsController@add')->name('model_has_permissions.add');
	Route::post('model_has_permissions/store', 'Model_Has_PermissionsController@store')->name('model_has_permissions.store');
		
	Route::any('model_has_permissions/edit/{rec_id}', 'Model_Has_PermissionsController@edit')->name('model_has_permissions.edit');	
	Route::get('model_has_permissions/delete/{rec_id}', 'Model_Has_PermissionsController@delete');

/* routes for Model_Has_Roles Controller */	
	Route::get('model_has_roles', 'Model_Has_RolesController@index')->name('model_has_roles.index');
	Route::get('model_has_roles/index', 'Model_Has_RolesController@index')->name('model_has_roles.index');
	Route::get('model_has_roles/index/{filter?}/{filtervalue?}', 'Model_Has_RolesController@index')->name('model_has_roles.index');	
	Route::get('model_has_roles/view/{rec_id}', 'Model_Has_RolesController@view')->name('model_has_roles.view');	
	Route::get('model_has_roles/add', 'Model_Has_RolesController@add')->name('model_has_roles.add');
	Route::post('model_has_roles/store', 'Model_Has_RolesController@store')->name('model_has_roles.store');
		
	Route::any('model_has_roles/edit/{rec_id}', 'Model_Has_RolesController@edit')->name('model_has_roles.edit');	
	Route::get('model_has_roles/delete/{rec_id}', 'Model_Has_RolesController@delete');

/* routes for Payment_Status Controller */	
	Route::get('payment_status', 'Payment_StatusController@index')->name('payment_status.index');
	Route::get('payment_status/index', 'Payment_StatusController@index')->name('payment_status.index');
	Route::get('payment_status/index/{filter?}/{filtervalue?}', 'Payment_StatusController@index')->name('payment_status.index');	
	Route::get('payment_status/view/{rec_id}', 'Payment_StatusController@view')->name('payment_status.view');
	Route::get('payment_status/masterdetail/{rec_id}', 'Payment_StatusController@masterDetail')->name('payment_status.masterdetail');	
	Route::get('payment_status/add', 'Payment_StatusController@add')->name('payment_status.add');
	Route::post('payment_status/store', 'Payment_StatusController@store')->name('payment_status.store');
		
	Route::any('payment_status/edit/{rec_id}', 'Payment_StatusController@edit')->name('payment_status.edit');	
	Route::get('payment_status/delete/{rec_id}', 'Payment_StatusController@delete');

/* routes for Permissions Controller */	
	Route::get('permissions', 'PermissionsController@index')->name('permissions.index');
	Route::get('permissions/index', 'PermissionsController@index')->name('permissions.index');
	Route::get('permissions/index/{filter?}/{filtervalue?}', 'PermissionsController@index')->name('permissions.index');	
	Route::get('permissions/view/{rec_id}', 'PermissionsController@view')->name('permissions.view');
	Route::get('permissions/masterdetail/{rec_id}', 'PermissionsController@masterDetail')->name('permissions.masterdetail');	
	Route::get('permissions/add', 'PermissionsController@add')->name('permissions.add');
	Route::post('permissions/store', 'PermissionsController@store')->name('permissions.store');
		
	Route::any('permissions/edit/{rec_id}', 'PermissionsController@edit')->name('permissions.edit');	
	Route::get('permissions/delete/{rec_id}', 'PermissionsController@delete');

/* routes for Resto_Menu_Order Controller */	
	Route::get('resto_menu_order', 'Resto_Menu_OrderController@index')->name('resto_menu_order.index');
	Route::get('resto_menu_order/index', 'Resto_Menu_OrderController@index')->name('resto_menu_order.index');
	Route::get('resto_menu_order/index/{filter?}/{filtervalue?}', 'Resto_Menu_OrderController@index')->name('resto_menu_order.index');	
	Route::get('resto_menu_order/view/{rec_id}', 'Resto_Menu_OrderController@view')->name('resto_menu_order.view');	
	Route::get('resto_menu_order/add', 'Resto_Menu_OrderController@add')->name('resto_menu_order.add');
	Route::post('resto_menu_order/store', 'Resto_Menu_OrderController@store')->name('resto_menu_order.store');
		
	Route::any('resto_menu_order/edit/{rec_id}', 'Resto_Menu_OrderController@edit')->name('resto_menu_order.edit');	
	Route::get('resto_menu_order/delete/{rec_id}', 'Resto_Menu_OrderController@delete');

/* routes for Resto_Product Controller */	
	Route::get('resto_product', 'Resto_ProductController@index')->name('resto_product.index');
	Route::get('resto_product/index', 'Resto_ProductController@index')->name('resto_product.index');
	Route::get('resto_product/index/{filter?}/{filtervalue?}', 'Resto_ProductController@index')->name('resto_product.index');	
	Route::get('resto_product/view/{rec_id}', 'Resto_ProductController@view')->name('resto_product.view');	
	Route::get('resto_product/add', 'Resto_ProductController@add')->name('resto_product.add');
	Route::post('resto_product/store', 'Resto_ProductController@store')->name('resto_product.store');
		
	Route::any('resto_product/edit/{rec_id}', 'Resto_ProductController@edit')->name('resto_product.edit');	
	Route::get('resto_product/delete/{rec_id}', 'Resto_ProductController@delete');

/* routes for Resto_Product_Locations Controller */	
	Route::get('resto_product_locations', 'Resto_Product_LocationsController@index')->name('resto_product_locations.index');
	Route::get('resto_product_locations/index', 'Resto_Product_LocationsController@index')->name('resto_product_locations.index');
	Route::get('resto_product_locations/index/{filter?}/{filtervalue?}', 'Resto_Product_LocationsController@index')->name('resto_product_locations.index');	
	Route::get('resto_product_locations/view/{rec_id}', 'Resto_Product_LocationsController@view')->name('resto_product_locations.view');	
	Route::get('resto_product_locations/add', 'Resto_Product_LocationsController@add')->name('resto_product_locations.add');
	Route::post('resto_product_locations/store', 'Resto_Product_LocationsController@store')->name('resto_product_locations.store');
		
	Route::any('resto_product_locations/edit/{rec_id}', 'Resto_Product_LocationsController@edit')->name('resto_product_locations.edit');	
	Route::get('resto_product_locations/delete/{rec_id}', 'Resto_Product_LocationsController@delete');

/* routes for Role_Has_Permissions Controller */	
	Route::get('role_has_permissions', 'Role_Has_PermissionsController@index')->name('role_has_permissions.index');
	Route::get('role_has_permissions/index', 'Role_Has_PermissionsController@index')->name('role_has_permissions.index');
	Route::get('role_has_permissions/index/{filter?}/{filtervalue?}', 'Role_Has_PermissionsController@index')->name('role_has_permissions.index');	
	Route::get('role_has_permissions/view/{rec_id}', 'Role_Has_PermissionsController@view')->name('role_has_permissions.view');	
	Route::get('role_has_permissions/add', 'Role_Has_PermissionsController@add')->name('role_has_permissions.add');
	Route::post('role_has_permissions/store', 'Role_Has_PermissionsController@store')->name('role_has_permissions.store');
		
	Route::any('role_has_permissions/edit/{rec_id}', 'Role_Has_PermissionsController@edit')->name('role_has_permissions.edit');	
	Route::get('role_has_permissions/delete/{rec_id}', 'Role_Has_PermissionsController@delete');

/* routes for Roles Controller */	
	Route::get('roles', 'RolesController@index')->name('roles.index');
	Route::get('roles/index', 'RolesController@index')->name('roles.index');
	Route::get('roles/index/{filter?}/{filtervalue?}', 'RolesController@index')->name('roles.index');	
	Route::get('roles/view/{rec_id}', 'RolesController@view')->name('roles.view');
	Route::get('roles/masterdetail/{rec_id}', 'RolesController@masterDetail')->name('roles.masterdetail');	
	Route::get('roles/add', 'RolesController@add')->name('roles.add');
	Route::post('roles/store', 'RolesController@store')->name('roles.store');
		
	Route::any('roles/edit/{rec_id}', 'RolesController@edit')->name('roles.edit');	
	Route::get('roles/delete/{rec_id}', 'RolesController@delete');

/* routes for Room Controller */	
	Route::get('room', 'RoomController@index')->name('room.index');
	Route::get('room/index', 'RoomController@index')->name('room.index');
	Route::get('room/index/{filter?}/{filtervalue?}', 'RoomController@index')->name('room.index');	
	Route::get('room/view/{rec_id}', 'RoomController@view')->name('room.view');
	Route::get('room/masterdetail/{rec_id}', 'RoomController@masterDetail')->name('room.masterdetail');	
	Route::get('room/add', 'RoomController@add')->name('room.add');
	Route::post('room/store', 'RoomController@store')->name('room.store');
		
	Route::any('room/edit/{rec_id}', 'RoomController@edit')->name('room.edit');	
	Route::get('room/delete/{rec_id}', 'RoomController@delete');

/* routes for Room_Facilities Controller */	
	Route::get('room_facilities', 'Room_FacilitiesController@index')->name('room_facilities.index');
	Route::get('room_facilities/index', 'Room_FacilitiesController@index')->name('room_facilities.index');
	Route::get('room_facilities/index/{filter?}/{filtervalue?}', 'Room_FacilitiesController@index')->name('room_facilities.index');	
	Route::get('room_facilities/view/{rec_id}', 'Room_FacilitiesController@view')->name('room_facilities.view');
	Route::get('room_facilities/masterdetail/{rec_id}', 'Room_FacilitiesController@masterDetail')->name('room_facilities.masterdetail');	
	Route::get('room_facilities/add', 'Room_FacilitiesController@add')->name('room_facilities.add');
	Route::post('room_facilities/store', 'Room_FacilitiesController@store')->name('room_facilities.store');
		
	Route::any('room_facilities/edit/{rec_id}', 'Room_FacilitiesController@edit')->name('room_facilities.edit');	
	Route::get('room_facilities/delete/{rec_id}', 'Room_FacilitiesController@delete');

/* routes for Room_Floor Controller */	
	Route::get('room_floor', 'Room_FloorController@index')->name('room_floor.index');
	Route::get('room_floor/index', 'Room_FloorController@index')->name('room_floor.index');
	Route::get('room_floor/index/{filter?}/{filtervalue?}', 'Room_FloorController@index')->name('room_floor.index');	
	Route::get('room_floor/view/{rec_id}', 'Room_FloorController@view')->name('room_floor.view');
	Route::get('room_floor/masterdetail/{rec_id}', 'Room_FloorController@masterDetail')->name('room_floor.masterdetail');	
	Route::get('room_floor/add', 'Room_FloorController@add')->name('room_floor.add');
	Route::post('room_floor/store', 'Room_FloorController@store')->name('room_floor.store');
		
	Route::any('room_floor/edit/{rec_id}', 'Room_FloorController@edit')->name('room_floor.edit');	
	Route::get('room_floor/delete/{rec_id}', 'Room_FloorController@delete');

/* routes for Room_Image Controller */	
	Route::get('room_image', 'Room_ImageController@index')->name('room_image.index');
	Route::get('room_image/index', 'Room_ImageController@index')->name('room_image.index');
	Route::get('room_image/index/{filter?}/{filtervalue?}', 'Room_ImageController@index')->name('room_image.index');	
	Route::get('room_image/view/{rec_id}', 'Room_ImageController@view')->name('room_image.view');
	Route::get('room_image/masterdetail/{rec_id}', 'Room_ImageController@masterDetail')->name('room_image.masterdetail');	
	Route::get('room_image/add', 'Room_ImageController@add')->name('room_image.add');
	Route::post('room_image/store', 'Room_ImageController@store')->name('room_image.store');
		
	Route::any('room_image/edit/{rec_id}', 'Room_ImageController@edit')->name('room_image.edit');	
	Route::get('room_image/delete/{rec_id}', 'Room_ImageController@delete');

/* routes for Room_Order Controller */	
	Route::get('room_order', 'Room_OrderController@index')->name('room_order.index');
	Route::get('room_order/index', 'Room_OrderController@index')->name('room_order.index');
	Route::get('room_order/index/{filter?}/{filtervalue?}', 'Room_OrderController@index')->name('room_order.index');	
	Route::get('room_order/view/{rec_id}', 'Room_OrderController@view')->name('room_order.view');	
	Route::get('room_order/add', 'Room_OrderController@add')->name('room_order.add');
	Route::post('room_order/store', 'Room_OrderController@store')->name('room_order.store');
		
	Route::any('room_order/edit/{rec_id}', 'Room_OrderController@edit')->name('room_order.edit');	
	Route::get('room_order/delete/{rec_id}', 'Room_OrderController@delete');

/* routes for Room_Type Controller */	
	Route::get('room_type', 'Room_TypeController@index')->name('room_type.index');
	Route::get('room_type/index', 'Room_TypeController@index')->name('room_type.index');
	Route::get('room_type/index/{filter?}/{filtervalue?}', 'Room_TypeController@index')->name('room_type.index');	
	Route::get('room_type/view/{rec_id}', 'Room_TypeController@view')->name('room_type.view');
	Route::get('room_type/masterdetail/{rec_id}', 'Room_TypeController@masterDetail')->name('room_type.masterdetail');	
	Route::get('room_type/add', 'Room_TypeController@add')->name('room_type.add');
	Route::post('room_type/store', 'Room_TypeController@store')->name('room_type.store');
		
	Route::any('room_type/edit/{rec_id}', 'Room_TypeController@edit')->name('room_type.edit');	
	Route::get('room_type/delete/{rec_id}', 'Room_TypeController@delete');

/* routes for Status_Room Controller */	
	Route::get('status_room', 'Status_RoomController@index')->name('status_room.index');
	Route::get('status_room/index', 'Status_RoomController@index')->name('status_room.index');
	Route::get('status_room/index/{filter?}/{filtervalue?}', 'Status_RoomController@index')->name('status_room.index');	
	Route::get('status_room/view/{rec_id}', 'Status_RoomController@view')->name('status_room.view');
	Route::get('status_room/masterdetail/{rec_id}', 'Status_RoomController@masterDetail')->name('status_room.masterdetail');	
	Route::get('status_room/add', 'Status_RoomController@add')->name('status_room.add');
	Route::post('status_room/store', 'Status_RoomController@store')->name('status_room.store');
		
	Route::any('status_room/edit/{rec_id}', 'Status_RoomController@edit')->name('status_room.edit');	
	Route::get('status_room/delete/{rec_id}', 'Status_RoomController@delete');

/* routes for Table_Room_Resto Controller */	
	Route::get('table_room_resto', 'Table_Room_RestoController@index')->name('table_room_resto.index');
	Route::get('table_room_resto/index', 'Table_Room_RestoController@index')->name('table_room_resto.index');
	Route::get('table_room_resto/index/{filter?}/{filtervalue?}', 'Table_Room_RestoController@index')->name('table_room_resto.index');	
	Route::get('table_room_resto/view/{rec_id}', 'Table_Room_RestoController@view')->name('table_room_resto.view');	
	Route::get('table_room_resto/add', 'Table_Room_RestoController@add')->name('table_room_resto.add');
	Route::post('table_room_resto/store', 'Table_Room_RestoController@store')->name('table_room_resto.store');
		
	Route::any('table_room_resto/edit/{rec_id}', 'Table_Room_RestoController@edit')->name('table_room_resto.edit');	
	Route::get('table_room_resto/delete/{rec_id}', 'Table_Room_RestoController@delete');

/* routes for Transaction Controller */	
	Route::get('transaction', 'TransactionController@index')->name('transaction.index');
	Route::get('transaction/index', 'TransactionController@index')->name('transaction.index');
	Route::get('transaction/index/{filter?}/{filtervalue?}', 'TransactionController@index')->name('transaction.index');	
	Route::get('transaction/view/{rec_id}', 'TransactionController@view')->name('transaction.view');
	Route::get('transaction/masterdetail/{rec_id}', 'TransactionController@masterDetail')->name('transaction.masterdetail');	
	Route::get('transaction/add', 'TransactionController@add')->name('transaction.add');
	Route::post('transaction/store', 'TransactionController@store')->name('transaction.store');
		
	Route::any('transaction/edit/{rec_id}', 'TransactionController@edit')->name('transaction.edit');	
	Route::get('transaction/delete/{rec_id}', 'TransactionController@delete');

/* routes for Users Controller */	
	Route::get('users', 'UsersController@index')->name('users.index');
	Route::get('users/index', 'UsersController@index')->name('users.index');
	Route::get('users/index/{filter?}/{filtervalue?}', 'UsersController@index')->name('users.index');	
	Route::get('users/view/{rec_id}', 'UsersController@view')->name('users.view');	
	Route::get('auth/register', 'AuthController@register')->name('auth.register');
	Route::post('auth/register_store', 'AuthController@register_store')->name('auth.register_store');
		
	Route::any('account/edit', 'AccountController@edit')->name('account.edit');	
	Route::get('account', 'AccountController@index');	
	Route::post('account/changepassword', 'AccountController@changepassword')->name('account.changepassword');	
	Route::get('users/add', 'UsersController@add')->name('users.add');
	Route::post('users/store', 'UsersController@store')->name('users.store');
		
	Route::any('users/edit/{rec_id}', 'UsersController@edit')->name('users.edit');	
	Route::get('users/delete/{rec_id}', 'UsersController@delete');

/**
 * All routes which requires auth
 */
Route::middleware(['auth'])->group(function () {
	
	
});


	
Route::get('componentsdata/customers_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->customers_id_option_list($request);
	}
);
	
Route::get('componentsdata/agent_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->agent_id_option_list($request);
	}
);
	
Route::get('componentsdata/payment_status_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->payment_status_id_option_list($request);
	}
);
	
Route::get('componentsdata/room_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->room_id_option_list($request);
	}
);
	
Route::get('componentsdata/price_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->price_option_list($request);
	}
);
	
Route::get('componentsdata/item_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->item_option_list($request);
	}
);
	
Route::get('componentsdata/conditions_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->conditions_option_list($request);
	}
);
	
Route::get('componentsdata/locations_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->locations_option_list($request);
	}
);
	
Route::get('componentsdata/product_name_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->product_name_option_list($request);
	}
);
	
Route::get('componentsdata/details_menu_order_price_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->details_menu_order_price_option_list($request);
	}
);
	
Route::get('componentsdata/details_room_order_product_name_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->details_room_order_product_name_option_list($request);
	}
);
	
Route::get('componentsdata/details_room_order_price_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->details_room_order_price_option_list($request);
	}
);
	
Route::get('componentsdata/details_transaction_room_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->details_transaction_room_id_option_list($request);
	}
);
	
Route::get('componentsdata/permission_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->permission_id_option_list($request);
	}
);
	
Route::get('componentsdata/role_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->role_id_option_list($request);
	}
);
	
Route::get('componentsdata/table_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->table_option_list($request);
	}
);
	
Route::get('componentsdata/product_locations_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->product_locations_option_list($request);
	}
);
	
Route::get('componentsdata/room_type_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->room_type_id_option_list($request);
	}
);
	
Route::get('componentsdata/room_facilities_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->room_facilities_id_option_list($request);
	}
);
	
Route::get('componentsdata/status_room_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->status_room_id_option_list($request);
	}
);
	
Route::get('componentsdata/photo_room_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->photo_room_id_option_list($request);
	}
);
	
Route::get('componentsdata/room_name_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->room_name_option_list($request);
	}
);
	
Route::get('componentsdata/payment_status_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->payment_status_option_list($request);
	}
);
	
Route::get('componentsdata/floor_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->floor_id_option_list($request);
	}
);
	
Route::get('componentsdata/transaction_customers_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->transaction_customers_id_option_list($request);
	}
);
	
Route::get('componentsdata/transaction_agent_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->transaction_agent_id_option_list($request);
	}
);
	
Route::get('componentsdata/transaction_payment_status_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->transaction_payment_status_id_option_list($request);
	}
);
	
Route::get('componentsdata/users_user_name_value_exist',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->users_user_name_value_exist($request);
	}
);
	
Route::get('componentsdata/users_email_value_exist',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->users_email_value_exist($request);
	}
);


Route::post('fileuploader/upload/{fieldname}', 'FileUploaderController@upload');
Route::post('fileuploader/s3upload/{fieldname}', 'FileUploaderController@s3upload');
Route::post('fileuploader/remove_temp_file', 'FileUploaderController@remove_temp_file');


/**
 * All static content routes
 */
Route::get('info/about',  function(){
		return view("pages.info.about");
	}
);
Route::get('info/faq',  function(){
		return view("pages.info.faq");
	}
);

Route::get('info/contact',  function(){
	return view("pages.info.contact");
}
);
Route::get('info/contactsent',  function(){
	return view("pages.info.contactsent");
}
);

Route::post('info/contact',  function(Request $request){
		$request->validate([
			'name' => 'required',
			'email' => 'required|email',
			'message' => 'required'
		]);

		$senderName = $request->name;
		$senderEmail = $request->email;
		$message = $request->message;

		$receiverEmail = config("mail.from.address");

		Mail::send(
			'pages.info.contactemail', [
				'name' => $senderName,
				'email' => $senderEmail,
				'comment' => $message
			],
			function ($mail) use ($senderEmail, $receiverEmail) {
				$mail->from($senderEmail);
				$mail->to($receiverEmail)
					->subject('Contact Form');
			}
		);
		return redirect("info/contactsent");
	}
);


Route::get('info/features',  function(){
		return view("pages.info.features");
	}
);
Route::get('info/privacypolicy',  function(){
		return view("pages.info.privacypolicy");
	}
);
Route::get('info/termsandconditions',  function(){
		return view("pages.info.termsandconditions");
	}
);

Route::get('info/changelocale/{locale}', function ($locale) {
	app()->setlocale($locale);
	session()->put('locale', $locale);
    return redirect()->back();
})->name('info.changelocale');
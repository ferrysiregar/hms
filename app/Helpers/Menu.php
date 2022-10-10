
<?php
	class Menu{
		
	public static function navbarsideleft(){
		return [
		[
			'path' => 'home',
			'label' => "Home", 
			'icon' => '<i class="material-icons ">home</i>'
		],
		
		[
			'path' => 'menu26',
			'label' => "Master Data", 
			'icon' => '<i class="material-icons ">perm_data_setting</i>','submenu' => [
		[
			'path' => 'locations',
			'label' => "Locations", 
			'icon' => ''
		],
		
		[
			'path' => 'conditions',
			'label' => "Conditions", 
			'icon' => ''
		],
		
		[
			'path' => 'users',
			'label' => "Users", 
			'icon' => ''
		],
		
		[
			'path' => 'payment_status',
			'label' => "Payment Status", 
			'icon' => ''
		]
	]
		],
		
		[
			'path' => 'menu18',
			'label' => "Room Settings", 
			'icon' => '<i class="material-icons ">room</i>','submenu' => [
		[
			'path' => 'room',
			'label' => "Room", 
			'icon' => ''
		],
		
		[
			'path' => 'room_facilities',
			'label' => "Room Facilities", 
			'icon' => ''
		],
		
		[
			'path' => 'room_floor',
			'label' => "Room Floor", 
			'icon' => ''
		],
		
		[
			'path' => 'room_image',
			'label' => "Room Image", 
			'icon' => ''
		],
		
		[
			'path' => 'room_type',
			'label' => "Room Type", 
			'icon' => ''
		],
		
		[
			'path' => 'status_room',
			'label' => "Status Room", 
			'icon' => ''
		]
	]
		],
		
		[
			'path' => 'menu24',
			'label' => "Roles Permissions", 
			'icon' => '<i class="material-icons ">accessibility</i>','submenu' => [
		[
			'path' => 'permissions',
			'label' => "Permissions", 
			'icon' => ''
		],
		
		[
			'path' => 'role_has_permissions',
			'label' => "Role Has Permissions", 
			'icon' => ''
		],
		
		[
			'path' => 'model_has_roles',
			'label' => "Model Has Roles", 
			'icon' => ''
		],
		
		[
			'path' => 'model_has_permissions',
			'label' => "Model Has Permissions", 
			'icon' => ''
		],
		
		[
			'path' => 'roles',
			'label' => "Roles", 
			'icon' => ''
		]
	]
		],
		
		[
			'path' => 'customers',
			'label' => "Customers", 
			'icon' => '<i class="material-icons ">people</i>'
		],
		
		[
			'path' => 'booking/booking_calendar',
			'label' => "Booking Calendar", 
			'icon' => '<i class="material-icons ">date_range</i>'
		],
		
		[
			'path' => 'agent',
			'label' => "Agent", 
			'icon' => '<i class="material-icons ">people</i>'
		]
	] ;
	}
	
	public static function navbartopleft(){
		return [
		[
			'path' => 'menu19',
			'label' => "HRD", 
			'icon' => '<i class="material-icons ">nature_people</i>','submenu' => [
		[
			'path' => 'contract_status',
			'label' => "Contract Status", 
			'icon' => ''
		],
		
		[
			'path' => 'job_title',
			'label' => "Job Title", 
			'icon' => ''
		],
		
		[
			'path' => 'employee',
			'label' => "Employee", 
			'icon' => ''
		],
		
		[
			'path' => 'department',
			'label' => "Department", 
			'icon' => ''
		]
	]
		],
		
		[
			'path' => 'menu2',
			'label' => "Purchasing", 
			'icon' => '<i class="material-icons ">shopping_cart</i>','submenu' => [
		[
			'path' => 'trans_purchase',
			'label' => "Trans Purchase", 
			'icon' => ''
		],
		
		[
			'path' => 'detils_purchase_order',
			'label' => "Detils Purchase Order", 
			'icon' => ''
		],
		
		[
			'path' => 'units',
			'label' => "Units", 
			'icon' => ''
		],
		
		[
			'path' => 'purchase_items',
			'label' => "Purchase Items", 
			'icon' => ''
		],
		
		[
			'path' => 'supplier',
			'label' => "Supplier", 
			'icon' => ''
		]
	]
		],
		
		[
			'path' => 'menu15',
			'label' => "Restaurant", 
			'icon' => '<i class="material-icons ">restaurant</i>','submenu' => [
		[
			'path' => 'table_room_resto',
			'label' => "Table Room Resto", 
			'icon' => ''
		],
		
		[
			'path' => 'resto_product_locations',
			'label' => "Resto Product Locations", 
			'icon' => ''
		],
		
		[
			'path' => 'resto_product',
			'label' => "Resto Product", 
			'icon' => ''
		],
		
		[
			'path' => 'resto_menu_order',
			'label' => "Resto Menu Order", 
			'icon' => ''
		],
		
		[
			'path' => 'details_menu_order',
			'label' => "Details Menu Order", 
			'icon' => ''
		]
	]
		],
		
		[
			'path' => '',
			'label' => "Front Desk", 
			'icon' => '<i class="material-icons ">laptop_chromebook</i>','submenu' => [
		[
			'path' => '',
			'label' => "Trans Book", 
			'icon' => '<i class="material-icons ">note</i>','submenu' => [
		[
			'path' => 'booking',
			'label' => "Booking", 
			'icon' => ''
		],
		
		[
			'path' => 'details_booking',
			'label' => "Details Booking", 
			'icon' => ''
		]
	]
		],
		
		[
			'path' => '',
			'label' => "Trans Ci / Co", 
			'icon' => '<i class="material-icons ">business</i>','submenu' => [
		[
			'path' => 'transaction',
			'label' => "Transaction", 
			'icon' => ''
		],
		
		[
			'path' => 'details_transaction',
			'label' => "Details Transaction", 
			'icon' => ''
		],
		
		[
			'path' => 'room_order',
			'label' => "Room Order", 
			'icon' => ''
		],
		
		[
			'path' => 'details_room_order',
			'label' => "Details Room Order", 
			'icon' => ''
		]
	]
		]
	]
		],
		
		[
			'path' => 'menu20',
			'label' => "HouseKeeping", 
			'icon' => '<i class="material-icons ">hotel</i>','submenu' => [
		[
			'path' => 'hk_stok',
			'label' => "Hk Stok", 
			'icon' => '<i class="material-icons ">business_center</i>'
		],
		
		[
			'path' => 'menu20',
			'label' => "Stock IN", 
			'icon' => '<i class="material-icons ">airline_seat_flat</i>','submenu' => [
		[
			'path' => 'hk_stok_in',
			'label' => "Hk Stok In", 
			'icon' => ''
		],
		
		[
			'path' => 'details_hk_stok_in',
			'label' => "Details Hk Stok In", 
			'icon' => ''
		]
	]
		],
		
		[
			'path' => 'menu20',
			'label' => "Stock OUT", 
			'icon' => '<i class="material-icons ">airline_seat_flat_angled</i>','submenu' => [
		[
			'path' => 'hk_stok_out',
			'label' => "Hk Stok Out", 
			'icon' => ''
		],
		
		[
			'path' => 'details_hk_stok_out',
			'label' => "Details Hk Stok Out", 
			'icon' => ''
		]
	]
		]
	]
		]
	] ;
	}
	
		
	}

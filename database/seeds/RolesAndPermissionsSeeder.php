<?php
use App\Models\Users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesAndPermissionsSeeder extends Seeder
{
	private $permissionsByRole = [
			
		'admin' => [
			'home/list', 'booking/list', 'booking/view', 'booking/add', 'booking/store', 'booking/edit', 'booking/delete', 'booking/importdata', 'customers/list', 'customers/view', 'customers/add', 'customers/store', 'customers/edit', 'customers/delete', 'customers/importdata', 'details_booking/list', 'details_booking/view', 'details_booking/add', 'details_booking/store', 'details_booking/edit', 'details_booking/delete', 'details_booking/importdata', 'payment_status/list', 'payment_status/view', 'payment_status/add', 'payment_status/store', 'payment_status/edit', 'payment_status/delete', 'payment_status/importdata', 'room/list', 'room/view', 'room/add', 'room/store', 'room/edit', 'room/delete', 'room/importdata', 'room_facilities/list', 'room_facilities/view', 'room_facilities/add', 'room_facilities/store', 'room_facilities/edit', 'room_facilities/delete', 'room_facilities/importdata', 'room_floor/list', 'room_floor/view', 'room_floor/add', 'room_floor/store', 'room_floor/edit', 'room_floor/delete', 'room_floor/importdata', 'room_image/list', 'room_image/view', 'room_image/add', 'room_image/store', 'room_image/edit', 'room_image/delete', 'room_image/importdata', 'room_type/list', 'room_type/view', 'room_type/add', 'room_type/store', 'room_type/edit', 'room_type/delete', 'room_type/importdata', 'status_room/list', 'status_room/view', 'status_room/add', 'status_room/store', 'status_room/edit', 'status_room/delete', 'status_room/importdata', 'account/list', 'account/edit', 'agent/list', 'agent/view', 'agent/add', 'agent/store', 'agent/edit', 'agent/delete', 'transaction/list', 'transaction/view', 'transaction/add', 'transaction/store', 'transaction/edit', 'transaction/delete', 'details_transaction/list', 'details_transaction/view', 'details_transaction/add', 'details_transaction/store', 'details_transaction/edit', 'details_transaction/delete', 'hk_stok/list', 'hk_stok/view', 'hk_stok/add', 'hk_stok/store', 'hk_stok/edit', 'hk_stok/delete', 'hk_stok_in/list', 'hk_stok_in/view', 'hk_stok_in/add', 'hk_stok_in/store', 'hk_stok_in/edit', 'hk_stok_in/delete', 'users/list', 'users/view', 'users/add', 'users/store', 'users/edit', 'users/delete', 'booking/booking_calendar', 'permissions/list', 'permissions/view', 'permissions/add', 'permissions/store', 'permissions/edit', 'permissions/delete', 'role_has_permissions/list', 'role_has_permissions/view', 'role_has_permissions/add', 'role_has_permissions/store', 'role_has_permissions/edit', 'role_has_permissions/delete', 'model_has_roles/list', 'model_has_roles/view', 'model_has_roles/add', 'model_has_roles/store', 'model_has_roles/edit', 'model_has_roles/delete', 'model_has_permissions/list', 'model_has_permissions/view', 'model_has_permissions/add', 'model_has_permissions/store', 'model_has_permissions/edit', 'model_has_permissions/delete', 'roles/list', 'roles/view', 'roles/add', 'roles/store', 'roles/edit', 'roles/delete', 'details_hk_stok_in/list', 'details_hk_stok_in/view', 'details_hk_stok_in/add', 'details_hk_stok_in/store', 'details_hk_stok_in/edit', 'details_hk_stok_in/delete', 'conditions/list', 'conditions/view', 'conditions/add', 'conditions/store', 'conditions/edit', 'conditions/delete', 'locations/list', 'locations/view', 'locations/add', 'locations/store', 'locations/edit', 'locations/delete'
		], 
		'housekeeping' => [
			'home/list', 'account/list', 'account/edit'
		], 
		'frontdesk' => [
			'home/list', 'account/list', 'account/edit'
		]
	];
    public function run()
    {
        $tableNames = config('permission.table_names');

		Schema::disableForeignKeyConstraints();
		
		DB::table($tableNames['role_has_permissions'])->truncate();
		DB::table($tableNames['permissions'])->truncate();
        DB::table($tableNames['roles'])->truncate();
        
		Schema::enableForeignKeyConstraints();
		
		app()['cache']->forget('spatie.permission.cache');
		app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

		$this->syncPermissions();
		$this->syncRoles();
		$this->syncUsersRole('admin');
    }
	function syncRoles(){
		foreach ($this->permissionsByRole as $rolename => $permissions) {
			$role = Role::create(['name' => $rolename]);
			$role->givePermissionTo($permissions);
		}
	}

	function syncPermissions(){
		$permissions = [];

		foreach ($this->permissionsByRole as $rolename => $rolePermissions) {
			$permissions = array_merge($permissions, $rolePermissions);
		}

		$insertData = [];
		foreach($permissions as $name){
			$insertData[] = ['name'=>$name, 'guard_name' => 'web'];
		}
		Permission::insert($insertData);
	}

	function syncUsersRole($role){
		$users = Users::all();
		foreach($users as $user){
			$user->syncRoles($role);
		}
	}
}

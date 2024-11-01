<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		// Reset cached roles and permissions
		app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


		$permissions = [
			'view admin',
			'store admin',
			'update admin',
			'delete admin',
			'view appointment'
		];

		foreach ($permissions as $permission)
			Permission::create([
				'name' => $permission,
				'guard_name' => 'api'
			]);


		// update cache to know about the newly created permissions (required if using WithoutModelEvents in seeders)
		app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

		$roles = [
			"Super Admin",
			"Doctor",
			"Head Nurse",
			"Nurse",
			"Student",
			"Employee",
			"Medical Personnel"
		];

		foreach ($roles as $role)
			Role::create(['name' => $role, 'guard_name' => 'api']);

		$superAdmin = Role::where('name', 'Super Admin')->first();
		$superAdmin->givePermissionTo(Permission::all());

		$doctor = Role::where('name', 'Doctor')->first();
		$doctor->givePermissionTo(['view appointment']);
	}
}

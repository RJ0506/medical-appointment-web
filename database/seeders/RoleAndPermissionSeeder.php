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
				'name' => $permission
			]);


		// update cache to know about the newly created permissions (required if using WithoutModelEvents in seeders)
		app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

		$superAdmin = Role::create(['name' => 'Super Admin']);
		$superAdmin->givePermissionTo(Permission::all());

		Role::create(['name' => 'Doctor'])->givePermissionTo(['view appointment']);
	}
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list discloserandsuppots']);
        Permission::create(['name' => 'view discloserandsuppots']);
        Permission::create(['name' => 'create discloserandsuppots']);
        Permission::create(['name' => 'update discloserandsuppots']);
        Permission::create(['name' => 'delete discloserandsuppots']);

        Permission::create(['name' => 'list alleducation']);
        Permission::create(['name' => 'view alleducation']);
        Permission::create(['name' => 'create alleducation']);
        Permission::create(['name' => 'update alleducation']);
        Permission::create(['name' => 'delete alleducation']);

        Permission::create(['name' => 'list allhealth']);
        Permission::create(['name' => 'view allhealth']);
        Permission::create(['name' => 'create allhealth']);
        Permission::create(['name' => 'update allhealth']);
        Permission::create(['name' => 'delete allhealth']);

        Permission::create(['name' => 'list livelyhoodandjobsearches']);
        Permission::create(['name' => 'view livelyhoodandjobsearches']);
        Permission::create(['name' => 'create livelyhoodandjobsearches']);
        Permission::create(['name' => 'update livelyhoodandjobsearches']);
        Permission::create(['name' => 'delete livelyhoodandjobsearches']);

        Permission::create(['name' => 'list perareducationpersdvpmnts']);
        Permission::create(['name' => 'view perareducationpersdvpmnts']);
        Permission::create(['name' => 'create perareducationpersdvpmnts']);
        Permission::create(['name' => 'update perareducationpersdvpmnts']);
        Permission::create(['name' => 'delete perareducationpersdvpmnts']);

        Permission::create(['name' => 'list personalinfos']);
        Permission::create(['name' => 'view personalinfos']);
        Permission::create(['name' => 'create personalinfos']);
        Permission::create(['name' => 'update personalinfos']);
        Permission::create(['name' => 'delete personalinfos']);

        Permission::create(['name' => 'list socialnetworks']);
        Permission::create(['name' => 'view socialnetworks']);
        Permission::create(['name' => 'create socialnetworks']);
        Permission::create(['name' => 'update socialnetworks']);
        Permission::create(['name' => 'delete socialnetworks']);

        Permission::create(['name' => 'list tuberculoses']);
        Permission::create(['name' => 'view tuberculoses']);
        Permission::create(['name' => 'create tuberculoses']);
        Permission::create(['name' => 'update tuberculoses']);
        Permission::create(['name' => 'delete tuberculoses']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Plugins\Sale\Models\Category;
use Plugins\Sale\Models\Customer;
use App\Models\PermissionGroup;
use Plugins\Sale\Models\Product;
use Plugins\Sale\Models\ProductFile;
use Plugins\Sale\Models\SalesOrder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Jurager\Teams\Events\TeamMemberAdded;
use Jurager\Teams\Models\Team;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        activity()->disableLogging();

        \App\Models\User::truncate();
        \App\Models\MasterData::truncate();
        Role::truncate();
        Permission::truncate();
        PermissionGroup::truncate();
        $admin = \App\Models\User::factory()->create([
            'full_name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@unifymed.net',
            'email_verified_at' => Carbon::now(),
            'password' => \Hash::make('123456'),
            'deleted' => 0,
            'deleted_at' => null,
            'deleted_by' => null,
        ]);

        User::factory()->count(20)->create();
        $role_admin = Role::create(['name' => 'Admin']);

        $role_seller_manager = Role::create(['name' => 'Seller Manager']);
        $role_seller = Role::create(['name' => 'Seller']);

        $role_staff_manager = Role::create(['name' => 'Staff Manager']);
        $role_staff = Role::create(['name' => 'Staff']);

        Permission::findOrCreate('*');


        $permissionGroupNames = [
            'Sales Order' => ['Order.select', 'Order.create', 'Order.update', 'Order.delete', 'Order.invoice'],
            'Sales Order Return' => ['OrderReturn.select', 'OrderReturn.create', 'OrderReturn.update', 'OrderReturn.delete'],
            'Staff User' => ['User.select', 'User.delete', 'User.update', 'User.create'],
            'Staff Role' => ['Role.select', 'Role.delete', 'Role.update', 'Role.create'],
            'Staff Permission' => ['Permission.select', 'Permission.delete', 'Permission.update', 'Permission.create'],
        ];
        foreach ($permissionGroupNames as $permissionGroupName => $permissionNames) {

            PermissionGroup::factory()
                ->count(1)
                ->create(
                    [
                        'name' => $permissionGroupName
                        , 'guard_name' => 'admin'
                    ]
                )->each(function ($group) use ($permissionNames) {
                    echo $group->name.PHP_EOL;
                    foreach ($permissionNames as $permissionName) {

                        \App\Models\Permission::factory()->create([
                            'name' => $permissionName
                            , 'group_id' => $group->id
                            , 'guard_name' => 'admin'

                        ]);
                    }
                });
        }
        $role_admin->givePermissionTo('*');


        $admin->assignRole('Admin');



        // Re-enable foreign key checks
    }
}

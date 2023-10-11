<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Customer;
use App\Models\PermissionGroup;
use App\Models\Product;
use App\Models\ProductFile;
use App\Models\SalesOrder;
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


        \App\Models\MasterData::factory()->create([
            'list_key' => 'task-status',
            'data' => json_encode([["label" => "Potential Patient", "value" => "potential_patient", "color" => "#fff", "background_color" => "#5b3286"], ["value" => "insurance_pending", "label" => "Insurance Pending", "color" => "#000", "background_color" => "#c0e1f6"], ["label" => "New Patient", "value" => "new_patient", "color" => "#000", "background_color" => "#e8eaed"], ["label" => "New Supply Request", "value" => "new_supply_request", "color" => "#000", "background_color" => "#d0d2d5"], ["label" => "Urgent", "value" => "urgent", "color" => "#fff", "background_color" => "#b10202"], ["label" => "Pending", "value" => "pending", "color" => "#000", "background_color" => "#ffe59f"], ["background_color" => "#ffe59f", "color" => "#000", "value" => "renewal", "label" => "Renewal"], ["label" => "Code", "value" => "code", "active" => "1", "color" => "#fff", "background_color" => "#116743"], ["label" => "PAR pending", "value" => "par_pending", "active" => "1", "color" => "#000", "background_color" => "#c0e1f6"], ["label" => "PAR", "value" => "par", "active" => "1", "color" => "#fff", "background_color" => "#0953a8"], ["background_color" => "#0953a8", "color" => "#fff", "label" => "Kepro", "value" => "kepro"], ["background_color" => "#0953a8#0953a8", "color" => "#fff", "value" => "pending_kepro", "label" => "Pending Kepro"], ["background_color" => "#ffc8aa", "color" => "#000", "value" => "outbound_document", "label" => "Outbound document"], ["label" => "Review", "value" => "review", "color" => "#fff", "background_color" => "#116743"], ["label" => "Done", "value" => "done", "color" => "#fff", "background_color" => "#116743"], ["value" => "drop_off", "label" => "Dropoff", "color" => "#fff", "background_color" => "#ffad0d"], ["value" => "new_supply_request", "label" => "New Supply Request", "color" => "#000", "background_color" => "#e8eaed"], ["value" => "ready_to_bill", "label" => "Ready to bill", "color" => "#000", "background_color" => "#d4edbb"]]),
            'created_by' => 'admin',
        ]);

        Category::truncate();
        SalesOrder::truncate();
        ProductFile::truncate();
        Product::truncate();
        Category::factory()
            ->count(2)
            ->sequence(
                ['name' => 'Category 1', 'description' => ''],
                ['name' => 'Category 2', 'description' => ''],
                ['name' => 'Category 3', 'description' => ''],
            )
            ->create();
        $categoryIds = Category::all()->pluck('id')->toArray();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        activity()->enableLogging();
        Product::truncate();

        SalesOrder::factory()
            ->for(Customer::factory())
            ->has(Product::factory()
                ->count(2)
                ->has(ProductFile::factory()->count(3), 'files'))
            ->count(30)->create();
        // Re-enable foreign key checks
    }
}

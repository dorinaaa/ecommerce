<?php

use App\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class InitialSetOfDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // roles
        $admin = Role::firstOrNew(['name' => 'admin']);
        if (!$admin->exists) {
            $admin->fill([
                'description' => 'Admin',
                'is_active' => true,
            ])->save();
        }

        $role = Role::firstOrNew(['name' => 'customer']);
        if (!$role->exists) {
            $role->fill([
                'description' => 'Customer',
                'is_active' => true,
            ])->save();
        }

        $postman = Role::firstOrNew(['name' => 'postman']);
        if (!$postman->exists) {
            $postman->fill([
                'description' => 'Postman',
                'is_active' => true,
            ])->save();
        }

        $storeKeeper = Role::firstOrNew(['name' => 'store_keeper']);
        if (!$storeKeeper->exists) {
            $storeKeeper->fill([
                'description' => 'Store Keeper',
                'is_active' => true,
            ])->save();
        }

        // admin user
        $admin = User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'phone' => '222',
                'email' => 'admin@admin.com',
                'is_active' => true,
                'role_id' => $admin->id,
                'password' => Hash::make('admin')
            ]
        );

        // statuses
        $statuses = [
          'Billed' => 'yellow',
          'Packed' => 'yellow',
          'Shipped' => 'yellow',
          'In Transit' => 'yellow',
          'Completed' => 'green',
          'Rejected' => 'red'
        ];
        foreach ($statuses as $status => $color) {
            \App\Status::updateOrCreate(
                ['name' => $status],
                [
                    'color' => $color,
                    'is_active' => true,
                ]
            );
        }

    }
}

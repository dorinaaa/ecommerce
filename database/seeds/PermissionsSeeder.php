<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\Role::query()->where('name', 'admin')->first();
        $postman = \App\Role::query()->where('name', 'postman')->first();
        $storeK = \App\Role::query()->where('name', 'store_keeper')->first();

        $add =  \App\Permission::updateOrCreate(
            ['key' => 'add'],
            [
                'name' => 'add'
            ]
        );
        $edit =  \App\Permission::updateOrCreate(
            ['key' => 'edit'],
            [
                'name' => 'edit'
            ]
        );
        $delete =  \App\Permission::updateOrCreate(
            ['key' => 'delete'],
            [
                'name' => 'delete'
            ]
        );

        $pr = new \App\PermissionRole();
        $pr->role_id = $admin->id;
        $pr->permission_id = $add->id;
        $pr->save();
        $pr1 = new \App\PermissionRole();
        $pr1->role_id = $admin->id;
        $pr1->permission_id = $edit->id;
        $pr1->save();
        $pr2 = new \App\PermissionRole();
        $pr2->role_id = $admin->id;
        $pr2->permission_id = $delete->id;
        $pr2->save();
        $pr3 = new \App\PermissionRole();
        $pr3->role_id = $storeK->id;
        $pr3->permission_id = $edit->id;
        $pr3->save();
        $pr3 = new \App\PermissionRole();
        $pr3->role_id = $postman->id;
        $pr3->permission_id = $edit->id;
        $pr3->save();
    }
}

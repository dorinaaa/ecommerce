<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AddPostmanAndStoreKeeperUSers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'postman@postman.com'],
            [
                'first_name' => 'Post',
                'last_name' => 'Post',
                'phone' => '222',
                'email' => 'postman@postman.com',
                'is_active' => true,
                'role_id' => 3,
                'password' => Hash::make('postmanpostman')
            ]
        );

        User::updateOrCreate(
            ['email' => 'storekeeper@storekeeper.com'],
            [
                'first_name' => 'Post',
                'last_name' => 'Post',
                'phone' => '222',
                'email' => 'storekeeper@storekeeper.com',
                'is_active' => true,
                'role_id' => 4,
                'password' => Hash::make('storekeeperstorekeeper')
            ]
        );
    }
}

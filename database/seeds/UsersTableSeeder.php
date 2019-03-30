<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new User();
        $role_user->name = 'Anonymous';
        $role_user->email = 'admin@slavapleshkov.com';
        $role_user->password = Hash::make(str_random(100));
        $role_user->role_id = 1;
        $role_user->save();
    }
}

<?php

namespace Modules\User\Seeders;

use Illuminate\Database\Seeder;
use Modules\User\src\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->fullname = 'SUPER ADMIN';
        $user->username = 'superadmin';
        $user->email = 'superadmin@example.com';
        $password = 'superadmin';
        $salt = 'superadmin';
        $user->password = Hash::make($password . $salt);
        $user->salt = $salt;
        $user->save();
    }
}

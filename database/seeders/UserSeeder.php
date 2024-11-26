<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        User::create([
            'name' => 'superadmin',
            'password' => bcrypt('123456'),
            'UserEmployeeId' => 1,
            'UserRoleId' => 1,
            'UserCreatedBy' => 1,
            'UserUpdatedBy' => 1
        ]);
    }
}

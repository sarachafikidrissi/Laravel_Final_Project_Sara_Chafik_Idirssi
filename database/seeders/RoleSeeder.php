<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            [
                "role" => "admin"
            ],
            [
                "role" => "trainer"
            ],
            [
                "role" => "member"
            ]
            ]);

            $admin = User::create([
                'name'=>"admin",
                'email'=>"admin@dmeo.com",
                'password'=>"admin@demo.com",
                'image'=>"images/profile/admin.avif",
                'gender'=>'male',
                'age'=>23
            ]);
            $adminRole = Role::where('role', 'admin')->first();

                $admin->roles()->attach($adminRole->id);
    
    }
}

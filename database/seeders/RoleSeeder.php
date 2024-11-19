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

            //* insert trainers to User Model and assign their role as trainer
            $trainerRole = Role::where('role', 'trainer')->first();
            $trainerRoleId = $trainerRole->id;
            $trainers = User::insert([
                [
                    'name'=>"trainer1",
                    'email'=>"trainer1@demo.com",
                    'password'=>"trainer1@demo.com",
                    'image'=>"images/trainers/trainer1.jpg",
                    'gender'=>'male',
                    'age'=>27
                ],
                [
                    'name'=>"trainer2",
                    'email'=>"trainer2@demo.com",
                    'password'=>"trainer2@demo.com",
                    'image'=>"images/trainers/trainer2.webp",
                    'gender'=>'male',
                    'age'=>30
                ],
                [
                    'name'=>"trainer3",
                    'email'=>"trainer3@demo.com",
                    'password'=>"trainer3@demo.com",
                    'image'=>"images/trainers/trainer3.avif",
                    'gender'=>'male',
                    'age'=>25
                ],
                [
                    'name'=>"trainer4",
                    'email'=>"trainer4@demo.com",
                    'password'=>"trainer4@demo.com",
                    'image'=>"images/trainers/trainer4.avif",
                    'gender'=>'female',
                    'age'=>30
                ],
                [
                    'name'=>"trainer5",
                    'email'=>"trainer5@demo.com",
                    'password'=>"trainer5@demo.com",
                    'image'=>"images/trainers/trainer5.jpg",
                    'gender'=>'male',
                    'age'=>30
                ],
                [
                    'name'=>"trainer6",
                    'email'=>"trainer6@demo.com",
                    'password'=>"trainer6@demo.com",
                    'image'=>"images/trainers/trainer6.jpg",
                    'gender'=>'female',
                    'age'=>25
                ],
                [
                    'name'=>"trainer7",
                    'email'=>"trainer7@demo.com",
                    'password'=>"trainer7@demo.com",
                    'image'=>"images/trainers/trainer7.jpg",
                    'gender'=>'male',
                    'age'=>25
                ],
                [
                    'name'=>"trainer8",
                    'email'=>"trainer8@demo.com",
                    'password'=>"trainer8@demo.com",
                    'image'=>"images/trainers/trainer8.jpg",
                    'gender'=>'male',
                    'age'=>40
                ] 

                ]);
                

                $trainersIds = [2, 3, 4, 5, 6, 7, 8, 9];

                foreach ($trainersIds as $trainerId) {
                    $trainer = User::where('id', $trainerId)->first();
                    $trainer->roles()->attach($trainerRoleId);

                }
    
    }
}

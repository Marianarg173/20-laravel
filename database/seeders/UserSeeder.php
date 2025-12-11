<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ORM - eloquent
        $user = new User;
        $user->document = '7500001';
        $user->fullname = 'John Wick';
        $user->gender = 'Male';
        $user->birthdate = '1964-09-12';
        $user->phone = '3000000001';
        $user->email = 'john.wick@example.com';
        $user->password = bcrypt('admin');
        $user->role = 'Administrator';
        $user->save();

        // Insert -> Array
        DB::table('users')->insert([
            'document' => '7500002',
            'fullname' => 'Lara Croft',
            'gender' =>' Female',
            'birthdate' => '1992-02-14',
            'phone' => '3000000002',
            'email' => 'lara@mail.com',
            'password' => Hash::make('12345'),
            'created_at' => now(),
        
        ]);
    }
}

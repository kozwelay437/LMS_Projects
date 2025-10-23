<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if admin already exists
        $adminEmail = 'admin@example.com';

        if (!User::where('email', $adminEmail)->exists()) {
            User::create([
                'name' => 'Admin User',
                'email' => $adminEmail,
                'password' => Hash::make('Admin@123'), // choose a strong password
                'role' => 'Admin', // admin role
                'phone' => '0999999999',
                'address' => 'Admin Office',
                'department' => 'Administration',
                'designation' => 'Admin',
                'status' => 'Approve',
            ]);

            
        }
}
}
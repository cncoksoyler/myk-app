<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\AdminFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@admin.com';
        $admin->type = 'admin';
        $admin->email_verified_at = now();
        $admin->password = Hash::make(config('app.adminPasswordForSeeder'));
        $admin->remember_token = Str::random(10);
        $admin->save();
    }
}

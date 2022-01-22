<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
<<<<<<< HEAD
use Illuminate\Support\Facades\Hash;
=======
>>>>>>> 31c70fe508a13967450cbc32b19bca31f1a98020
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'              => 'Admin',
            'email'             => 'admin@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password'          => Hash::make('admin@admin.'),
        ]);
<<<<<<< HEAD

=======
>>>>>>> 31c70fe508a13967450cbc32b19bca31f1a98020
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
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
        function rrmdir($dir)
        {
            if (is_dir($dir)) {
                $objects = scandir($dir);
                foreach ($objects as $object) {
                    if ($object != "." && $object != "..") {
                        if (filetype($dir . "/" . $object) == "dir")
                            rrmdir($dir . "/" . $object);
                        else unlink($dir . "/" . $object);
                    }
                }
                reset($objects);
                rmdir($dir);
            }
        };

        rrmdir('./public/storage');
        mkdir('./public/storage');

        mkdir('./public/storage/aplikasi');

        User::create([
            'uid'               => 'admin001',
            'name'              => 'Admin',
            'email'             => 'admin@gmail.com',
            'code'              => '116000',
            'desc'              => 'admin ini adalah',
            'emp_no'            => '166000',
            'team'              => 'Collaboration',
            'phone'              => '081257463888',
            'created_by'        => 'Admin',
            'access'            => 'admin',
            'is_active'          => 'Active',
            'email_verified_at' => Carbon::now(),
            'password'          => Hash::make('admin@admin.'),
        ]);
    }
}

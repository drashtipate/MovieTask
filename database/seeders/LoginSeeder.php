<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admin::create([
            'email'    => 'admin@gmail.com',
            'password' =>  bcrypt('admin123'),
        ]);
        // Define the new email and password
        // $newEmail = 'admin@gmail.com'; // Replace with the new email
        // $newPassword = bcrypt('admin123'); // Replace with the new password

        // // // Find the admin record by the old email
        // $admin = Admin::where('email', 'admin@gmail.com')->first();

        // // If the admin record exists, update the email and password
        // if ($admin) {
        //     $admin->update([
        //                                   'email' => $newEmail,
        //         'password' => $newPassword,
        //     ]);
        // }

    }
}

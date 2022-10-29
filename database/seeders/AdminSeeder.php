<?php

namespace Database\Seeders;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
            'name'=> 'admin',
            'email'=> 'admin@admin.com',
            'password'=> bcrypt('admin'),
            'email_verified_at'=> now()
        ]);
    }
}

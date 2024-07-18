<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Status;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $admin = new User();
        $admin->name = 'admin';
        $admin->email = 'alchristiankardinas@gmail.com';
        $admin->password = 'asdfasdf';
        $admin->is_admin = 1;
        $admin->save();


        Status::create(['name' => 'Open']);
        Status::create(['name' => 'Pending']);
        Status::create(['name' => 'In-progess']);
        Status::create(['name' => 'In-review']);
        Status::create(['name' => 'Accepted']);
        Status::create(['name' => 'Rejected']);
    }
}

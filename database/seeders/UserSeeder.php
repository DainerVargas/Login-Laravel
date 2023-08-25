<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = "Dainer Vargas";
        $user->email = "dainer2607@gmail.com";
        $user->foto = "WIN_20230728_11_57_14_Pro.jpg";
        $user->password = Hash::make("123");
        $user->work_id = 1;
        $user->save();
    }
}

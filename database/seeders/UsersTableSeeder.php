<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Lode',
            'email'=>'lodebossuyt@hotmail.com',
            'email_verified_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'password'=>bcrypt(12345678),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('role_user')->insert([
            'user_id'=>1,
            'role_id'=>1,
        ]);
    }
}

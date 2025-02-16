<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'dungvvph34412',
            'email' => 'dungvvph34412@fpt.edu.vn',
            'password' => Hash::make('12345'),
            'created_at' => Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
    }
}

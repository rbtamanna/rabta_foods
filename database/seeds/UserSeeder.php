<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert
        ([
                'name' => 'rabta',
                'email'  => 'rabta@rbt.com',
                'password' => \Illuminate\Support\Facades\Hash::make('rabta'),
        ]);
    }
}

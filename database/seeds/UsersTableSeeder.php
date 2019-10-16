<?php

use Illuminate\Database\Seeder;

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
            'name'=>'thanh',
            'account' => 'admin',
            'password' => bcrypt('123'),
            'phone'=>'1234598',
            'address'=>'abc',
            'type_user'=>'1',
        ]);
    }
}

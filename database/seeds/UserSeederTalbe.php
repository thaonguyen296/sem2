<?php

use Illuminate\Database\Seeder;

class UserSeederTalbe extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Admin Thao',
                'email' => 'thaosii2k@gmail.com',
                'image' => 'cukspn53gz9convdj8jl',
                'level' => 0,
                'address' => 'Phu Tho',
                'phonenumber' => '0396677234',
                'password' => bcrypt('773622606'),
            ],
        ];
        DB::table('users')->insert($data);
    }
}

<?php

use Illuminate\Database\Seeder;

class AdminSeederTalbe extends Seeder
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
                'user_id' => 1,
                'level' => 0,
            ],
        ];
        DB::table('level_admin')->insert($data);
    }
}

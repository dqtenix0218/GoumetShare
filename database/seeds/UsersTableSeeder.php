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
        $param = [
            'name' => 'sample',
            'email' => 'sample@sample.com',
            'password' => bcrypt('samplepass'),
            'created_at' => new DateTime(),
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'User1',
            'email' => 'User1@sample.com',
            'password' => bcrypt('User1pass'),
            'created_at' => new DateTime(),
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'User2',
            'email' => 'User2@sample.com',
            'password' => bcrypt('User2pass'),
            'created_at' => new DateTime(),
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'User3',
            'email' => 'User3@sample.com',
            'password' => bcrypt('User3pass'),
            'created_at' => new DateTime(),
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'User4',
            'email' => 'User4@sample.com',
            'password' => bcrypt('User4pass'),
            'created_at' => new DateTime(),
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'User5',
            'email' => 'User5@sample.com',
            'password' => bcrypt('User5pass'),
            'created_at' => new DateTime(),
        ];
        DB::table('users')->insert($param);
    }
}

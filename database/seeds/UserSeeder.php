<?php

use App\User;
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
        $data = [
            [
                'lname' => 'LAURON',
                'fname' => 'ROEL',
                'email' => 'roel@gmail.com',
                'password' => bcrypt('password'),
                'institution' => 'Cebu Institute of Technology - University',
                'designation' => 'Department Head',
                'role' => 'officer',
            ],

            [
                'lname' => 'LENTERIA',
                'fname' => 'BENJIE',
                'email' => 'benjielenteria@yahoo.com',
                'password' => bcrypt('password'),
                'institution' => 'Mater Dei College',
                'designation' => 'Faculty',
                'role' => 'admin',
            ],
            [
                'lname' => 'FELIZCUSO',
                'fname' => 'LARMIE',
                'email' => 'larmie@gmail.com',
                'password' => bcrypt('password'),
                'institution' => 'Cebu Institute of Technology - University',
                'designation' => 'Department Head',
                'role' => 'officer',
            ],
            [
                'lname' => 'MONTENEGRO',
                'fname' => 'CHUCHI',
                'email' => 'chuchi@gmail.com',
                'password' => bcrypt('password'),
                'institution' => 'Silliman University',
                'designation' => 'Chair',
                'role' => 'officer',
            ],
        ];

        foreach($data as $u) {
            User::create($u);
        }
    }
}

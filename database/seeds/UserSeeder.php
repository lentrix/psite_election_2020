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
                'lname' => 'Lauron',
                'fname' => 'Roel',
                'email' => 'roel@gmail.com',
                'password' => bcrypt('password'),
                'institution' => 'Cebu Institute of Technology - University',
                'designation' => 'Department Head',
                'role' => 'officer',
            ],

            [
                'lname' => 'Lenteria',
                'fname' => 'Benjie',
                'email' => 'benjielenteria@yahoo.com',
                'password' => bcrypt('password'),
                'institution' => 'Mater Dei College',
                'designation' => 'Faculty',
                'role' => 'admin',
            ],
            [
                'lname' => 'Felizcuso',
                'fname' => 'Larmie',
                'email' => 'larmie@gmail.com',
                'password' => bcrypt('password'),
                'institution' => 'Cebu Institute of Technology - University',
                'designation' => 'Department Head',
                'role' => 'officer',
            ],
            [
                'lname' => 'Montenegro',
                'fname' => 'Chuchi',
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

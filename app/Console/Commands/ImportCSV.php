<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class ImportCSV extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Members List CSV file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $file = fopen('psite_members_2019_2020.csv', 'r');
        while($data = fgetcsv($file,1000,";")) {
            if(empty($data[3])) {
                $email = Str::random(6) . "@temporary.com";
            }else {
                $email = $data[3];
            }

            $password = Str::random(8);

            User::create([
                'email' => $email,
                'lname' => $data[0],
                'fname' => $data[1],
                'institution' => '-',
                'designation' => '-',
                'password' => bcrypt('temporary'),
                'remember_token' => $password
            ]);
        }
    }
}

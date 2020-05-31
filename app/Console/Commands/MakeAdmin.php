<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'makeadmin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert a user into admin';

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
        DB::table('users')->where('email','hawkmanlentrix@gmail.com')->update([
            'password' => bcrypt('password123'),
            'role' => 'admin'
        ]);
    }
}

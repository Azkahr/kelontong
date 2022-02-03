<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class generateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generateUser {count}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates test user data and insert into the database.';

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
     * @return int
     */
    public function handle()
    {
        $usersData = $this->argument('count');
        $com = User::factory($usersData)->create();
        if($com){
            $this->info('Create User Success');
        }else{
            $this->error('Something Went Wrong!');
        }
    }
}

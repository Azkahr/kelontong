<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class generateProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generateProduct {size} {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'mempopulasi poduct';

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
        $size = $this->argument('size');
        $user = $this->argument('user');

        $com = Product::factory($size)->withID($user)->create();

        if($com){
            $this->info('Create Product Success');
        }else{
            $this->error('Something Went Wrong!');
        }
    }
}

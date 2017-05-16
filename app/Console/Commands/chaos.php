<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\chaos_model;

class chaos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chaos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $chaos = new chaos_model();
        echo $chaos->del_user('chaostix') . "\n";
    }
}

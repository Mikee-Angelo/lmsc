<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class Setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'do:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup the system without using single command';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       try {
        
            $rv= 0; 
            $outputs = [];

            //Executes needed commands to install necessary packages.
            exec("composer install && npm install && npm run build", $outputs, $r);

            if($rv == 0) { 
                foreach($outputs as $output) { 
                    $this->info($output);
                }
            }

            if(File::exists('.env')) { 
                $this->call('migrate:refresh');
                $this->call('db:seed');
                $this->call('serve');
            }
       } catch (Exception $e) { 
            $this->error($e);
       }
    }
}

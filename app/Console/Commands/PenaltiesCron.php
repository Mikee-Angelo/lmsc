<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Transaction;
use App\Models\TransactionPenalty;
use App\Models\Penalty;
use Carbon\Carbon; 

class PenaltiesCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:penalties';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        try {
            $transactions = Transaction::where('returned_at', null)->whereDate('ends_at', '<', Carbon::now())->whereDoesntHave('transaction_penalty', function(Builder $query) { 
                $query->whereDate([
                    ['created_at', '>' , Carbon::today()],
                    ['created_at', '<', Carbon::tomorrow()],
                ]);
            })->get();

            $penalty = Penalty::find(1);
            
            foreach($transactions as $transaction) { 
                TransactionPenalty::create([
                    'penalty_id' => $penalty->id, 
                    'transaction_id' => $transaction->id
                ]);
            }

            $this->info("Message");

        } catch (Exception $e) { 
            $this->error($e);
        }

      
    }
}

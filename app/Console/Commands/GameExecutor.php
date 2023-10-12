<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Events\RemainingTimeChanged;
use App\Events\GameActions;

class GameExecutor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:execute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start the game';
    private $time = 27;

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        while(true){
            broadcast(new RemainingTimeChanged($this->time));
            $this->time--;
            sleep(1);
            if($this->time === -1){
                $data = [
                    'action'=>'winner',
                    'number'=> mt_rand(1,3),
                ];
                broadcast(new GameActions($data));

                $this->time = 27;
            }
        }
    }
}

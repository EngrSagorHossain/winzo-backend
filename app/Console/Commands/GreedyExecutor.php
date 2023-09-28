<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Events\GreedyGameTime;
use App\Events\GreedyActions;
use App\Http\Controllers\GreedyController;

class GreedyExecutor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'greedy:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Greedy Game Start';

    /**
     * Execute the console command.
     *
     * @return int
     */
    protected $controller;

    public function __construct(GreedyController $controller)
    {
        parent::__construct();
        $this->controller = $controller;
    }

     public function handle()
     {
         $repeatCount = 0;
         $stop = false;

         while (!$stop || $repeatCount < 2) {
             for ($i = 1; $i <= 8; $i++) {

                 broadcast(new GreedyGameTime($i));

                 if ($i == 8) {

                     $i = 0;
                     $repeatCount++;
                 }


                 $random = rand(1, 8);


                 if ($random == 1 && $repeatCount >= 2) {
                     $stop = true;
                     break;
                 }

                 usleep(200000);
             }

             if ($repeatCount >= 2) {
                broadcast(new GreedyActions($i, 'winvalue'));
                // Call the addRound function from the controller
                $this->controller->addRound();
                sleep(3);

                for ($j = 20; $j >= 0; $j--) {
                    broadcast(new GreedyActions($j, 'timer'));
                    sleep(1); // Sleep for 1 second between each value
                }

                $repeatCount = 0;
                $stop = false;
            }

         }
     }


}

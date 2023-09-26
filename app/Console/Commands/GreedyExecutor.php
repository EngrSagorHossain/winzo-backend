<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Events\GreedyGameTime;
use App\Events\GreedyActions;

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
                broadcast(new GreedyActions($i));
                 sleep(80);
                 $repeatCount = 0;
                 $stop = false;
             }
         }
     }


}

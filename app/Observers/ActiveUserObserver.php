<?php

namespace App\Observers;

use App\Models\ActiveUser;
use App\Events\GameActions;

class ActiveUserObserver
{
    public function created(ActiveUser $activeUser)
    {
        // broadcast(new GameActions($activeUser));
    }

    public function deleted(ActiveUser $activeUser)
    {
        // broadcast(new GameActions($activeUser));
    }
}


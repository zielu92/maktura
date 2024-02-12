<?php

namespace App\Observers;

use App\Models\Buyer;

class BuyerObserver
{
    /**
     * Handle the Buyer "created" event.
     */
    public function created(Buyer $buyer): void
    {
        $buyer->company_id = 0;
    }

}

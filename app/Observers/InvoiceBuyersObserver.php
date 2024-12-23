<?php

namespace App\Observers;

class InvoiceBuyersObserver
{
    /**
     * Handle the Buyer "created" event.
     */
    public function creating(Buyer $buyer): void
    {
        $buyer->company_id = 1;
    }
}

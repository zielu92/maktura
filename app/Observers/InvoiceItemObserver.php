<?php

namespace App\Observers;

use App\Models\InvoiceItem;

class InvoiceItemObserver
{

     /**
     * in the future change to a company property from middleware
     * Handle the Invoice "created" event.
     */
    public function creating(InvoiceItem $invoiceItem): void
    {
        $invoiceItem->company_id = 1;
    }
}

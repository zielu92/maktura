<?php

namespace App\Observers;

use App\Models\Invoice;
use Illuminate\Support\Facades\Log;

class InvoiceObserver
{
    /**
     * in the future change to a company property from middleware
     * Handle the Invoice "created" event.
     */
    public function creating(Invoice $invoice): void
    {
        $invoice->company_id = 1;
    }

}

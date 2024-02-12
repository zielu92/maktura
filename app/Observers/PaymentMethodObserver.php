<?php

namespace App\Observers;

use App\Models\PaymentMethod;

class PaymentMethodObserver
{
    /**
     * Handle the PaymentMethod "created" event.
     */
    public function created(PaymentMethod $paymentMethod): void
    {
        $paymentMethod->company_id = 0;
    }

}

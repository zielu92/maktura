<?php

namespace App\Observers;

use App\Models\Setting;

class SettingObserver
{
    /**
     * Handle the Buyer "created" event.
     */
    public function creating(Setting $buyer): void
    {
        $buyer->company_id = 1;
    }
}

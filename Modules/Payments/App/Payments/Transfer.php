<?php

namespace Modules\Payments\App\Payments;

class Transfer extends Payment
{
    protected string $code = 'transfer';
    protected string $name = 'Transfer';

    public function registerMethod($id = null)
    {
        return redirect()->route('payments.transfer.create');
    }
}

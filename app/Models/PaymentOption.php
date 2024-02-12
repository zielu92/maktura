<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentOption extends Model
{
    use HasFactory;
    protected $table = 'payment_options';
    protected $fillable = ['name', 'value', 'hidden', 'active', 'payment_method_id'];

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}

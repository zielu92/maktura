<?php

namespace Modules\Payments\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Payments\Database\factories\PaymentMethodModelFactory;

class PaymentMethodModel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ["user_id", "name","description", "url", "method", "active", "company_id"];
    protected $table = "payment_method";

}

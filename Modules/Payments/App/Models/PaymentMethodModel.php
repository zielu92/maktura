<?php

namespace Modules\Payments\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Payments\Database\factories\PaymentMethodModelFactory;

class PaymentMethodModel extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ["user_id", "name","description", "url", "method", "active", "company_id"];
    protected $table = "payment_methods";

}

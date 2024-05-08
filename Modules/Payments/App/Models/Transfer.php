<?php

namespace Modules\Payments\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Payments\Database\factories\TasnferFactory;

class Transfer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ["accountNumber", "bankName", "iban", "swift", "beneficiaryName", "beneficiaryAddress", "user_id", "company_id"];


}

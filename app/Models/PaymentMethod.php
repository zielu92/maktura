<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;
    protected $table = 'payment_methods';
    protected $fillable = ['name','description', 'slug'];

    public function options() {
        return $this->hasMany(PaymentOption::class);
    }

    //future feature
    public function newEloquentBuilder($query)
    {
        // $company = Company::getCurrent();
        // return new \Illuminate\Database\Eloquent\Builder($query->where('payment_methods' . '.company_id', $company->id));
        return new \Illuminate\Database\Eloquent\Builder($query->where('payment_methods' . '.company_id', 1));
    }
}

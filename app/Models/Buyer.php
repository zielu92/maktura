<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buyer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'buyers';
    protected $fillable = ['name', 'company_name', 'email', 'phone', 'address', 'city', 'postal_code', 'nip', 'regon', 'krs', 'country'];

    //future feature
    public function newEloquentBuilder($query)
    {
        // $company = Company::getCurrent();
        // return new \Illuminate\Database\Eloquent\Builder($query->where('buyers' . '.company_id', $company->id));
        return new \Illuminate\Database\Eloquent\Builder($query->where('buyers' . '.company_id', 1));
    }
}

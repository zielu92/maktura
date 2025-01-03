<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['seller_name', 'seller_company_name', 'seller_email', 'seller_phone', 'seller_address',
        'seller_city', 'seller_postal_code', 'seller_country', 'seller_nip', 'seller_regon', 'seller_krs',
        'invoice_default_issuer', 'invoice_default_place', 'invoice_default_pattern', 'invoice_default_tax_rate',
        'invoice_default_template', 'company_id'];

    public function newEloquentBuilder($query)
    {
        // $company = Company::getCurrent();
        // return new \Illuminate\Database\Eloquent\Builder($query->where('settings' . '.company_id', $company->id));
        return new \Illuminate\Database\Eloquent\Builder($query->where('settings' . '.company_id', 1));
    }
}

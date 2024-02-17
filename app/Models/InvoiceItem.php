<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;
    protected $table = 'invoice_items';
    protected $fillable = ['invoice_id', 'name', 'quantity', 'description', 'price_net', 'price_gross', 'tax_rate', 'tax_amount',
    'discount', 'discount_type', 'total_net', 'total_gross', 'total_tax', 'total_amount', 'total_discount', 'total_discount_type', 'invoice_id'];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    //future feature
    public function newEloquentBuilder($query)
    {
        // $company = Company::getCurrent();
        // return new \Illuminate\Database\Eloquent\Builder($query->where('invoice_items' . '.company_id', $company->id));
        return new \Illuminate\Database\Eloquent\Builder($query->where('invoice_items' . '.company_id', 0));
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';
    protected $fillable = ['no', 'currency', 'type', 'buyer_id', 'status', 'payment_status', 'place', 'sale_date', 'due_date', 'issue_date', 'parent_id', 'user_id', 'payment_method_id', 'comment', 'issuer_name', 'total_net', 'total_gross', 'total_tax', 'total_discount', 'paid', 'due'];

    public function items()
    {
        return $this->hasMany(InvoiceItem::class, 'invoice_id', 'id');
    }

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Invoice::class, 'parent_id', 'id');
    }


    //future feature
    public function newEloquentBuilder($query)
    {
        // $company = Company::getCurrent();
        // return new \Illuminate\Database\Eloquent\Builder($query->where('invoices' . '.company_id', $company->id));
        return new \Illuminate\Database\Eloquent\Builder($query->where('invoices' . '.company_id', 1));
    }
}

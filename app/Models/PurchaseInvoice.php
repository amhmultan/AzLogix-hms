<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'supplier_id',
        'purchase_date',
        'discount',
        'tax_percent',
        'tax_amount',
        'total_amount',
        'net_amount',
        'notes',
    ];

    public function items()
    {
        return $this->hasMany(PurchaseInvoiceItem::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}

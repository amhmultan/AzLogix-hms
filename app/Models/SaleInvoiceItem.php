<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleInvoiceItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'fk_sale_invoice_id',
        'fk_product_id',
        'batch_no',
        'expiry_date',
        'quantity',
        'price',
        'subtotal',
    ];

    public function saleInvoice()
    {
        return $this->belongsTo(SaleInvoice::class, 'fk_sale_invoice_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'fk_product_id');
    }
}
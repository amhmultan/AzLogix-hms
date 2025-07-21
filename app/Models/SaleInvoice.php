<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleInvoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'fk_patient_id',
        'date',
        'gross_amount',
        'discount',
        'tax',
        'net_amount',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'fk_patient_id');
    }

    public function items()
    {
        return $this->hasMany(SaleInvoiceItem::class, 'fk_sale_invoice_id');
    }
}
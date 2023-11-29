<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'fk_product_id',
        'product_name',
        'batch_no',
        'quantity',
        'trade_price',
        'retail_price',
        'net_amount',
        'discount',
        'tax',
        'gross_amount',
        'fk_supplier_id',
        'supplier_name',
        'remarks'
    ];

    public function product()
    {
      return $this->belongsTo(Product::class);
    }
    
    public function supplier()
    {
      return $this->belongsTo(Supplier::class);
    }
}

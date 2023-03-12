<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'fk_product_id', 'fk_manufacturer_id','fk_supplier_id','batch_no','quantity','price','net_amount','discount','gross_amount', 'remarks'
    ];

    public function product()
    {
      return $this->belongsTo(Product::class);
    }

    public function manufacturer()
    {
      return $this->belongsTo(Manufacturer::class);
    }
    
    public function supplier()
    {
      return $this->belongsTo(Supplier::class);
    }
}

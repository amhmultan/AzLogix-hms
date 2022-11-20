<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [

        'fk_manufacturer_id','fk_supplier_id','name','generic','drug_class','description','pack_size','trade_price','retail_price','status','remarks'

    ];

    public function manufacturer()
    {
      return $this->belongsTo(Manufacturer::class);
    }
    
    public function supplier()
    {
      return $this->belongsTo(Supplier::class);
    }

}

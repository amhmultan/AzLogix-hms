<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','description','fbr_no','license_no','address','contact','remarks',
    ];
    
    public function product() 
    {
        return $this->has_many(Product::class);
    }

    public function manufacturer() 
    {
        return $this->has_many(Manufacturer::class);
    }

}

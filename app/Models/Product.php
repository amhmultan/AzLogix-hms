<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','generic','packing','trade_price', 'retail_price', 'company_name', 'status', 'quantity', 'batch_number', 'expiry_date', 'remarks'];
}

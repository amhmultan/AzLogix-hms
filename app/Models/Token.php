<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Token extends Model
{
    
    use HasFactory;

    protected $fillable = [

        'fk_patients_id','fees','denomination','balance'
        
    ];
    

}

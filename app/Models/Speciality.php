<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'title','remarks'
    ];

    public function doctor()
    {
      return $this->hasMany(Doctor::class);
    }
    
    public function token()
    {
      return $this->hasMany(Token::class);
    }

}

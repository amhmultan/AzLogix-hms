<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'pic','name','contact','email','address','dob','specialty','schedule','remarks','cnic','pmdc'
    ];

    public function specialty()
    {
      return $this->hasMany(Speciality::class);
    }

    public function token()
    {
      return $this->hasMany(Token::class);
    }

}

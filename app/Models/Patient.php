<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','fname','dob','gender','marital_status','phone','email','cnic','address','emr_name','relationship','emr_phone','weight','height','history','reffered_by'
    ];

    public function token()
   {
        return $this->hasMany(Token::class);
   }

   public function doctor_notes()
   { 
       return $this->hasMany(DoctorNotes::class);
   }
}

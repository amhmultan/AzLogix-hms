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
    
    public function patient()
    {
      return $this->belongsTo(Patient::class);
    }

    public function doctor_notes()
    {
      return $this->hasMany(DoctorNotes::class);
    }

}

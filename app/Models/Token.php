<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Token extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'fk_patients_id','fk_doctors_id','fk_specialty_id','fees','denomination','balance'
    ];
    
    public function patient()
    {
      return $this->belongsTo(Patient::class);
    }

    public function doctors()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function specialties()
    {
        return $this->belongsTo(Speciality::class);
    }

    public function doctor_notes()
    {
      return $this->hasMany(DoctorNotes::class);
    }

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorNotes extends Model
{
    use HasFactory;

    protected $fillable = ['fk_patient_id','fk_token_id','fk_patient_name','fk_token_created_at','prescription'];

}
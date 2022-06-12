<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLab extends Model
{
    use HasFactory;
    protected $fillable = ['p_lab_name','p_lab_pic','p_lab_address','p_lab_contact', 'p_lab_email', 'p_lab_remarks'];
}

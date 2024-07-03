<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineSymptom extends Model
{
    use HasFactory;

    protected $fillable = ['symptom_id', 'medicine_id'];
}

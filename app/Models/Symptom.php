<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'sub_category_id'];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'medicine_symptoms');
    }
}

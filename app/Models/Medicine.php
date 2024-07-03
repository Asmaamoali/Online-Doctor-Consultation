<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'description', 'instructions'];

    public function symptoms()
    {
        return $this->belongsToMany(Symptom::class, 'medicine_symptoms');
    }
}

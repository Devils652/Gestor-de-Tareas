<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Propiedades asignables masivamente
    protected $fillable = ['title', 'description', 'is_completed'];

    // Conversión de tipos
    protected $casts = [
        'is_completed' => 'boolean',
    ];
}
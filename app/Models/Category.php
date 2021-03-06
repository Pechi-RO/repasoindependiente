<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['nombre','descripcion'];
    use HasFactory;
    public function cursos(){
        return $this->hasMany(Curso::class);
    }
}

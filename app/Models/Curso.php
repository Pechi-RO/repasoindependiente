<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable=['nombre','descripcion','activo','imagen','category_id'];
    use HasFactory;
    public function category(){
        return $this->belongsTo(Category::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    public function commerces(){
        return $this->belongsToMany(Commerce::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}

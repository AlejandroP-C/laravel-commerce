<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'total_votes',
        'votes_valoration'
    ];
    public function commerces(){
        return $this->belongsToMany(Commerce::class, 'commerce_products');
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }
}

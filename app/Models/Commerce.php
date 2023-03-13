<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commerce extends Model
{
    use HasFactory;

   protected $fillable = [
        'name',
        'slug',
        'license',
        'description',
        'location',
        'user_id'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function ticket(){
        return $this->belongsTo(Tickets::class);
    }

    public function products(){
        return $this->belongsToMany(Products::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

}

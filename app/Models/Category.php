<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'slug'];

    public function getRouteKey()
    {
        return "slug";
    }


    public function products(){
        return $this->belongsToMany(Products::class);
    }

    public function commerces(){
        return $this->belongsToMany(Commerce::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'date',
        'commerce_id'
    ];

    public function commerces()
    {
        return $this->hasMany(Commerce::class);
    }
}

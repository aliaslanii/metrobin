<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
    public function Country()
    {
        return $this->belongsToMany(Country::class);
    }
    public function Langs()
    {
        return $this->belongsToMany(Lang::class);
    }
    public function Actor()
    {
        return $this->belongsToMany(Actor::class);
    }
    public function Directors()
    {
        return $this->belongsTo(Director::class);
    }
    public function Ages()
    {
        return $this->belongsTo(Ages::class);
    }
}

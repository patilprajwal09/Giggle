<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable=["logo","user_id","listing_id","name","email","phone","address","city","state"];

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}   

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable=["user_id","listing_id","note","status","resume"];

    public function listing()
    {
        return $this->belongsTo(Listing::class,'listing_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}

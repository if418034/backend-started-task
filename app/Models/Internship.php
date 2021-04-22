<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use HasFactory;

    protected $fillable = [
        'agency_id',
        'name',
        'slug',
        'description',
        'location',
        'time_length',
        'paid',
    ];

    public function company(){
        return $this->belongsTo(Agency::class);
    }
}

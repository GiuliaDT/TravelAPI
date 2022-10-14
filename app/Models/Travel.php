<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'location',
        'description',
        'attendees',
        'reference'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'

    ];
}

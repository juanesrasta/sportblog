<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'id_category',
        'title',
        'slug',
        'short_text',
        'long_text',
        'image',
    ];
}

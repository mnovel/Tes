<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panduan extends Model
{
    protected $fillable = ['description'];

    protected $hidden = ['created_at', 'updated_at'];
}

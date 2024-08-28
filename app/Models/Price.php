<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    protected $guarded = [];
}

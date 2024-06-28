<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class PromoCode extends Model
{
    protected $primaryKey = '_id';
    protected $guarded = ['_id'];
    use HasFactory;
}

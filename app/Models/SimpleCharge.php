<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimpleCharge extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'stripe_plan',
        'cost',
        'description',
        'user_id',
        'stripe_product',
        'completed'
    ];
}

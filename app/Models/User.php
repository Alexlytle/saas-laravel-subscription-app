<?php

namespace App\Models;

use App\Models\Plan;

use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'fb_id',
        'gg_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }
    public function plan()
    {
        return $this->hasOne(Plan::class);
    }

    public function name($user_id)
    {
        return User::find($user_id)->name;
    }

    public function email($user_id)
    {
        return User::find($user_id)->email;
    }

  
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    protected $table = 'customer';
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'password',
    ];
    use Notifiable;
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function order()
    {
        return $this->belongsToMany(Order::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

<?php

namespace App;

use App\Models\Despacho;
use App\Models\Doc;
use App\Models\Ocorencia;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username', 'etado','nivel',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rules = [
        'username' => 'sometimes|required|unique:users',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ocorencias()
    {
        return $this->hasMany(Ocorencia::class);
    }

    public function docs()
    {
        return $this->hasMany(Doc::class);
    }

    public function despachos()
    {
        return $this->hasOne(Despacho::class);
    }
}

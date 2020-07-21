<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email','senha','perfil','status','remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'senha','remember_token',
    ];
}

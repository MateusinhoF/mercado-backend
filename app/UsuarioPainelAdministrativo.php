<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class UsuarioPainelAdministrativo extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'primeiro_nome', 'segundo_nome' ,
        'email', 'usuario' , 'password', 
        'permissao_id'
    ];

    protected $hidden = [
        'password', 
    ];
}

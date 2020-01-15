<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class GrupoDePermissoesPainelAdministrativo extends Model
{
    use Notifiable;

    protected $fillable = [
        'nomo_do_grupo'
    ];
}

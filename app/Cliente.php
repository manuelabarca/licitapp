<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Cliente extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     
     protected $table="clientes";
     
    protected $fillable = [
        'idUsuario', 'nombreEmpresaCliente', 'correoContactoCliente','encargadoEmpresaCliente','rutEmpresaCliente','rubroEmpresaCliente',
    ];
}
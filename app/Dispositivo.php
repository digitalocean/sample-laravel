<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    protected $fillable = [
        'identificacao',
        'celular',
        'chave',
        'codigo_ativacao_sms',
        'status',
        'ativar_ate',
        'permitido_ate',
        'rede_id',
    ];  
}


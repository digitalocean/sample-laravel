<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'usuario',
        'usuarios_tipos_id',
        'email',
        'celular',
        'confirma_email',
        'confirma_celular',
        'notificacoes_email',
        'notificacoes_sms',
        'senha',
        'token',
        'codigo_ativacao',
        'cpf',
        'nome',
        'sexo',
        'data_nascimento',
        'figura',
        'primeiro_acesso',
        'preferencias',
    ];  
}

    
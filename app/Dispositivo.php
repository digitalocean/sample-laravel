<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    protected $fillable = [
        'rede_id',
        'identificacao',
        'chave',
        'codigo_ativacao_sms',
    ];  
}
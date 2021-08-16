<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class UsuarioTipo extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'figura',
    ];  
}

    
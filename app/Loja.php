<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Loja extends Model
{
    protected $fillable = [
        '_id', 'ibm', 'cnpj', 'dtUltPost', 'nome', 'razao', 'verApp', 'verAut'
    ];
   
}
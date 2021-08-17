<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Rede extends Model
{
    protected $fillable = [
        '_id', 'ibm', 'cnpj', 'dtUltPost', 'nome', 'razao', 'verApp', 'verAut'
    ];

    public function lojas(){
        return $this->hasMany('App\Loja', 'loja_id');
    }

}




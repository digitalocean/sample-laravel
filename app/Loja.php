<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Loja extends Model
{
    protected $fillable = [
        '_id', 'ibm', 'cnpj', 'dtUltPost', 'nome', 'razao', 'verApp', 'verAut'
    ];

    public function rede(){
        return $this->belongsTo('App\Rede', 'rede_id');
    }

    public function monitores(){
        return $this->hasMany('App\Monitor', 'monitor_id');
    }    
   
}
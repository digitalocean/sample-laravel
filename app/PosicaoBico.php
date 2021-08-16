<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class PosicaoBico extends Model
{
    protected $fillable = [
        '_id', 'hex', 'ibm', 'dtHr', 'encL', 'lmc', 'pen', 'ppl', 'pplC', 'pplS', 'st', 'val', 'vol'
    ];  
}
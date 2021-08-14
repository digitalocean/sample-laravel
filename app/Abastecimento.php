<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Abastecimento extends Model
{
    protected $fillable = [
        'id', 'oid', 'ibm', 'chv', 'dtHr', 'enc', 'hex', 'lmc', 'ori', 'ppl', 'val', 'ven', 'vol'
    ];
}
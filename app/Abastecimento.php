<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Abastecimento extends Model
{
    protected $fillable = [
        'id', '_id', 'ibm', 'chv', 'dtHr', 'enc', 'hex', 'lmc', 'ori', 'ppl', 'val', 'ven', 'vol'
    ];
 
}

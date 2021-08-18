<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Abastecimento extends Model
{
    protected $fillable = [
        'id', '_id', 'ibm', 'chv', 'dtHr', 'enc', 'hex', 'lmc', 'ori', 'ppl', 'val', 'ven', 'vol','baixado_at'
    ];

    public static function baixar($id)
    {
        
        $affected = DB::update(
            'UPDATE abastecimentos SET baixado_at=NOW() WHERE id=?;',
            [$id]
        );

        if ( $affected==1 ){
            return ['result'=>'success','errorCode'=>'0000', 'message'=>"Abastecimento [$id] baixado"];
        }else{
            return ['result'=>'danger','errorCode'=>'4101', 'message'=>"ERRO: abastecimento [$id] não baixado"];
        }
        
    }
 
}


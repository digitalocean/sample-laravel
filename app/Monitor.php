<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Monitor extends Model
{
    protected $fillable = [
        'id', '_id', 'ibm', 'chv', 'dtHr', 'enc', 'hex', 'lmc', 'ori', 'ppl', 'val', 'ven', 'vol','baixado_at'
    ];

    public static function baixar($id)
    {
        
        $affected = DB::update(
            'UPDATE monitors SET baixado_at=NOW() WHERE id=?;',
            [$id]
        );

        if ( $affected==1 ){
            return ['status'=>'success','errorCode'=>'0000', 'message'=>"Monitor [$id] baixado"];
        }else{
            return ['status'=>'danger','errorCode'=>'4101', 'message'=>"ERRO: monitor [$id] não baixado"];
        }
        
    }

 
}

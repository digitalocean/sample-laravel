<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Dispositivo extends Model
{
    protected $fillable = [
        'identificacao',
        'celular',
        'chave',
        'codigo_ativacao_sms',
        'status',
        'ativar_ate',
        'permitido_ate',
        'rede_id',
    ];  

    public static function ativo($id)
    {
        
        $affected = DB::update(
            "SELECT * FROM dispositivos WHERE dispositivo_id=? AND status='ativo' AND permitido_ate>now()",
            [$id]
        );

        if ( $affected==1 ){
            return ['result'=>'success','errorCode'=>'0000', 'message'=>"Dispositivo [$id] ativo"];
        }else{
            return ['result'=>'danger','errorCode'=>'4103', 'message'=>"ERRO: dispositivo [$id] inativo"];
        }
        
    }

    public static function ativacao($id, $dados)
    {
        if (!isset($dados['chave'])){
            return ['result'=>'danger','errorCode'=>'4107', 'message'=>"ERRO: parâmetro [chave] não informado."];
            exit;
        }
        
        $affected = DB::update(
            "UPDATE dispositivos SET status='ativo' WHERE dispositivo_id=? AND chave=? AND status='preautorizado' AND ativar_ate>now()",
            [$id, $dados['chave']]
        );

        if ( $affected==1 ){
            return ['result'=>'success','errorCode'=>'0000', 'message'=>"Dispositivo [$id] ativado", 
            'rede'=>'Rede', 
            'identificacao'=> 'Lucas' ];
        }else{
            return ['result'=>'danger','errorCode'=>'4106', 'message'=>"ERRO: dispositivo [$id] não ativado"];
        }
        
    }    

}


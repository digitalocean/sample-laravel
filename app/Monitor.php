<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Monitor extends Model
{
    protected $fillable = [
        'id', '_id', 'ibm', 'chv', 'dtHr', 'enc', 'hex', 'lmc', 'ori', 'ppl', 'val', 'ven', 'vol','baixado_at'
    ];

    public static function login($dados)
    {
        
        $user = DB::select("SELECT 
                u.id,
                um.rede_id,
                um.token,
                u.name as nome,
                u.email,
                u.password as senha
            FROM user_monitores um
            INNER JOIN users u ON u.id=um.user_id
            WHERE um.status='ativo' AND um.permitido_ate > NOW() AND u.email=?",
            [$dados['email']]
        );

        if ( count($user)>0 ){
            if (Hash::check($dados['senha'], $user[0]->senha)) {
                header("token:{$user[0]->token}");
                return ['status'=>'success','errorCode'=>'0000', 'message'=>'Autenticação bem sucedida.'];
            }
        }

        return ['status'=>'danger','errorCode'=>'4108', 'message'=>"ERRO: falha na autenticacao."];
        
        /*
        $affected = DB::select("SELECT * FROM users where active = ?", [1])(
            'UPDATE monitors SET baixado_at=NOW() WHERE id=?;',
            [$id]
        );

        if ( $affected==1 ){
            return ['status'=>'success','errorCode'=>'0000', 'message'=>"Monitor [$id] baixado"];
        }else{
            return ['status'=>'danger','errorCode'=>'4101', 'message'=>"ERRO: monitor [$id] não baixado"];
        }
        */
        
    }



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

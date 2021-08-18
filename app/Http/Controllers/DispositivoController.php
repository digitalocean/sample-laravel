<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dispositivo;

class DispositivoController extends Controller
{

    public function __construct(){
        header('Access-Control-Allow-Origin: *');
    }

    public function baixar(Request $request, $id)
    {
        return response()->json(Dispositivo::baixar($id));
    }

    /**
     * Recupera uum conjunto de dispositivos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dispositivo = Dispositivo::all();
        if (  gettype($dispositivo) != 'string' ){
            return response()->json(['status'=>'success','errorCode'=>'0000', 'messge'=>'Dispositivos encontrados.', 'dispositivos'=>$dispositivo]);
        }else{
            return response()->json(['status'=>'danger','errorCode'=>'4102', 'message'=>$dispositivo]);
        }
    }

    /**
     * Cria um novo registro de dispositivo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $dispositivo = Dispositivo::create($dados);
        
        if($dispositivo){
            return response()->json(['data'=>$dispositivo, 'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao criar o dispositivo', 'status'=>false]);
        }
    }

    /**
     * Recupera um registro de dispositivo.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dispositivo = Dispositivo::find($id);
        if (  $dispositivo ){
            return response()->json(['status'=>'success','errorCode'=>'0000', 'messge'=>"Dispositivo [$id]  encontrado.", 'dispositivo'=>$dispositivo]);
        }else{
            return response()->json(['status'=>'danger','errorCode'=>'4102', 'message'=>"ERRO: dispositivo [$id] não encotrado."]);
        }
    }

    /**
     * Altera um registro de dispositivo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dados = $request->all();
        $dispositivo = Dispositivo::find($id);
        if($dispositivo){
            $dispositivo->update($dados);
            return response()->json(['data'=>$dispositivo, 'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao editar o dispositivo', 'status'=>false]);
        }
    }

    /**
     * Exclui um registro de dispositivo.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dispositivo = Dispositivo::find($id);
        if($dispositivo){
            $dispositivo->delete();
            return response()->json(['data'=>'Dispositivo removido com sucesso!', 'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao remover o dispositivo', 'status'=>false]);
        }
    }
}
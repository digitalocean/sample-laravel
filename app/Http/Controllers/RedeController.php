<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rede;

class RedeController extends Controller
{

    public function __construct(){
        header('Access-Control-Allow-Origin: *');
    }

    /**
     * Recupera uum conjunto de redes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rede = Rede::all();
        return response()->json(['data'=>$rede, 'status'=>true]);
    }

    /**
     * Cria um novo registro de rede.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $rede = Rede::create($dados);
        if($rede){
            return response()->json(['data'=>$rede, 'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao criar a rede', 'status'=>false]);
        }
    }

    /**
     * Recupera um registro de rede.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rede = Rede::find($id);
        if($rede){
            return response()->json(['data'=>$rede, 'status'=>true]);
        }else{
            return response()->json(['data'=>'Não existe esta rede cadastrada', 'status'=>false]);
        }
    }

    /**
     * Altera um registro de rede.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dados = $request->all();
        $rede = Rede::find($id);
        if($rede){
            $rede->update($dados);
            return response()->json(['data'=>$rede, 'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao editar a rede', 'status'=>false]);
        }
    }

    /**
     * Exclui um registro de rede.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rede = Rede::find($id);
        if($rede){
            $rede->delete();
            return response()->json(['data'=>'Rede removida com sucesso!', 'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao remover a rede', 'status'=>false]);
        }
    }
}
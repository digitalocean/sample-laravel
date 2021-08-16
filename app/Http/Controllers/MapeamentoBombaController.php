<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MapeamentoBomba;

class MapeamentoBombaController extends Controller
{

    public function __construct(){
        header('Access-Control-Allow-Origin: *');
    }

    /**
     * Recupera uum conjunto de mapeamentoBombas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapeamentoBomba = MapeamentoBomba::all();
        return response()->json(['data'=>$mapeamentoBomba, 'status'=>true]);
    }

    /**
     * Cria um novo registro de mapeamentoBomba.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $mapeamentoBomba = MapeamentoBomba::create($dados);
        if($mapeamentoBomba){
            return response()->json(['data'=>$mapeamentoBomba, 'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao criar o mapeamento de bomba', 'status'=>false]);
        }
    }

    /**
     * Recupera um registro de mapeamentoBomba.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mapeamentoBomba = MapeamentoBomba::find($id);
        if($mapeamentoBomba){
            return response()->json(['data'=>$mapeamentoBomba, 'status'=>true]);
        }else{
            return response()->json(['data'=>'Não existe este mapeamento de bomba cadastrado', 'status'=>false]);
        }
    }

    /**
     * Altera um registro de mapeamentoBomba.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dados = $request->all();
        $mapeamentoBomba = MapeamentoBomba::find($id);
        if($mapeamentoBomba){
            $mapeamentoBomba->update($dados);
            return response()->json(['data'=>$mapeamentoBomba, 'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao editar o mapeamento de bomba', 'status'=>false]);
        }
    }

    /**
     * Exclui um registro de mapeamentoBomba.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mapeamentoBomba = MapeamentoBomba::find($id);
        if($mapeamentoBomba){
            $mapeamentoBomba->delete();
            return response()->json(['data'=>'Mapeamento de bomba removido com sucesso!', 'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao remover o mapeamento de bomba', 'status'=>false]);
        }
    }
}
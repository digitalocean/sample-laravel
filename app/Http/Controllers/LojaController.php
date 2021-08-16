<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loja;

class LojaController extends Controller
{

    public function __construct(){
        header('Access-Control-Allow-Origin: *');
    }

    /**
     * Recupera uum conjunto de lojas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loja = Loja::all();
        return response()->json(['data'=>$loja, 'status'=>true]);
    }

    /**
     * Cria um novo registro de loja.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $loja = Loja::create($dados);
        if($loja){
            return response()->json(['data'=>$loja, 'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao criar a loja', 'status'=>false]);
        }
    }

    /**
     * Recupera um registro de loja.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loja = Loja::find($id);
        if($loja){
            return response()->json(['data'=>$loja, 'status'=>true]);
        }else{
            return response()->json(['data'=>'Não existe esta loja cadastrada', 'status'=>false]);
        }
    }

    /**
     * Altera um registro de loja.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dados = $request->all();
        $loja = Loja::find($id);
        if($loja){
            $loja->update($dados);
            return response()->json(['data'=>$loja, 'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao editar a loja', 'status'=>false]);
        }
    }

    /**
     * Exclui um registro de loja.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loja = Loja::find($id);
        if($loja){
            $loja->delete();
            return response()->json(['data'=>'Loja removida com sucesso!', 'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao remover a loja', 'status'=>false]);
        }
    }
}
<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Abastecimento;

class AbastecimentoController extends Controller
{

    public function __construct(){
        header('Access-Control-Allow-Origin: *');
    }

    /**
     * Recupera uum conjunto de abastecimentos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abastecimento = Abastecimento::all();
        return response()->json(['data'=>$abastecimento, 'status'=>true]);
    }

    /**
     * Cria um novo registro de abastecimento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $abastecimento = Abastecimento::create($dados);
        if($abastecimento){
            return response()->json(['data'=>$abastecimento, 'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao criar o abastecimento', 'status'=>false]);
        }
    }

    /**
     * Recupera um registro de abastecimento.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $abastecimento = Abastecimento::find($id);
        if($abastecimento){
            return response()->json(['data'=>$abastecimento, 'status'=>true]);
        }else{
            return response()->json(['data'=>'Não existe esse abastecimento cadastrado', 'status'=>false]);
        }
    }

    /**
     * Altera um registro de abastecimento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dados = $request->all();
        $abastecimento = Abastecimento::find($id);
        if($abastecimento){
            $abastecimento->update($dados);
            return response()->json(['data'=>$abastecimento, 'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao editar o abastecimento', 'status'=>false]);
        }
    }

    /**
     * Exclui um registro de abastecimento.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $abastecimento = Abastecimento::find($id);
        if($abastecimento){
            $abastecimento->delete();
            return response()->json(['data'=>'Abastecimento removido com sucesso!', 'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao remover o abastecimento', 'status'=>false]);
        }
    }
}
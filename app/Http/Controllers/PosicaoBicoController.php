<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PosicaoBico;

class PosicaoBicoController extends Controller
{

    public function __construct(){
        header('Access-Control-Allow-Origin: *');
    }

    /**
     * Recupera uum conjunto de posicaoBicos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posicaoBico = PosicaoBico::all();
        return response()->json(['data'=>$posicaoBico, 'status'=>true]);
    }

    /**
     * Cria um novo registro de posicaoBico.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $posicaoBico = PosicaoBico::create($dados);
        if($posicaoBico){
            return response()->json(['data'=>$posicaoBico, 'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao criar a posicaoBico', 'status'=>false]);
        }
    }

    /**
     * Recupera um registro de posicaoBico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posicaoBico = PosicaoBico::find($id);
        if($posicaoBico){
            return response()->json(['data'=>$posicaoBico, 'status'=>true]);
        }else{
            return response()->json(['data'=>'Não existe esta posicaoBico cadastrada', 'status'=>false]);
        }
    }

    /**
     * Altera um registro de posicaoBico.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dados = $request->all();
        $posicaoBico = PosicaoBico::find($id);
        if($posicaoBico){
            $posicaoBico->update($dados);
            return response()->json(['data'=>$posicaoBico, 'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao editar a posicaoBico', 'status'=>false]);
        }
    }

    /**
     * Exclui um registro de posicaoBico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posicaoBico = PosicaoBico::find($id);
        if($posicaoBico){
            $posicaoBico->delete();
            return response()->json(['data'=>'PosicaoBico removida com sucesso!', 'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao remover a posicaoBico', 'status'=>false]);
        }
    }
}
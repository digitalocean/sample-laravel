<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuarioController extends Controller
{

    public function __construct(){
        header('Access-Control-Allow-Origin: *');
    }

    /**
     * Recupera uum conjunto de usuarios.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Usuario::all();
        return response()->json(['data'=>$usuario, 'status'=>true]);
    }

    /**
     * Cria um novo registro de usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $usuario = Usuario::create($dados);
        if($usuario){
            return response()->json(['data'=>$usuario, 'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao criar o usuario', 'status'=>false]);
        }
    }

    /**
     * Recupera um registro de usuario.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::find($id);
        if($usuario){
            return response()->json(['data'=>$usuario, 'status'=>true]);
        }else{
            return response()->json(['data'=>'Não existe esta usuario cadastrado', 'status'=>false]);
        }
    }

    /**
     * Altera um registro de usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dados = $request->all();
        $usuario = Usuario::find($id);
        if($usuario){
            $usuario->update($dados);
            return response()->json(['data'=>$usuario, 'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao editar o usuario', 'status'=>false]);
        }
    }

    /**
     * Exclui um registro de usuario.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        if($usuario){
            $usuario->delete();
            return response()->json(['data'=>'Usuario removido com sucesso!', 'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao remover o usuario', 'status'=>false]);
        }
    }
}
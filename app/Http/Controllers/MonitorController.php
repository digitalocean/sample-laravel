<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Monitor;

class MonitorController extends Controller
{

    public function __construct(){
        header('Access-Control-Allow-Origin: *');
    }

    /*
    public function login(Request $request, $id)
    {
        return response()->json([
            'status'=>'success',
            'errorCode'=>'0000', 
            'messge'=>'Monitors encontrados.', 
            'token'=> ]);
        
    }
    */

    public function baixar(Request $request, $id)
    {
        return response()->json(Monitor::baixar($id));
        
    }

    /**
     * Recupera uum conjunto de monitors.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monitor = Monitor::all();
        if (  gettype($monitor) != 'string' ){
            return response()->json(['status'=>'success','errorCode'=>'0000', 'messge'=>'Monitors encontrados.', 'monitors'=>$monitor]);
        }else{
            return response()->json(['status'=>'danger','errorCode'=>'4102', 'message'=>$monitor]);
        }
    }

    /**
     * Cria um novo registro de monitor.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $monitor = Monitor::create($dados);
        
        if($monitor){
            return response()->json(['data'=>$monitor, 'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao criar o monitor', 'status'=>false]);
        }
    }

    /**
     * Recupera um registro de monitor.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $monitor = Monitor::find($id);
        if (  $monitor ){
            return response()->json(['status'=>'success','errorCode'=>'0000', 'messge'=>"Monitor [$id]  encontrado.", 'monitor'=>$monitor]);
        }else{
            return response()->json(['status'=>'danger','errorCode'=>'4102', 'message'=>"ERRO: monitor [$id] não encotrado."]);
        }
    }

    /**
     * Altera um registro de monitor.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dados = $request->all();
        $monitor = Monitor::find($id);
        if($monitor){
            $monitor->update($dados);
            return response()->json(['data'=>$monitor, 'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao editar o monitor', 'status'=>false]);
        }
    }

    /**
     * Exclui um registro de monitor.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $monitor = Monitor::find($id);
        if($monitor){
            $monitor->delete();
            return response()->json(['data'=>'Monitor removido com sucesso!', 'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao remover o monitor', 'status'=>false]);
        }
    }
}
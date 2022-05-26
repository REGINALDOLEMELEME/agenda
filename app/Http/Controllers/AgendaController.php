<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Agenda;
use Auth;
use PhpParser\Node\Expr\Print_;

class AgendaController extends Controller
{
  public function index(){

      return view('welcome');

  }

  
  public function find(){

    $perfil = Auth()->user();
    

    if($perfil->access_nivel == 1){

      $result =  Agenda::all();

      return view('agend',['resultado'=>$result]);


    }else{

      $result =  Agenda::where('user_id', $perfil->id)->get();

        return view('agend',['resultado'=>$result]);

    }
  
    return view('agend');

}

  public function create(Request $request){
 
    $perfil = Auth()->user();

    $agendar = new Agenda;
    $agendar->data_evento = $request->date;
    $agendar->periodo =  $request->faixa;
    $agendar->user_id =   $perfil->id;

    try {
     
      $agendar->save();

      return redirect('/agenda/search')->with('msgInsert', 'Agendamento realizado com sucesso!');


    } catch (\Throwable $th) {
      throw $th;
    }


  }

  public function drop($id){

    
    try {
     
  
      Agenda::destroy($id);

      return redirect('/agend')->with('msgDelete', 'Agendamento cancelado com sucesso!');


    } catch (\Throwable $th) {
      throw $th;
    }

  


  }

  public function search(){

    $dataFind = request('dataFind');

    $date =  $dataFind;

 
    if($dataFind){
      
      $data = implode("/",array_reverse(explode("-",$dataFind)));       
      
      
      $agenda = Agenda::where('data_evento',  $dataFind)
                 ->get();
  

      $faixaHora = [1,2,3];
          
      foreach($agenda as $ag){

  
        $id = array_search($ag->periodo,$faixaHora);

        unset($faixaHora[$id]);

       }

    if(count($faixaHora)>0){

      return view('search',['date'=>$date,'data'=>$data,'faixaHora'=>$faixaHora]);

     }else{

      return redirect('/agenda/search')->with('msg', 'Não foram localizados horários disponíveis para o referido dia!');

     }
  

    
     
    

    }else{

    

      return view('search',['data'=>0]);


    }



   

  }

}
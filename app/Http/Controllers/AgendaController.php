<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Agenda;
use Auth;

class AgendaController extends Controller
{
  public function index(){

      return view('welcome');

  }

  public function create(Request $request){
 
    $agendar = new Agenda;
    $agendar->data_evento = $request->date;
    $agendar->periodo =  $request->faixa;
    $agendar->user_id = Auth::user()->id;

    try {
     
      $agendar->save();

      return redirect('/agenda/search')->with('msgInsert', 'Agendamento realizado com sucesso!');


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
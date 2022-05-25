<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Agenda;

class AgendaController extends Controller
{
  public function index(){

      return view('welcome');

  }

  public function create(){

    $dados = ['day'=>'01/01/2022','day2'=>'02/01/2022','day3'=>'03/01/2022','day4'=>'01/01/2022','day5'=>'02/01/2022','day6'=>'03/01/2022','day7'=>'01/01/2022','day8'=>'02/01/2022','day9'=>'03/01/2022','day10'=>'01/01/2022','day11'=>'02/01/2022','day12'=>'03/01/2022','day13'=>'01/01/2022','day14'=>'02/01/2022','day15'=>'03/01/2022','day16'=>'01/01/2022','day17'=>'02/01/2022','day18'=>'03/01/2022'];
      
    return view('agendar', ['dados'=>$dados]);

  }

  public function search(){

    $dataFind = request('dataFind');

 
    if($dataFind){
      
      $data = implode("/",array_reverse(explode("-",$dataFind)));       
      
      
      $agenda = Agenda::where('data_evento',  $dataFind)
                 ->get();

      // print($agenda);
      // return;           

      $faixaHora = [1,2,3];
          
      foreach($agenda as $ag){

  
        $id = array_search($ag->periodo,$faixaHora);

        unset($faixaHora[$id]);

       }

    if(count($faixaHora)>0){

      return view('search',['data'=>$data],['faixaHora'=>$faixaHora]);

     }else{

      return redirect('/agenda/search')->with('msg', 'Não foram localizados horários disponíveis para o referido dia!');

     }
  

    
     
    

    }else{

    

      return view('search',['data'=>0]);


    }



   

  }

}
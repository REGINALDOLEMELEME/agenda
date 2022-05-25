<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    $consultas = ['minimo'=>date('Y-m-d'), 'maximo'=>date('Y-m-d')];

    if($dataFind){
      
      $data = implode("/",array_reverse(explode("-",$dataFind)));         
      $result = ['day'=>$data];
     
      return view('search', ['data'=>$result]);

    }else{

    

      return view('search',['data'=>0]);


    }



   

  }

}
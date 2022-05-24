<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendaController extends Controller
{
  public function index(){

      return view('welcome');

  }

  public function create(){

    return view('events.agendar');

  }
}
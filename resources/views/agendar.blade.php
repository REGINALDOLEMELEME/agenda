@extends('layouts.main')

@section('title', 'Procurar Agenda')

@section('content')

<div class="container" style="margin-top:10px ;background-color:white;height:85vh">
<div class="row">  


@foreach($dados as $dt)



<div class="col-sm-3" style="margin-top: 10px;">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{$dt}}</h5>
        <a href="#" class="btn btn-primary ">MANHÃ</a>
        <a href="#" class="btn btn-secondary">TARDE</a>
        <a href="#" class="btn btn-warning disabled ">NOITE</a>
      </div>
    </div>
  </div>

  @endforeach



</div> 
</div> 
    
@endsection
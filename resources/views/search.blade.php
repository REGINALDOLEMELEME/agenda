@extends('layouts.main')

@section('title', 'Procurar Agenda')

@section('content')


<div class="container" style="margin-top:20px ;background-color:white;height:84.5vh">


<form action="/agenda/search" method="GET" >
  <div class="form-group" style="margin-left: -2px;">
  <input type="date" name="dataFind" id="campoData" required>
  <button type="submit" class="btn btn-primary" style="width: 20%;height: 58px;">PESQUISAR</button>
  </div>
 

</form>

@if($data)

@foreach($data as $dt)


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
@endif
</div>



    
@endsection
@extends('layouts.main')

@section('title', 'Meus Agendamentos')

@section('content')


<div class="container" style="margin-top:20px ;background-color:white;min-height: 84.5vh">

@if(session('msgDelete'))

<div class="espace">
<p class="msgDelete">{{session('msgDelete')}}</p>
</div>

@endif

@if(session('msgInsert'))

<div class="espace">
<p class="msgInsert" >{{session('msgInsert')}}</p>
</div>

@endif

@if(count($resultado)>0)

  <table class="table" style="width: 800px;font-size:20px">
  <thead>
    <tr>
      <th scope="col">Data do Evento</th>
      <th scope="col" >Periodo</th>
      <th scope="col" >Agendado por</th>
      <th scope="col" >Deletar</th>
   
    </tr>
  </thead>

  @foreach($resultado as $r)

  <tbody>
    <tr>
      <th scope="row">{{date('d/m/Y', strtotime($r->data_evento))}}</th>

      @if($r->periodo ==1)

      <td>Manhã</td>

      @endif

      @if($r->periodo ==2)

      <td>Tarde</td>

      @endif

      @if($r->periodo ==3)

      <td>Noite</td>

      @endif

      <td>{{$r->name}}</td>

      @csrf
      <td><a href="/agend/{{$r->id}}" ><img src="/img/delete.png" alt="delete" class="img_delete"></a></td>

      
   
    </tr>



  @endforeach


  </table>

@endif

@if(count($resultado)==0)
<div style="padding-top: 20px;">
<p class="msg" style="margin-top: 20px;">Não Há agendamentos realizados!</p>

</div>


@endif
        


</div>



    
@endsection
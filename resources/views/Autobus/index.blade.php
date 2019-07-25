@extends('layout')
@section('content')

<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista de Autobuses</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('Autobus.create') }}" class="btn btn-info" >Añadir Autobus</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Id</th>
                <th>numero</th>
                 <th>tipo</th>
                 <th>capacidad</th>
                  <th>chofer</th>
                 <th>Hora</th>
                 <th>fecha</th>
                 <th>Editar</th>
               <th>Eliminar</th>
                 </thead>
             <tbody>
              @if($Autobuses->count())  
              @foreach($Autobuses as $Chofer)  
              <tr>
              	 <td>{{$Chofer->id}}</td>
                <td>{{$Chofer->number}}</td>
                <td>{{$Chofer->type}}</td>
                <td>{{$Chofer->size}}</td>
                <td>{{$Chofer->name}}</td>
                <td>{{$Chofer->hLeave}}</td>
                <td>{{$Chofer->dateLeave}}</td>
                
              
           <td><a class="btn btn-primary btn-xs" href="{{action('AutobusController@edit', $Chofer->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('AutobusController@destroy', $Chofer->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
      {{ $Autobuses->links() }}
    </div>
  </div>
</section>


@endsection
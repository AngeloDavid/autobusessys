@extends('layout')
@section('content')
<div class="row">
 <section class="content">
  <div class="col-md-8 col-md-offset-2">
   @if (count($errors) > 0)
   <div class="alert alert-danger">
    <strong>Error!</strong> Revise los campos obligatorios.<br><br>
    <ul>
     @foreach ($errors->all() as $error)
     <li>{{ $error }}</li>
     @endforeach
    </ul>
   </div>
   @endif
   @if(Session::has('success'))
   <div class="alert alert-info">
    {{Session::get('success')}}
   </div>
   @endif

   <div class="panel panel-default">
    <div class="panel-heading">
    <center> <h3 class="panel-title">Nuevo Bus</h3></center> 
    </div>
    <div class="panel-body">     
     <div class="table-container">
      <form method="POST" action="{{ url($url) }}"  role="form">
       {{ csrf_field() }}


       @if (!$isnew)
       {{ method_field('PUT')}}
       @endif
       <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
         <div class="form-group">
          <input type="text" name="number" id="number" value="{{ old('number',$autobus->number)}}" class="form-control input-sm" placeholder="Numero de unidad">
         </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
         <div class="form-group">
          <input type="text" name="type" id="type" value="{{ old('type',$autobus->type)}}" class="form-control input-sm" placeholder="Tipo">
         </div>
        </div>
      </div>
        <div class="row">
        <div class="col-xs-2 col-sm-2 col-md-2">
         <div class="form-group">
          <input type="number" name="size" id="size" value="{{ old('size',$autobus->size)}}" class="form-control input-sm" placeholder="Capacidad">
         </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
         <div class="form-group">
          <input type="time" name="hLeave" id="hLeave" value="{{ old('hLeave',$autobus->hLeave)}}" class="form-control input-sm" placeholder="hora de salidad">
         </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
         <div class="form-group">
          <input type="date" name="dateLeave" id="dateLeave" value="{{ old('dateLeave', $autobus->dateLeave)}}" class="form-control input-sm" placeholder="fecha">
         </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
         <div class="form-group"> 
          <select class="form-control" name="id_chofer" id="id_chofer">
            <option value="" disabled > Seleccione el Chofer</option>
            @foreach($chofers as $chofer)
            @if( $chofer->id  == $autobus->id_chofer)
              <option value ="{{$chofer->id}}" selected> {{$chofer->name}} 
            </option>  
            @else
            <option value ="{{$chofer->id}}"> {{$chofer->name}} 
            </option>
            @endif
            @endforeach
          </select>         
         </div>
        </div>
      </div>
       <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
         <input type="submit"  value="Guardar" class="btn btn-success btn-block">
         <a href="{{ route('Autobus.index') }}" class="btn btn-info btn-block" >Atrás</a>
        </div> 

       </div>
      </form>
     </div>
    </div>

   </div>
  </div>
 </section>
@endsection
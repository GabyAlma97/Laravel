@extends('layouts.app')
@section('content')
<div class= "container">
<div class="card-header">Formulario de Editar Elemento</div>
 <div class="card-body">
 <form method="POST" action="{{url('home/'. $datos->id)}}" enctype="multipart/form-data">
        {{ @csrf_field()}}
       {{@method_field('Put') }}
        <input
            type="text"
            name="title"
            placeholder="title"
            class="form-control mb-2"
            value="{{$datos->title}}"
        />
         <input
            type="text"
            name="description"
            placeholder="description"
            class="form-control mb-2"
            value="{{$datos->description}}"
        />
        <select class="form-control" name="status"  value="{{$datos->status}}}" >
                <option selected="">status </option>
                <option value="to do">to do</option>
                <option value="in progress">in progress</option>
                <option value="done">done</option>
        </select>
        
        <select class="form-control" name="priority" style="margin-top: 10px;" >
                <option selected="" value="{{$datos->priority}}">priority</option>
                <option value="low">low</option>
                <option value="medium">mediuml</option>
                <option value="high">high</option>
        </select>
      
        <button class="btn btn-primary btn-block" type="submit" style="margin-top: 10px;">Actualizar</button>
        <br>
        </form>     

 </div>

</div>
@endsection

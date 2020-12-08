@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
     
        <div class="col-md-8">
        <a href="{{ url('/home/show/') }}">
                <button type="button" class="btn btn-secondary"  >Agregar Nuevo Registro +</button>
        </a>
        <br><br>
            @foreach ($ds as $item)
                <div class="card mb-3">
                    <div class="card-header">Fecha de Creacion: {{$item->fecha->format('d M Y')}}</div>

                    <div class="card-body">
                     <h4>Tarea</h4>
                        <h5>ID:  {{$item->id}}</h5>
                        <h5>title :  {{$item->title}}</h5>
                        <h5>Status :{{$item->status}}</h5>
                        <h5>priority :{{$item->priority}}</h5>
                        <h5>Usuario responsable: {{$item->responsable_id}}</h5>
                        <h5>Creador de la tarea: {{$item->created_by_id}}</h5>
                        <div>
                          <a href="{{ url('home/'. $item->id .'/edit/') }}">
                                <button  class="btn  btn-success btn-sm">Editar</button>
                          </a>
                          <a href="{{ url('home/'. $item->id .'/bar/') }}">
                                <button  class="btn  btn-primary btn-sm">Detalle</button>
                          </a>
                          
                          <form action="{{ url('home/'. $item->id) }}" class="d-inline" method="POST">
                                   {{ @csrf_field()}}
                                   {{@method_field('DELETE') }}
                                    
                                    <button type="submit"  class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                </form> 
                                                        
                        </div>
                    </div>
                </div>
            @endforeach

            
        </div>
    </div>
</div>      
@endsection

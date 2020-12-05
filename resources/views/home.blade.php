@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card mb-3">
         <div class="card-header">Formulario de Registro</div>
            <form method="POST" action="{{url('home')}}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
        <input
            type="text"
            name="title"
            placeholder="title"
            class="form-control mb-2"
        />
         <input
            type="text"
            name="description"
            placeholder="description"
            class="form-control mb-2"
        />
        <select class="form-control" name="status"   >
                <option selected="">status </option>
                <option value="to do">to do</option>
                <option value="in progress">in progress</option>
                <option value="done">done</option>
        </select>
        
        <select class="form-control" name="priority" style="margin-top: 10px;">
                <option selected="">priority</option>
                <option value="low">low</option>
                <option value="medium">mediuml</option>
                <option value="high">high</option>
        </select>
      
        <button class="btn btn-primary btn-block" type="submit" style="margin-top: 10px;">Agregar</button>
        <br>
        </div>  
        </div>
        </form>  
         




            @foreach ($ds as $item)
                <div class="card mb-3">
                    <div class="card-header">{{$item->fecha->format('d M Y')}}</div>

                    <div class="card-body">
                        <h4>{{$item->id}}</h4>
                        <h3>{{$item->title}}</h5>
                        <h5>{{$item->status}}</h5>
                        <h5>{{$item->priority}}</h5>
                        <div>
                          <a href="{{ url('home/'. $item->id .'/edit/') }}">
                                <button  class="btn  btn-success btn-sm">Editar</button>
                          </a>
                          <a href="{{ url('home/'. $item->id .'/create/') }}">
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

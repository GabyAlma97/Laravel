@extends('layouts.app')
@section('content')
 <div class="container">
   <div class="card mb-3">
         <div class="card-header">Formulario de Registro</div>
         @if (session('mensaje'))
         <br> 
         <div class="container ">
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
         </div>

        @endif

        <form method="POST" action="{{url('home')}}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
        <label>title:</label>
        <input
            type="text"
            name="title"
            class="form-control mb-2  @error('title') is-invalid @enderror"
            value ="{{old('title')}}"
        />
         @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
         @enderror
         <label>description:</label>
         <input
           value ="{{old('description')}}"
            type="text"
            name="description"
            class="form-control mb-2 @error('description') is-invalid @enderror"
        />
         @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
         @enderror
         <label>status:</label>
        <select class="form-control @error('status') is-invalid @enderror" 
        name="status" 
        value ="{{old('status')}}"  >
                <option selected=""></option>
                <option value="to do">to do</option>
                <option value="in progress">in progress</option>
                <option value="done">done</option>
        </select>
         @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
         @enderror
        <label>priority:</label>
        <select class="form-control @error('priority') is-invalid @enderror" name="priority" 
        value ="{{old('priority')}}" >
                <option selected=""></option>
                <option value="low">low</option>
                <option value="medium">mediuml</option>
                <option value="high">high</option>
        </select>
          @error('priority')
                <div class="alert alert-danger">{{ $message }}</div>
         @enderror
        <button class="btn btn-primary btn-block" type="submit" style="margin-top: 10px;">Agregar</button>
        <br>
        </div>
         
        </div>
        </form>  
       
         
 </div>
@endsection
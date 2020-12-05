<form method="post" action="{{url('Datos')}}" enctype="multipart/form-data">
{{csrf_field()}}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <label for="title">{{'title'}}</label>
    <input type="text" name="title" id="title"  ></input>
    <br>
     <label for="description">{{'description'}}</label>
    <input type="text" name="description" id="description" ></input>
    <br>
    <label for="status">{{'status'}}</label>
    <select   name="status">
            <option   >{{'Seleccione'}}</option>
            <option   >{{'to do'}}</option>
            <option   >{{'in progress'}}</option>
            <option   >{{'done'}}</option>
     </select>
     <br>
     <label for="priority">{{'priority'}}</label>
     <select name="priority">
            <option >{{'Seleccione'}}</option>
            <option   >{{'low'}}</option>
            <option  >{{'medium'}}</option>
            <option   >{{'high'}}</option>
            </select>

    <button type="submit"  value="Agregar">Enviar formulario</button>
</form>
<form method="post" action="{{ url('/Datos')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <label for="title">{{'title'}}</label>
    <input type="text" name="title" id="title" value="title" ></input>
    <input class="submit"  value="Agregar">

</form>
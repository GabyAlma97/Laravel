<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\tasks;
use Illuminate\Http\Request;
use Carbon\Carbon;


class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $datos['ds']=tasks::all();
        return view('home', $datos);
    }
    public function bar($id)
    {
        return view('Datos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Datos.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request() ->validate(
        [ 'title' => 'required',
          'description' => 'required',
          'status' => 'required',
          'priority' => 'required',
            ]);
            
            $tasks = new  tasks();
            $tasks->title = $request->title;
            $tasks->description = $request->description;
            $tasks->status= $request->status;
            $tasks->priority= $request->priority;
            $tasks->fecha = Carbon::now();
            $tasks->responsable_id = auth()->id();
            $tasks->created_by_id = auth()->id();
            $tasks->save();
            return redirect('/home');    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('Datos.from');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $datos= tasks::findOrFail($id);
        return view('Datos.edit',compact('datos'));
      
    }
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request() ->validate(
            [ 'title' => 'required',
              'description' => 'required',
              'status' => 'required',
              'priority' => 'required',
                ]);
        $datos= tasks::findOrFail($id);
        $datos->title = $request->title;
        $datos->description = $request->description;
        $datos->status= $request->status;
        $datos->priority= $request->priority;
        $datos->fecha = Carbon::now();
        $datos->responsable_id = 1;
        $datos->created_by_id =1;
        $datos->save();
        return redirect('/home'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tasks::destroy($id);
    
        return back()->with('mensaje', 'Nota Eliminada');
    }

}

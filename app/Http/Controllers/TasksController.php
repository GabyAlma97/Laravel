<?php

namespace App\Http\Controllers;

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
        $tasks = new  tasks();
            $tasks->title = $request->title;
            $tasks->description = $request->description;
            $tasks->status= $request->status;
            $tasks->priority= $request->priority;
            $tasks->fecha = Carbon::now();
            $tasks->responsable_id = 1;
            $tasks->created_by_id = 1;
            $tasks->save();
             return back()->with('mensaje', 'Nota agregada');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show(tasks $tasks)
    {
        $tasks = new  tasks();
            $tasks->title = "Mi primer libro";
            $tasks->description = "Extracto de mi primer libro";
            $tasks->status= "<p>Resumen de mi primer libro</p>";
            $tasks->priority= "<p>Resumen de mi primer libro</p>";
            $tasks->fecha = Carbon::now();
            $tasks->responsable_id = 1;
            $tasks->created_by_id = 1;
            $tasks->save();
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
        $datos= tasks::findOrFail($id);
        $datos->title = $request->title;
        $datos->description = $request->description;
        $datos->status= $request->status;
        $datos->priority= $request->priority;
        $datos->fecha = Carbon::now();
        $datos->responsable_id = 1;
        $datos->created_by_id = 1;
        $datos->save();
        return back()->with('mensaje', 'Nota agregada');
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

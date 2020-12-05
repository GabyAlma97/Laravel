<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\User;
use App\Models\tasks;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        tasks::truncate(); 
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tasks;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tasks::orderBy('created_at', 'DESC')->get();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $newTasks = new Tasks;
        $newTasks-> user_id = $request-> user_id ["user_id"];
        $newTasks->  task = $request-> task ["task"];
        $newTasks-> save();

        return $newTasks;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existingTask = Tasks::find( $id );

        if($existingTask) {
            $existingTask-> completed = $request-> completed ["completed"] ? true : false;

            $existingTask-> save();

            return $existingTask;
        }

        return "Task not found :(";
    }

    /**
     * Update content task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateContentTask(Request $request, $id)
    {
        $existingContentTask = Tasks::find($id);
        if($existingContentTask) {
            $existingContentTask->  task = $request-> task ["task"];

            $existingContentTask-> save();

            return $existingContentTask;
        }

        return "Task not found :(";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingTask = Tasks::find( $id );

        if($existingTask){
            $existingTask -> delete();

            return "Task deleted successfully";
        }

        return "Task not found :(";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tasksById($user_id)
    { 
        $existingTask = Tasks::where('user_id',$user_id)->get();
         return $existingTask;
    }

}

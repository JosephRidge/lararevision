<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{


    /**
     * -> CreateNewTask
     * -> create a new task and pass in the 'title',
        'description', 
        'title ', 
        'authorName',
        'asignedTo'
     *  -> return response with tasks to the user or consumer of the application
     */
    public function createNewTask(Request $request){

        //validate 
        $request -> validate(
            [
                'title ', 
                'description', 
                'authorName',
                'asignedTo'  
            ]
        );
        // create a new instance of the task model 
        $task = Task::create(
            [
                'title'=> $request->title,
                'description'=>$request->description,
                'authorName'=>$request -> authorName,
                'assignedTo'=>$request-> assignedTo
            ]
        );

        // create tasks and retreive it from database
        $task = Task::find($task->id);
        // return response to user
        return response(
            [
                'message'=>'sucesss',
                'clientMessage'=>'Task *'. $task->title.' * Successfully created',
                'task'=>$task
            ]
        );

    }
}

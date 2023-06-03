<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyTasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mytasks');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function showwaiting()
     {
         $user_id = Auth::id();
         $tasks_waiting = Tasks::query()
             ->select('tasks.id as idtsk', 'users.nom as nomuser', 'users.prenom as prenuser', 'projects.title as projname', 'tasks.desc_task as desctsk', 'tasks.status as etatsk', 'tasks.date_start as tskstart', 'tasks.date_end as tsksend', 'tasks.property as importsk','tasks.created_at as data_now')
             ->where('tasks.is_delete', '=', '0')
             ->where('tasks.id_user', $user_id)
             ->where('tasks.status', '=', 'en cours')
             ->join('users', 'tasks.id_user', '=', 'users.id')
             ->join('projects', 'tasks.id_projet', '=', 'projects.id')
             ->orderBy('tasks.created_at', 'desc')
             ->get();

         return response()->json([
             'tasks_waiting' => $tasks_waiting,
         ]);
     }


    public function showdones()
    {

        $user_id = Auth::id();
        $tasks_done = Tasks::query()
             ->select('tasks.id as idtsk', 'users.nom as nomuser', 'users.prenom as prenuser', 'projects.title as projname', 'tasks.desc_task as desctsk', 'tasks.status as etatsk', 'tasks.date_start as tskstart', 'tasks.date_end as tsksend', 'tasks.property as importsk')
             ->where('tasks.is_delete', '=', '0')
             ->where('tasks.id_user', $user_id)
             ->where('tasks.status', '=', 'terminé')
             ->join('users', 'tasks.id_user', '=', 'users.id')
             ->join('projects', 'tasks.id_projet', '=', 'projects.id')
             ->orderBy('tasks.date_start', 'asc')
             ->get();
        return response()->json([
            'done_tasks' => $tasks_done,

        ]);
    }
    public function updateTasks2(Request $request)
    {
    $taskIds = $request->input('task_ids');

    // Update the tasks in the database
    DB::table('tasks')
        ->whereIn('id', $taskIds)
        ->update(['status' => 'terminé']);

    return response()->json(['message' => 'Les tâches est accomplie']);
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

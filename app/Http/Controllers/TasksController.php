<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('is_deleted', '=', '0')
        ->get(['id as idcli', 'nom as nameuser', 'prenom as lnameusr']);
        $tasks = Project::where('isDeleted', '=', '0')
        ->get(['id as idpro', 'title as nompro']);
        return view('tasks',['users'=>$users,'project'=>$tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $isValid = Validator::make($request->all(), [
            'desc_tsk' =>'required|max:600|min:2',
            'user_tsk' => 'required|not_in:0',
            'project_tsk' => 'required|not_in:0',
            'startdate_task' =>'required|date',
            'task_status' => 'required|in:terminé,annulé,en cours,pas commencé',
            'task_import' => 'required|in:urgent,normal,pas important',

        ]);
        if($isValid->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$isValid->messages()
            ]);
        }
        else{
            $tasks = new Tasks;
            $tasks->desc_task = $request->input('desc_tsk');
            $tasks->id_user = $request->user_tsk;
            $tasks->id_projet = $request->project_tsk;
            $tasks->date_start = $request->input('startdate_task');
            $tasks->date_end = $request->input('endate_tastk');
            $tasks->status = $request->task_status;
            $tasks->property = $request->task_import;

            $tasks->save();
            return response()->json([
                'status'=>200,
                'message'=>'La Tȃche a été ajouté avec succés !'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function showtasks()
    {
        $tasks = Tasks::where('is_delete', '=', '0')
        ->join('users', 'tasks.id_user', '=', 'users.id')
        ->join('projects', 'tasks.id_projet', '=', 'projects.id')
        ->select('tasks.id as idtsk', 'users.nom as nomuser','users.prenom as prenuser', 'projects.title as projname', 'projects.title as pname', 'tasks.desc_task as desctsk', 'tasks.status as etatsk', 'tasks.date_start as tskstart', 'tasks.date_end as tsksend', 'tasks.property as importsk')
        ->orderBy('tasks.date_start', 'asc') // Order by date_start column in ascending order
        ->get();
        $taskCountimport = Tasks::where('is_delete', 0)
                            ->where('property', 'urgent')
                            ->count();

        $done_tsk = Tasks::where('is_delete', 0)
                           ->where('status', 'terminé')
                           ->count();
        $waiting_tsk = Tasks::where('is_delete', 0)
                        ->where('status', 'en cours')
                        ->count();
        $notyet_tsk = Tasks::where('is_delete', 0)
                        ->where('status', 'pas commencé')
                        ->count();

    return response()->json([
        'all_tasks' => $tasks,
        'counts_import' => $taskCountimport,
        'done_tsk' => $done_tsk,
        'wait_tsk' => $waiting_tsk,
        'notyet_tsk' => $notyet_tsk,

    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit($id_tasks)
    {
        $tasks = Tasks::select('id as id_tsk', 'desc_task as desc_t', 'status as etat_tsk','date_start as date_one','date_end as date_fin','property as import_ts','id_user as who_is','id_projet as who_proj')
                        ->find($id_tasks);
        if($tasks){
          return response()->json([
            'status'=>200,
            'tasks'=>$tasks,
        ]);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'Tȃche non trouvé !',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_task)
    {
        $isValid = Validator::make($request->all(), [
            'desc_tsk' =>'required|max:600|min:2',
            'user_tsk' => 'required|not_in:0',
            'project_tsk' => 'required|not_in:0',
            'startdate_task' =>'required|date',
            'task_status' => 'required|in:terminé,annulé,en cours,pas commencé',
            'task_import' => 'required|in:urgent,normal,pas important',

        ]);
        if($isValid->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$isValid->messages()
            ]);
        }
        else{
            $tasks = Tasks::find($id_task);
            if($tasks){
                $tasks->desc_task = $request->input('desc_tsk');
                $tasks->id_user = $request->user_tsk;
                $tasks->id_projet = $request->project_tsk;
                $tasks->date_start = $request->input('startdate_task');
                $tasks->date_end = $request->input('endate_tastk');
                $tasks->status = $request->task_status;
                $tasks->property = $request->task_import;

                $tasks->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'La Tȃche a été modifié avec succés !'
                ]);
            }else{
                return response()->json([
                    'status'=>404,
                    'message'=>'La Tȃche non trouvé !'
                ]);
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_task)
    {
        $tasks = Tasks::find($id_task);
                if($tasks)
                {
                    $tasks->is_delete = 1;
                    $tasks->save();
                    return response()->json([
                        'status'=>200,
                        'message'=>'La Tȃche a été Supprimer avec succés !'
                    ]);
                }
                else{
                    return response()->json([
                        'status'=>404,
                        'message'=>'Tȃche non trouvé !'
                    ]);
                }
    }
}

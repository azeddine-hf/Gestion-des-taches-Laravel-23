<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Tasks;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        //todo counts
        $dones = Tasks::where('is_delete', 0)
                           ->where('id_user', $user_id)
                           ->where('status','terminé')
                           ->count();
        $waiting = Tasks::where('is_delete', 0)
                           ->where('id_user', $user_id)
                           ->where('status','en cours')
                           ->count();
        //todo les taches
        $tasks = Tasks::where('is_delete', '=', '0')
                           ->where('id_user', $user_id)
                           ->join('users', 'tasks.id_user', '=', 'users.id')
                           ->join('projects', 'tasks.id_projet', '=', 'projects.id')
                           ->select('tasks.id as idtsk', 'users.nom as nomuser','users.prenom as prenuser', 'projects.title as projname', 'projects.title as pname', 'tasks.desc_task as desctsk', 'tasks.status as etatsk', 'tasks.date_start as tskstart', 'tasks.date_end as tsksend', 'tasks.property as importsk')
                           ->orderBy('tasks.date_start', 'asc') // Order by date_start column in ascending order
                           ->get();
        //todo les projets
        $project = Project::where('isDeleted', '=', '0')
                           ->select('title as nomproj','startDate as firstdate', 'status as statut')
                           ->orderBy('startDate', 'asc') // Order by date_start column in ascending order
                           ->get();
        return view('profile',
        [
            'count_done' => $dones,
            'count_wait' => $waiting,
            'mes_taches' => $tasks,
            'All_projects' => $project,

        ]);
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

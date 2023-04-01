<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Models\Project;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::where('is_deleted', '=', '0')
        ->get(['id as idcli', 'company as entrep']);
        return view('project',['client'=>$clients]); 
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
            'nom_p' =>'required|max:60|min:2',
            'project_status' => 'required|in:terminé,annulé,en cours',
            'clients' => 'required|not_in:0',
            'start_date' =>'required|date',
        ]);
        if($isValid->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$isValid->messages()
            ]);
        }
        else{
            $projet = new Project;
            $projet->title = $request->input('nom_p');
            $projet->status = $request->project_status;
            $projet->client_id = $request->clients;
            $projet->startDate = $request->input('start_date');
            
            $projet->save();
            return response()->json([
                'status'=>200,
                'message'=>'Le Projet a été ajouté avec succés !'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function showprojetcs()
    {
        $projet = Project::where('isDeleted', '=', '0')
        ->join('clients', 'projects.client_id', '=', 'clients.id')
        ->select('projects.id as idp', 'clients.company as entrep', 'projects.startDate as date_start', 'projects.title as pname', 'projects.status as petat')
        ->get();
        $projectCount = Project::where('isDeleted', 0)->count();

        $done_p = Project::where('isDeleted', 0)
                           ->where('status', 'terminé')
                           ->count();
        $waiting_pro = Project::where('isDeleted', 0)
                        ->where('status', 'en cours')
                        ->count();
        $faild_pro = Project::where('isDeleted', 0)
                        ->where('status', 'annulé')
                        ->count();                
        
    return response()->json([
        'all_projets' => $projet,
        'counts' => $projectCount,
        'done_pro' => $done_p,
        'wait_pro' => $waiting_pro,
        'faild_proj' => $faild_pro,

    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id_proj)
    {
        $projet = Project::select('id as id_proj', 'title as nom_pro', 'status as etat_p','startDate as date_p','client_id as id_cli')->find($id_proj);
        if($projet){
          return response()->json([
            'status'=>200,
            'projets'=>$projet,
        ]);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'Projet non trouvé',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $isValid = Validator::make($request->all(), [
            'nom_p' =>'required|max:60|min:2',
            'project_status' => 'required|in:terminé,annulé,en cours',
            'clients' => 'required|not_in:0',
            'start_date' =>'required|date',
        ]);
        if($isValid->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$isValid->messages(),
            ]);
        }
        else{
            $projet = Project::find($id);
            if($projet)
            {
                $projet->title = $request->input('nom_p');
                $projet->status = $request->project_status;
                $projet->client_id = $request->clients;
                $projet->startDate = $request->input('start_date');
                $projet->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'Le projet a été modifié avec succés !'
                ]);
            }
            else{
                return response()->json([
                    'status'=>404,
                    'message'=>'Le projet non trouvé !'
                ]);
            }


    }//end else isinvalid
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projet = Project::find($id);
                if($projet)
                {
                    $projet->isDeleted = 1;
                    $projet->save();
                    return response()->json([
                        'status'=>200,
                        'message'=>'Le Projet a été Supprimer avec succés !'
                    ]);
                }
                else{
                    return response()->json([
                        'status'=>404,
                        'message'=>'Projet non trouvé !'
                    ]);
                }
    }
}

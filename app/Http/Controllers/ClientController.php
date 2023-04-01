<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client');
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
        $isValid2 = Validator::make($request->all(), [
            'nom_c' =>'required|max:60|min:2',
            'company' =>'required|max:60|min:2',
            'tel_c' => [
                'nullable',
                'digits:10',
                'regex:#^(?:(?:(?:\+|00)212[\s]?(?:[\s]?\(0\)[\s]?)?)|0){1}(?:7[\s.-]?[2-3]|6[\s.-]?[13-9]){1}[0-9]{1}(?:[\s.-]?\d{2}){3}$#'
            ],
            'email_c' =>'required|email',
            'logo' =>'required|image|max:2048|mimes:png,jpg,jpeg',
        ]);
        if($isValid2->fails()){
            return response()->json([
                'status2'=>400,
                'errors2'=>$isValid2->messages(),
            ]);
        }
        else{
            $client = new Client;
            $client->nom_client	 = $request->input('nom_c');
            $client->company = $request->input('company');
            $client->email = $request->input('email_c');
            $client->telephone = $request->input('tel_c');
            if($request->hasFile('logo')){
                $file = $request->file('logo');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('import/logoClient/', $filename);
                $client->logo = $filename;
            }
            $client->save();
            return response()->json([
                'status2'=>200,
                'message2'=>'Le Client a été ajouté avec succés !'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function showsclient()
    {
        $client = Client::where('is_deleted', '=', '0')
            ->get(['id as id_client', 'nom_client as namec', 'company as entrep', 'email as mail', 'telephone as tel', 'status as etat', 'logo as img',]);
            $countclient = Client::where('is_deleted', 0)->count();
            $countinactif = Client::where('status', 0)->count();
            $countactif = Client::where('status', 1)->count();


        return response()->json([
            'all_clients' => $client,
            'counts' => $countclient,
            'actif' => $countactif,
            'inactif' => $countinactif,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        if($client){
          return response()->json([
            'status'=>200,
            'client'=>$client,
        ]);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'Client non trouvé',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $isValid = Validator::make($request->all(), [
            'nom_c' =>'required|max:60|min:2',
            'company' =>'required|max:60|min:2',
            'tel_c' => [
                'nullable',
                'digits:10',
                'regex:#^(?:(?:(?:\+|00)212[\s]?(?:[\s]?\(0\)[\s]?)?)|0){1}(?:7[\s.-]?[2-3]|6[\s.-]?[13-9]){1}[0-9]{1}(?:[\s.-]?\d{2}){3}$#'
            ],
            'email_c' =>'required|email',
        ]);
        if($isValid->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$isValid->messages(),
            ]);
        }
        else{
            $client = Client::find($id);
            if($client)
            {
                 $client->status = $request->etat;
                 $client->nom_client = $request->input('nom_c');
                 $client->company = $request->input('company');
                 $client->email = $request->input('email_c');
                 $client->telephone = $request->input('tel_c');
                    if($request->hasFile('logo')){
                    //  $path = 'import/profileImg/'.$client->profile;
                        // if(File::exists($path)){
                        //     File::update($path);
                        // }
                    $file = $request->file('logo');
                    $extention = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extention;
                    $file->move('import/logoClient/', $filename);
                    $client->logo = $filename;
                }
                $client->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'Le client a été modifié avec succés !'
                ]);
            }
            else{
                return response()->json([
                    'status'=>404,
                    'message'=>'Le client non trouvé !'
                ]);
            }


    }//end else isinvalid

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Client::find($id);
        if($user)
        {
            $user->is_deleted = 1;
            $user->save();
            return response()->json([
                'status'=>200,
                'message'=>'Le client a été Supprimer avec succés !'
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'Le client non trouvé !'
            ]);
        }
    }
}

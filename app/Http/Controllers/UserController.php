<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('equipe', compact('user'));
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
            'nom' =>'required|max:60|min:2',
            'prenom' =>'required|max:60|min:2',
            'tel' => [
                'nullable',
                'digits:10',
                'regex:#^(?:(?:(?:\+|00)212[\s]?(?:[\s]?\(0\)[\s]?)?)|0){1}(?:7[\s.-]?[2-3]|6[\s.-]?[13-9]){1}[0-9]{1}(?:[\s.-]?\d{2}){3}$#'
            ],
            'post' =>'required|max:60|min:2',
            'email' =>'required|email',
            'pass' =>'required|max:60|min:6',
            'dateness' =>'required|date',
            'profile' =>'required|image|max:2048|mimes:png,jpg,jpeg',
        ]);
        if($isValid->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$isValid->messages()
            ]);
        }
        else{
            $user = new User;
            $user->nom = $request->input('nom');
            $user->prenom = $request->input('prenom');
            $user->email = $request->input('email');
            $user->jobTitle = $request->input('post');
            $user->telephone = $request->input('tel');
            $user->dateNaissance = $request->input('dateness');
            $user->password = Hash::make($request->input('pass'));
            if($request->hasFile('profile')){
                $file = $request->file('profile');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('import/profileImg/', $filename);
                $user->profile = $filename;
            }
            $user->save();
            return response()->json([
                'status'=>200,
                'message'=>'L\'utilisateur a été ajouté avec succés !'
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showsmember()
    {
        $user = User::all('id','nom','prenom','email','jobTitle','telephone','profile','dateNaissance');
        return response()->json([
            'all_members' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if($user){
          return response()->json([
            'status'=>200,
            'user'=>$user,
        ]);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'utilisateur non trouvé',
            ]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user_id = $request->input('user_id');
        $user = User::find($user_id);
        $user->nom = $request->input('nom');
        $user->prenom = $request->input('prenom');
        $user->email = $request->input('email');
        $user->jobTitle = $request->input('post');
        $user->telephone = $request->input('tel');
        $user->dateNaissance = $request->input('dateness');
        if($request->has('pass')) {
            $user->password = Hash::make($request->input('pass'));
        }else{
            $user->password = Hash::make($user->password);
        }
        if($request->hasFile('profile1')){
            $file = $request->file('profile1');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention ;
            $file->storeAs('import/profileImg/', $filename);
            $user->profile = $filename;
        }else{
            $user->profile =$user->profile;
        }
        $user->update();
        return redirect()->back()->with('msg','Utilisateur mis à jour avec succès !');    }

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

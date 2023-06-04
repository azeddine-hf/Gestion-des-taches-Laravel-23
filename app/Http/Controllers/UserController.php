<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

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
            'tags' =>'required',
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
            $skillsJson = $request->tags;
            $skillsArray = json_decode($skillsJson, true);

            $skillsString = '';
            if (is_array($skillsArray) && !empty($skillsArray)) {
                $skillsString = implode(',', array_column($skillsArray, 'value'));
                $user->skills = $skillsString;  // Output: skill1,skill2
            } else {
                $user->skills = '';  // Set empty string if skills array is invalid or empty
            }            $user->prenom = $request->input('prenom');
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
        $user = User::where('is_deleted', '=', '0')
            ->get(['id as idu', 'nom as nameu', 'prenom as lastnam', 'email as mail', 'jobTitle as poost', 'telephone as teel', 'profile as imgu', 'dateNaissance as daten']);
            $userCount = User::where('is_deleted', 0)->count();
            $admins = User::where('is_deleted', 0)
                               ->where('isAdmin', 1)
                               ->count();
            $usersc = User::where('is_deleted', 0)
                            ->where('isAdmin', 0)
                            ->count();

        return response()->json([
            'all_members' => $user,
            'counts' => $userCount,
            'admins' => $admins,
            'userss' => $usersc,

        ]);
    }
    public function showsmember_deleted()
    {
        $user = User::where('is_deleted', '=', '1')
            ->get(['id as idu', 'nom as nameu', 'prenom as lastnam', 'email as mail', 'jobTitle as poost', 'telephone as teel', 'profile as imgu', 'dateNaissance as daten']);
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
    public function edit($id2)
    {
        $user = User::find($id2);
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
    public function update(Request $request, $id)
{
    $isValid = Validator::make($request->all(), [
        'nom' => 'required|max:60|min:2',
        'prenom' => 'required|max:60|min:2',
        'tel' => [
            'nullable',
            'digits:10',
            'regex:#^(?:(?:(?:\+|00)212\s?)|0)(?:5|6|7)\d{8}$'
        ],
        'post' => 'required|max:60|min:2',
        'email' => 'required|email',
        'dateness' => 'required|date',
        'tags' => 'required',
    ]);

    if ($isValid->fails()) {
        return response()->json([
            'status' => 400,
            'errors' => $isValid->messages(),
        ]);
    } else {
        $user = User::find($id);
        if ($user) {
            $skillsJson = $request->tags;
            $skillsArray = json_decode($skillsJson, true);

            $skillsString = '';
            if (is_array($skillsArray) && !empty($skillsArray)) {
                $skillsString = implode(',', array_column($skillsArray, 'value'));
                $user->skills = $skillsString;  // Output: skill1,skill2
            } else {
                $user->skills = '';  // Set empty string if skills array is invalid or empty
            }
            $user->nom = $request->input('nom');
            $user->prenom = $request->input('prenom');
            $user->email = $request->input('email');
            $user->jobTitle = $request->input('post');
            $user->telephone = $request->input('tel');
            $user->dateNaissance = $request->input('dateness');

            if ($request->has('pass')) {
                $user->password = Hash::make($request->input('pass'));
            } else {
                $user->password = Hash::make($user->password);
            }

            if ($request->hasFile('profile2')) {
                $file = $request->file('profile2');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('import/profileImg/', $filename);
                $user->profile = $filename;
            }

            $user->save();

            return response()->json([
                'status' => 200,
                'message' => 'L\'utilisateur a été modifié avec succès !',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'L\'utilisateur non trouvé !',
            ]);
        }
    }
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                $user = User::find($id);
                if($user)
                {
                    $user->is_deleted = 1;
                    $user->save();
                    return response()->json([
                        'status'=>200,
                        'message'=>'L\'utilisateur a été Supprimer avec succés !'
                    ]);
                }
                else{
                    return response()->json([
                        'status'=>404,
                        'message'=>'L\'utilisateur non trouvé !'
                    ]);
                }
    }
    public function destroy_recycle($id)
    {
                $user = User::find($id);
                if($user)
                {
                    $user->is_deleted = 0;
                    $user->save();
                    return response()->json([
                        'status'=>200,
                        'message'=>'L\'utilisateur a été restaurer avec succés !'
                    ]);
                }
                else{
                    return response()->json([
                        'status'=>404,
                        'message'=>'L\'utilisateur non trouvé !'
                    ]);
                }
    }
    public function destroy_ever($id_ever)
    {
        $user = User::find($id_ever);
        if($user){
            $path = 'import/profileImg/'.$user->profile;
            if(File::exists($path)){
                File::delete($path);
            }
            $user->delete();
            return response()->json([
                'status'=> 200,
                'message' => 'L\'utilisateur a été Supprimer avec succés !',
            ]);
        }

        else
        {
            return response()->json([
                'status' => 404,
                'message'=> 'L\'utilisateur non trouvé !',
            ]);
        }
    }

}

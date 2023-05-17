<?php

namespace App\Http\Controllers;

use App\Models\ChMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function getUnseenMessages()
{
    //* unseen for all users
    $user = Auth::user();
    $messages = ChMessage::where('to_id', $user->id)
        ->where('seen', false)
        ->orderBy('ch_messages.created_at', 'desc')
        ->leftJoin('users', 'ch_messages.from_id', '=', 'users.id')
        ->select('ch_messages.from_id', 'ch_messages.seen', 'ch_messages.body as bodymsg', 'ch_messages.created_at as datenow', 'users.nom', 'users.prenom as lname', 'users.profile')
        ->get();

    $totalUnseenMessageCount = 0; // Variable to store the total count

    $contacts = $messages->unique('from_id')->map(function ($message) use (&$totalUnseenMessageCount) {
        $unseenMessageCount = ChMessage::where('to_id', Auth::user()->id)
            ->where('from_id', $message->from_id)
            ->where('seen', false)
            ->count();

        $totalUnseenMessageCount += $unseenMessageCount; // Increment the total count

        return [
            'id' => $message->from_id,
            'name' => $message->nom ?: '',
            'lname' => $message->lname ?: '',
            'datenow' => $message->datenow ?: '',
            'msg' => $message->bodymsg ?: '',
            'profile' => $message->profile ?: '',
            'unseenMessageCount' => $unseenMessageCount,
        ];
    });

    return response()->json([
        'totalUnseenMessageCount' => $totalUnseenMessageCount,
        'contacts' => $contacts,
    ]);
}






    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use Carbon\Carbon;
use App\Models\ChMessage;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    function mayFuncToDate($dateString)
            {
                $now = Carbon::now();
                $date = Carbon::parse($dateString);
                $diff = $now->diffInSeconds($date);
                $minutes = floor($diff / 60);
                $hours = floor($minutes / 60);
                $days = floor($hours / 24);
                $weeks = floor($days / 7);
        
                if ($diff < 60) {
                    return "juste maintenant";
                } elseif ($minutes < 60) {
                    return "il y a {$minutes}m";
                } elseif ($hours < 24) {
                    return "il y a {$hours}h";
                } elseif ($days < 7) {
                    return "il y a {$days}jr";
                } else {
                    return "il y a {$weeks}sm";
                }
            }
    public function index(Request $request)
    {
        
        // Set Monday as the start of the week
        $todaynow = Carbon::now()->locale('fr')->isoFormat('dddd');
        Carbon::setWeekStartsAt(Carbon::MONDAY);
        $today = Carbon::today()->toDateString();
        $startDate = Carbon::now()->startOfWeek()->toDateString();
        $endDate = Carbon::now()->endOfWeek()->toDateString();

        $loggedInUserId = $request->user()->id;
        //* translate days
        setlocale(LC_TIME, 'fr_FR');
        //! task of the week
        $tasksThisweek = Tasks::select('id_user', 'desc_task', 'status','property', 'created_at')
                                ->where('id_user', $loggedInUserId)
                                ->whereBetween('created_at', [$startDate, $endDate])
                                ->get();
        //! task count
        $tasksCountAll = Tasks::select('id_user', 'desc_task', 'status','property', 'created_at')
                                ->where('id_user', $loggedInUserId)
                                ->get();
        //!   show counts today
        $tasksCount = Tasks::where('created_at', '>=', $today)
                            ->where('id_user', $loggedInUserId)
                            ->count();
        //! show useen message from admins only
        $messages = ChMessage::where('to_id', $loggedInUserId)
                ->where('seen', false)
                ->leftJoin('users', 'ch_messages.from_id', '=', 'users.id')
                ->whereIn('users.isAdmin', [1, 2]) // Modify the condition to fetch messages from admin users (isAdmin = 1 or 2)
                ->orderBy('ch_messages.created_at', 'desc')
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
                    'msg' => $message->bodymsg ?: '',
                    'profile' => $message->profile ?: '',
                    'unseenMessageCount' => $unseenMessageCount,
                    'formattedDate' => $this->mayFuncToDate($message->datenow),

                ];
            });
            
        return view('welcome',[
            'tasksCount' => $tasksCount,
            'tasksThisWeek' => $tasksThisweek,
            'taskAll' => $tasksCountAll,
            'today' => $todaynow,
            'totalUnseenMessageCount' => $totalUnseenMessageCount,
            'contacts' => $contacts,
        ]);

    }
    

}

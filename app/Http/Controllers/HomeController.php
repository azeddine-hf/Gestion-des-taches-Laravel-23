<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use Carbon\Carbon;
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
    public function index()
    {
        $today = Carbon::today()->toDateString();
        $loggedInUserId = Auth::id();

    $Todaytasks = Tasks::select('id_user', 'desc_task')
        ->whereDate('created_at', $today)
        ->where('id_user', $loggedInUserId)
        ->get();
     return view('welcome', ['Todaytasks' => $Todaytasks]);
    }
}

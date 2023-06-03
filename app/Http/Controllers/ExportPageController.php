<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TasksExportfiltred;

class ExportPageController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('export',compact('users'));
    }
    public function showuser_table(Request $request, $user_id)
{
    $filter = $request->input('filter');

    $userbyselect = Tasks::query()
                        ->select('tasks.id', 'users.nom', 'users.prenom', 'users.email', 'users.profile', 'tasks.desc_task', 'users.jobTitle', 'tasks.status', 'tasks.property', 'tasks.created_at as data_now')
                        ->where('tasks.id_user', $user_id)
                        ->where('status', 'terminé');

    if ($filter === 'current_week') {
        $userbyselect->whereBetween('tasks.created_at', [now()->startOfWeek(), now()->endOfWeek()]);
    } elseif ($filter === 'last_week') {
        $userbyselect->whereBetween('tasks.created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
    }

    $userbyselect->join('users', 'tasks.id_user', '=', 'users.id')
                    ->orderBy('tasks.created_at', 'desc');

    $tasks = $userbyselect->get();

    return response()->json(['tasks' => $tasks]);
}



    public function exportTasks(Request $request)
    {
        $userId = $request->input('user_id');
        $filter = $request->input('filter');

        $tasks = $this->getFilteredTasks($userId, $filter);

        return Excel::download(new TasksExportfiltred($tasks), 'tasks.xlsx');
    }

    private function getFilteredTasks($userId, $filter)
    {
        // Apply the necessary filters based on $userId and $filter
        $userbyselect = Tasks::query()
            ->select('tasks.id', 'users.nom', 'users.prenom', 'users.email', 'users.profile', 'tasks.desc_task', 'users.jobTitle', 'tasks.status', 'tasks.property', 'tasks.created_at as data_now')
            ->where('tasks.id_user', $userId)
            ->where('status', 'terminé');

        if ($filter === 'current_week') {
            $userbyselect->whereBetween('tasks.created_at', [now()->startOfWeek(), now()->endOfWeek()]);
        } elseif ($filter === 'last_week') {
            $userbyselect->whereBetween('tasks.created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
        }

        $userbyselect->join('users', 'tasks.id_user', '=', 'users.id')
            ->orderBy('tasks.created_at', 'desc');

        return $userbyselect->get();
    }

}

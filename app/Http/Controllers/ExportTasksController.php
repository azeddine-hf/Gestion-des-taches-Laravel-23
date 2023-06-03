<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TasksExportExcel;
use Illuminate\Support\Facades\Auth;


class ExportTasksController extends Controller
{

public function exportExcel()
{
    $startDate = Carbon::now()->startOfWeek()->toDateString();
    $endDate = Carbon::now()->endOfWeek()->toDateString();
    $tasks = Tasks::select('id_user', 'desc_task', 'status','property', 'created_at')
        ->where('id_user', Auth::id())
        ->whereBetween('created_at', [$startDate, $endDate])
        ->get();

    $fileName = Auth::user()->nom.' '.Auth::user()->prenom. '_Tâches.xlsx';

    return Excel::download(new TasksExportExcel($tasks), $fileName);
}

}

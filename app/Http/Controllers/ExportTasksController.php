<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TasksExportExcel;


class ExportTasksController extends Controller
{
    public function exportExcel()
    {
        $startDate = Carbon::now()->startOfWeek()->toDateString();
        $endDate = Carbon::now()->endOfWeek()->toDateString();
        $tasks = Tasks::select('id_user', 'desc_task', 'status','property', 'created_at')
        ->where('id_user', auth()->user()->id)
        ->whereBetween('created_at', [$startDate, $endDate])
        ->get();

        return Excel::download(new TasksExportExcel($tasks), 'tasks.xlsx');
    }
}

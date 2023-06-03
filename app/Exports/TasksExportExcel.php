<?php

namespace App\Exports;

use App\Models\Tasks;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TasksExportExcel implements FromCollection, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection()
    {
        // Set Monday as the start of the week
        Carbon::setWeekStartsAt(Carbon::MONDAY);
        $startDate = Carbon::now()->startOfWeek()->toDateString();
        $endDate = Carbon::now()->endOfWeek()->toDateString();

        // Retrieve tasks of the week
        $tasks = Tasks::select('id', 'desc_task', 'status', 'property', 'created_at')
                        ->where('status', 'terminé')
                        ->whereBetween('created_at', [$startDate, $endDate])
                        ->get();

        return $tasks;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Description',
            'Status',
            'Property',
            'Created At',
        ];
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    public function map($row): array
    {
        return [
            $row->id,
            $row->desc_task,
            $row->status,
            $row->property,
            Carbon::parse($row->created_at)->locale('fr')->isoFormat('dddd D MMMM'),
        ];
    }
}

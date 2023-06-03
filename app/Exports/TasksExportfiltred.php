<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TasksExportfiltred implements FromCollection, WithHeadings
{
    private $tasks;

    public function __construct($tasks)
    {
        $this->tasks = $tasks;
    }

    public function collection()
    {
        return $this->tasks;
    }

    public function headings(): array
    {
        return [
            'Description',
            'Status',
            'Importance',
        ];
    }
}

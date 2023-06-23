<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class ReportExport implements FromCollection, WithHeadings
{
    protected $reportData;

    public function __construct(array $reportData)
    {
        $this->reportData = $reportData;
    }

    public function collection()
    {
        return new Collection($this->reportData);
    }

    public function headings(): array
    {
        return [
            'Диагноз',
            'Количество пациентов'
        ];
    }
}

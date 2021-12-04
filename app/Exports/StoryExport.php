<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StoryExport implements FromArray, WithHeadings
{
    protected $invoices;

    public function __construct(array $invoices)
    {
        $this->invoices = $invoices;
    }

    public function array(): array
    {
        return $this->invoices;
    }

    public function headings(): array
    {
        return [
            'id',
            'name',
            'avatar',
            'author',
            'source',
            'status',
            'total_chapter',
            'description',
            'created_at',
            'created_at',
            'folder_chapter'
        ];
    }
}

<?php

namespace App\Exports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ItemsExport implements FromCollection, WithColumnWidths, WithEvents, WithHeadings, WithMapping, WithStyles
{
    public function collection()
    {
        $query = Item::query();

        if (request()->has('collection_id')) {
            $query->where('collection_id', request()->collection_id);
        }

        if (request()->has('location_id')) {
            $query->where('location_id', request()->location_id);
        }

        return $query->get();
    }

    public function map($item): array
    {
        return [
            $item->id,
            $item->name,
            $item->description,
            $item->number,

            $item->length,
            $item->height,
            $item->width,
            $item->weight,

            $item->archeological_site,
            $item->technic,
            $item->reference,

            $item->location?->name,
            $item->subtype?->name,
            $item->collection?->name,
            $item->ethnicGroup?->name,
        ];
    }

    public function headings(): array
    {
        return [
            'ID', 'Name', 'Description', 'Number',
            'Length', 'Height', 'Width', 'Weight',
            'Archeological Site', 'Technic', 'Reference',
            'Location', 'Subtype', 'Collection', 'Ethnic Group',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:P1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size' => 12,
            ],
            'fill' => [
                'fillType' => 'solid',
                'color' => ['rgb' => '4F81BD'],
            ],
        ]);
        $sheet->getStyle('A2:P10000')->applyFromArray([
            'font' => [
                'color' => ['rgb' => 'FFFFFF'],
            ],
        ]);
        $sheet->getStyle('A:Z')->getAlignment()->setHorizontal('center');

        return [];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 8,
            'B' => 25,
            'C' => 40,
            'D' => 12,

            'E' => 10,
            'F' => 10,
            'G' => 10,
            'H' => 10,

            'I' => 20,
            'J' => 20,
            'K' => 20,

            'L' => 20,
            'M' => 20,
            'N' => 20,
            'O' => 20,
        ];
    }

    public function registerEvents(): array
    {
        return [
            \Maatwebsite\Excel\Events\AfterSheet::class => function ($event) {

                $sheet = $event->sheet->getDelegate();

                $rowCount = Item::count() + 1;

                $sheet->freezePane('A2');

                $sheet->setAutoFilter('A1:P1');

                $sheet->getStyle("A1:P{$rowCount}")
                    ->applyFromArray([
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => Border::BORDER_THIN,
                                'color' => ['rgb' => '000000'],
                            ],
                        ],
                    ]);
                $sheet->getRowDimension(1)->setRowHeight(25);
            },
        ];
    }
}

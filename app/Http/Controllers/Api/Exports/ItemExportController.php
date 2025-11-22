<?php

namespace App\Http\Controllers\Api\Exports;

use App\Exports\ItemsExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ItemExportController extends Controller
{
    public function export()
    {
        return Excel::download(new ItemsExport, 'items.xlsx');
    }
}

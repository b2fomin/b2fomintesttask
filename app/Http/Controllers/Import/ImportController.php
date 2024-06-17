<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use App\Http\Requests\Import\ImportRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportController extends Controller
{
    public function __invoke($table_name)
    {
        return view("import.import", ['table' => DB::table($table_name)->get(), 'columns' => \Schema::getColumnListing($table_name)]);
    }
}

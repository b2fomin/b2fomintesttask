<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use App\Http\Requests\Import\ImportRequest;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function __invoke($table_name)
    {
        return view("import.import", ['table_name' => $table_name]);
    }
}

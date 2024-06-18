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
        $db_columns = DB::select('SHOW COLUMNS FROM '. $table_name);
        $fields_list = array_map(function($db_column) {
            return $db_column->Field;
        }, $db_columns);
    
    // dd($fields_list);
        return view("import.import", ['table' => DB::table($table_name)->paginate(50), 'columns' => $fields_list, 'name' => $table_name]);
    }
}

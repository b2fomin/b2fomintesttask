<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke() {
        $tables_names = DB::select("SHOW TABLES");
        $tables = new \ArrayObject([]);
        foreach ($tables_names as $table_name) {
            eval('$table_name = $table_name->Tables_in_' . env('DB_DATABASE') . ';');
            $tables->append([$table_name, DB::table($table_name)->count(), count(\Schema::getColumnListing($table_name))]);
        }

        return view("import.main", ["tables"=> $tables]);
    }
}
<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use App\Http\Requests\Import\DownloadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class DownloadController extends Controller
{
    public function __invoke(DownloadRequest $request, $table_name)
    {
        $request = $request->validated();

        $request['dateFrom'] = str_replace('/', '-', $request['dateFrom']);
        if(isset($request['dateTo'])) {
        $request['dateTo'] = str_replace('/', '-', $request['dateTo']);
        }

        $request['key'] = $request['key_password'];
        unset($request['key_password']);

        $request['page'] = 1;
        while(true) {
            $response = Http::get("http://89.108.115.241:6969/api/" . $table_name, $request);
            if (!$response->ok() || (is_null($response->json()['links']['next']) && !is_null($response->json()['links']['prev'])))
            {
                break;
            }
            else {
                ++$request['page'];
                $this->put_data_in_db($response['data'], $table_name);
            }
        
        }

        $db_columns = DB::select('SHOW COLUMNS FROM '. $table_name);
        $fields_list = array_map(function($db_column) {
            return $db_column->Field;
        }, $db_columns);
    
        return view("import.import", ['table' => DB::table($table_name)->paginate(50), 'columns' => $fields_list, 'name' => $table_name]);
    }
    
    private function put_data_in_db($data, $table_name)
    {
        try {
            DB::beginTransaction();
            $table = DB::table($table_name);
            foreach($data as $row) {
                $table->updateOrInsert($row);
            }

            DB::commit();

        } catch(\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}

<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use App\Http\Requests\Import\DownloadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DownloadController extends Controller
{
    public function __invoke(DownloadRequest $request, $table_name)
    {
        $request = $request->validated();

        $request['dateFrom'] = str_replace('/', '-', $request['dateFrom']);
        $request['dateTo'] = str_replace('/', '-', $request['dateTo']);

        $request['key'] = $request['key_password'];
        unset($request['key_password']);

        $response = Http::get("http://89.108.115.241:6969/api/" . 'orders', $request);
        dd($response->json('data'));
        return view('import.import');
    }
}

<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::group(["namespace" => "App\Http\Controllers\Import", 'prefix' => 'import'], function () {
    Route::get('/', "IndexController")->name('import.main');
    Route::get('/{table_name}','ImportController')->name('import.import');
    Route::post('/{table_name}', 'DownloadController');
});


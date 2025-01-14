<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BakatController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PanduanController;
use App\Http\Controllers\PerguruanTinggiController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\ProfesiController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SurveiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VersiPertanyaanController;
use App\Models\Panduan;
use App\Models\Pertanyaan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('refresh', [AuthController::class, 'refresh']);
    Route::get('me', [AuthController::class, 'me']);
});


/**
 *
 * Route for Master Data
 */

Route::group(['middleware' => 'api', 'prefix' => 'setting'], function () {
    Route::get('/', [SettingController::class, 'index']);
    Route::post('/', [SettingController::class, 'update']);
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'sekolah'], function () {
    Route::get('', [SekolahController::class, 'index']);
    Route::post('', [SekolahController::class, 'store']);
    Route::get('{sekolah}', [SekolahController::class, 'show']);
    Route::put('{sekolah}', [SekolahController::class, 'update']);
    Route::delete('{sekolah}', [SekolahController::class, 'destroy']);
});

Route::group(['middleware' => 'api', 'prefix' => 'kelas'], function () {
    Route::get('/', [KelasController::class, 'index']);
    Route::put('/{kelas}', [KelasController::class, 'update']);
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'bakat'], function () {
    Route::get('', [BakatController::class, 'index']);
    Route::post('', [BakatController::class, 'store']);
    Route::get('{bakat}', [BakatController::class, 'show']);
    Route::post('{bakat}', [BakatController::class, 'update']);
    Route::delete('{bakat}', [BakatController::class, 'destroy']);
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'perguruan-tinggi'], function () {
    Route::get('', [PerguruanTinggiController::class, 'index']);
    Route::post('', [PerguruanTinggiController::class, 'store']);
    Route::get('{perguruanTinggi}', [PerguruanTinggiController::class, 'show']);
    Route::put('{perguruanTinggi}', [PerguruanTinggiController::class, 'update']);
    Route::delete('{perguruanTinggi}', [PerguruanTinggiController::class, 'destroy']);
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'jurusan'], function () {
    Route::get('', [JurusanController::class, 'index']);
    Route::post('', [JurusanController::class, 'store']);
    Route::get('{jurusan}', [JurusanController::class, 'show']);
    Route::put('{jurusan}', [JurusanController::class, 'update']);
    Route::delete('{jurusan}', [JurusanController::class, 'destroy']);
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'profesi'], function () {
    Route::get('', [ProfesiController::class, 'index']);
    Route::post('', [ProfesiController::class, 'store']);
    Route::get('{profesi}', [ProfesiController::class, 'show']);
    Route::put('{profesi}', [ProfesiController::class, 'update']);
    Route::delete('{profesi}', [ProfesiController::class, 'destroy']);
});

Route::group(['prefix' => 'region'], function () {
    Route::get('provinces', [RegionController::class, 'provinces']);
    Route::get('regencies', [RegionController::class, 'regencies']);
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'user'], function () {
    Route::get('', [UserController::class, 'index']);
    Route::post('', [UserController::class, 'store']);
    Route::get('{user}', [UserController::class, 'show']);
    Route::put('{user}', [UserController::class, 'update']);
    Route::delete('{user}', [UserController::class, 'destroy']);
});


/**
 * Route for Setting Quiz
 */

Route::group(['middleware' => 'auth:api', 'prefix' => 'versi-pertanyaan'], function () {
    Route::get('', [VersiPertanyaanController::class, 'index']);
    Route::post('', [VersiPertanyaanController::class, 'store']);
    Route::get('{versiPertanyaan}', [VersiPertanyaanController::class, 'show']);
    Route::put('{versiPertanyaan}', [VersiPertanyaanController::class, 'update']);
    Route::delete('{versiPertanyaan}', [VersiPertanyaanController::class, 'destroy']);
});

Route::group(['middleware' => 'api', 'prefix' => 'pertanyaan'], function () {
    Route::get('', [PertanyaanController::class, 'index']);
    Route::post('', [PertanyaanController::class, 'store']);
    Route::get('{pertanyaan}', [PertanyaanController::class, 'show']);
    Route::put('{pertanyaan}', [PertanyaanController::class, 'update']);
    Route::delete('{pertanyaan}', [PertanyaanController::class, 'destroy']);
});

Route::group(['middleware' => 'api', 'prefix' => 'panduan'], function () {
    Route::get('/', [PanduanController::class, 'index']);
    Route::put('/', [PanduanController::class, 'update']);
});

Route::group(['middleware' => 'api', 'prefix' => 'survei'], function () {
    Route::get('', [SurveiController::class, 'index']);
    Route::post('', [SurveiController::class, 'store']);
    Route::get('{survei}', [SurveiController::class, 'show']);
    Route::put('{survei}', [SurveiController::class, 'update']);
    Route::delete('{survei}', [SurveiController::class, 'destroy']);
});

/**
 * Route for Resul Quiz
 *
 */

Route::group(['middleware' => 'api', 'prefix' => 'peserta'], function () {
    Route::get('', [PesertaController::class, 'index']);
    Route::post('', [PesertaController::class, 'store']);
    Route::get('{peserta}', [PesertaController::class, 'show']);
    Route::put('{peserta}', [PesertaController::class, 'update']);
    Route::delete('{peserta}', [PesertaController::class, 'destroy']);
});

Route::group(['middleware' => 'api', 'prefix' => 'sesi'], function () {
    Route::get('', [SesiController::class, 'index']);
    Route::post('', [SesiController::class, 'store']);
    Route::get('{sesi}', [SesiController::class, 'show']);
    Route::put('{sesi}', [SesiController::class, 'update']);
    Route::delete('{sesi}', [SesiController::class, 'destroy']);
});

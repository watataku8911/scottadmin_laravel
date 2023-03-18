<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeptController;
use App\Http\Controllers\EmpController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/welcome', function () {
    return view('welcome');
});

/* 部門 */
Route::get('/deptList', [DeptController::class, 'deptList']);
Route::get('/goDeptAdd', function () {
    return view('dept/goDeptAdd');
});
Route::post('/deptAdd', [DeptController::class, 'deptAdd']);
Route::get('/prepareDeptEdit', [DeptController::class, 'prepareDeptEdit']);
Route::post('/deptEdit', [DeptController::class, 'deptEdit']);
Route::post('/confirmDeptDelete', [DeptController::class, 'confirmDeptDelete']);
Route::post('/deptDelete', [DeptController::class, 'deptDelete']);

Route::get('/deptJson', [DeptController::class, 'returnDeptJson']);

/* 従業員 */
Route::get('/empList', [EmpController::class, 'empList']);
Route::get('/goEmpAdd', [EmpController::class, 'goEmpAdd']);
Route::post('/empAdd', [EmpController::class, 'empAdd']);
Route::get('/prepareEmpEdit', [EmpController::class, 'prepareEmpEdit']);
Route::post('/empEdit', [EmpController::class, 'empEdit']);
Route::post('/comfirmEmpDelete', [EmpController::class, 'confirmEmpDelete']);
Route::post('/empDelete', [EmpController::class, 'empDelete']);


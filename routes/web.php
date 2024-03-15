<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task;
use App\Http\Controllers\StudentController;
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
    return view('welcome');
});

Route::get('/task1', [Task::class, 'task1'])->name('task1');
Route::get('/task2', [Task::class, 'task2'])->name('task2');
Route::post('/add_task', [Task::class, 'add'])->name('add_task');

Route::resource('student', StudentController::class);

Route::get('student_export',[StudentController::class, 'get_student_data'])->name('student.export');

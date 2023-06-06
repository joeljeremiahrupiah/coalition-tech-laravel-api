<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('get-all-projects', [ProjectController::class, 'getAllProjects']);
Route::get('get-all-projects-without-pagination', [ProjectController::class, 'getAllProjectsWithoutPagination']);
Route::post('create-project', [ProjectController::class, 'createProject']);
Route::post('update-project/{id}', [ProjectController::class, 'updateProject']);
Route::delete('delete-project/{id}', [ProjectController::class, 'deleteProject']);

Route::get('get-all-tasks', [TaskController::class, 'getAllTasks']);
Route::get('filter-tasks', [TaskController::class, 'filterTasks']);
Route::post('create-task', [TaskController::class, 'createTask']);
Route::post('update-task/{id}', [TaskController::class, 'updateTask']);
Route::post('update-task-order', [TaskController::class, 'updateTasksOrder']);
Route::delete('delete-task/{id}', [TaskController::class, 'deleteTask']);

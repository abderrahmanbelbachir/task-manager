<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\API\SetTaskPriorityController;
use \App\Http\Controllers\API\TasksByProjectController;
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

Route::put('task/priority/{task}/{priority}' , SetTaskPriorityController::class)->name('api.task.priority');
Route::get('task/project/{project}' , TasksByProjectController::class)->name('api.task.by.project');

<?php
use App\Http\Controllers\OpenAiController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});

/* 

Route::post('/gpt-ai', [OpenAiController::class, 'testAi'])->name('gpt-ai');

//Auth::routes();

*/
Route::get('/', [QuestionController::class, 'index'])->name('questions.index');

Route::get('/gpt-ai', [OpenAiController::class, 'gptAi'])->name('gpt-ai');
//Route::post('/gpt-ai', [OpenAiController::class, 'testAi'])->name('gpt-ai');

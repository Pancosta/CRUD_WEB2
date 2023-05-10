<?php
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('templates', [TemplateController::class, 'index'])->name('templates.index');
Route::get('templates/create', [TemplateController::class, 'create'])->name('templates.create');
Route::post('templates', [TemplateController::class, 'store'])->name('templates.store');
Route::get('templates/{template}/edit', [TemplateController::class, 'edit'])->name('templates.edit');
Route::put('templates/{template}', [TemplateController::class, 'update'])->name('templates.update');
Route::delete('templates/{template}', [TemplateController::class, 'destroy'])->name('templates.destroy');


require __DIR__.'/auth.php';

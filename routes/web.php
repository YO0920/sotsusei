<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
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




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', [RecipeController::class, 'home'])->name('home');
    Route::get('/menu_select', [RecipeController::class, 'menu_select'])->name('menu_select');
    Route::get('/recipes', [RecipeController::class, 'index'])->name('recipe.index');
    Route::get('/recipes/{id}',[RecipeController::class, 'show'])->name('recipe.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/menu_change', [RecipeController::class, 'menuChange'])->name('menu.change');
    Route::post('/menu_store', [RecipeController::class, 'storeMenu'])->name('menu_store');
    
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\Api\PortafolioController;
use App\Http\Controllers\Auth\AuthController;
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


Route::resource('portafolios', PortafolioController::class);

//php artisan route:list --path=api


// Route::get('/portafolios',[PortafolioController::class,'index']);

// Route::post('/portafolios',[PortafolioController::class,'store']);

// Route::get('/portafolios/{portafolio}',[PortafolioController::class,'show']);

// Route::put('/portafolios/{portafolio}',[PortafolioController::class,'update']);

// Route::delete('/portafolios/{portafolio}',[PortafolioController::class,'destroy']);



// Ruta pública para el manejo de inicio de sesión del usuario
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Rutas públicas para el portafolio
Route::get('/portafolios',[PortafolioController::class,'index']);
Route::get('/portafolios/{portafolio}',[PortafolioController::class,'show']);


// Grupo de rutas protegidas
Route::middleware(['auth:sanctum'])->group(function ()
{
    // Ruta para el cierre de sesión
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Ruta para el portafolio
    Route::post('/portafolios',[PortafolioController::class,'store']);
    Route::put('/portafolios/{portafolio}',[PortafolioController::class,'update']);
    Route::delete('/portafolios/{portafolio}',[PortafolioController::class,'destroy']);
});


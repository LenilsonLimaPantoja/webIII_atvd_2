<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LocacaoController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\VeiculoController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::any('/categoria/listar', [CategoriaController::class, 'listar']);
    Route::get('/categoria/novo', [CategoriaController::class, 'novo']);
    Route::get('/categoria/editar/{id}', [CategoriaController::class, 'editar']);
    Route::post('/categoria/salvar', [CategoriaController::class, 'salvar']);
    Route::get('/categoria/excluir/{id}', [CategoriaController::class, 'excluir']);

    Route::any('/veiculo/listar', [VeiculoController::class, 'listar']);
    Route::get('/veiculo/novo', [VeiculoController::class, 'novo']);
    Route::post('/veiculo/salvar', [VeiculoController::class, 'salvar']);
    Route::get('/veiculo/editar/{id}', [VeiculoController::class, 'editar']);
    Route::get('/veiculo/excluir/{id}', [VeiculoController::class, 'excluir']);

    Route::any('/cliente/listar', [ClienteController::class, 'listar']);
    Route::get('/cliente/excluir/{id}', [ClienteController::class, 'excluir']);
    Route::get('/cliente/novo', [ClienteController::class, 'novo']);
    Route::post('/cliente/salvar', [ClienteController::class, 'salvar']);
    Route::get('/cliente/editar/{id}', [ClienteController::class, 'editar']);

    Route::any('/locacao/listar', [LocacaoController::class, 'listar']);
    Route::get('/locacao/novo', [LocacaoController::class, 'novo']);
    Route::post('/locacao/salvar', [LocacaoController::class, 'salvar']);
    Route::get('/locacao/editar/{id}', [LocacaoController::class, 'editar']);
    Route::get('/locacao/excluir/{id}', [LocacaoController::class, 'excluir']);
    Route::get('/locacao/relatorio', [LocacaoController::class, 'relatorio']);

    Route::get('/', function () {
        $user = auth()->user();
        return view('index', compact('user'));
    });
});

Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/noticia/{id}', [NewsController::class, 'noticia']);
Route::get('/news/categoria/{id}', [NewsController::class, 'categoria']);

require __DIR__.'/auth.php';

<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\usuariosController;
    use App\Http\Controllers\homeController;
    use App\Http\Controllers\AuthController;
    use App\Http\Middleware\Authorization;

    // Rotas públicas
    Route::get('/', [AuthController::class, 'auth'])->name('login')->withoutMiddleware(Authorization::class);
    Route::post('autenticaUsuario', [AuthController::class, 'autenticaUsuario'])->name('autentica.Usuario');

    // Rotas protegidas pelo middleware Authorization
    Route::middleware(Authorization::class)->group(function () {
        Route::prefix('users')->group(function () {
            Route::get('show', [usuariosController::class, 'show'])->name('show.users');
            Route::post('store', [usuariosController::class, 'store'])->name('store.users');
            Route::get('create', [usuariosController::class, 'create'])->name('create.users');
            Route::get('update/{id}', [usuariosController::class, 'update'])->name('update.users');
            Route::get('delete/{id}', [usuariosController::class, 'delete'])->name('delete.users');
        });

        Route::get('home', [homeController::class, 'home'])->name('home');
    });
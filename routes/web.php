<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\usuariosController;
    use App\Http\Controllers\homeController;
    use App\Http\Controllers\AuthController;
    use App\Http\Middleware\Authorization;
    use App\Http\Controllers\clientController;
    use App\Http\Controllers\pecaController;

    Route::get('/', [AuthController::class, 'auth'])->name('login')->withoutMiddleware(Authorization::class);
    Route::post('autenticaUsuario', [AuthController::class, 'autenticaUsuario'])->name('autentica.Usuario');

    Route::middleware(Authorization::class)->group(function () {
        Route::prefix('users')->group(function () {
            Route::get('show', [usuariosController::class, 'show'])->name('show.users');
            Route::post('store', [usuariosController::class, 'store'])->name('store.users');
            Route::get('create', [usuariosController::class, 'create'])->name('create.users');
            Route::get('update/{id}', [usuariosController::class, 'update'])->name('update');
            Route::post('updateUser/{id}', [usuariosController::class, 'updateUser'])->name('update.users');
            Route::get('delete/{id}', [usuariosController::class, 'delete'])->name('delete.users');
        });

        Route::prefix('client')->group(function(){
            Route::get('show', [clientController::class, 'show'])->name('show.client');
            Route::get('reveal/{id}', [clientController::class, 'revealClient'])->name('reveal.client');
            Route::post('store', [clientController::class, 'store'])->name('store.client');
            Route::get('create', [clientController::class, 'create'])->name('create.client');
            Route::get('updateClient/{id}', [clientController::class, 'update'])->name('update.client');
            Route::post('saveClient/{id}', [clientController::class, 'saveClient'])->name('saveClient');
            Route::get('delete/{id}', [clientController::class, 'delete'])->name('delete.client');
        });

        Route::prefix('peca')->group(function(){
            Route::get('show', [pecaController::class, 'show'])->name('show.peca');
            Route::post('store', [pecaController::class, 'store'])->name('store.peca');
            Route::get('create', [pecaController::class, 'create'])->name('create.peca');
            Route::get('updatePeca/{id}', [pecaController::class, 'update'])->name('update.peca');
            Route::post('savePeca/{id}', [pecaController::class, 'savePeca'])->name('savePeca');
            Route::get('delete/{id}', [pecaController::class, 'delete'])->name('delete.peca');
        });

        Route::get('home', [homeController::class, 'home'])->name('home');
        Route::get('logout',[AuthController::class,'logout'])->name('logout');
    });
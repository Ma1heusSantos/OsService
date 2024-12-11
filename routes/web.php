<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\usuariosController;
    use App\Http\Controllers\homeController;
    use App\Http\Controllers\AuthController;
use App\Http\Controllers\categoryController;
use App\Http\Middleware\Authorization;
    use App\Http\Controllers\clientController;
use App\Http\Controllers\mecanicoController;
use App\Http\Controllers\pecaController;
    use App\Http\Controllers\serviceOrderController;
use App\Http\Controllers\servicosController;
use Illuminate\Auth\Middleware\Authenticate;

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

        Route::prefix('ServiceOrder')->group(function(){
            Route::get('show',[serviceOrderController::class,'show'])->name('serviceOrder.show');
            Route::post('store', [serviceOrderController::class, 'store'])->name('store.service');
            Route::get('create', [serviceOrderController::class, 'create'])->name('create.service');
            //ainda falta implementar o update e o delete dessas rotas.
        });

        Route::get('home', [homeController::class, 'home'])->name('home');
        Route::get('logout',[AuthController::class,'logout'])->name('logout');


        Route::prefix('Servicos')->group(function(){
            Route::get('show',[servicosController::class,'show'])->name('show.servicos');
            Route::post('store', [servicosController::class, 'store'])->name('store.servicos');
            Route::get('create', [servicosController::class, 'create'])->name('create.servicos');
            Route::get('delete/{id}', [servicosController::class, 'delete'])->name('delete.servicos');
            Route::post('saveServico/{id}', [servicosController::class, 'saveServico'])->name('save.servicos');
            Route::get('update/{id}', [servicosController::class, 'update'])->name('update.servicos');
        });

        Route::prefix('mecanicos')->group(function(){
            Route::get('show',[mecanicoController::class,'show'])->name('show.mecanicos');
            Route::get('revealMecanico/{id}', [mecanicoController::class, 'revealMecanico'])->name('reveal.mecanico');
            Route::post('store', [mecanicoController::class, 'store'])->name('store.mecanicos');
            Route::get('create', [mecanicoController::class, 'create'])->name('create.mecanicos');
            Route::get('delete/{id}', [mecanicoController::class, 'delete'])->name('delete.mecanicos');
            Route::post('saveMecanico/{id}', [mecanicoController::class, 'saveMecanico'])->name('save.mecanicos');
            Route::get('update/{id}', [mecanicoController::class, 'update'])->name('update.mecanicos');
        });

        Route::prefix('categoria')->group(function(){
            Route::get('show',[categoryController::class,'show'])->name('show.categoria');
            Route::get('deleteServico/{id}', [categoryController::class, 'deleteServico'])->name('delete.categoria.servico');
            Route::post('store', [categoryController::class, 'store'])->name('store.categoria');
            Route::get('create', [categoryController::class, 'create'])->name('create.categoria');
            Route::get('deletePeca/{id}', [categoryController::class, 'deletePeca'])->name('delete.categoria.peca');

            Route::get('updatePeca/{id}', [categoryController::class, 'updatePeca'])->name('update.categoria.peca');
            Route::post('saveCategoriaPeca/{id}', [categoryController::class, 'saveCategoriaPeca'])->name('save.categoria.peca');
            Route::get('updateServico/{id}', [categoryController::class, 'updateServico'])->name('update.categoria.servico');
            Route::post('saveCategoriaServico/{id}', [categoryController::class, 'saveCategoriaServico'])->name('save.categoria.servico');
            
        });
    });
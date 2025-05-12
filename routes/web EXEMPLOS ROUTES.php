<?php

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

// ROTAS
Route::get('/', function () {
    return view('welcome');
});

// ANY Permite todo tipo de acesso http (put, delete, get, post)
Route::any('/any', function(){
    return "Permite todo tipo de acesso http (put, delete, get, post)";
});

//MATCH permite apenas acessos definidos
Route::match(['get', 'post'], '/match', function(){
    return "permite apenas acessos definidos";
});


//Pegando dados pela url da rota
Route::get('/produto/{id}/{cat?}', function($id, $cat = ""){
    return "O id do produto é: " . $id . "<br>" . "A categoria é: " . $cat;
});


//Redirecionando uma rota
Route::redirect('/sobre', '/empresa');

//Mostrando uma view em uma rota
Route::view('/empresa', 'site/empresa');

//Renomeando uma rota
Route::get("/news", function(){
    return view('news');
})->name('noticias');

//Redirecionando a uma rota Renomeada
Route::get('/novidades', function(){
    return redirect()->route('noticias');
});


//Grupo onde define o prefixo das rotas "admin/"
Route::prefix('admin')->group(function(){
    Route::get('dashboard', function(){
        return "dashboard";
    });

    Route::get('users', function(){
        return "users";
    });

    Route::get('clientes', function(){
        return "clientes";
    });
});

//Grupo onde define o nome das rotas "admin."
Route::name('admin.')->group(function(){
    Route::get('admin/produto', function(){
        return "produto";
    })->name('produto');

    Route::get('admin/categoria', function(){
        return "categoria";
    })->name('categoria');

    Route::get('admin/marca', function(){
        return "marca";
    })->name('marca');
});

Route::get('/adminproduto', function(){
    return redirect()->route('admin.produto');
});

//Grupo onde define o prefixo das rotas para "admin/ e o nome das rotas para "admin."
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
],function(){
    Route::get('loja', function(){
        return "loja";
    })->name('loja');

    Route::get('vendedor', function(){
        return "vendedor";
    })->name('vendedor');
});

Route::get('/adminloja', function(){
    return redirect()->route('admin.loja');
});
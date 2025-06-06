<?php

use App\Http\Controllers\CarrinhoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;

Route::resource('produtos', ProdutoController::class);

Route::get('/', [SiteController::class, 'index'])->name('site.index');

Route::get('/produto/{slug}', [SiteController::class, 'details'])->name('site.details');

Route::get('/categoria/{id}', [SiteController::class, 'categoria'])->name('site.categoria');

Route::get('/carrinho', [CarrinhoController::class, 'carrinhoLista'] )->name('site.carrinho');
Route::post('/carrinho', [CarrinhoController::class, 'adicionaCarrinho'] )->name('site.addCarrinho');
Route::post('/remover', [CarrinhoController::class, 'removeCarrinho'] )->name('site.removeCarrinho');
Route::post('/atualizar', [CarrinhoController::class, 'atualizaCarrinho'])->name('site.atualizaCarrinho');
Route::get('/limpar', [CarrinhoController::class, 'limparCarrinho'] )->name('site.limparCarrinho');
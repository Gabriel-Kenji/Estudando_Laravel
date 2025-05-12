<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Process\Factory;
use Illuminate\View\View;


class CarrinhoController extends Controller
{
    public function carrinhoLista(): Factory|View{
        $itens = \Cart::getContent();
        return view("site.carrinho",data: compact("itens"));
    }

    public function adicionaCarrinho(Request $request): RedirectResponse{
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => abs($request->qnt),
            'attributes' => array(
                'image' => $request->img
            ),
        ]);

        return redirect()->route(route: 'site.carrinho')->with('sucesso','Produto adicionado no carrinho com sucesso');
    }

    public function removeCarrinho(Request $request): RedirectResponse{
        \Cart::remove($request->id);
        return redirect()->route(route:'site.carrinho')->with('sucesso','Produto removido do carrinho com sucesso!');
    }

    public function atualizaCarrinho(Request $request): RedirectResponse{
        \Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => abs($request->quantity)
            ]
        ]);
        
        return redirect()->route(route:'site.carrinho')->with('sucesso','Produto atualizado com sucesso!');
    }

    public function limparCarrinho(Request $request): RedirectResponse{
        \Cart::clear();
        return redirect()->route(route:'site.carrinho')->with('aviso','Seu Carrinho esta vazio!');
    }
}

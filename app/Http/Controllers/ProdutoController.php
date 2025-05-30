<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Produto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return "index";

        // $produtos = \App\Models\Produto::all();
        // return dd($produtos);

        // $nome = "Kenji";
        // $idade = 24;
        // $frutas = ['banana', 'morango', 'maçã', 'laranja'];
        // $ffrutas = [];
        // $html = "<h1> Olá eu sou H1 </h1>";

        // return view("site.home", compact("nome","idade", 'frutas', "html", 'ffrutas'));

        $produtos = Produto::paginate(3);

        return view("site.home", compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

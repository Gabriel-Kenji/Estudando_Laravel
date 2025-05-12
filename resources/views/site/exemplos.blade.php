@extends('site.layout')

@section('title', 'HOME')
@section('conteudo')
    <h1>Essa é a Home</h1>

{{-- Isso é um comentario --}}

{{-- Operador Ternario --}}

{{-- {{ isset($nome) ? 'existe' : 'não existe' }} --}}

{{-- {{ $teste ?? 'padrão'}} --}}



{{-- Estrutura de controle --}}

@if ($nome== 'rodrigo')
    true
@else
    false
@endif

@unless ($nome == 'rodrigo')
    true
@else
    false
@endunless

@switch($idade)
    @case(24)
        idade esta ok
        @break
    @case(25)
        idade esta joia
        @break
    @default
        default
@endswitch

@isset($nomex)
    existe
@endisset

@empty($nome)
    vazia
@endempty

@auth
    está autenticada
@endauth

@guest
    não autenticada
@endguest

{{-- Estrutura de repetição --}}
@php
    $wi = 0;
@endphp


<br>
@for ($i = 0; $i <= 10; $i++)
    valor atual é {{$i}} <br>
@endfor

@while ($wi <= 10)
    valor atual é {{$wi}} <br>
    @php
        $wi++;
    @endphp
@endwhile

@foreach ($frutas as $fruta)
    {{$fruta}} <br>
@endforeach


@forelse ($ffrutas as $fruta)
    {{$fruta}} <br>
@empty
    array vazio
@endforelse 

{{-- Includes --}}

@include('includes.exemplos', ['titulo' => "Mensagem de sucesso!!"])

{{-- Components --}}

@component('components.exemplos')
    @slot('paragrafo')
        Texto qualquer
    @endslot
@endcomponent

@push('style')
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
@endpush

@push('script')
     <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
@endpush

@endsection

@extends('base')
@section('conteudo')
@section('titulo', 'Formulário de Venda de Livros')
@php
    if (!empty($dado->id)) {
        $route = route('venda.update', $dado->id);
    } else {
        $route = route('venda.store');
    }
@endphp

<h3>Formulário de Venda de Livros</h3>
<form action="{{ $route }}" method="post">

    @csrf

    @if (!empty($dado->id))
        @method('put')
    @endif

    <input type="hidden" name="id"
        value="@if (!empty($dado->id)) {{ $dado->id }}@else{{ '' }} @endif"><br>

    <label for="">Titulo</label><br>
    <input type="text" name="titulo" class="form-control"
        value="@if (!empty($dado->titulo)) {{ $dado->titulo }}@elseif (!empty(old('titulo'))){{ old('titulo') }}@else{{ '' }} @endif"><br>

    <label for="">Vendedor</label><br>
    <input type="text" name="vendedor" class="form-control"
        value="@if (!empty($dado->vendedor)) {{ $dado->vendedor }}@elseif (!empty(old('vendedor'))){{ old('vendedor') }}@else{{ '' }} @endif"><br>

    <label for="">Valor</label><br>
    <input type="text" name="valor" class="form-control"
        value="@if (!empty($dado->valor)) {{ $dado->valor }}@elseif (!empty(old('valor'))){{ old('valor') }}@else{{ '' }} @endif"><br>


    <button type="submit" class="btn btn-outline-success">Salvar</button>
    <a href="{{ url('venda') }}" class="btn btn-outline-warning">Voltar</a>
</form>

@stop

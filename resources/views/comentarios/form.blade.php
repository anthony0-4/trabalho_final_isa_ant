
@extends('base')
@section('conteudo')
@section('titulo', 'Formulário de Comentarios')
@php
    if (!empty($dado->id)) {
        $route = route('comentarios.update', $dado->id);
    } else {
        $route = route('comentarios.store');
    }
@endphp

<h3>Formulário de Comentarios</h3>
<form action="{{ $route }}" method="post">

    @csrf

    @if (!empty($dado->id))
        @method('put')
    @endif

    <input type="hidden" name="id"
        value="@if (!empty($dado->id)) {{ $dado->id }}@else{{ '' }} @endif"><br>

    <label for="">Usuario</label><br>
    <input type="text" name="usuario" class="form-control"
        value="@if (!empty($dado->usuario)) {{ $dado->usuario }}@elseif (!empty(old('usuario'))){{ old('usuario') }}@else{{ '' }} @endif"><br>

    <label for="">Email</label><br>
    <input type="text" name="email" class="form-control"
        value="@if (!empty($dado->email)) {{ $dado->email }}@elseif (!empty(old('email'))){{ old('email') }}@else{{ '' }} @endif"><br>

    <label for="">Comentario</label><br>
    <input type="text" name="comentario" class="form-control"
        value="@if (!empty($dado->comentario)) {{ $dado->comentario }}@elseif (!empty(old('comentario'))){{ old('comentario') }}@else{{ '' }} @endif"><br>

    <button type="submit" class="btn btn-outline-success">Salvar</button>
    <a href="{{ url('comentarios') }}" class="btn btn-outline-warning">Voltar</a>
</form>

@stop

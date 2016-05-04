@extends('layout.principal')

@include('layout.header_admin')

@section('conteudo')
    <h1 class="text-center">Area do Gerente</h1>
    <p>Bem vindo(a),{{Auth::user()->nome}}</p>
@endsection
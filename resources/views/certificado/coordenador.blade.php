@extends('layout.principal')

@include('layout.header_coordenador')

@section('conteudo')
    <h1 class="text-center">Area do Coordenador</h1>
    <p>Bem vindo(a),{{Auth::user()->nome}}</p>
@endsection
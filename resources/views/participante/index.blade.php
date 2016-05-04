@extends('layout.principal')

@include($header)

@section('conteudo')
<h1>Lista de Participantes</h1>

<table class="table table-striped
    table-bordered table-hover">
        <thead>
            <tr>
                <td>Matricula</td>
                <td>Nome</td>
                <td>Cpf</td>
                <td>E-mail</td>
                <td colspan="2">Açoes</td>
            </tr>
        </thead>

        @foreach ($participantes as $p)
            <tr>
                <td>{{$p->matricula }}</td>
                <td>{{$p->nome}}</td>
                <td>{{ $p->cpf }}</td>
                <td>{{$p->email}}</td>
                <td>
                    <a class="" href="{{'/participante/edit/'.$p->id}}">Editar</a>

                </td>
                <td>
                    <a href="{{'/participante/delete/'.$p->id}}">Excluir</a>
                </td>
            </tr>
        @endforeach
 </table>
@stop
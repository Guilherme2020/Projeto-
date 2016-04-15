@extends('layout.principal')

@include('layout.header_admin')

@section('conteudo')
<h1>Lista de usuarios</h1>

<table class="table table-striped
        table-bordered table-hover">
    @foreach ($users as $u)
        <tr>
            <td>{{ $u->nome }}</td>
            <td>{{ $u->email }}</td>
            <td>{{ $u->cpf }}</td>
        </tr>
    @endforeach
</table>
@endsection
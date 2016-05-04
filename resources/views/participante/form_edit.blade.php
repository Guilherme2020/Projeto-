@extends('layout.principal')

@section('conteudo')

    <form action="/participante/edit/{{$participante->id}}"  method="POST">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <div class="form-group">
            <label>Matricula</label>
            <input  name="matricula" class="form-control" value="{{$participante->matricula}}" required>
        </div>

        <div class="form-group">
            <label>Nome</label>
            <input  name="nome" class="form-control" value="{{$participante->nome}}" required>
        </div>

        <div class="form-group">
            <label>cpf</label>
            <input name = "cpf" class="form-control" value="{{$participante->cpf}}"  required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input  name = "email" class="form-control" value="{{$participante->email}}" required>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Alterar</button>


        <button>
            <a href="/dashboard">
                Voltar
            </a>
        </button>
    </form>

@endsection

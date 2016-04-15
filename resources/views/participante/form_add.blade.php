@extends('layout.principal')
@section('conteudo')
	<form action="/participante/adicionar" method="POST">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

		<div class="form-group">
            <label>Matricula</label>
            <input  name="matricula" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Nome</label>
            <input  name="nome" class="form-control" required>
        </div>

        <div class="form-group">
            <label>cpf</label>
            <input name = "cpf" class="form-control"required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input  name = "email" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>

    </form>
@stop
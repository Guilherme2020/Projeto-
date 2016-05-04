@extends('layout.principal')

@section('conteudo')
    <h2>Cadastre-se no evento: {{$evento->nome}}</h2>
    <?php
    $valor = '/evento/cadastro/'.$evento->slug;
    ?>
    <form action="{{$valor}}" method="POST">

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


            <a class="btn btn-primary btn-block" href="/dashboard">
                Voltar
            </a>

    </form>



@endsection
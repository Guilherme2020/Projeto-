@extends('layout.principal')

@include('layout.header_admin')

@section('conteudo')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastrar Novo Usuario</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Opa!</strong> Algum problema nos dados.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="/users/add">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Nome</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nome" value="{{ old('nome') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cpf</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="cpf" name="cpf" value="{{ old('cpf') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Rg</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="rg" value="{{ old('rg') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Matricula</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="matricula" value="{{ old('matricula') }}">
                            </div>
                        </div>

                        <div class ="form-group">
                            <label class="col-md-4 control-label">Tipo de usuário</label>
                            <div class="col-md-6">
                                <input type="radio" name="tipo" value="C" checked>
                                Coordenador <br />
                                <input type="radio" name="tipo" value="G">
                                Gerente <br />
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Endereço de Email</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-md-4 control-label">Senha</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Confirme sua Senha</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-ok"></span> Cadastrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
           //
            $("#cpf").inputmask("999.999.999-99");
           //
        });
    </script>
@endsection

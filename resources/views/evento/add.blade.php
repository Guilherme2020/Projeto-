@extends('layout.principal')

@if(Auth::user()->tipo=='G')

    @include('layout.header_admin')
@else
    @include('layout.header_coordenador')
@endif

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


                    <form class="form-horizontal" role="form" method="POST" action="/evento/add">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @if(is_string($usuario))

                            <div class="form-group">
                                <label class="col-md-4 control-label">User_id</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" readonly  name="user_id" value="{{ $usuario }}">
                                </div>
                            </div>

                            @else
                            <div class="form-group">
                                <label class="col-md-4 control-label">Usuario</label>
                                <div class="col-md-6">
                                    <select name="user_id" id="user_id">
                                        @foreach($usuario as $u)
                                            <option value="{{$u->id}}"> {{$u->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nome do Evento</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nome" value="{{ old('nome') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                                <select name="status" id="status">
                                    <option value="A">Aberto</option>
                                    <option value="F">Fechado</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Data_Evento</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="data_evento" name="data_evento" value="{{ old('data_evento') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-ok"></span> Cadastrar Evento
                                </button>
                            </div>
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $.datetimepicker.setLocale('pt');

        $(document).ready(function(){
            $('#data_evento').datetimepicker({
                timepicker: false,
                format: 'd/m/Y'
            });
        });
    </script>
@endsection

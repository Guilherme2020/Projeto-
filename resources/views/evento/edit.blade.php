@extends('layout.principal')

@section('conteudo')


    <h2>Edite o evento: {{$evento->nome}}</h2>

    <form class="form-horizontal" role="form" method="POST" action="{{'/evento/edit/'.$evento->id}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label class="col-md-4 control-label">Nome do Evento</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="nome" value="{{ $evento->nome }}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Status</label>
            <div class="col-md-6">

                <select name="status" id="status">
                    <option value="A" {{ ($evento->status == 'A') ? 'selected': '' }}>Aberto</option>
                    <option value="F" {{ ($evento->status == 'F') ? 'selected': '' }}>Fechado</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Data_Evento</label>
            <div class="col-md-6">
                <input type="text" class="form-control" id="data_evento" name="data_evento" value="{{ $data }}" required>
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



@stop
@extends('layout.principal')
@include('layout.header_coordenador')
@section('conteudo')

    <table class="table table-bordered">
        <thead>
            <tr>
                <td>Nome</td>
                <td>Status</td>
                <td>Data do Evento</td>
                <td>Endereço</td>
                <td colspan="3">Ações</td>

            </tr>

        </thead>

        @foreach($eventos as $evento)

            <tr>
                <td>
                    {{$evento->nome}}

                </td>
                <td>
                    {{$evento->status}}
                </td>

                <td>
                    {{$evento->data_evento}}
                </td>
                <td>
                    {{"/".$evento->slug}}
                </td>

                <td>
                    <a class="btn btn-danger" href="{{'/evento/edit/'.$evento->id}}">Editar</a>
                </td>
                <td>
                    <a class="btn btn-primary" href="{{'/evento/participantes/'.$evento->id}}"> Ver Participantes </a>
                </td>
                <td>
                    <a class="btn btn-danger" href="{{'/evento/delete/'.$evento->id}}">Excluir</a>
                </td>
            </tr>


        @endforeach
    </table>
@endsection
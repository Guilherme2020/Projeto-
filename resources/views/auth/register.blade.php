@extends('layout.principal')

@section('conteudo')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Cadastrar novo usuario</div>
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

					<form class="form-horizontal" role="form" method="POST" action="/auth/register">
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
								<input type="text" class="form-control" name="cpf" value="{{ old('cpf') }}">
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


						<div class="form-group">
							<label class="col-md-4 control-label">Endereço de Email</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Nome do usuario</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="username" value="{{ old('username') }}">
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
									Cadastrar
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

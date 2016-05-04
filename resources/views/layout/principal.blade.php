<!DOCTYPE html>
<html>
	<head>
		<title>Sistema de Certificado</title>
		<!--<link rel="stylesheet" type="text/css" href="/css/app.css">-->
		<!--css-->
		<link rel="stylesheet" href="/assets/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="/assets/datetimepicker/jquery.datetimepicker.css">
		<!--fim css-->
		<link rel="stylesheet"  type="text/css" href="/css/custom.css">
		<!--js-->
		<script src="/assets/jquery/dist/jquery.min.js"></script>
		<script src="/assets/datetimepicker/build/jquery.datetimepicker.full.min.js"></script>
		<script src="/assets/bootstrap/dist/js/bootstrap.js"></script>
		<script src="/assets/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
		<!--fim js-->
	</head>
	<body>
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="/dashboard">
							Sistema Certificado
						</a>
					</div>
					@yield('header')
				</div>
			</nav>

			@yield('conteudo')
			<footer class="footer">
				<p>Sistema de Certificado IFPI- Todos os direitos reservados</p>
			</footer>
		</div>

	</body>
</html>
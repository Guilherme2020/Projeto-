<!DOCTYPE html>
<html>
	<head>
		<title>Sistema de Certificado</title>
		<link rel="stylesheet"  type="text/css" href="/css/custom.css">
		<link rel="stylesheet" type="text/css" href="/css/app.css">
		<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/flatly/bootstrap.min.css">-->
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
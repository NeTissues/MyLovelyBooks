<html>
	<head>
		<title> Login </title>
		<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"></link>
		<link href="css/css.css" rel="stylesheet" type="text/css"></link>
	</head>

	<body>

		<div class="col-sm-3 banner-page">
			<a href="index.php">
				<img src="images/LogoAWB.png" class="banner">
			</a>
		</div>
		<div class="col-sm-4 login">

			<div class="login-text">
					<h1> Cadastro </h1>
				</div>

			<form method="POST" action="register.php">

				<div class="form-group row login-text">
					<label class="col-sm-3 col-form-label"> Usu&aacuterio: </label>
					<div class="col-sm-7">
						<input class="form-control" type="text" name="username_register"/>
					</div>
				</div>


				<div class="form-group row login-text">
					<label class="col-sm-3 col-form-label"> E-mail: </label>
					<div class="col-sm-7">
						<input class="form-control" type="text" name="email"/>
					</div>
				</div>

				<div class="form-group row login-text">
					<label class="col-sm-3 col-form-label"> Senha: </label>
					<div class="col-sm-7">
						<input class="form-control" type="password" name="password"/>
					</div>
				</div>

				<div class="form-group row login-text">
					<label class="col-sm-3 col-form-label"> Confirmar Senha: </label>
					<div class="col-sm-7">
						<input class="form-control" type="password" name="conf-password"/>
					</div>
				</div>

				<input type="submit" name="enviar" value="Registrar" class="btn btn-secondary" style="width:150px"/>
			</form>
		</div>
	</body>
</html>

<html>
	<head>
		<title> Login </title>
		<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"></link>
		<link href="css/css.css" rel="stylesheet" type="text/css"></link>
	</head>

	<body>
		<div class="row">

			<div class="col-sm-3 banner-page">
				<a href="index.php">
					<img src="images/LogoAWB.png" class="banner">
				</a>
			</div>

			<div class="col-sm-4 login">
				<div class="login-text">
					<h1> Acesse sua biblioteca pessoal </h1>
				</div>

				<div clas="form">
						<form method="POST" action="validation.php">

							<div class="form-group row login-text">
								<label class="col-sm-3 col-form-label"> Usu&aacuterio: </label>
								<div class="col-sm-7">
									<input class="form-control" type="text" name="usuario"/>
								</div>
							</div>

							<div class="form-group row login-text">
								<label class="col-sm-3 col-form-label"> Senha: </label>
								<div class="col-sm-7">
									<input class="form-control" type="password" name="senha"/>
								</div>

							</div>
							<div class="row">
								<input type="submit" name="login" value="Login" class="btn btn-secondary" style="width:150px"/>
								<input type="submit" name="register" value="Registre-se" class="btn btn-secondary" style="width:150px"/>
							</div>

							<div style="text-align:center">
								<a href="index.php"> esqueci minha senha </a>
							</div>
						</form>
				</div>
			</div>
		</div>
	</body>
</html>

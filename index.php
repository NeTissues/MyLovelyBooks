<?php
	Session_Start();
	$userName;
	$loginValid = false;
	$server = "localhost";
	$base = "mylovelybooks"; //Inserir Banco

	$user = "root"; //Inserir Usuário
	$password = "aluno"; //Inserir Senha
	$sucess = true;
	$log = "";
	if(isset($_SESSION["login"]) && $_SESSION["login"] == true){
		$userName = $_SESSION["name"];
		$loginValid = true;
	}
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
		<title>My Lovely Books</title>
		<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"></link>
		<link href="css/css.css" rel="stylesheet" type="text/css"></link>
	</head>
	<body>
		<div class="banner">
			<a href="#">
				<img src="images/LogoAWB.png" class="banner" width="214" height="129.5"/>
			</a>
		</div>
		<nav class="navbar">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" role="navigation">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <a class="navbar-brand" href="#">My Lovely Books</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav">
					<li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categorias<span class="caret"></span></a>
					  <ul class="dropdown-menu">
						<li><a href="#">Romance</a></li>
						<li><a href="#">Romance autobiográfico</a></li>
						<li><a href="#">Romance histórico</a></li>
						<li><a href="#">Ficção científica</a></li>
						<li><a href="#">Cordel</a></li>
						<li><a href="#">Crônica</a></li>
						<li><a href="#">Poesia </a></li>
						<li><a href="#">Novela</a></li>
						<li><a href="#">Ensaios</a></li>
						<li><a href="#">Baseado em fatos reais</a></li>
						<li><a href="#">Policial</a></li>
						<li><a href="#">Terror</a></li>
						<li><a href="#">Teatro</a></li>
						<li><a href="#">Tragédia</a></li>
						<li><a href="#">HQs</a></li>
						<li><a href="#">Infantil</a></li>
						<li><a href="#">Literatura Estrangeira</a></li>
						<li><a href="#">Literatura Nacional</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="#">Ciência</a></li>
						<li><a href="#">Filosofia</a></li>
						<li><a href="#">História</a></li>
						<li><a href="#">Linguistica </a></li>
						<li><a href="#">Medicina </a></li>
						<li><a href="#">Música </a></li>
						<li><a href="#">Psicologia </a></li>
						<li><a href="#">Administração </a></li>
						<li><a href="#">Artes e Fotografia</a></li>
						<li><a href="#">Biografias</a></li>
						<li><a href="#">Didáticos</a></li>
						<li><a href="#">Direito</a></li>
						<li><a href="#">Biografias</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="#">Culinária | Gastronomia </a></li>
						<li><a href="#">Esoterismo</a></li>
						<li><a href="#">Auto-Ajuda</a></li>
						<li><a href="#">Política</a></li>
						<li><a href="#">Religião</a></li>
						<li><a href="#">Saúde</a></li>
						<li><a href="#">Erótico </a></li>

					  </ul>
					</li>
					<li><a href="#">Quem Somos?</a></li>
					<li><a href="#">Fale Conosco</a></li>
					<?php if($loginValid == false): ?>
						<li><a href="login.php">Login</a></li>
					<?php else: ?>
						<li><a href="getAccountInfo.php">Minha Conta</a></li>
						<li><a href="logout.php">Logout</a></li>
					<?php endif; ?>
				  </ul>
				  <form class="navbar-form navbar-right" action="search_book.php" method="post">
					<div class="form-group">
					  <input type="text" class="form-control" placeholder="Procurar livro..." name="search">
					</div>
					<button type="submit" class="btn btn-default">Procurar</button>
				  </form>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>

		<div class="col-sm-5 col-xs-6 painel">
			<div class="row">
				<div class="panel panel-default ">
					<div class="panel-heading">
						<h3 class="panel-title text-center">Romance</h3>
					</div>
					<div class="panel-body livro">
						<ul class="list-inline">

							<?php

							$query = "SELECT * FROM tb_book WHERE categoryId = 1";

							try{
					        $connection = new PDO("mysql:host=$server;dbname=$base", $user, $password);

					        foreach ($connection->query($query) as $row) {
					          $rec_title = $row['title'];
					          ?>

										<li>
											<a class="black" href="bookPage.php?id=<?= $row['bookId']?>">
												<div class="panel panel-default">
													<div class="panel-body">
														<img src="images/book_default.png" width="100" height="100"/>
													</div>
													<div class="panel-footer text-center"><?= $rec_title;?></div>
												</div>
											</a>
										</li>


					          <?php
					        }

					    }catch(PDOException $e){
					        $log = $e;
					        echo "Error: " . $log;
					    }
					 ?>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="panel panel-default ">
					<div class="panel-heading">
						<h3 class="panel-title text-center">Ficção</h3>
					</div>
					<div class="panel-body livro">
						<ul class="list-inline">

							<?php

							$query = "SELECT * FROM tb_book WHERE categoryId = 2";

							try{
					        $connection = new PDO("mysql:host=$server;dbname=$base", $user, $password);

					        foreach ($connection->query($query) as $row) {
					          $rec_title = $row['title'];
					          ?>

										<li>
											<a class="black" href="bookPage.php?id=<?= $row['bookId']?>">
												<div class="panel panel-default">
													<div class="panel-body">
														<img src="images/book_default.png" width="100" height="100"/>
													</div>
													<div class="panel-footer text-center"><?= $rec_title;?></div>
												</div>
											</a>
										</li>

					          <?php
					        }

					    }catch(PDOException $e){
					        $log = $e;
					        echo "Error: " . $log;
					    }
					 ?>

						</ul>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="panel panel-default ">
					<div class="panel-heading">
						<h3 class="panel-title text-center">Aventura</h3>
					</div>
					<div class="panel-body livro">
						<ul class="list-inline">
							<?php
							
							$query = "SELECT * FROM tb_book WHERE categoryId = 3";

							

							try{
					        $connection = new PDO("mysql:host=$server;dbname=$base", $user, $password);

					        foreach ($connection->query($query) as $row) {
					          $rec_title = $row['title'];
					          ?>

										<li>
											<a class="black" href="bookPage.php?id=<?= $row['bookId']?>">
												<div class="panel panel-default">
													<div class="panel-body">
														<img src="images/book_default.png" width="100" height="100"/>
													</div>
													<div class="panel-footer text-center"><?= $rec_title;?></div>
												</div>
											</a>
										</li>

					          <?php
					        }

					    }catch(PDOException $e){
					        $log = $e;
					        echo "Error: " . $log;
					    }
					 ?>
						</ul>

					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-4 col-xs-6 painel-top">
			<div class="row">
				<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title text-center">Top 5 - Melhores Livros!</h3>
				</div>
					<div class="top-scroll">
						<table class="table">
							<thead>
								<tr>
									<th class="text-center">Posição</td>
									<th class="text-center">Livro</td>
									<th class="text-center">Avaliação</td>
									<th class="text-center">Quant</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row" class="text-center">1</th>
									<td class="text-center">Livro 1</th>
									<td class="text-center">
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
									</th>
									<td class="text-center">1513571</th>
								</tr>
								<tr>
									<th scope="row" class="text-center">2</th>
									<td class="text-center">Livro 2</td>
									<td class="text-center">
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
									</td>
									<td class="text-center">752075</td>
								</tr>
								<tr>
									<th scope="row" class="text-center">3</th>
									<td class="text-center">Livro 3</td>
									<td class="text-center">
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
									</td>
									<td class="text-center">687625</td>
								</tr>
								<tr>
									<th scope="row" class="text-center">4</th>
									<td class="text-center">Livro 4</td>
									<td class="text-center">
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
									</td>
									<td class="text-center">925205</td>
								</tr>
								<tr>
									<th scope="row" class="text-center">5</th>
									<td class="text-center">Livro 5</td>
									<td class="text-center">
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
									</td>
									<td class="text-center">8758472</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="panel panel-default ">
				<div class="panel-heading">
					<h3 class="panel-title text-center">Top 10 - Livros Mais Lidos!</h3>
				</div>
					<div class="top-scroll">
						<table class="table">
							<thead>
								<tr>
									<th class="text-center">Posição</td>
									<th class="text-center">Livro</td>
									<th class="text-center">Quant</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row" class="text-center">1</th>
									<td class="text-center">Livro 1</th>
									<td class="text-center">2804829</th>
								</tr>
								<tr>
									<th scope="row" class="text-center">2</th>
									<td class="text-center">Livro 2</td>
									<td class="text-center">2526547</td>
								</tr>
								<tr>
									<th scope="row" class="text-center">3</th>
									<td class="text-center">Livro 3</td>
									<td class="text-center">2636785</td>
								</tr>
								<tr>
									<th scope="row" class="text-center">4</th>
									<td class="text-center">Livro 4</td>
									<td class="text-center">6020254</td>
								</tr>
								<tr>
									<th scope="row" class="text-center">5</th>
									<td class="text-center">Livro 5</td>
									<td class="text-center">98528909</td>
								</tr>
								<tr>
									<th scope="row" class="text-center">6</th>
									<td class="text-center">Livro 6</th>
									<td class="text-center">9852525</th>
								</tr>
								<tr>
									<th scope="row" class="text-center">7</th>
									<td class="text-center">Livro 7</td>
									<td class="text-center">13415524</td>
								</tr>
								<tr>
									<th scope="row" class="text-center">8</th>
									<td class="text-center">Livro 8</td>
									<td class="text-center">6363324</td>
								</tr>
								<tr>
									<th scope="row" class="text-center">9</th>
									<td class="text-center">Livro 9</td>
									<td class="text-center">85345325</td>
								</tr>
								<tr>
									<th scope="row" class="text-center">10</th>
									<td class="text-center">Livro 10</td>
									<td class="text-center">534662</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</body>
</html>

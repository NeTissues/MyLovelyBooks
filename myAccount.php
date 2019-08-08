<?php
	Session_Start();
	$userName = "No one";
	$loginValid = false;
	$books;
	$countBooks = 0;
	$reading = 0;
	$complete = 0;
	$interesting = 0;
	if(isset($_SESSION["name"]) && $_SESSION["login"] == true){
		$userName = $_SESSION["name"];
		$loginValid = true;
		if(isset($_SESSION["myAccount_QtnLinkedBooks"])){
			$countBooks = $_SESSION["myAccount_QtnLinkedBooks"];
			
		}
		if(isset($_SESSION["myAccount_LinkedBooks"])){
			$books = $_SESSION["myAccount_LinkedBooks"];
		}
		if(isset($_SESSION["myAccount_LinkedBookStatus"])){
			$countBooks = $_SESSION["myAccount_QtnLinkedBooks"];
			foreach($_SESSION["myAccount_LinkedBookStatus"] as $status){
				if($status == 1){
					$complete++;
				}
				else if($status == 2){
					$reading++;
				}
				else if($status == 3){
					$interesting++;
				}
			}
		}
		//var_dump($_SESSION["myAccount_LinkedBookStatus"]);
		//var_dump($_SESSION["myAccount_LinkedBooks"])
		
		$complete = ($complete * 100) / $countBooks;
		$reading = ($reading * 100) / $countBooks;
		$interesting = ($interesting * 100) / $countBooks;
	}
	else{

		Header("Location: login.php");
	}
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
		<title>My Lovely Books - Minha Conta</title>
		<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"></link>
		<link href="css/css.css" rel="stylesheet" type="text/css"></link>
	</head>
	<body>
		<div class="banner">
			<a href="index.php">
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
						<li><a href="myAccount.php">Minha Conta</a></li>
						<li><a href="logout.php">Logout</a></li>
					<?php endif; ?>
				  </ul>
				  <form class="navbar-form navbar-right" action="search_book.php" method="post">
					<div class="form-group">
					  <input type="text" class="form-control" placeholder="Procurar livro...">
					</div>
					<button type="submit" class="btn btn-default">Procurar</button>
				  </form>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
		<div class="col-sm-4 col-xs-6 painel">
			<div class="jumbotron mybooks">
				<div class="row text-center">
					<h2 class="text-center aproximar-topo"><?=$userName?></h2>
					<img src="images/profile-icon.png" width="200" height="200"/>
				</div>
				<div class="row text-center">
					<button class="btn btn-danger" data-toggle="modal" data-target="#editInfo">Editar Informações</button>
					<button class="btn btn-danger">Excluir Conta</button>
				</div>
			</div>
		</div>
		<div class="col-sm-5 col-xs-6 painel-top jumbotron mybooks">
			<div class="">
				<div class="separar">
					<h4 class="text-center">Total de Livros Associados a Conta: <?=$countBooks?></h4>
				</div>
				<div class="separar">
					<div class="progress">
					  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
					  aria-valuemin="0" aria-valuemax="100" style="width:100%">
						<!--379 Livros já Lidos-->
							<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"
							aria-valuemin="0" aria-valuemax="100" style="width:<?=$reading?>%">
								<!--13 Livros em Andamento-->
							</div>
							<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60"
							aria-valuemin="0" aria-valuemax="100" style="width:<?=$interesting?>%">
							<!--57 Livros que me interessa-->
							</div>
					  </div>
					</div>
				</div>
<!--Usar "htmlspecialchars"-->
				<ul>
					<form action="lista.php">
					<li class="lido">
						<div class="legenda">
							<button class="btn btn-link legenda" type="submit">Livros já Lidos</button>
						</div>
					</li>
					<li class="lendo">
						<div class="legenda">
							<button type="submit" class="btn btn-link legenda">Livros em Andamento</button>
						</div>
					</li>
					<li class="interesse">
						<div class="legenda">
							<button class="btn btn-link legenda" type="submit">Livros que Prentendo Ler</button>
						</div>
					</li>
					</form>
				</ul>
			</div>
		</div>
		<div class="col-sm-9 arrumar">
			<div class="panel panel-default ">
				<div class="panel-heading">
					<h3 class="panel-title text-center">Últimos Livros Lidos</h3>
				</div>
				<div class="panel-body ">
					<ul class="list-inline">
					<?php foreach($books as $book) :?>
						<li>
							<div class="panel panel-default">
								<div class="panel-body">
									<img src="images/book_default.png" width="100" height="100"/>
								</div>
								<div class="panel-footer text-center"><?=$book?></div>
							</div>
						</li>
					<?php endforeach?>
					</ul>
				</div>
			</div>
		</div>
		<div class="modal fade" id="editInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Modal title</h4>
			  </div>
			  <form action="editInfo.php">
				  <div class="modal-body">
						<div class="row">
							<div class="col-md-2">
								<label class="form-label">Imagem de Perfil:</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" size="50"/>
							</div>
						</div>
						<div class="row separar">
							<div class="col-md-2">
								<label class="form-label">Nome:</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" size="70"/>
							</div>
						</div>
						<div class="row separar">
							<div class="col-md-2">
								<label class="form-label">E-mail:</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" size="70"/>
							</div>
						</div>
						<div class="row separar">
							<div class="col-md-2">
								<label class="form-label">Data de Nascimento:</label>
							</div>
							<div class="col-md-9">
								<input type="date" class="form-control" size="70"/>
							</div>
						</div>

				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-danger">Salvar Alterações</button>
				  </div>
			  </form>
			</div>
		  </div>
		</div>

</html>

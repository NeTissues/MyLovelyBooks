<?php
	Session_Start();
	include_once 'bdService/bdBook.php';
	$loginValid = false;
	$book;
	if(isset($_SESSION["name"]) && $_SESSION["login"] == true){
		$userName = $_SESSION["name"];
		$loginValid = true;
		
		if(isset($_GET["id"])){
			$id = $_GET["id"];
			$book = getOneBook($id);
		}
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
		<div class="col-sm-3 col-xs-6 painel">
			<div class="jumbotron mybooks">
				<div class="row text-center">
					<h4 class="text-center aproximar-topo"><?=$book["title"]?></h4>
					<img src="images/book_default.png" class="img-responsive"/>
				</div>
				<div class="row text-center">
					<h2><span>Score:</span> <?=$book["score"]?></h2>
					<div class="col-md-12 ">
						<hr/>
						<div class="form-group col-sm-6 col-xs-6">
							<label for="author">Autor:</label>
							<p id="author"><?=$book["author"]?></p>
						  </div>
						  <div class="form-group col-sm-6 col-xs-6">
							<label for="publisher">Editora:</label>
							<p id="publisher"><?=$book["publisher"]?></p>
						  </div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-xs-6 painel-top jumbotron mybooks">
			<div class="row aproximar-topo">
				<h2 class="text-center">#RANKING </h2>
			</div>
			</br></br>
			<div class="form-group row separar">
				<div class="col-sm-4">
					<div class="separar">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Página" aria-describedby="basic-addon2">
							<span class="input-group-addon" id="basic-addon2"><?=$book["pages"]?></span>
						</div>
					</div>
				</div>
				<div class="col-sm-5">
					<div class="separar">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Volumes" aria-describedby="basic-addon2">
							<span class="input-group-addon" id="basic-addon2"><?= ($book["volumes"] == "" ? "?" : $book["volumes"])?></span>
						</div>
					</div>
				</div>
				
				<div class="col-sm-3">
					<div class="separar">
						<div class="dropdown">
							<button class="btn btn-default dropdown-toggle" type="button" id="status" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								Status
								<span class="caret"></span>
							</button>
						  <ul class="dropdown-menu" aria-labelledby="status">
							<li><a href="#">Estou Lendo</a></li>
							<li><a href="#">Quero Ler</a></li>
							<li><a href="#">Já Li</a></li>
						  </ul>
						</div>
					</div>
	<!--Usar "htmlspecialchars"-->
				</div>
				
				</br></br></br></br>
				<div class="form-group col-md-12">
					<h3 for="synopsis">Sinópse:</h3>
					<div id="synopsis"><?=$book["synopsis"]?></div>
				</div>
			</div>
			
			
		</div>
		<div class="col-sm-9 arrumar jumbotron myperfil">
				<div class="row">
					<div class="col-sm-3">
						<img src="images/profile-icon.png" class="img-responsive" />
					</div>	
					<div class="col-sm-8">
						<div class="row">
							<textarea class="form-control" rows="5" placeholder="Deixe seu Comentário!	"></textarea>
						</div>
						</br>
						<div class="row separar">
							<div class="col-sm-8">
								<div class="dropdown">
									<button class="btn btn-default dropdown-toggle" type="button" id="score" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										(✮)	Avaliação
										<span class="caret"></span>
									</button>
								  <ul class="dropdown-menu" aria-labelledby="score">
									<li value="10">(10) Maravilhoso! </li>
									<li value="9">(9) Adorei! </li>
									<li value="8">(8) Muito bom! </li>
									<li value="7">(7) Legal. </li>
									<li value="6">(6) É ok. </li>
									<li value="5">(5) Podia ser melhor... </li>
									<li value="4">(4) Ruim. </li>
									<li value="3">(3) Muito ruim! </li>
									<li value="2">(2) Não remendo! </li>
									<li value="1">(1) Horrível! </li>
									<li value="0">(0) Que horror! Tira isso daqui! </li>
								  </ul>
								</div>
							</div>
							<div class="col-sm-3">
								<input type="submit" class="btn btn-danger" value="Enviar Comentário"/>
							</div>
						</div>
					</div>
				</div>
				<hr/>
				<div class="row">
					</br>
						<ul class="no-dot">
							<li class="">
								<div class="col-sm-3 coment-border">
									<h3 class="text-center">Usuário</h3>
									<img src="images/profile-icon.png" class="img-responsive"/>
								</div>	
								<div class="col-sm-8 comentario coment-border painel-top">
									<div class="row">
										<label>Avaliação: 10</label>
									</div>
									</br>
									<div class="row separar">
										fhaioejlkaflkaoqgolkng.dgnf</br>
										a]faejgaigaçvaahfajfhkjahfa</br>
										gaagkgjaegaljgkjalkgjeakjglka</br>
										gegagjajgaegjaçlgaçlgjaçgjea</br>
									</div>
								</div>
							</li>
						</ul>
				</div>
		</div>
			
</html>

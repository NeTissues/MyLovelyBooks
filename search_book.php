<?php
	Session_Start();
	$userName;
	$loginValid = false;
	if(isset($_SESSION["login"]) && $_SESSION["login"] == true){
		$userName = $_SESSION["name"];
		$loginValid = true;
	}
	
	$server = "localhost";
	$base = "mylovelybooks"; //Inserir Banco

	$user = "root"; //Inserir Usuário
	$password = ""; //Inserir Senha
	$sucess = true;
	$log = "";
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
				  <a class="navbar-brand" href="index.php">My Lovely Books</a>
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

    <div class="col-sm-9 col-xs-6 painel">
      <div class="row">
        <div class="panel panel-default ">
          <div class="panel-heading">
            <h3 class="panel-title text-center">Resultados</h3>
          </div>
          <div class="row">
            <ul class="list-group">

<?php

$livro = $_POST['search'];
$query = "SELECT * FROM tb_book WHERE title like '%$livro%'";


if($livro == ""){

  ?>
  <div class="panel-heading">
    <h3 class="panel-title text-center">Pesquisa inválida</h3>
  </div>

  <?php
}else{
    try{
        $connection = new PDO("mysql:host=$server;dbname=$base", $user, $password);

        foreach ($connection->query($query) as $row) {
          $rec_title = $row['title'];
          $rec_author = $row['author'];
          $rec_id = $row['bookId'];

          ?>

              <li class="list-group-item">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <img src="images/book_default.png" width="100" height="100"/>
                  </div>
                  <div class="panel-footer"><?= $rec_title;?></div>
                </div>

              </li>


          <?php
        }

    }catch(PDOException $e){
        $log = $e;
        echo "Error: " . $log;
    }
}
 ?>
      </ul>
    </div>
  </div>
</div>
</div>
  </body>
</html>

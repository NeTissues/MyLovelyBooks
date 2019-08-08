<?php


$redirection = $_POST['register'];
$login = $_POST['usuario'];

$server = "localhost";
$base = "dbteste"; //Inserir Banco
$user = "adm"; //Inserir Usuário
$password = "123"; //Inserir Senha
$sucess = true;
$log = "";

if($redirection == "Registre-se"){

  header('Location: Register.php');

} else{

  try{
	$query = "SELECT password FROM user WHERE name = '$login' ";
	$senha_rec = "";
    $connection = new PDO("mysql:host=$server;dbname=$base", $user, $password);

    $senha = $connection->query($query) ;
	
	foreach ($connection->query($query) as $row) {
						$senha_rec = $row["password"];
					}

    if($senha_rec == $_POST['senha'] && $_POST['senha'] != ""){
      session_start();
	  
	  $_SESSION['name'] = $login;
	  Header("Location: index.php");
    }else {
      

    }

    }catch (PDOException $e){
    $log = $e;
    echo "Error: " . $log;
    $sucess = false;
  }
}

?>

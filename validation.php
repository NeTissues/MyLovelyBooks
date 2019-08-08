<?php

$login = $_POST['usuario'];
$redirection = $login == "" ? $_POST['register'] : "";
$server = "localhost";
$base = "mylovelybooks"; //Inserir Banco
$user = "root"; //Inserir Usuário
$password = "aluno"; //Inserir Senha
$sucess = true;
$log = "";

$query = "SELECT password,userId FROM tb_user WHERE name = '$login' ";
$senha_rec = "";
$user_id = "";

if($redirection == "Registre-se"){

  header('Location: register_layout.php');

} else{

    try{
      $connection = new PDO("mysql:host=$server;dbname=$base", $user, $password);

    	foreach ($connection->query($query) as $row) {
    						$senha_rec = $row["password"];
                $id_rec = $row["userId"];
    					}

      if($senha_rec == $_POST['senha'] && $_POST['senha'] != ""){
        session_start();
        $_SESSION['idUsu'] = $id_rec;
    	  $_SESSION['login'] = true;
    	  $_SESSION['name'] = $login;
    	  Header("Location: index.php");
      }else {
  		  Header("Location: login.php");
      }

      }catch (PDOException $e){
        $log = $e;
        echo "Error: " . $log;
        $sucess = false;
    }
}

?>

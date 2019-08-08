<?php
$register_user = $_POST['username_register'];
$register_email = $_POST['email'];
$register_password = $_POST['password'];

$conf_password = $_POST['conf-password'];
$conf_email = false;
$conf_user = false;

$server = "localhost";
$base = "mybooklist"; //Inserir Banco
$user = "adm"; //Inserir Usuário
$password = "123"; //Inserir Senha
$sucess = true;
$log = "";

$query_insert = "INSERT INTO tb_user (name, email, password, birth) VALUES ('$register_user', '$register_email', '$register_password' , CURDATE())";
$query_select = "SELECT * FROM tb_user";
$senha_rec = "";
$user_id = "";

    try{
      $connection = new PDO("mysql:host=$server;dbname=$base", $user, $password);

      $validador = "/^(([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}){0,1}$/";

      foreach ($connection->query($query_select) as $row) {
    						$name_rec = $row['name'];
                if($name_rec == $register_user){
                  $conf_user = false;
                } else{
                  $conf_user = true;
                }
    					}

      $conf_email = preg_match($validador, $register_email);

      if($register_password == $conf_password  && $conf_email == true && $conf_user == true && $register_password != ""){
          $connection->exec($query_insert);
          Header("Location: index.php");
      }else{
          Header("Location: register_layout.php");
      }

      }catch (PDOException $e){
        $log = $e;
        echo "Error: " . $log;
        $sucess = false;
    }

?>

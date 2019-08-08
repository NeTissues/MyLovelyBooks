<?php
session_start();
$idUsu = $_SESSION['idUsu'];

$server = "localhost";
$base = "mylovelybooks"; //Inserir Banco

$user = "root"; //Inserir Usuário
$password = "aluno"; //Inserir Senha
$sucess = true;
$log = "";

try{
	$query = "SELECT * FROM user_book WHERE userId = '$idUsu'";
	$id_rec = "";
    $connection = new PDO("mysql:host=$server;dbname=$base", $user, $password);

    $id = $connection->query($query) ;

	$c = 0;
	foreach ($connection->query($query) as $row) {
		$id_rec[] = $row["bookId"];
		$book_status[$c] = $row["bookStatus"];
		$c++;
	}

	foreach($id_rec as $id){
		$getBookQuery = "SELECT title FROM tb_book WHERE bookId = '$id' ";
		$book = $connection->query($getBookQuery) ;
		$countBooks = 0;
		//$ListBooks = array;
		foreach ($connection->query($getBookQuery) as $row) {
			$book_rec[] = $row["title"];

			//$ListBooks[$countBooks] = $row["title"];
			$countBooks++;
		}
	}
	$_SESSION['myAccount_IdLinkedBooks'] = $id_rec;
	$_SESSION['myAccount_QtnLinkedBooks'] = $countBooks;
	$_SESSION['myAccount_LinkedBooks'] = $book_rec;
	$_SESSION['myAccount_LinkedBookStatus'] = $book_status;
	Header("Location: myAccount.php");

    }catch (PDOException $e){
		$log = $e;
		//echo "Error: " . $log;
		$sucess = false;
		$_SESSION['myAccount_Error'] = "Error: " . $log;
  }

?>

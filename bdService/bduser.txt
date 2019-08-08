<?php
	include_once 'conection.php';
	
	function createBook($tilte, $author, $synopsis, $publisher, $volumes, $chapters, $pages, $score, $categoryId){
		$sql = "INSERT INTO tb_book ('title', 'author', 'synopsis', 'publisher', 'volumes', 'chapters', 'pages', 'score', 'categoryId') VALUES"
			. "( '$tilte', '$author', '$synopsis', '$publisher', '$volumes', '$chapters', $pages, $score, $categoryId)";
		
		//echo $sql;
		
		$conn = abrirConexao();
		
		if(mysqli_query($conn, $sql)){
			$_SESSION["message"] = "Produto Cadastrado com Sucesso";
			header("Location: homeAdmin.php");
		} else {
			$_SESSION["message"] = "Erro ao cadastrar ".mysqli_connect_error()." ".mysqli_connect_errno();;
			echo $_SESSION["message"];
		}
		
		fecharConexao($conn);
	}
	
	function listBooks(){
		$sql = "SELECT * FROM tb_book";
		$conn = abrirConexao();
		$array = array();
		$result = mysqli_query($conn, $sql);
		//$array = $result->fetch_array(MYSQLI_ASSOC);
		
		if(mysqli_query($conn, $sql)){
			if($result){
				if(mysqli_num_rows($result)>0){
					while($row = mysqli_fetch_assoc($result)){
						$array[] = $row;
					} 
				}
			}
			$_SESSION["message"] = "Consulta Realizada com Sucesso";
		} else {
			$_SESSION["message"] = "Erro ao fazer consulta";
		}
		fecharConexao($conn);
		return $array;
	}
	
	function listBooksByCategory($categoryId){
		$sql = "SELECT * FROM tb_book WHERE categoryId =".$categoryId;
		$conn = abrirConexao();
		$array = array();
		$result = mysqli_query($conn, $sql);
		//$array = $result->fetch_array(MYSQLI_ASSOC);
		
		if(mysqli_query($conn, $sql)){
			if($result){
				if(mysqli_num_rows($result)>0){
					while($row = mysqli_fetch_assoc($result)){
						$array[] = $row;
					} 
				}
			}
			$_SESSION["message"] = "Consulta Realizada com Sucesso";
		} else {
			$_SESSION["message"] = "Erro ao fazer consulta";
		}
		fecharConexao($conn);
		return $array;
	}
	
	function getOneBook($id){
		$sql = "SELECT * FROM tb_book WHERE bookId=".$id;
		$conn = abrirConexao();
		$array = array();
		$result = mysqli_query($conn, $sql);
		
		if(mysqli_query($conn, $sql)){
			if($result){
				if(mysqli_num_rows($result)>0){
					while($row = mysqli_fetch_assoc($result)){
						$array[] = $row;
					} 
				}
			}
			$_SESSION["message"] = "Consulta Realizada com Sucesso";
		} else {
			$_SESSION["message"] = "Erro ao fazer consulta";
		}
		fecharConexao($conn);
		return $array[0];
	}
	
	function editBook($id, $tilte, $author, $synopsis, $publisher, $volumes, $chapters, $pages, $score, $categoryId){
		$sql = "UPDATE tb_book SET title = '$title', author = '$author', synopsis = '$synopsis', publisher = '$publisher', 
		volumes = '$volumes', chapters = '$chapters', pages = $pages, score = $score, categoryId = $categoryId
		WHERE bookId = ".$id;
		
		//echo $sql;
		$conn = abrirConexao();
		
		if(mysqli_query($conn, $sql)){
			$_SESSION["message"] = "Produto Cadastrado com Sucesso";
			header("Location: homeAdmin.php");
		} else {
			$_SESSION["message"] = "Erro ao cadastrar ".mysqli_connect_error()." ".mysqli_connect_errno();;
			echo $_SESSION["message"];
		}
		
		fecharConexao($conn);
	}
	
	
	
	function deleteBook($id){
		$sql = "DELETE FROM tb_book WHERE bookId=".$id;
			
			$conn = abrirConexao();
			
			if(mysqli_query($conn, $sql)){
				$_SESSION["message"] = "Produto Excluido com Sucesso";
				header("Location: homeAdmin.php");
			} else {
				$_SESSION["message"] = "Erro ao Excluir ".mysqli_connect_error()." ".mysqli_connect_errno();;
				echo $_SESSION["message"];
			}
		
		fecharConexao($conn);
	}
?>
<?php
	include_once 'conection.php';
	
	function registerUser($name, $email, $password, $photo, $birth){
		$sql = "INSERT INTO tb_user('name', 'email', 'password', 'photo', 'birth') VALUES"
			. "('$name', '$email', '$password', '$photo', '$birth')";
		
		//echo $sql;
		
		$conn = abrirConexao();
		
		if(mysqli_query($conn, $sql)){
			$_SESSION["message"] = "Usuário Registrado com Sucesso";
			header("Location: homeAdmin.php");
		} else {
			$_SESSION["message"] = "Erro ao registrar ".mysqli_connect_error()." ".mysqli_connect_errno();;
			echo $_SESSION["message"];
		}
		
		fecharConexao($conn);
	}
	
	function listUsers(){
		$sql = "SELECT * FROM tb_user";
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
	
	function verifyAccess($email, $password){
		$conn = abrirConexao();
		$users = array();
		$result;
		$users = listUsers();
		foreach($users as $row){
			if($row["email"] == $email){
				if($row["password"] == $password){
					$result = $row;
				}
				else{
					$result = "Senha Inválida";
				}
			}
			else{
				$result = "Usuário não Existe";
			}
		}
		
		return $result;
	}
?>
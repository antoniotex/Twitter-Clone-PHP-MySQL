<?php 

	require_once('db.class.php');

	$usuario = $_POST['usuario'];
	$email = $_POST['email'];
	$senha = md5($_POST['senha']);

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	//vefify user

	$sql = " select * from usuarios where usuario = '$usuario' ";
	if($resultado_id = mysqli_query($link, $sql)){
		$dados_usuario= mysqli_fetch_array($resultado_id);

		if(isset($dados_usuario['usuario'])){
			echo 'user already have login';
		}else{
			echo 'user not have login';
		}
	}else{
		echo 'Erro ao localizar registro de user';
	}

	//vefify email
	$sql = " select * from usuarios where email = '$email' ";
	if($resultado_id = mysqli_query($link, $sql)){
		$dados_usuario= mysqli_fetch_array($resultado_id);

		if(isset($dados_usuario['email'])){
			echo 'email already have login';
		}else{
			echo 'email not have login';
		}
	}else{
		echo 'Erro ao localizar registro de email';
	}




	$sql = " insert into usuarios(usuario, email, senha) values ('$usuario', '$email', '$senha') ";

	//executar a query(conexao, sql)
	if(mysqli_query($link, $sql)){
		echo 'Inserido com sucesso';
	}else{
		echo 'Erro ao registrar user';
	}

 ?>
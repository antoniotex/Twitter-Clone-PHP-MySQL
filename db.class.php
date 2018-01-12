<?php 

class db {
	//host
	private $host = 'localhost';

	//usuario
	private $usuario = 'root';

	//senha
	private $senha = '';

	//banco de dados
	private $database = 'twitter_clone';

	public function conecta_mysql(){
		//cria conexão(localizacao bd, usuario acesso, senha, banco de dados)
		$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

		//Ajustar charset de comunicação entre app e DB
		mysqli_set_charset($con, 'utf8');

		//vereficar se houve erro de conexão
		if(mysqli_connect_errno()){
			echo 'Erro ao tentar conectar com o BD MySQL'.mysqli_connect_error();
		}
		return $con;
	}


}

 ?>
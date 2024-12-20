<?php

class Usuarios {

	public function cadastrar($nome, $email, $senha) {
		global $pdo;
		$sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
		$sql->bindValue(":email", $email);
		$sql->execute();

		if($sql->rowCount() == 0 ) {

			$sql = $pdo->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha");
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":senha", md5($senha));
			$sql->execute();

			return true;

		} else {
			return false;
		}
	}

	public function login($email, $senha) {
		global $pdo;

		$sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email AND senha = :senha");
		$sql->bindValue(":email", $email);
		$sql->bindValue(":senha", md5($senha));
		$sql->execute();

		if($sql->rowCount() > 0) {
			$dado = $sql->fetch();
			$_SESSION['cLogin'] = $dado['id'];
			return true;
		} else {
			return false;
		}
	}

	public function esquecerSenha($email, $senha) {
		
		$sql = "SELECT * FROM usuarios";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			
			if(!empty($_POST['senha'])) {
				$senha = $_POST['senha'];

				$sql = "UPDATE usuarios SET senha = :senha WHERE email = :email";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(":senha", md5($senha));
				$sql->bindValue(":email", $email);
				$sql->execute();

				return true;

			} else {
				return false;
			}
		}
			
	}
}

?>

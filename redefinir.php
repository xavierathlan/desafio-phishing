<?php
require'page/header.php'; ?>
<div class="container">
	<h1>Trocar Senha</h1>
	<?php 
	require 'classe/usuarios.class.php';
	$u = new Usuarios();
	if(isset($_POST['nome']) && !empty($_POST['nome'])) {
		$nome = addslashes($_POST['nome']);
		$email = addslashes($_POST['email']);
		$senha = $_POST['senha'];

		if(!empty($nome) && !empty($email) && !empty($senha)) {
			if($u->esquecerSenha($nome, $email, $senha)) {
				?>
				<div class="alert alert-success">
					<strong>Parabéns!</strong>
					Cadastro realizado com sucesso.<a href="login.php" class="alert alert-link">Faça login agora</a>	
				</div>
			 	<?php
			} else {
				?>
				<div class="alert alert-warning">
				Este usuário já existe! <a href="login.php" class="alert alert-link">Faça login agora</a>
				</div>
			 	<?php
			}	
		} else {
			?>
			<div class="alert alert-warning">
				Preencha todos os campos!
			</div>
			<?php
		}
	
	}	
	?>
	<form method="POST">
		<div class="form-group">
			<label for="email">E-mail:</label>
			<input type="email" name="email" id="email" class="form-control" />
		</div>
		<div class="form-group">
			<label for="senha">Senha:</label>
			<input type="password" name="senha" id="senha" class="form-control" />
		</div>
		<input type="submit" value="Trocar Senha" class="btn btn-defaut" />
	</form>
</div> 

<?php require'page/footer.php'; ?>

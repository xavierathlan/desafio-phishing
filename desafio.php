<?php require'page/header.php'; ?>
<?php
if(empty($_SESSION['cLogin'])) {
	?>
	<script type="text/javascript">window.location.href="login.php";</script>
	<?php
	exit;
}
?>

<div class="container">
	<h2>Desafio Phishing:</h2>

	
	<div class="alert alert-success">
		<strong>Parabéns!</strong>
		Alguma mensagem.<a href="./" class="alert alert-link"></a>	
	</div>
	
</div>

<?php require'page/footer.php'; ?>

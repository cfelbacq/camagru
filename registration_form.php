<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body id="connexion_body">
<div id="inscription">
	<h1 class="camagru_h1">Camagru</h1>
	<form method="post" action="inscription.php" style="padding-top: 10px;">
		<h2 id="inscription_h2">Inscrivez-vous pour voir les montages de vos "amis".</h2>
		<div id="propre">
			<div class="info_form">
				<input type="text" class="info_register" name="email" value="Email">
			</div>
			<div class="info_form">
				<input type="text" class="info_register" name="login" value="Pseudo">
			</div>
			<div class="info_form">
				<input type="password" class="info_register" name="passwd" value="Password">
			</div>
		</div>
		<input id="button" type="submit" name="register" value="INSCRIPTION">
		<p id="attention">En vous inscrivant, vous acceptez tout plein de bidules.</p>
		<div id="separation">
		<div class="separation_line"></div>
		</div>
		<p id="already_register">Vous avez un compte ?<a href="login_form.php" style="text-decoration: none; color: #00BFFF;"> Connectez-vous </a><p>
	</form>
</div>
</body>
</html>
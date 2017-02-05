<?php include "layout/header.php"; ?>
<div id="connexion">
	<h1 class="camagru_h1">Camagru</h1>
	<p style="margin-top: -10px; margin-bottom: -30px;"><a href="forget_pass.php" style="text-decoration: none; color: red;">Mot de passe oublié?</a></p>
	<form method="post" action="check_log.php" style="padding-top: -10px;">
		<div id="propre">
			<div class="info_form">
				<input type="text" class="info_register" name="login" placeholder="Pseudo">
			</div>
			<div class="info_form">
				<input type="password" class="info_register" name="passwd" placeholder="Password">
			</div>
		</div>
		<input id="button" type="submit" name="register" value="CONNEXION">
		<div id="separation">
		<div class="separation_line"></div>
		</div>
		<p id="already_register">Vous n'avez pas de compte ?<a href="registration_form.php" style="text-decoration: none; color: #00BFFF;"> Inscrivez-vous </a>
	</form>
</div>
</body>
</html>
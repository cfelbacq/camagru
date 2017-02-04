<?php
	print_r($_POST);
	if(!empty($_POST))
	{
		$errors = array();
		require('config/database.php');
		require('member_class.php');
		require('member_manager_class.php');
		$db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		$member = new member();
		if ($member->set_email(htmlspecialchars($_POST['email'])) == 0)
		{
			$errors['mail'] = "Votre mail n'est pas valide";
		}
		if ($member->set_pseudo(htmlspecialchars($_POST['login'])) == 0)
		{
			$errors['pseudo'] = "Votre pseudo n'est pas valide";
		}
		if ($member->set_password(htmlspecialchars($_POST['passwd'])) == 0)
		{
			$errors['password'] = "Votre mot de passe n'est pas valide";
		}
		if (empty($errors))
		{
			$member_manager = new member_manager($db);
			$member_manager->add($member);
			echo "inscription reussi";
		}
	}
	else
		echo 'a';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body id="connexion_body">
<pre>
	<?php if (!empty($errors)){print_r($errors);} ?>
</pre>
<div id="inscription">
	<h1 class="camagru_h1">Camagru</h1>
	<form method="post" action="registration_form.php" style="padding-top: 10px;">
		<h2 id="inscription_h2">Inscrivez-vous pour voir les montages de vos "amis".</h2>
		<div id="propre">
			<div class="info_form">
				<input type="text" class="info_register" name="email" placeholder="Email">
			</div>
			<div class="info_form">
				<input type="text" class="info_register" name="login" placeholder="Pseudo">
			</div>
			<div class="info_form">
				<input type="password" class="info_register" name="passwd" placeholder="Password">
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
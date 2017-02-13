<?php
	print_r($_POST);
	if(!empty($_POST))
	{
		$errors = array();
		require('config/database.php');
		require('member_class.php');
		require('member_manager_class.php');
		$db = new PDO('mysql:host=localhost;dbname=camagru;charset=utf8', $DB_USER, $DB_PASSWORD);
		$member = new member();
		if ($member->set_email(htmlspecialchars($_POST['email'])) == 0)
		{
			$errors['mail'] = "Votre mail n'est pas valide";
		}
		if ($member->set_pseudo(htmlspecialchars($_POST['login'])) == 0)
		{
			$errors['pseudo'] = "Votre pseudo n'est pas valide";
		}
		if ($member->set_password(htmlspecialchars(hash('whirlpool', $_POST['passwd']))) == 0)
		{
			$errors['password'] = "Votre mot de passe n'est pas valide";
		}
		if (empty($errors))
		{
			$member->set_cle(md5(microtime(TRUE)*100000));
			$member->set_actif(0);
			$member_manager = new member_manager($db);
			if ($member_manager->is_exist($member) == 0)
			{
				$member_manager->add($member);
				$member_manager->mail($member);
			}
			else
				$errors['compte'] = "Pseudo existant";
		}
	}
	else
		echo 'a';
?>
<?php include "layout/headers.php"; ?>
<br/><br/><br/><br/><br/><br/>
<pre>
	<?php if (!empty($errors)){print_r($errors);} ?>
</pre>
<div id="inscription">
	<h1 class="camagru_h1">Camagru</h1>
	<form method="post" action="registration_form.php" style="padding-top: 10px;">
		<h2 id="inscription_h2">Inscrivez-vous pour voir les montages de vos "amis".</h2>
		<div id="propre">
			<div class="info_form">
				<input type="text" class="info_register" name="email" placeholder="Email" required>
			</div>
			<div class="info_form">
				<input type="text" class="info_register" name="login" placeholder="Pseudo" required>
			</div>
			<div class="info_form">
				<input type="password" class="info_register" name="passwd" placeholder="Password" required>
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
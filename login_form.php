<?php 
	session_start();
	require('config/database.php');
	require('member_class.php');
	require('member_manager_class.php');
	$db = new PDO('mysql:host=localhost;dbname=camagru;charset=utf8', $DB_USER, $DB_PASSWORD);
	$member_manager = new member_manager($db);
	if (isset($_GET['log']) && $_GET['cle'])
	{
		$member_manager->valid_mail($_GET['log'], $_GET['cle']);
	}
	if (isset($_POST['pseudo']) && isset($_POST['passwd']))
	{
		$row = $member_manager->login($_POST['pseudo'], $_POST['passwd']);
		//print_r($row);
		if ($row != 0)
		{
			$member = new member();
			$member->set_id($row['id']);
			$member->set_email($row['email']);
			$member->set_pseudo($row['pseudo']);
			$member->set_password($row['password']);
			$member->set_cle($row['cle']);
			$member->set_actif($row['actif']);
			$_SESSION['member'] = $member;
			$_SESSION['loggued_on_user'] = 1;
			header('location: member_space.php');
		}
	}
	include "layout/headers.php";
?>
<div id="connexion">
	<h1 class="camagru_h1">Camagru</h1>
	<p style="margin-top: -10px; margin-bottom: -30px;"><a href="forget_pass.php" style="text-decoration: none; color: red;">Mot de passe oublié?</a></p>
	<form method="post" action="login_form.php" style="padding-top: -10px;">
		<div id="propre">
			<div class="info_form">
				<input type="text" class="info_register" name="pseudo" placeholder="Pseudo">
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
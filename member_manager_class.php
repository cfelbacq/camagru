<?php
class member_manager
{
	private $_db;
	/**
	* Attribut contenant l'instance représentant la BDD.
	* @type PDO
	*/
	public function __construct(PDO $db)
	{
		$this->_db = $db;
	}

	public function login($login, $pass)
	{
		//print("function: login");
		$password = hash('whirlpool', $pass);
		$req = $this->_db->prepare('SELECT * FROM membres WHERE pseudo LIKE :pseudo');
		if ($req->execute(array('pseudo' => $login)))
		{
			$row = $req->fetch();
			if (!empty($row))
			{

				if ($login === $row['pseudo'])
				{
		//			echo "pseudo ok";
					if ($password === $row['password'])
					{
		//				echo "password ok";
						if ($row['actif'] == 1)
						{
		//					echo "actif ok -> connection";
							return ($row);
						}
						else
							echo "actif not ok";
					}
					else
						echo "password not ok";
				}
				else
					echo "pseudo not ok";
			}
			else
				echo "compte inexistant";
			return (0);
		}
	}

	public function is_exist(member $member)
	{
		print("function: is_exist");
		$req = $this->_db->prepare('SELECT * FROM membres WHERE pseudo LIKE :pseudo');
		print_r($req);
		if ($req->execute(array('pseudo' => $member->pseudo())))
		{
			if (($row = $req->fetch()) != NULL)
				return (1);
		}
		return (0);
	}

	public function add(member $member)
	{
		print("function add");
		print_r($member);
		$req = $this->_db->prepare('INSERT INTO membres(email, pseudo, password, cle, actif)
									VALUES(:email, :pseudo, :password, :cle, :actif)');
		$req->execute(array(
			'email' => $member->email(),
			'pseudo' => $member->pseudo(),
			'password' => $member->password(),
			'cle' => $member->cle(),
			'actif' => $member->actif()));
	}

	public function mail(member $member)
	{
		$destinataire = $member->email();
		$sujet = "Activer votre compte";
		$entete = "From: inscription@votresite.com";
 
// Le lien d'activation est composé du login(log) et de la clé(cle)
		$message = 'Bienvenue sur VotreSite,
 
Pour activer votre compte, veuillez cliquer sur le lien ci dessous
ou copier/coller dans votre navigateur internet.
 
http://localhost/camagru/login_form.php?log='.urlencode($member->pseudo()).'&cle='.urlencode($member->cle()).'
 
 
---------------
Ceci est un mail automatique, Merci de ne pas y répondre.';

		mail($destinataire, $sujet, $message, $entete); // Envoi du mail
	}

	public function valid_mail($pseudo, $cle)
	{
		$req = $this->_db->prepare("SELECT cle, actif FROM membres WHERE pseudo LIKE :pseudo");
		if ($req->execute(array('pseudo' => $pseudo)) && $row = $req->fetch())
		{
			$clebdd = $row['cle'];
			$actif = $row['actif'];
		}

		if($actif == '1') // Si le compte est déjà actif on prévient
  		{
   		  echo "Votre compte est déjà actif !";
  		}
		else // Si ce n'est pas le cas on passe aux comparaisons
  		{
    		if($cle == $clebdd) // On compare nos deux clés	
    	    {
        	  // Si elles correspondent on active le compte !	
        	  echo "Votre compte a bien été activé !";
 
         	  // La requête qui va passer notre champ actif de 0 à 1
         	  $req = $this->_db->prepare("UPDATE membres SET actif = 1 WHERE pseudo like :pseudo ");
         	  $req->execute(array('pseudo' => $pseudo));
      		}
   		  else // Si les deux clés sont différentes on provoque une erreur...
    	 	{
       		   echo "Erreur ! Votre compte ne peut être activé...";
    	  	}
 		 }
	}

	public function count()
	{
		return $this->_db->query('SELECT COUNT(*) FROM membres');
	}

	public function delete($id)
	{
		$this->_db->exec('DELETE FROM membres WHERE id = '.(int) $id);// pas proteger
	}

}
?>
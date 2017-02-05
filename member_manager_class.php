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

	public function add(member $member)
	{
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
<?php
class member_manager
{
	private $db;
	/**
	* Attribut contenant l'instance représentant la BDD.
	* @type PDO
	*/
	public function __construct(PDO $db)
	{
		$this->db = $db;
	}

	public function add(member $member)
	{
		print_r($member);
		$req = $this->db->prepare('INSERT INTO membres(email, pseudo, password/*, cle, actif*/) VALUES(:email, :pseudo, :password/*, :cle, :actif*/');

		print_r($req);
		$req->bindValue(':email', $member->email());
				print_r($req);
		$req->bindValue(':pseudo', $member->pseudo());
		$req->bindValue(':password', $member->password());
	//	$req->bindValue(':cle', $member->cle());
	//	$req->bindValue(':actif', $member->actif());

		$req->execute();
	}

	public function count()
	{
		return $this->db->query('SELECT COUNT(*) FROM membres');
	}

	public function delete($id)
	{
		$this->db->exec('DELETE FROM membres WHERE id = '.(int) $id);
	}

}
?>
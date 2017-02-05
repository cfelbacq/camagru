<?php
class member
{
	private $_id;
	private $_email;
	private $_pseudo;
	private $_password;
	private $_cle;
	private $_actif;
/*
	function __construct{

	}
*/
	public function id(){return $this->_id;}
	public function email(){return $this->_email;}
	public function pseudo(){return $this->_pseudo;}
	public function password(){return $this->_password;}
	public function cle(){return $this->_cle;}
	public function actif(){return $this->_actif;}

	public function set_id($new_id)
	{
		$new_id = (int) $new_id;
		echo "id: ".$new_id."<br/>";
		$this->_id = $new_id;
	}

	public function set_email($new_email)
	{
		echo $new_email;
		if (trim($new_email) != "")
		{
			if (is_string($new_email) && preg_match("#^[A-Za-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $new_email))
			{
				$this->_email = $new_email;
				echo "<br/>class email: ".$this->_email."<br />";
				return (1);
			}
		}
		return (0);
	}

	public function set_pseudo($new_pseudo)
	{
		echo $new_pseudo;
		if (is_string($new_pseudo))
		{
			$new_pseudo = htmlspecialchars($new_pseudo);
			$this->_pseudo = $new_pseudo;
			echo "<br/>class pseudo: ".$this->_pseudo."<br/>";
			return (1);
		}
		return (0);
	}

	public function set_password($new_password)
	{
		echo $new_password;
		if (is_string($new_password))
		{
			echo "a";
			$new_password = hash('whirlpool', $new_password);
			echo "a";
			$this->_password = $new_password;
			echo "a";
			echo "<br/>class password".$this->_password;
			echo "a";
			return (1);
		}
		return (0);
	}

	public function set_cle($new_cle)
	{
			$this->_cle = $new_cle;
	}

	public function set_actif($new_actif)
	{
		if ($new_actif === 1 || $new_actif === 0)
		{
			$this->_actif = $new_actif;
			return 1;
		}
		return 0;
	}
}
?>
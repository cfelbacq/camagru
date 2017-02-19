<?php
class image
{
	
	private $_id;
	private $_image;
	private $_type;
	private $_width;
	private $_height;
	private $_auteur;

	public function id(){return $this->_id;}
	public function image(){return $this->_image;}
	public function type(){return $this->_type;}
	public function width(){return $this->_widht;}
	public function height(){return $this->_height;}
	public function auteur(){return $this->_auteur;}

	public function set_id($new_id)
	{
		$new_id = (int) $new_id;
		$this->_id = $new_id;
	}

	public function set_image($new_image)
	{
		$this->_image = $new_image;
	}

	public function set_type($new_type)
	{
		$this->_type = $new_type
	}

	public function set_width($new_width)
	{
		$this->_width = $new_width;
	}

	public function set_height($new_height)
	{
		$this->_height = $new_height;
	}

	public function set_auteur($new_auteur)
	{
		$this->_auteur = $new_auteur;
	}
}
?>
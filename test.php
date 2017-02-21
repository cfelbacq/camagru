<?php
	merge();
/*
	function redimension()
	{
		$source = imagecreatefrompng("image_to_merge/"."fleur.png"); // La photo est la source
	$destination = imagecreatetruecolor(200, 150); // On crée la miniature vide

	// Les fonctions imagesx et imagesy renvoient la largeur et la hauteur d'une image
	$largeur_source = imagesx($source);
	$hauteur_source = imagesy($source);
	$largeur_destination = imagesx($destination);
	$hauteur_destination = imagesy($destination);
	// On crée la miniature
	imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
	//	imagealphablending($destination, true);
//imagesavealpha($destination, true);
	// On enregistre la miniature sous le nom "mini_couchersoleil.jpg"
	return ($destination);
	}
*/
	function merge()
	{
		$src = imagecreatefrompng("image_to_merge/branch.png");
		$dest = imagecreatefrompng("img/test.png");
		$largeur_src = imagesx($src);
		$hauteur_src = imagesy($src);
		$largeur_dest = imagesx($dest);
		$hauteur_dest = imagesy($dest);

		$dest_x = ($largeur_dest - $largeur_src) / 2;
		$dest_y = ($hauteur_dest - $hauteur_src) / 2;

//$black = imagecolorallocate($src, 0, 0, 0);
//imagecolortransparent($dest, $black);

imagecopy($dest, $src, $dest_x, $dest_y, 0, 0, $largeur_src, $hauteur_src);

header('Content-Type: image/png');
imagepng($dest);

file_put_contents("image_merge.png" ,$dest);

imagedestroy($dest);
imagedestroy($src);
}
?>
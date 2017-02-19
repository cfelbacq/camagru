<?php
	merge();

	function redimension($img)
	{
		$source = imagecreatefromjpeg("image_to_merge".$img); // La photo est la source
	$destination = imagecreatetruecolor(200, 150); // On crée la miniature vide

	// Les fonctions imagesx et imagesy renvoient la largeur et la hauteur d'une image
	$largeur_source = imagesx($source);
	$hauteur_source = imagesy($source);
	$largeur_destination = imagesx($destination);
	$hauteur_destination = imagesy($destination);

	// On crée la miniature
	imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);

	// On enregistre la miniature sous le nom "mini_couchersoleil.jpg"
	file_put_contents("image_to_merge"."$img", $destination);
	}

	function merge()
	{
	$img = "masque.jpg";
	redimension($img);
$src = imagecreatefromjpeg("image_to_merge/masque.jpg");
$dest = imagecreatefrompng("img/test.png");
$largeur_src = imagesx($src);
$hauteur_src = imagesy($src);
$largeur_dest = imagesx($dest);
$hauteur_dest = imagesy($dest);

$dest_x = ($largeur_dest - $largeur_src);
$dest_y = ($hauteur_dest - $hauteur_src);

//imagealphablending($dest, false);
//imagesavealpha($dest, true);

imagecopymerge($dest, $src, $dest_x, $dest_y, 0, 0, $largeur_src, $hauteur_src, 100);

header('Content-Type: image/png');
imagepng($dest);

imagedestroy($dest);
imagedestroy($src);
}
?>
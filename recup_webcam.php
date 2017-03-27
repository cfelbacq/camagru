<?
	print_r($_POST);
if ($_POST['data'])
  {
    $img = !empty($_POST['data']) ? $_POST['data'] : die("No image was posted");
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);

    $fileData = base64_decode($img);

    $imgName = sha1(microtime());
    $imgName = $imgName.'.png';
    file_put_contents("img/".$imgName, $fileData);
    merge($imgName);
  }
//echo $_SESSION['imgName'];
function merge($imgName)
{
	$src = imagecreatefrompng("image_to_merge/oiseaux.png");
	$dest = imagecreatefrompng("img/".$imgName);
	$largeur_src = imagesx($src);
	$hauteur_src = imagesy($src);
	$largeur_dest = imagesx($dest);
	$hauteur_dest = imagesy($dest);
	
	$dest_x = ($largeur_dest - $largeur_src) / 2;
	$dest_y = ($hauteur_dest - $hauteur_src) / 2;

	//$black = imagecolorallocate($src, 0, 0, 0);
	//imagecolortransparent($dest, $black);

	imagecopy($dest, $src, $dest_x, $dest_y, 0, 0, $largeur_src, $hauteur_src);	
	echo $dest;

	imagedestroy($dest);
	imagedestroy($src);
}
?>
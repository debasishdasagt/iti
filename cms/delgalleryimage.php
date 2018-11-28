<?php
include('sessionValidation.php');
if(isset($_GET['file']))
{
    $dir="gallery/gallery-images/".$_GET['file'];
    $d=unlink($dir);
    if($d)
    {
        header("Location: gallery.php?token=$t");
    }
    else
    {
        echo "Error";
    }
}
?>


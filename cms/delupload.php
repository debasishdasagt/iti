<?php
include("../config.php");
if(isset($_GET['file']))
{
    $dir="uploads/".$_GET['file'];
    $d=unlink($dir);
    if($d)
    {
        $id=mysql_escape_string($_GET['id']);
    $fn=mysql_escape_string($_GET['file']);
    $mq="update uploads set del='Y',status='N' where id='$id' and filename='$fn'";
    $r=  mysql_query($mq,$conn);
    if($r)
    {
        echo "1";
    }
    else
    {
         echo "0";
    }
    }
    else
    {
        echo "0";
    }
    
}
?>


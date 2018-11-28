<?php
include("../config.php");
if(isset($_GET['status']))
{
    $id=mysql_escape_string($_GET['id']);
    $status=mysql_escape_string($_GET['status']);
    $mq="update uploads set status='$status' where id='$id'";
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
?>
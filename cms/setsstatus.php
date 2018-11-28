<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../config.php';
if(isset($_GET['id']))
{
    $id=mysql_escape_string($_GET['id']);
    $s=mysql_escape_string($_GET['s']);
    $sql="update staffs set status='$s' where staff_id='$id'";
    $e=mysql_query($sql,$conn);
    if($e)
    {
        echo "1";
    }
    else
    {
        echo "0";
    }
}
?>


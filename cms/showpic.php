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
    $sql="select photo_path from staffs where staff_id='$id'";
    $e=mysql_query($sql,$conn);
    $r=mysql_fetch_array($e);
    if($r['photo_path']==="")
    {
        echo "1@";
    }
    else
    {
        echo $r['photo_path'];
    }
}
?>
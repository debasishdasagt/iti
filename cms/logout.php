<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include("../config.php");
session_start();
$username=$_SESSION['userid'];
$tok=$_SESSION['token'];
if(isset($_GET['token']))
{
    $tok=$_GET['token'];
    $close_lastsession=  mysql_query("update cmslogins set logged_out='Y' where userid='$username' and login_token='$tok'",$conn);
    if(!$close_lastsession)
        {
            echo "Logged out with token errors";
        }
}
$_SESSION['userid']=null;
unset($_SESSION['userid']);
unset($_SESSION['token']);
unset($_SESSION['err']);
session_destroy();
header("Location: index.php");
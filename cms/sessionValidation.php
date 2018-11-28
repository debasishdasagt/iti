<?php
include '../config.php';
session_start();
if(isset($_SESSION['userid']))
{
    if(isset($_GET['token']))
    {
        $t = $_GET['token'];
        $u = $_SESSION['userid'];
        $valTok=  mysql_query("select count(*) as c from cmslogins where logged_out='N' and login_token='$t' and userid='$u'",$conn);
        $r=  mysql_fetch_array($valTok);
        if($r['c']=='0')
        {
             header('Location: logout.php');
        }
    }
    else{
        header('Location: logout.php');
        }   
}
else
{
    header('Location: index.php');
}


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include("../config.php");
$ls="";
//Getting IP Address
     $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    


//Getting New Token
    $characters=25;
    $letters = '23456789bcdfghjkmnpqrstvwxyzABCDEFGHJKLMNOPQRSTUVWX';
		$str='';
		for ($i=0; $i<$characters; $i++) { 
			$str .= substr($letters, mt_rand(0, strlen($letters)-1), 1);
		}


$tok=$str;
$ipadd=$ipaddress;
if($_SERVER['REQUEST_METHOD']=="POST")
{
session_start();
$username= mysql_real_escape_string($_POST['username']);
$password=mysql_real_escape_string($_POST['password']);
$m_query="select count(*) as c from cmsuser where user_id='$username' and user_password=md5('$password')";
$r=  mysql_query($m_query,$conn);
$rr=  mysql_fetch_array($r);
if($rr['c']=="1" and strcasecmp($_SESSION['captcha_code'], $_POST['capt']) == 0)
{
    $_SESSION['userid']=$username;
    $tok="";
    $chklastsession=  mysql_query("select count(*) as vc from cmslogins where logged_out='N' and userid='$username'",$conn);
    $oldsession=  mysql_fetch_array($chklastsession);
    $ls=$oldsession['vc'];
    if($ls!=='0')
                {
                    $_SESSION['err']="Last Session was not logged out properly or Someone else was using the CMS,His/Her Session has been logged out";
                }

    $close_lastsession=  mysql_query("update cmslogins set logged_out='Y' where userid='$username' and logged_out='N'",$conn);
    $login_q="INSERT INTO `cmslogins`
(`userid`,
`login_time`,
`login_token`,
`source_ip`)
VALUES
('$username',now(),'$str','$ipadd');";
    $login_entry=  mysql_query($login_q,$conn);
    if($login_entry and $close_lastsession)
    {
        $_SESSION['token']=$str;
    }
    else{
       echo "Somthing went wrong while doing database entry.";      
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CMS: ITI Indranagar</title>
        
    </head>
    <body><center>Redirecting.......</center>
    <script type="text/javascript">
  document.location="home.php?token=<?php echo $str;?>";
    </script>
<?php }

else 
    
    {?>
   <html>
    <head>
        <meta charset="UTF-8">
        <title>CMS: ITI Indranagar</title>
        
        <script type="text/javascript" src="../js/cms.js"></script>    
           <script type='text/javascript'>
        
        function refreshCaptcha(){
                document.getElementById('captchaimg').src='captcha.php?t='+ new Date().getTime();
        }</script>
        <link rel="stylesheet" href="../css/cms.css"/>
    </head>
    <body>
    <center>
        <div id="login">
            <form action="index.php" method="post">
                <table width="300" border="0" cellspacing="0" cellpdding="3">
                    <tr>
                        <td>Username: </td>
                    <td align="center"><input name="username" id="username" type="text"></td>
                    </tr>
                   <tr>
                        <td>Password: </td>
                    <td align="center"><input name="password" id="password" type="password"></td>
                    </tr>
                    <tr>
                        <td><img src="captcha.php" id='captchaimg' style="height: 25px; margin-right: 10px; margin-left: 5px"> <a href='javascript: refreshCaptcha();'><img src="../images/refreshicon.png" border="0" height="20" width="20" ></a></td>
                    <td align="center"><input name="capt" id="capt" type="text"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" value="Login">
                        </td>
                    </tr>
                </table>
                Something went wrong
            </form>
        </div>
    </center>
<?php

}}  else {
?>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>CMS: ITI Indranagar</title>
        
        <script type="text/javascript" src="../js/cms.js"></script>  
        <script type='text/javascript'>
        
        function refreshCaptcha(){
                document.getElementById('captchaimg').src='captcha.php?t='+ new Date().getTime();
        }</script>
        <link rel="stylesheet" href="../css/cms.css"/>
    </head>
    <body>
    <center>
        <div id="login">
            <form action="index.php" method="post">
                <table width="300" border="0" cellspacing="0" cellpdding="3">
                    <tr>
                        <td>Username: </td>
                    <td align="center"><input name="username" id="username" type="text"></td>
                    </tr>
                   <tr>
                        <td>Password: </td>
                    <td align="center"><input name="password" id="password" type="password"></td>
                    </tr>
                    <tr>
                        <td><img src="captcha.php" id='captchaimg' style="height: 25px; margin-right: 10px; margin-left: 5px"> <a href='javascript: refreshCaptcha();'><img src="../images/refreshicon.png" border="0" height="20" width="20" ></a></td>
                    <td align="center"><input name="capt" id="capt" type="text"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" value="Login">
                        </td>
                        
                    </tr>
                </table>
               
            </form>
            
        </div>
    </center>
    <?php
}
    ?>
    </body>
   </html>
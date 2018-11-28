<?php

include '../config.php';

$s_name=mysql_escape_string($_POST['s_name']);
$s_designation=mysql_escape_string($_POST['s_designation']);
$s_experience=mysql_escape_string($_POST['s_experience']);
$s_email=mysql_escape_string($_POST['s_email']);

$sql_query="insert into staffs(staff_name,designation,experience,email_id,status) values('$s_name','$s_designation','$s_experience','$s_email','C')";
$s_insert=  mysql_query($sql_query,$conn);
if($s_insert)
{
    header('Location: staffs.php?s=1');
}
 else 
    
 {
    header('Location: staffs.php?s=0');
 }

?>

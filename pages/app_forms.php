<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include('../config.php');
?>
<html>
    <head>
        <title>Notifications</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/child_page.css">
    </head>
    <body>
    <center>
        <div id="appform_banner"></div>
    </center>
    <br>
        
        <table cellspacing="2" cellpadding="0" border="0" width="95%">
            <?php
                                        $meq="select ifnull(title,'') as t,filename,new from uploads where status='Y' and type='app_form' and archived='N'";
                                        $mer=  mysql_query($meq,$conn);
                                        $c=0;
                                       
                                        while($merr=  mysql_fetch_array($mer))
                                        {
                                           
                                            
                                            if($merr['t']==="")
                                            {
                                                    if($c===1)
                                                    {
                                                        $col="#dddddd";
                                                        $c=0;
                                                    }
                                                    else
                                                    {
                                                        $col="#eeeeee";
                                                        $c=1;
                                                    }
                                                echo "<tr><td class='notification_td' style='background-color: $col;'><img src='../images/notification-icon.png'>&nbsp;&nbsp;<a href='../cms/uploads/".$merr['filename']."' target='_new'>".$merr['filename']."</a>";
                                                if($merr['new']==="Y")
                                                    {
                                                        echo "<img src='../images/new.gif'>";
                                                    }
                                                echo "</td></tr>";
                                            }
                                            else
                                            {
                                                    if($c===1)
                                                    {
                                                        $col="#dddddd";
                                                        $c=0;
                                                    }
                                                    else
                                                    {
                                                        $col="#eeeeee";
                                                        $c=1;
                                                    }
                                            
                                                 echo "<tr><td class='notification_td' style='background-color: $col;'><img src='../images/notification-icon.png'>&nbsp;&nbsp;<a href='../cms/uploads/".$merr['filename']."' target='_new'>".$merr['t']."</a>";
                                                 if($merr['new']==="Y")
                                                    {
                                                        echo "<img src='../images/new.gif'>";
                                                    }
                                                echo "</td></tr>";                                           
                                            }
                                            
                                        }
                                        ?>
        </table>
        
        <br><br>
    </body>
</html>

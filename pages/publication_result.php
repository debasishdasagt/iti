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
        <div id="result_banner"></div>
   
    <br>
        
        <table cellspacing="2" cellpadding="0" border="0" width="95%">
            <?php
                                        $meq="select DATE_FORMAT(pub_date,'%d-%m-%Y') as pd,ifnull(title,'') as t,filename,new from uploads where status='Y' and type='result_publication' and archived='N'";
                                        $mer=  mysql_query($meq,$conn);
                                        $c=0;
                                       $rc=  mysql_num_rows($mer);
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
                                                echo "<tr><td class='notification_td' style='background-color: $col;'><img src='../images/doc-icon.png'>&nbsp;&nbsp;".$merr['pd']."&nbsp;&nbsp;<a href='../cms/uploads/".$merr['filename']."' target='_new'>".$merr['filename']."</a>";
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
                                            
                                                 echo "<tr><td class='notification_td' style='background-color: $col;'><img src='../images/doc-icon.png'>&nbsp;&nbsp;".$merr['pd']."&nbsp;&nbsp;<a href='../cms/uploads/".$merr['filename']."' target='_new'>".$merr['t']."</a>";
                                                 if($merr['new']==="Y")
                                                    {
                                                        echo "<img src='../images/new.gif'>";
                                                    }
                                                echo "</td></tr>";                                           
                                            }
                                            
                                        }
                                        if($rc===0)
            {
            echo "<tr><td>Nothing Published yet.</td></tr>";
            }
                                        ?>
            
        </table>
    </center>
        <br><br>
    </body>
</html>

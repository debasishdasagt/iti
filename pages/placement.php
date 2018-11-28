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
        <title>Placement Updates</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/child_page.css">
    </head>
    <body>
        <div class="child_header2" style="background-image: url('../images/placement_area.jpg')">Training & Placement</div>
   
    <center>
        <span style="font-family: sans-serif; font-weight: bold; font-size:16px; font-style: italic;color: black">Placement Updates</span>
        <table cellspacing="2" cellpadding="0" border="0" width="95%">
            <?php
            
            $nq="select count(*) as cc from uploads where status='Y' and type='placement' and archived='N' order by id desc";
                                        $nc= mysql_query($nq,$conn);
                                        $nr=  mysql_fetch_array($nc);
            if($nr['cc']==="0")
            {
                echo "<div class='notification_td' style='background-color: red'><br><br>No Updates<br><br></div>";
            }
            else
            {
                                        $meq="select DATE_FORMAT(pub_date,'%d-%m-%Y') as pd,ifnull(title,'') as t,filename,new from uploads where status='Y' and type='placement' and archived='N' order by id desc";
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
                                                echo "<tr><td class='notification_td' style='background-color: $col;'><img src='../images/notification-icon.png'>&nbsp;&nbsp;".$merr['pd']."&nbsp;&nbsp;<a href='../cms/uploads/".$merr['filename']."' target='_new'>".$merr['filename']."</a>";
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
                                            
                                                 echo "<tr><td class='notification_td' style='background-color: $col;'><img src='../images/notification-icon.png'>&nbsp;&nbsp;".$merr['pd']."&nbsp;&nbsp;<a href='../cms/uploads/".$merr['filename']."' target='_new'>".$merr['t']."</a>";
                                                 if($merr['new']==="Y")
                                                    {
                                                        echo "<img src='../images/new.gif'>";
                                                    }
                                                echo "</td></tr>";                                           
                                            }
                                            
            }}
                                        ?>
        </table>
    </center>
    <table cellspacing="5" cellpadding="0" border='0'>
            
            <tr>
                <td valign='top'>
                    <br>
                    <span style="font-family: sans-serif; font-weight: bold; font-size:16px; font-style: italic;color: black">Training And Placement</span>
                    <p style="text-align: justify">
                    
                        We are pleased to introduce ourselves as one of the major Industrial Training Institute at Indranagar, Agartala
of Department of Industries &amp; Commerce, Government of Tripura. Our Institute offers various courses in
the Automobile, Construction, Electronics &amp; Hardware, Fabrication, IT &amp; ITE, Electrical, Production etc.
affiliated to National Council for Vocational Training (NCVT) an advisory body of Director General of
Training (DGT) under Ministry of Skill Development &amp; Entrepreneurship (MSDE), Government of India
giving an opportunity to trainees from various social and economic backgrounds to be part to excel in
vocational education. The detailed list of courses offered by the Institute is available on this website.

                    </p>
                </td>
            </tr>
            <tr>
                <td>
                   <p style="text-align: justify"> 
                   
                       The Institute has an active Training cum Placement Cell (TCPC) which also works as Career Development
Centre looking into the placement for its trainees under all sectors. The objective of the Institute TCPC is to
help trainees identify their career goals and provide an edge into the present day competitive job market. The
scope of work of TCPC extends from organizing workshops to arranging apprenticeship training to trainees
in various organizations and preparing them for the final placements.
                       
                   </p>
                </td>
            </tr>
           
        </table>
        <br><br>
    </body>
</html>

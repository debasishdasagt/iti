<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
include('config.php');
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/menu_vertical.css">
        <link rel="stylesheet" type="text/css" href="css/slider.css">
        <meta charset="UTF-8">
        <title>ITI Indranagar</title>
        
        <script type="text/javascript" src="js/page_script.js"></script>
        <script type="text/javascript" src="js/nenu_vertical.js"></script>
        <script type="text/javascript" src="js/slider.js"></script>
    </head>
    <body>
        
        
    <center>
        
        <div id="head_container">
        <div id="banner_container">
            <table id="baner_table" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td id="td_banner_bg_img">
                                <div id=slider>
                                    
                                    <!-- New Gallery Here -->
                                    
                                    <div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade"><img src="images/refreshicon.png" style="width:100%" id="sl1"></div>
  <div class="mySlides fade"><img src="images/refreshicon.png" style="width:100%" id="sl2"></div>
  <div class="mySlides fade"><img src="images/refreshicon.png" style="width:100%" id="sl3"></div>
    <div class="mySlides fade"><img src="images/refreshicon.png" style="width:100%" id="sl4"></div>
      <div class="mySlides fade"><img src="images/refreshicon.png" style="width:100%" id="sl5"></div>
        <div class="mySlides fade"><img src="images/refreshicon.png" style="width:100%" id="sl6"></div>
          <div class="mySlides fade"><img src="images/refreshicon.png" style="width:100%" id="sl7"></div>
      

</div>
                                    
                                    
                                </div>
                                
                                
                                
                                
                                
                         
            
            <div id="overlay">
                             <div id="overlay1"></div>
                             <div id="overlay2"></div>
                             <div id="overlay3"></div>
                             <div id="overlay4"></div>
            </div>
                    </td>
                    <td id="td_header">
                        
                        
                       <div id="header_text">
                           <img src="images/sakhsharata_logo.jpg" class="logo">
                           <img src="images/govt_tripura.jpg" class="logo">
                           <img src="images/skill_india_logo.jpg" class="logo">
                           <br>
                           Government ITI Indranagar<br>
                           <span id="sub_header">Under Department of Industries & Commerce</span>
                    </div>
                       </td>
                </tr>
            </table>
        </div>
        
        <div id="menu_bar">
            
            
            <table id="menu" cellspacing="5" border="0" cellpadding="2">
                <tr>
                    <td class="button"><a href="pages/home.html" class="lnk" target="page_frame">Home</a></td>
                    <td class="button"><a href="pages/organizational_profile.php" class="lnk" target="page_frame">Organizational Profile</a></td>
                    <td class="button"><a href="pages/admission.php" class="lnk" target="page_frame">Admission</a></td>
                    <td class="button"><a href="pages/uc.php" class="lnk" target="page_frame">Record of Trainees</a></td>
                    <td class="button"><a href="pages/placement.php" class="lnk" target="page_frame">Training & Placement </a></td>
                    <td class="button"><a href="pages/staffs.php" class="lnk" target="page_frame">Staffs</a></td>
                    <td class="button"><a href="pages/notifications.php" target="page_frame" class="lnk">Notifications</a></td>
                    <td class="button"><a href="pages/contact_us.html" class="lnk" target="page_frame">Contact Us</a></td>
                </tr>
                
                
            </table>
            
            
            
        </div></div>
        
        <table id="page_container" cellspacing="0" cellpadding="0" border="0">
            <tr>
                <td valign="top" style="padding-top: 5px; padding-right: 3px">
                    
                        
                        
                        
                        
                        
                        <ul id="menu-v">
    <li><a href="pages/about_us.php" target="page_frame">About Us</a></li>
    <li><a href="pages/schemes.php" target="page_frame">Schemes</a></li>
    <li><a href="#">Trades</a>
        <ul class="sub">
            <li><a href="pages/ncvt_trades.php" target="page_frame">Affiliated to NCVT</a></li>
            <li><a href="pages/scvt_trades.php" target="page_frame">Affiliated to SCVT</a></li>
        </ul>
    </li>
    <li><a href="#">Results</a>
        <ul class="sub"><li><a href="pages/publication_result.php" target="page_frame">Semester Results</a></li>
            <li><a href="pages/overall_result.php" target="page_frame">Overview</a></li>
        </ul>
    </li>
    <li><a href="pages/uc.php" target="page_frame">Quality Monitoring</a></li>    
    <li><a href="pages/uc.php" target="page_frame">RTI</a>">

        
    </li>
    <li><a href="pages/gallery.php" target="page_frame">Image Gallery</a></li>
    <li><a href="cms/index.php" target="_new">CMS Login</a></li>
</ul>
                    
                        
                        
                   <div id="notification_pane">
                        <table>
                            <tr>
                                <td>
                                    <div id="notification_header">Notifications</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                            <div id="notifications">
                                <marquee direction="up" height="150" scrollamount="2" behavior="scroll"  onmouseover="stop()" onmouseout="start()">
                                    <ul>
                                        <?php
                                        $meq="select ifnull(title,'') as t,filename,new from uploads where status='Y' and type='notification' and archived='N' order by id desc limit 10";
                                        $mer=  mysql_query($meq,$conn);
                                        while($merr=  mysql_fetch_array($mer))
                                        {
                                            
                                            
                                            if($merr['t']==="")
                                            {
                                                echo "<li><a href='cms/uploads/".$merr['filename']."' target='_new'>".$merr['filename']."</a>";
                                                if($merr['new']=="Y")
                                            {
                                                echo "<img src='images/new.gif'></li>";
                                            }
                                            else
                                            {
                                                echo "</li>";
                                            }
                                            }
                                            else
                                            {
                                                 echo "<li><a href='cms/uploads/".$merr['filename']."' target='_new'>".$merr['t']."</a>";
                                                 if($merr['new']=="Y")
                                            {
                                                echo "<img src='images/new.gif'></li>";
                                            }
                                            else
                                            {
                                                echo "</li>";
                                            }
                                            }
                                            
                                        }
                                        ?>
                          
                                        </ul>
                                    
                                </marquee>
                           
                                <div style="text-align: right; width: 95%; margin-bottom: 10px"><a href="pages/notifications.php" target="page_frame">View All >></a></div>
                            </div>
                                        
                                </td>
                            </tr>
                        </table>     
                        
                       
                   </div>  
                    
                    <table border="0" width="100%">
                        
                        <tr>
                            <td align="center">
                                <a href="http://grievance.tripura.gov.in" target="_blank"><img src="images/grievances.jpg" class="image_link" border="0"></a>
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                            <a href="http://tripura.gov.in" target="_blank"><img src="images/stateportal.jpg" class="image_link" border="0"></a>
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                            <a href="http://industries.tripura.gov.in" target="_blank"> <img src="images/inc.jpg" class="image_link" border="0"></a>
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                            <a href="http://dget.nic.in/content" target="_blank"><img src="images/dgt.jpg" class="image_link" border="0"></a>
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                            <a href="https://ncvtmis.gov.in" target="_blank"><img src="images/ncvt.jpg" class="image_link" border="0"></a>
                            </td>
                        </tr>
                    </table>

                </td>
                <td valign="top">
                    <iframe id="page_frame" name="page_frame" src="pages/home.html" frameborder="0" scrolling="no" onload=javascript:resizeIframe(this)>
        </iframe>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                      
                    
        <div id="footer">
            
            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                <tr>
                    <td align="left" class="footer_links">
                        <?php
                       $mq="select ifnull(visitor_counter,0) as cc from counter";
                       $mr=mysql_query($mq,$conn);
                       $mrr=mysql_fetch_array($mr);
                       $vc=$mrr['cc']+1;
                       $mqu="update counter set visitor_counter=$vc,last_updated=now()";
                       $meu=mysql_query($mqu,$conn);
                       echo "Visitor: <b>$vc</b>";
                       
                        ?>
                        
                    </td>
                    
                    <td align="center">
                        
                    </td>
                    <td align="right" class="footer_links">
                        Last Updated on: 26/06/2018
                    </td>
                </tr>
            </table>
            Copyright © 2017, Industrial Training Institute, Indranagar
            <br>
            Designed by: ITI Indranagar
        </div>
                    
                    
                    
                    
                </td>
            </tr>
        </table>
        
       
        
        
        
    </center>
    <script type="text/javascript">  
        
        document.getElementById('sl1').src='images/slider/1.jpg';
        document.getElementById('sl2').src='images/slider/2.jpg';
        document.getElementById('sl3').src='images/slider/3.jpg';
        document.getElementById('sl4').src='images/slider/4.jpg';
        document.getElementById('sl5').src='images/slider/5.jpg';
        document.getElementById('sl6').src='images/slider/6.jpg';
        document.getElementById('sl7').src='images/slider/7.jpg';
        
        
      var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 5000); // Change image every 2 seconds
}   </script>
        
    </body>
</html>

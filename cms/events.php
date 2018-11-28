

<html>
<head>
    <link rel="stylesheet" href="../css/cms.css"/>
     <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/cms.js"></script> 
    <script type="text/javascript" src="../js/datetimepicker_css.js"></script>
    
</head>
<body>
<center>
    <?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include('sessionValidation.php');  
include("../config.php");
$errors= array();
$extensions= array("jpeg","jpg","png","bmp","pdf","doc","docx","xls","xlsx","ppt","pptx");
if(isset($_FILES['eventfile']))
{
    $name=$_FILES['eventfile']['name'];
    $tmpname=$_FILES['eventfile']['tmp_name'];
    $ext=  strtolower(end(explode(".", $name)));
    if(! in_array($ext, $extensions))
    {
        $errors[]="Unsupported File Type";
    }
    
    if(empty($errors))
    {
        $cr=  mysql_query("select count(*) as c from uploads where filename='$name' and del='N'",$conn);
        $crr=  mysql_fetch_array($cr);
        if($crr['c']==0)
        {
        $upload=move_uploaded_file($tmpname, "uploads/".$name);
        if(!$upload)
        {
            echo "something went wrong";
        }
        else
        {
            $t=$_POST['filetitle'];
            $nt=$_POST['n_type'];
            $pt=$_POST['pub_time'];
            $m_query="insert into uploads(filename,title,type,pub_date) values('$name','$t','$nt','$pt')";
            $r=  mysql_query($m_query,$conn);
            if($r)
            {
               echo $name." Uploaded Successfully"; 
            }
            else
            {
                echo "error occoured while doing database entry";
                echo "<br>".$m_query;
            }
        }
        }
        else
        {
            echo "Please rename the file, because a file with same name is already exists";
        }
    }
    else
    {
        print_r($errors);
    }
}

?>
    <div id="eventuploader" style="border: 1px solid #cccccc; border-radius: 5px; margin-top: 10px">
        <form id="eventup" name="eventup" action="events.php" method="post" enctype = "multipart/form-data"> 
            <table cellspacing="1" cellpadding="5" border=0 width="80%">
                <tr style="background-color:#eeeeee; border-radius: 3px">
                    <td>
                        Enter Title:<input type="text" name="filetitle" id="filetitle"/>
                    </td>
                    <td>
                        Select Type:<select name="n_type" id="n_type">
                <option value="notification">Notification</option>
                <option value="placement">Placement</option>
                <option value="result_publication">Result Publication</option>
                <option value="overall_result">Overall Results</option>
            </select>
                    </td>
                </tr>
                <tr style="background-color:#eeeeee; border-radius: 3px">
                    <td>
                        Publication Date - Time: <input type="text" name="pub_time" id="pub_time" readonly="readonly" onfocus="javascript:NewCssCal('pub_time')">
            
                    </td>
                    <td>
                        <input type="file" name="eventfile" id="eventfile"/>
                    </td>
                </tr>
            </table>
            
            <input type="submit" value="UPLOAD"/>
        </form>
    </div>
    
    
    <div id="eventuploader" style="border: 1px solid #cccccc; border-radius: 5px; margin-top: 10px">
        <table width="100%" cellspacing="1" cellpadding="3" border="0">
            <tr>
                <td style="background-color: #000000; color: #ffffff; font-weight: bold; font-size: 12px" align="center">
                    Notification Title
                </td>
                <td style="background-color: #000000; color: #ffffff; font-weight: bold; font-size: 12px" align="center">
                    File Name
                </td>
                <td style="background-color: #000000; color: #ffffff; font-weight: bold; font-size: 12px" align="center">
                    Published on
                </td>
                <td style="background-color: #000000; color: #ffffff; font-weight: bold; font-size: 12px" align="center">
                    Type
                </td>
                <td style="background-color: #000000; color: #ffffff; font-weight: bold; font-size: 12px" align="center">
                    New
                </td>
               
                <td style="background-color: #000000; color: #ffffff; font-weight: bold; font-size: 12px" align="center">
                    Status
                </td>
                <td style="background-color: #000000; color: #ffffff; font-weight: bold; font-size: 12px" align="center">
                    Delete
                </td>
            </tr>
            
        <?php
        $mqq="select id,filename,ifnull(title,'') as t,status,new,pub_date,del,type from uploads order by id desc";
        $mqr=  mysql_query($mqq,$conn);
        while($mqrr=  mysql_fetch_array($mqr))
        {
            ?>
            <tr>
                <td style="background-color: #cccccc; color: #000000; font-size: 12px" align="left">
                    <?php echo $mqrr['t']; ?>
                </td>
                <td style="background-color: #cccccc; color: #000000; font-size: 12px" align="left">
                    <a href="uploads/<?php echo $mqrr['filename']; ?>"><?php echo $mqrr['filename']; ?></a>
                </td>
                <td style="background-color: #cccccc; color: #000000; font-size: 12px" align="left">
                    <?php echo $mqrr['pub_date']; ?>
                </td>
                <td style="background-color: #cccccc; color: #000000; font-size: 12px" align="left">
                    <?php echo $mqrr['type']; ?>
                </td>
                <td style="background-color: #cccccc; color: #000000; font-size: 12px" align="center" id='<?php echo $mqrr['id']."_n"; ?>'>
                     <?php 
                    
                    
                    if($mqrr['new']==='N')
                    {
                        ?>
                    <input type="button" onclick="javascript:setnewstatus('<?php echo $mqrr['id']; ?>','Y')" value="NEW">
                    <?php
                    }
                    else
                    {
                    ?>
                    
                    <input type="button" onclick="javascript:setnewstatus('<?php echo $mqrr['id']; ?>','N')" value="Cancel">
                    <?php
                    }
                    ?>
                </td>
                <td style="background-color: #cccccc; color: #000000; font-size: 12px" align="center" id='<?php echo $mqrr['id']."_s"; ?>'>
                    <?php 
                    
                    
                    if($mqrr['status']==='Y')
                    {
                        ?>
                    <input type="button" onclick="javascript:setestatus('<?php echo $mqrr['id']; ?>','N')" value="Block">
                    <?php
                    }
                    else
                    {
                    ?>
                    
                    <input type="button" onclick="javascript:setestatus('<?php echo $mqrr['id']; ?>','Y')" value="UnBlock">
                    <?php
                    }
                    ?>
                </td>
                <td style="background-color: #cccccc; color: #000000; font-size: 12px" align="center" id='<?php echo $mqrr['id']."_d"; ?>'>
                    <?php 
                    
                    
                    if($mqrr['del']==='N')
                    {
                        ?>
                    <input type="button" onclick="javascript:delupload('<?php echo $mqrr['id']; ?>','<?php echo $mqrr['filename']; ?>')" value="Delete">
                    <?php
                    }
                    else
                    {
                    ?>
                    
                    Deleted
                    <?php
                    }
                    ?>
                </td>
                
            </tr>
            
            <?php
        }
        ?>
        </table>
    </div>
</center>
</body>
</html>
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var wheight,wwidth;
$(document).ready(function()
{    wwidth=$(document).width();

    wheight=$(document).height();
});



$(document).ready(function()
{
   $('#maincontainer').css("height",Math.round(wheight*0.9)+"px");
   $('#maincontainer').css("width",Math.round(wwidth*0.7)+"px");
   $('#maincontainer').css("margin-left","-"+Math.round((wwidth*0.7)/2)+"px");
   $('#maincontainer').css("margin-top","-"+Math.round((wheight*0.9)/2)+"px");
});


function approval(r,s)
{
    var xmltest,handler,v,regurl,t;
    if(s=="PaymentDone")
    {
        s="Payment Done";
    }
    regurl="approval.php?regnum="+r+"&status="+s;
        if (window.XMLHttpRequest)                
		{
                    xmltest=new XMLHttpRequest();
		}
		else
		{
                    xmltest=new ActivXobject("Microsoft.XMLHTTP");
		}
		xmltest.onreadystatechange=function()
		{
			if(xmltest.readyState == 4 && xmltest.status==200)
			{
				handler=xmltest.responseText;
				if(handler=="1")
                                {
                                   
                                    if(s=="Approved")
                                    {
                                      document.getElementById(r+"_s").innerHTML="Approved";
                                    }
                                    else
                                    {
                                         document.getElementById(r+"_s").innerHTML="Approve";
                                    }
                              
                                }
                                else
                                {
                                    document.getElementById(r+"_s").innerHTML="Error";
                                }
                                
                        }
			else
			{
				document.getElementById(r+"_s").innerHTML="Updating...";
			}
			
		}
		xmltest.open("GET",regurl,true)
		xmltest.send()
}

function reginfo(r)
{
    document.location="../registration/registration.php?regnum="+r;
}


function setnewstatus(id,status)
{
    var xmltest,handler,v,regurl,t;
    
    regurl="setnewstatus.php?id="+id+"&status="+status;
        if (window.XMLHttpRequest)                
		{
                    xmltest=new XMLHttpRequest();
		}
		else
		{
                    xmltest=new ActivXobject("Microsoft.XMLHTTP");
		}
		xmltest.onreadystatechange=function()
		{
			if(xmltest.readyState == 4 && xmltest.status==200)
			{
				handler=xmltest.responseText;
				if(handler.indexOf('1')>=1)
                                {
                                   
                                    document.getElementById(id+'_n').innerHTML='Changed';
                              
                                }
                                else
                                {
                                   document.getElementById(id+'_n').innerHTML='Error';
                                }
                                
                        }
			else
			{
				document.getElementById(id+'_n').innerHTML='Updating.....';
			}
			
		}
		xmltest.open("GET",regurl,true)
		xmltest.send()
}


function setestatus(id,status)
{
    var xmltest,handler,v,regurl,t;
    
    regurl="setestatus.php?id="+id+"&status="+status;
        if (window.XMLHttpRequest)                
		{
                    xmltest=new XMLHttpRequest();
		}
		else
		{
                    xmltest=new ActivXobject("Microsoft.XMLHTTP");
		}
		xmltest.onreadystatechange=function()
		{
			if(xmltest.readyState == 4 && xmltest.status==200)
			{
				handler=xmltest.responseText;
				if(handler.indexOf('1')>=1)
                                {
                                   
                                    document.getElementById(id+'_s').innerHTML='Changed';
                              
                                }
                                else
                                {
                                   document.getElementById(id+'_s').innerHTML='Error';
                                   
                                }
                                
                        }
			else
			{
				document.getElementById(id+'_s').innerHTML='Updating.....';
			}
			
		};
		xmltest.open("GET",regurl,true);
		xmltest.send();
}

function submit_staff()
{
    if(document.getElementById('s_name').value==='')
    {
        alert("Please Enter staff name");
    }
    else
    {
        document.getElementById('staffs').submit();
    }
}


function getsstatus()
{
    var xmltest,handler,v,regurl,t;
    v=document.getElementById('staff_select').value;
    regurl="getsstatus.php?id="+v
        if (window.XMLHttpRequest)                
		{
                    xmltest=new XMLHttpRequest();
		}
		else
		{
                    xmltest=new ActivXobject("Microsoft.XMLHTTP");
		}
		xmltest.onreadystatechange=function()
		{
			if(xmltest.readyState == 4 && xmltest.status==200)
			{
				handler=xmltest.responseText;
				if(handler.indexOf('1')>=1)
                                {
                                   
                                    document.getElementById('s_block_td').innerHTML='<a href=javascript:setsstatus("C")>Unblock</a>';
                              
                                }
                                else if(handler.indexOf('0')>=1)
                                {
                                   document.getElementById('s_block_td').innerHTML='<a href=javascript:setsstatus("D")>Block</a>';
                                   
                                }
                                
                        }
			else
			{
				document.getElementById('s_block_td').innerHTML='Checking.....';
			}
			
		};
		xmltest.open("GET",regurl,true);
		xmltest.send();
}


function show_pic()
{
    var xmltest,handler,v,regurl,t;
    v=document.getElementById('staff_select').value;
    regurl="showpic.php?id="+v;
        if (window.XMLHttpRequest)                
		{
                    xmltest=new XMLHttpRequest();
		}
		else
		{
                    xmltest=new ActivXobject("Microsoft.XMLHTTP");
		}
		xmltest.onreadystatechange=function()
		{
			if(xmltest.readyState == 4 && xmltest.status==200)
			{
				handler=xmltest.responseText;
				if(handler.indexOf('1@')>=1)
                                {
                                   
                                    alert("Pic Not uploaded");
                              
                                }
                                else
                                {
                                   t=window.open(handler,"","width=200,height=200");
                                   
                                }
                                
                        }
			else
			{
				//t="";
			}
			
		};
		xmltest.open("GET",regurl,true);
		xmltest.send();
}

function setsstatus(s)
{
    var xmltest,handler,v,regurl,t;
    v=document.getElementById('staff_select').value;
    regurl="setsstatus.php?id="+v+"&s="+s;
        if (window.XMLHttpRequest)                
		{
                    xmltest=new XMLHttpRequest();
		}
		else
		{
                    xmltest=new ActivXobject("Microsoft.XMLHTTP");
		}
		xmltest.onreadystatechange=function()
		{
			if(xmltest.readyState == 4 && xmltest.status==200)
			{
				handler=xmltest.responseText;
				if(handler.indexOf('1')>=1)
                                {
                                   
                                    document.getElementById('s_block_td').innerHTML='Updated';
                              
                                }
                                else if(handler.indexOf('0')>=1)
                                {
                                   document.getElementById('s_block_td').innerHTML='Error';
                                   
                                }
                                
                        }
			else
			{
				document.getElementById('s_block_td').innerHTML='Updating.....';
			}
			
		};
		xmltest.open("GET",regurl,true);
		xmltest.send();
}

function delupload(v,s)
{
    var xmltest,handler,regurl,t;
    regurl="delupload.php?file="+s+"&id="+v;
        if (window.XMLHttpRequest)                
		{
                    xmltest=new XMLHttpRequest();
		}
		else
		{
                    xmltest=new ActivXobject("Microsoft.XMLHTTP");
		}
		xmltest.onreadystatechange=function()
		{
			if(xmltest.readyState == 4 && xmltest.status==200)
			{
				handler=xmltest.responseText;
				if(handler.indexOf('1')>=1)
                                {
                                   
                                    document.getElementById(v+'_d').innerHTML='Deleted';
                              
                                }
                                else if(handler.indexOf('0')>=1)
                                {
                                   document.getElementById(v+'_d').innerHTML='Error';
                                   
                                }
                                
                        }
			else
			{
				document.getElementById(v+'_d').innerHTML='Deleting.....';
			}
			
		};
		xmltest.open("GET",regurl,true);
		xmltest.send();
}
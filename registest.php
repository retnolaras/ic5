<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>The 5th International Conference of Research on Plasmodium vivax malaria, Bali.</title>
    <meta name="keywords" content="vivax bali,vivax malaria,vivax conference,vivax bali,vivax 5,bali conference 5,vivax bali conference,vivax,plasmodium,p. vivax,malaria conference bali,malaria,the 5th international conference of research on plasmodium vivax malaria,plasmodium vivax,international conference,bali conference,jimbaran,jimbaran intercontinental hotel,bali">
  	<meta name="description" content="The 5th International Conference of Research on Plasmodium vivax Malaria at the Jimbaran Intercontinental Hotel in Bali, Indonesia, 19th to 22nd of May 2015.">
   
    <link href="css/my_style.css" rel="stylesheet" type="text/css" />
    <link href="favicon.ico" rel="shortcut icon" title="ICRPV5 - International Conference of Research on Plasmodium vivax ">
	<link href="favicon.ico" rel="icon" title="ICRPV5 - International Conference of Research on Plasmodium vivax">
	
<style type="text/css">

    </style>
	<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-2.1.1.js"></script>
    <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
    
    <script type="text/javascript">
      var Regstat = jQuery('#regis_stat');
      var select = this.value;
      Regstat.change(function () {
          if ($(this).val() == '1') {
              $('.reg_student').hide();
          }
          // else{ $('#level_job').hide(); }// hide div if value is not "custom"
      });
    </script>


</head>
<body leftmargin="0" topmargin="0">
<?php include_once("analyticstracking.php") ?>
   
<table width="1000" border="0" cellspacing="0" cellpadding="0" align="center" >
       
		
        <tr>
          <td align="center" class="HeaderColor" div id="Separator"><hr width="980" size="1" color="#FFFFFF"/></td>
        </tr>

        <tr>
          <td>
            <h2>Register</h2>
            <?php
		        if (isset($_GET['error'])) {
		            echo '<p class="error"><font color="red">Invalid Username and/or Password!</font></p>';
		        }
	        ?> 
            <select type="text" name="registrant_status" id="regis_stat">
              <option value=""></option>
              <option value="1">Student</option>
            </select>
            <form action="includes/process_login.php" method="post" name="login_form">                      
            <table>
              <tr class="reg_student">
                <td>Email</td>
                <td>:</td>
                <td><input type="text" name="email" /></td>
              </tr>
              <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="password" id="password"/></td>
              </tr>
              <tr>
              	<td>&nbsp;</td>
              	<td>&nbsp;</td>
              	<td><input type="submit" name="submit" value="Login" onclick="formhash(this.form, this.form.password);" /></td>
              </tr>
            </table>
        	</form>
        	<p>If you haven't registered yet, please <a href="register.php">register</a></p>
        	
          </td>
        </tr>

        <tr>
        	<td align="center" class="HeaderColor" div id="Separator"><hr width="980" size="1" color="#FFFFFF"/></td>
        </tr>
        
        <tr>
        	<td height="10" align="right" valign="middle">Copyright&copy; EOCRU 2014 </td>
        </tr>
        <tr>
         	<td align="right"><p><script type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=o5vZQzrTPYa28eGCX6WlaGHyuyKvRDQgoA1zo5NCZWezHpBcX2AoCgB"></script></p></td>
      	</tr>
        </table>
</body>
</html>
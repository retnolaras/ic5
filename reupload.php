<?php
include ("includes/db_connect.php");

$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($id == "")
{
  header('location: index.php');
  exit;
}

$sql=$mysqli->query("SELECT * FROM student_detail WHERE member_id=".$id) or die(mysqli_error($mysqli));
$row = $sql->fetch_array();
if ($row['reference_flag'] != 2) {
  header('location: index.php');
  exit;
}

?>

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
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
    <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
    
</head>
<body leftmargin="0" topmargin="0">
<?php include_once("analyticstracking.php") ?>
   
<table width="1000" border="0" cellspacing="0" cellpadding="0" align="center" >
       
		
        <tr>
          <td align="center" class="HeaderColor" div id="Separator"><hr width="980" size="1" color="#FFFFFF"/></td>
        </tr>

        <tr>
          <td>
            <h3>Please upload your student reference:</h3>
            <?php
		        if(isset($_POST['submit'])){
                // echo $_POST['test'];
                // echo "<br>";
                // echo $_FILES['upfile'];
                // die();
		            include ("includes/fungsidoc.php");

                if(validation_file($_FILES['upfile'])){ 
                  $upfilename = upload_file($_FILES['upfile'], $_FILES['upfile']['type']);

                  $update = mysqli_query($mysqli, "UPDATE student_detail SET reference_letter='".$upfilename."', reference_flag='3' WHERE member_id='".$id."'");
                  if($update)
                  {
                    //$info="success";
                    // header('location: admin.php');
                    $error = "Thank you! Please wait email from administrator.";  
                  }else{
                    $error = "Process failed! Please re-upload reference.";  
                  }


                }else {
                  // error image
                  //header('location: tambahadd.php?info=image');
                  $error = "File must be in pdf format.";
                }

                            if (isset($error)){
                                  echo "<p align='center' style=\"color: red;font-weight: bold;font-size: 12px;\">".$error."</p>";
                            } 
		        }
	        ?> 
            <form action="" method="post" enctype="multipart/form-data">                      
            <table>
              <tr>
                <td>Reference</td>
                <td>:</td>
                <td><input type="file" name="upfile" /></td>
              </tr>
              <!-- <input type="hidden" name="test" value="OK"> -->
              <tr>
              	<td>&nbsp;</td>
              	<td>&nbsp;</td>
              	<td><input type="submit" name="submit" value="Submit" /></td>
              </tr>
            </table>
        	</form>
        	
        	
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
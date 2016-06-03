<?php
include 'includes/register.inc.php';
include 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Profile Page</title>
        <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
		<link href="css/my_style.css" rel="stylesheet" type="text/css" />
		
    </head>
    <body>
       Submit Abstract (maximum 200 words)<br>
		Abstract Title : <input type="text" name="abtitle" id="abtitle" >
		<form action= "abstractpdf.php"
					method="post" 
					name="submit_abstract"
					>
			<textarea rows="10" cols="70" name="abtext" id="abtext" >
			</textarea>
			
            <button type="submit">Submit</button>
		</form>			
		
			
    </body>
</html>


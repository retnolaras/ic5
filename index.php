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
    <script type="text/javascript">
	$(document).ready(function() {		
		//Execute the slideShow
		slideShow();
	});

	function slideShow() {
	
		//Set the opacity of all images to 0
		$('#gallery a').css({opacity: 0.0});
		
		//Get the first image and display it (set it to full opacity)
		$('#gallery a:first').css({opacity: 1.0});
		
		//Set the caption background to semi-transparent
		$('#gallery .caption').css({opacity: 0.7});
	
		//Resize the width of the caption according to the image width
		$('#gallery .caption').css({width: $('#gallery a').find('img').css('width')});
		
		//Get the caption of the first image from REL attribute and display it
		$('#gallery .content').html($('#gallery a:first').find('img').attr('rel'))
		.animate({opacity: 0.7}, 400);
		
		//Call the gallery function to run the slideshow, 5000 = change to next image after 5 seconds
		setInterval('gallery()',10000);
		
	}
	
	function gallery() {
		
		//if no IMGs have the show class, grab the first image
		var current = ($('#gallery a.show')?  $('#gallery a.show') : $('#gallery a:first'));
	
		//Get next image, if it reached the end of the slideshow, rotate it back to the first image
		var next = ((current.next().length) ? ((current.next().hasClass('caption'))? $('#gallery a:first') :current.next()) : $('#gallery a:first'));	
		
		//Get next image caption
		var caption = next.find('img').attr('rel');	
		
		//Set the fade in effect for the next image, show class has higher z-index
		next.css({opacity: 0.0})
		.addClass('show')
		.animate({opacity: 1.0}, 1000);
	
		//Hide the current image
		current.animate({opacity: 0.0}, 1000)
		.removeClass('show');
		
		//Set the opacity to 0 and height to 1px
		$('#gallery .caption').animate({opacity: 0.0}, { queue:false, duration:0 }).animate({height: '1px'}, { queue:true, duration:1000 });	
		
		//Animate the caption, opacity to 0.7 and heigth to 100px, a slide up effect
		$('#gallery .caption').animate({opacity: 0.7},100 ).animate({height: '70px'},500 );
		
		//Display the content
		$('#gallery .content').html(caption);		
	}

	</script>

</head>
<body leftmargin="0" topmargin="0">
<?php include_once("analyticstracking.php") ?>

    <table width="1000" border="0" cellpadding="10px" align="center">
  	<tr>
    <td width="1000" height="148"><img src="images/announcement3.png" width="1000" height="148" /></td>
  	</tr>
	</table>
   	
    <table width="1000" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
      <td height="400" align="left" valign="top">
        <div id="gallery">
        
        <a><img src="images/image-0.jpg" width="1000" height="400"/></a>
        
        <a class="show"><img src="images/image-1.jpg" width="1000" height="400"/></a>
        
        <a><img src="images/image-2.jpg" width="1000" height="400"/></a>
        
        <a><img src="images/image-3.jpg" width="1000" height="400"/></a>
        
        <a><img src="images/image-4.jpg" width="1000" height="400"/></a>
        
        <a><img src="images/image-5.jpg" width="1000" height="400"/></a>
        
        <a><img src="images/image-6.jpg" width="1000" height="400"/></a>
        
        <a><img src="images/image-7.jpg" width="1000" height="400"/></a>
        
        <a><img src="images/image-8.jpg" width="1000" height="400"/></a>
        
        <a><img src="images/image-9.jpg" width="1000" height="400"/></a>
        
        <a><img src="images/image-10.jpg" width="1000" height="400"/></a>
        
        <a><img src="images/image-11.jpg" width="1000" height="400"/></a>
        
        <a><img src="images/image-12.jpg" width="1000" height="400"/></a>
        
        <a><img src="images/image-13.jpg" width="1000" height="400"/></a>
        
        <a><img src="images/image-14.jpg" width="1000" height="400"/></a>
        
        <a><img src="images/image-15.jpg" width="1000" height="400"/></a>
        
        <a><img src="images/image-16.jpg" width="1000" height="400"/></a>
        
        <a><img src="images/image-17.jpg" width="1000" height="400"/></a>
        
        <a><img src="images/image-18.jpg" width="1000" height="400"/></a>
        
        <a><img src="images/image-19.jpg" width="1000" height="400"/></a>
        
        <!--<div class="caption"><div class="content"></div>-->
        </div>
        </div>
      </td>
   	  </tr>
</table>
        
<table width="1000" border="0" cellspacing="0" cellpadding="0" align="center" >
        <tr>
            <td align="center" bgcolor="#FFCC00"> <div id="header">
<div class="ui-accordion" id="menu">
       	  <a href="index.php?page=home.php"><strong>EVENT</strong></font></a>
          <a href="index.php?page=agenda.php"><strong>TENTATIVE AGENDA</strong></font></a>
          <a href="index.php?page=venue.php"><strong>VENUE</strong></font></a>
          <a href="index.php?page=registration.php"><strong>REGISTRATION</strong></font></a>
          <a href="index.php?page=organizer.php"><strong>ORGANIZER & HOSTS</strong></font></a>
          <a href="index.php?page=travel.php"><strong>TRAVEL</strong></a>
          <a href="index.php?page=donor_sponsor.php"><strong>DONORS & SPONSORS</strong></font></a>
          <a href="index.php?page=contact_us.php"><strong>CONTACT US</strong></font></a>
          <a href="index.php?page=news.php"><strong>NEWS</strong></font></a>
       	  </div>
          	  </div>
        	</td>
        </tr>
		<tr>
        	<td align="center" class="HeaderColor" div id="Separator"><hr width="980" size="1" color="#FFFFFF"/></td>
        </tr>
        <tr>
        	<td>
				<?php
					$page='';
					if (isset($_GET['page']))
            			{ 
						if($_GET['page']<>'') 
							{ include $_GET['page']; }
						else 
							{ include $page; }
						}
					else
					{
							include 'home.php';
					}
				?>
            </td>
        </tr>
        <tr>
        	<td align="center" class="HeaderColor" div id="Separator"><hr width="980" size="1" color="#FFFFFF"/></td>
        </tr>
        <tr>
            <td align="center" bgcolor="#FFCC00"> <div id="header">
              <div id="menu">
        	    <a href="index.php?page=home.php"><strong>EVENT</strong></font></a>
                <a href="index.php?page=agenda.php"><strong>TENTATIVE AGENDA</strong></font></a>
                <a href="index.php?page=venue.php"><strong>VENUE</strong></font></a>
                <a href="index.php?page=registration.php"><strong>REGISTRATION</strong></font></a>
                <a href="index.php?page=organizer.php"><strong>ORGANIZER & HOSTS</strong></font></a>
                <a href="index.php?page=travel.php"><strong>TRAVEL</strong></a>
                <a href="index.php?page=donor_sponsor.php"><strong>DONORS & SPONSORS</strong></font></a>
                <a href="index.php?page=contact_us.php"><strong>CONTACT US</strong></font></a>
                <a href="index.php?page=news.php"><strong>NEWS</strong></font></a>
           	  </div>
        	  </div>
        	</td>
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
<?php
			session_start();
        
              if (!isset($_SESSION['user_id']) AND !isset($_SESSION['email'])) {
                  header('location:index.php');
              }
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
        <h1>Profile</h1>
        <p align="right"><a href="includes/logout.php">Logout</a></p>
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
		$id = $_SESSION['user_id'];
		$prof = $mysqli->query("SELECT * FROM members where id='$id'");
		$profile = $prof->fetch_array();
        
		$mid = $profile['id'];
		$username = $profile['username'];
		$email = $profile['email'];
		$regstatus = $profile['registrant_status'];
		$approved = $profile['approved'];
		$paid = $profile['paid'];
		
		
		if($profile['registrant_status'] == '1' || $profile['registrant_status'] == '0' )
		{$detail = $mysqli->query("SELECT * FROM student_detail where member_id='$mid'");
		$profile_detail = $detail->fetch_array();
		$department = $profile_detail['department'];
		$university = $profile_detail['university'];
		$address = $profile_detail['uni_address'];
		$city = $profile_detail['uni_city'];
		$state = $profile_detail['uni_state'];
		$zip = $profile_detail['uni_postcode'];
		$country = $profile_detail['uni_country'];
		$upfilename = $profile_detail['reference_letter'];
		$refstatus = $profile_detail['reference_flag'];}
		
		else if ($profile['registrant_status'] == '2')
		{$detail = $mysqli->query("SELECT * FROM resident_detail where member_id='$mid'");
		$profile_detail = $detail->fetch_array();
		$institution = $profile_detail['institution'];
		$address = $profile_detail['street_address'];
		$city = $profile_detail['city'];
		$state = $profile_detail['state'];
		$zip = $profile_detail['postcode'];
		$country = $profile_detail['country'];
		$telephone = $profile_detail['work_tel'];
		$fax = $profile_detail['work_fax'];
		$refstatus = $profile_detail['reference_flag'];}
		
		else if ($profile['registrant_status'] == '3' || $profile['registrant_status'] == '4' || $profile['registrant_status'] == '5')
		{$detail = $mysqli->query("SELECT * FROM academic_detail where member_id='$mid'");
		$profile_detail = $detail->fetch_array();
		$position = $profile_detail['position'];
		$department = $profile_detail['department'];
		$institution = $profile_detail['institution'];
		$address = $profile_detail['street_address'];
		$city = $profile_detail['city'];
		$state = $profile_detail['state'];
		$zip = $profile_detail['postcode'];
		$country = $profile_detail['country'];
		$telephone = $profile_detail['work_telephone'];
		$fax = $profile_detail['work_fax'];
		$ccemail = $profile_detail['email_cc'];
		$refstatus = $profile_detail['reference_flag'];}
		
		else if ($profile['registrant_status'] == '6')
		{$detail = $mysqli->query("SELECT * FROM industry_detail where member_id='$mid'");
		$profile_detail = $detail->fetch_array();
		$institution = $profile_detail['institution'];
		$address = $profile_detail['street_address'];
		$city = $profile_detail['city'];
		$state = $profile_detail['state'];
		$zip = $profile_detail['postcode'];
		$country = $profile_detail['country'];
		$telephone = $profile_detail['work_telephone'];
		$fax = $profile_detail['work_fax'];
		$ccemail = $profile_detail['email_cc'];
		$refstatus = $profile_detail['reference_flag'];}
		
		$first_name = $profile_detail['first_name'];
		$last_name = $profile_detail['last_name'];
		
		$degreeid = $profile_detail['degree'];
		$deg= $mysqli->query("SELECT * FROM degree where id='$degreeid'");
		$degree = $deg->fetch_array();		
		$titleid = isset($profile_detail['title'])?$profile_detail['title']:"";
		$ti = $mysqli->query("SELECT * FROM title where id='$titleid'");
		$title = $ti->fetch_array();
		
		$rs= $mysqli->query("SELECT * FROM reference_status where id='$refstatus'");
		$reference_status = $rs->fetch_array();
		
		$f = $mysqli->query("SELECT * FROM fee_rates where status_id='$regstatus' and occ_id=''");
		$fee = $f->fetch_array();
		
		?>
        
		<!-- <div id="prof"> -->
		<br>
		<table>
		<tr><td>
		<select name="regstatus" id="regis_stat"  hidden>
				<option value="<?php echo $regstatus?>"></option>				
		</select><br>
		</td></tr>
		<tr id="reg_first_name">
				<td>First name/Given name</td><td>:</td><td><?php echo $first_name; ?></td>
		</tr>
		<tr id="reg_last_name">
				<td>Family name/Surname/Last name</td><td>:</td><td><?php echo $last_name; ?></td>
		</tr>
		<tr id="reg_title">
				<td>Title</td><td>:</td><td><?php echo $title['title_name']; ?></td>
			</tr>

			<tr id="reg_degree">
				<td>Degree</td><td>:</td><td><?php echo $degree['degree_level']; ?></td>
			</tr>
			<tr id="reg_position">
				<td>Position</td><td>:</td><td><?php echo $position; ?></td>
			</tr>
			<tr id="reg_company">
				<td>Company</td><td>:</td><td><?php echo $company; ?><td>
			</tr>
            <tr id="reg_department">
				<td>Department</td><td>:</td><td><?php echo $department; ?></td>
			</tr>
			<tr id="reg_institution">
				<td>Institution</td><td>:</td><td><?php echo $institution; ?></td>
			</tr>
			<tr id="reg_univ">
				<td>University</td><td>:</td><td><?php echo $university; ?></td>
			</tr>
            <tr id="reg_univ_street">
				<td>University Address</td><td>:</td><td><?php echo $address; ?></td>
			</tr>
			<tr id="reg_street_address">
				<td>Street Address</td><td>:</td><td><?php echo $address; ?></td>
			</tr>
			<tr id="reg_city">
				<td>City</td><td>:</td><td><?php echo $city; ?></td>
			</tr>
			<tr id="reg_state">
				<td>State</td><td>:</td><td><?php echo $state; ?></td>
			</tr>
			<tr id="reg_zip">
				<td>Postal code/ZIP</td><td>:</td><td><?php echo $zip; ?></td>
			</tr>
			<tr id="reg_country">
				<td>Country</td><td>:</td><td><?php echo $country; ?></td>
			</tr>
			<tr id="reg_ref_info">
				<td colspan="3">*To confirm your participation, please provide us with a signed reference letter from your university.<br>Without the letter we could not offer you the student rates.</td>
			</tr>
			<tr id="reg_ref_info2">
				<td colspan="3"> your reference document status is <b><?php echo $reference_status['status']; ?><b></td>
			</tr>
			<tr id="reg_ref">
				<td>Reference document</td><td>:</td><td><input type="file" name="reference" id="reference" /></td>
			</tr> 
			<tr id="reg_work_phone">
				<td>Work Telephone</td><td>:</td><td><?php echo $telephone; ?></td>
			</tr>
			<tr id="reg_work_fax">
				<td>Work Fax</td><td>:</td><td><?php echo $fax; ?></td>
			</tr>
			<tr id="reg_email">
				<td>Email</td><td>:</td><td><?php echo $email; ?></td>
			</tr>
			<tr id="reg_ccemail">
				<td>Cc email</td><td>:</td><td><?php echo $ccemail; ?></td>
			</tr>					
        	
		
		<tr></tr>
		<tr></tr>
		<tr><td>Submit Abstract</td></tr>	
		<tr><form action= "abstractpdf.php"
					method="post" 
					name="submit_abstract"
					>
			<td>Abstract Title</td><td>:</td><td><input type="text" name="abtitle" id="abtitle"></td>
		</tr>
		<tr>
			<td>Abstract  (maximum 200 words)</td><td>:</td><td>			
			<textarea rows="10" cols="70" name="abtext" id="abtext" >
			</textarea>
			</td>
		</tr>
		<tr>
		<td><input type="hidden" value="<?php echo $mid; ?>"></td><td></td>
			<td>
				<?php //if($paid==1){ ?>
            	<button type="submit">Submit</button> 
            	<?php //} ?>
        	</td>
        </tr>
		</form>		
		
		<tr>
		<td></td><td></td>
			<td><b><i>
			<?php echo $approved!=1 ? "your reference document need to be approved first before you pay the fee" : ""; ?>
			</b></i></td>
		</tr>
		<tr><td>	
		<!-- WHERE TO PUT PAYPAL THINGY -->
		
		Room Occupation</td><td>:</td> <?php
				$occ=$mysqli->query("SELECT * FROM occupancy ORDER BY id ASC") or die(mysqli_error($mysqli));				
			?>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<td><select name="amount" id="occupancy" <?php echo $approved!=1 ? "disabled" : ""; ?>>
				<option value=""></option>
				<?php while ($rd = $occ->fetch_array()){ ?>
					<?php 
						$feerates = $mysqli->query("SELECT * FROM fee_rates WHERE status_id=".$regstatus." AND occ_id=".$rd['id']) or die(mysqli_error($mysqli)); 
						// echo $feerates;
						// die();
						$fr = $feerates->fetch_array();
						// echo $regstatus;
						// echo $rd['id'];
						// echo "<pre>";
						// print_r($fr);
						// die();
					?>
					<option value="<?php echo $fr['fee_rates']; ?>"><?php echo $rd['occ_status']; ?></option>					
				<?php } ?>
			</select></td>
			</tr>
		<!-- <tr><td>Fee</td><td>:</td><td><input type="text" name="amount" value="<?php echo $fee; ?>" disabled></td></tr> -->
		<tr><td></td><td></td><td>
		<!-- <form action="https://www.paypal.com/cgi-bin/webscr" method="post"> -->
		<input type="hidden" name="cmd" value="_xclick">
		<input type="hidden" name="business" value="admin@icrpv.org">
		<input type="hidden" name="item_name" value="registration fee for ICRPV 5th">
		<!-- <input type="hidden" name="amount" value="500.00"> -->
		<input type="image" name="submit" border="0"
		src="https://www.paypalobjects.com/en_US/i/btn/x-click-but6.gif"
		alt="PayPal - The safer, easier way to pay online"
		<?php echo $approved!=1 ? "disabled" : ""; ?>
		>
		</form>	
		</td></tr>
		<!--DONE -->
		
		
		</form>			
		</table> 
	<!-- </div> -->
			
			
		<?php if($regstatus==1){ ?>
			<script type="text/javascript">
					$('#reg_first_name').show(); 
					$('#reg_last_name').show(); 
					$('#reg_title').show(); 
					$('#reg_degree').show(); 
					$('#reg_position').hide();
					$('#reg_company').hide();
					$('#reg_department').show();
					$('#reg_institution').hide(); 
					$('#reg_univ').show();
					$('#reg_univ_street').show();
					$('#reg_street_address').hide(); 
					$('#reg_city').show();
					$('#reg_state').show();
					$('#reg_zip').show();
					$('#reg_country').show();
					$('#reg_ref_info').show();
					$('#reg_ref').show();
					$('#reg_work_phone').hide(); 
					$('#reg_work_fax').hide(); 
					$('#reg_ccemail').hide(); 
					$('#reg_email').show();
			</script>
		<?php }elseif ($regstatus==2) { ?>
			<script type="text/javascript">
					$('#reg_first_name').show(); 
					$('#reg_last_name').show(); 
					$('#reg_title').hide(); 
					$('#reg_degree').show(); 
					$('#reg_position').hide();
					$('#reg_company').hide();
					$('#reg_department').hide();
					$('#reg_institution').show(); 
					$('#reg_univ').hide();
					$('#reg_univ_street').hide();
					$('#reg_street_address').show(); 
					$('#reg_city').show();
					$('#reg_state').show();
					$('#reg_zip').show();
					$('#reg_country').show();
					$('#reg_ref_info').show();
					$('#reg_ref').show();
					$('#reg_work_phone').show(); 
					$('#reg_work_fax').show(); 
					$('#reg_ccemail').hide(); 
					$('#reg_email').show();
			</script>
		<?php }elseif ($regstatus==3 OR $regstatus==4 OR $regstatus==5) { ?>
			<script type="text/javascript">
					$('#reg_first_name').show(); 
					$('#reg_last_name').show(); 
					$('#reg_title').hide(); 
					$('#reg_degree').show(); 
					$('#reg_position').show();
					$('#reg_company').hide();
					$('#reg_department').show();
					$('#reg_institution').show(); 
					$('#reg_univ').hide();
					$('#reg_univ_street').hide();
					$('#reg_street_address').show(); 
					$('#reg_city').show();
					$('#reg_state').show();
					$('#reg_zip').show();
					$('#reg_country').show();
					$('#reg_ref_info').show();
					$('#reg_ref').show();
					$('#reg_work_phone').show(); 
					$('#reg_work_fax').show(); 
					$('#reg_ccemail').show(); 
					$('#reg_email').show();
			</script>
		<?php }elseif ($regstatus==6) { ?>
			<script type="text/javascript">
					$('#reg_first_name').show(); 
					$('#reg_last_name').show(); 
					$('#reg_title').show(); 
					$('#reg_degree').hide(); 
					$('#reg_position').show();
					$('#reg_company').show();
					$('#reg_department').hide();
					$('#reg_institution').hide(); 
					$('#reg_univ').hide();
					$('#reg_univ_street').hide();
					$('#reg_street_address').show(); 
					$('#reg_city').show();
					$('#reg_state').show();
					$('#reg_zip').show();
					$('#reg_country').show();
					$('#reg_ref_info').show();
					$('#reg_ref').show();
					$('#reg_work_phone').show(); 
					$('#reg_work_fax').show(); 
					$('#reg_ccemail').show(); 
					$('#reg_email').show();
			</script>
		<?php } ?>
    </body>
</html>


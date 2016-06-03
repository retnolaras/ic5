<?php
include 'includes/register.inc.php';
include 'includes/functions.php';
// include 'includes/fungsidoc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Registration Form</title>
		<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
		<link href="css/my_style.css" rel="stylesheet" type="text/css" />
		
		
    </head>
    <body>
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <h1>Register with us</h1>
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        
		<form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" 
					method="post" 
					name="registration_form" enctype="multipart/form-data">
		<?php
				// fetch registrant status
				$qr = "SELECT * FROM registrant_status ORDER BY id ASC";
				$regstat=$mysqli->query($qr) or die(mysqli_error($mysqli));				
			?>
		Registrant Status : 
		<select name="regstatus" id="regis_stat" >
				<option value=""></option>
				<?php while ($rd = $regstat->fetch_array()) {?>
					<option value="<?php echo $rd['id']; ?>"><?php echo $rd['status_name']; ?></option>					
				<?php } ?>
		</select><br>
		
		<div id="reg_view">
			<br>
		<table>
			<tr id="reg_first_name">
				<td>First name/Given name</td><td>:</td><td><input type='text' name='firstname' id='firstname' /></td>
			</tr>
			<tr id="reg_last_name">
				<td>Family name/Surname/Last name</td><td>:</td><td><input type="text" name="lastname" id="lastname" /></td>
			</tr>
			<tr id="reg_title">
				<td>Title</td><td>:</td>
				<?php
					// fetch title
					$title=$mysqli->query("SELECT * FROM title ORDER BY id ASC") or die(mysqli_error($mysqli));				
				?>
				<td><select name="title" id="title">
						<option value=""></option>
						<?php while ($rd = $title->fetch_array()){ ?>
							<option value="<?php echo $rd['id']; ?>"><?php echo $rd['title_name']; ?></option>					
						<?php } ?>
					</select>
				</td>
			</tr>

			<tr id="reg_degree">
				<td>Degree</td><td>:</td>
				<?php
					// fetch degree for student
					$degree=$mysqli->query("SELECT * FROM degree ORDER BY id ASC") or die(mysqli_error($mysqli));				
				?>
				<td>
					<select name="degree" id="degree">
						<option value=""></option>
						<?php while ($rd = $degree->fetch_array()){ ?>
							<option value="<?php echo $rd['id']; ?>"><?php echo $rd['degree_level']; ?></option>					
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr id="reg_position">
				<td>Position</td><td>:</td><td><input type="text" name="position" id="position"/></td>
			</tr>
			<tr id="reg_company">
				<td>Company</td><td>:</td><td><input type="text" name="company" id="company"/></td>
			</tr>
            <tr id="reg_department">
				<td>Department</td><td>:</td><td><input type="text" name="department" id="department" /></td>
			</tr>
			<tr id="reg_institution">
				<td>Institution</td><td>:</td><td><input type='text' name='institution' id='institution' /></td>
			</tr>
			<tr id="reg_univ">
				<td>University</td><td>:</td><td><input type='text' name='university' id='university' /></td>
			</tr>
            <tr id="reg_univ_street">
				<td>University Address</td><td>:</td><td><input type="text" name="univ_address" id="address" /></td>
			</tr>
			<tr id="reg_street_address">
				<td>Street Address</td><td>:</td><td><input type="text" name="address" id="address" /></td>
			</tr>
			<tr id="reg_city">
				<td>City</td><td>:</td><td><input type="text" name="city" id="city"/></td>
			</tr>
			<tr id="reg_state">
				<td>State</td><td>:</td><td><input type="text" name="state" id="state" /></td>
			</tr>
			<tr id="reg_zip">
				<td>Postal code/ZIP</td><td>:</td><td><input type="text" name="zip" id="zip"/></td>
			</tr>
			<tr id="reg_country">
				<td>Country</td><td>:</td><td><input type="text" name="country" id="country" /></td>
			</tr>
			<tr id="reg_ref_info">
				<td colspan="3">*To confirm your participation, please provide us with a signed reference letter from your university or your institution.<br>Without the letter we could not offer you the rates.</td>
			</tr>
			<tr id="reg_ref">
				<td>Reference document</td><td>:</td><td><input type="file" name="reference" id="reference" /></td>
			</tr>
			<tr id="reg_work_phone">
				<td>Work Telephone</td><td>:</td><td><input type="text" name="telephone" id="telephone" /></td>
			</tr>
			<tr id="reg_work_fax">
				<td>Work Fax</td><td>:</td><td><input type="text" name="fax" id="fax" /></td>
			</tr>
			<tr id="reg_email">
				<td>Email</td><td>:</td><td><input type="text" name="email" id="email" /></td>
			</tr>
			<tr id="reg_ccemail">
				<td>Cc email</td><td>:</td><td><input type="text" name="ccemail" id="ccemail" /></td>
			</tr>
			<tr id="reg_password">
				<td>Password</td><td>:</td><td><input type="password" name="password" id="password"/></td>
			</tr>
			<tr id="reg_conf_password">
				<td>Confirm password</td><td>:</td><td><input type="password" name="confirmpwd" id="confirmpwd" /></td>
			</tr>
			
        </table>
		
		
		<?php
          require_once('includes/recaptchalib.php');
          $publickey = "6LcrDfsSAAAAAFBVq0JrqE22Swyka5h7zcQmRflL"; 
          echo recaptcha_get_html($publickey);
        ?>
		
			<!-- <input type="submit" value="Register" onclick="return regformhash(this.form,this.form.email,this.form.password,this.form.confirmpwd);" />  -->
			<input type="submit" value="Register" /> 
		</div>
			
		</form>
        <p>Return to the <a href="login.php">login page</a>.</p>

        <script type="text/javascript">
			var RegistrantStat = jQuery('#regis_stat');
			var select = this.value;
			 		
					$('#reg_view').hide(); 
			RegistrantStat.change(function () {
				if ($(this).val() == '1') {
			        
					$('#reg_view').show(); 

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
					$('#reg_password').show();
					$('#reg_conf_password').show();
					
			    } else if($(this).val() == '2') { 
			    	
					$('#reg_view').show(); 

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
					$('#reg_ref_info').hide();
					$('#reg_ref').show();
					$('#reg_work_phone').show(); 
					$('#reg_work_fax').show(); 
					$('#reg_ccemail').hide(); 
					$('#reg_email').show();
					$('#reg_password').show();
					$('#reg_conf_password').show();

			    } else if($(this).val() == '3' || $(this).val() == '4' ||
				$(this).val() == '5') { 
			    	
					$('#reg_view').show(); 

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
					$('#reg_ref_info').hide();
					$('#reg_ref').show();
					$('#reg_work_phone').show(); 
					$('#reg_work_fax').show(); 
					$('#reg_ccemail').show(); 
					$('#reg_email').show();
					$('#reg_password').show();
					$('#reg_conf_password').show();
			    } else if($(this).val() == '6') { 
			    	
					$('#reg_view').show(); 

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
					$('#reg_ref_info').hide();
					$('#reg_ref').show();
					$('#reg_work_phone').show(); 
					$('#reg_work_fax').show(); 
					$('#reg_ccemail').show(); 
					$('#reg_email').show();
					$('#reg_password').show();
					$('#reg_conf_password').show();
			    } 
			});

		</script>

    </body>
</html>
<?php
include 'db_connect.php';
include ("includes/fungsidoc.php");
 
$error_msg = "";
 
if (isset($_POST['email'])) {
    //CAPTCHA
//     echo $_POST['email'];
// print_r($_FILES['reference']);
//         echo "Yeay";
//         die();
        require_once('includes/recaptchalib.php');
        $privatekey = "6LcrDfsSAAAAAIH3zPAt03s5Xmd0x6u-LBqH9Qu8";
        $resp = recaptcha_check_answer ($privatekey,
                                    $_SERVER["REMOTE_ADDR"],
                                    $_POST["recaptcha_challenge_field"],
                                    $_POST["recaptcha_response_field"]);

        if (!$resp->is_valid) {
        // What happens when the CAPTCHA was entered incorrectly
        die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
             "(reCAPTCHA said: " . $resp->error . ")");} 
        else {    
                    
        $regstatus = $_POST['regstatus'];
        
        // Sanitize and validate the data passed in
        // $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Not a valid email
            $error_msg .= '<p class="error">The email address you entered is not valid</p>';
        }
     
    	//define variable
    	
    	$first_name = $_POST['firstname'];
    	$last_name = $_POST['lastname'];
    	$title = $_POST['title'];
        $degree = $_POST['degree'];
        $position = $_POST['position'];
        $company = $_POST['company'];
    	$department = $_POST['department'];
        $institution = $_POST['institution'];
    	$university = $_POST['university'];
        $univ_address = $_POST['univ_address'];
    	$address = $_POST['address'];
    	$city = $_POST['city'];
    	$state = $_POST['state'];
    	$zip = $_POST['zip'];
    	$country = $_POST['country'];
    	// $upfilename = upload_file($_FILES['reference'], $_FILES['reference']['type']);
    	
    	$telephone = $_POST['telephone'];
    	$fax = $_POST['fax'];
    	
    	$ccemail = $_POST['ccemail'];
    	
    	
    	$password = $_POST['password'];
        $confirmpassword = $_POST['confirmpwd'];
        if ($password != $confirmpassword) {
            // Not a valid email
            $error_msg .= '<p class="error">Confirm Password wrong!</p>';
        }
        
        // $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
        // if (strlen($password) != 128) {
        //     // The hashed pwd should be 128 characters long.
        //     // If it's not, something really odd has happened
        //     $error_msg .= '<p class="error">Invalid password configuration.</p>';
        // }
     
        // Username validity and password validity have been checked client side.
        // This should should be adequate as nobody gains any advantage from
        // breaking these rules.
        //
     
        $prep_stmt = "SELECT id FROM members WHERE email = ? LIMIT 1";
        $stmt = $mysqli->prepare($prep_stmt);
     
       // check existing email  
        if ($stmt) {
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $stmt->store_result();
     
            if ($stmt->num_rows == 1) {
                // A user with this email address already exists
                $error_msg .= '<p class="error">A user with this email address already exists.</p>';
                            $stmt->close();
            }
                    $stmt->close();
        } else {
            $error_msg .= '<p class="error">Database error Line 39</p>';
                    $stmt->close();
        }
     
       
    		
    	//dropdown menu
    	// $sqll = "SELECT * FROM occupancy WHERE live = 1";
    	// 	if(!$resultt = $mysqli->query($sql)){
    	// 		die('There was an error running the query [' . $db->error . ']');
    	// 	}
    	         
         
     
        // TODO: 
        // We'll also have to account for the situation where the user doesn't have
        // rights to do registration, by checking what type of user is attempting to
        // perform the operation.
        if ($regstatus == 1) {
            $cek1 = $_FILES['reference']['name'];
            if($cek1 != ""){
                if(validation_file($_FILES['reference'])){ 
                    $upfilename = upload_file($_FILES['reference'], $_FILES['reference']['type']);
                }else{
                    $error_msg .= '<p class="error">File must be pdf.</p>';
                }
            }else{
                $error_msg .= '<p class="error">You must upload reference file for student!</p>';
            }
                
        }else{
            $upfilename = '';
        }
    	
        if (empty($error_msg)) {
            // Create a random salt
            //$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE)); // Did not work
            $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
     
            // Create salted password 
            $password = hash('sha512', $password . $random_salt);
     
            // Insert the new user into the database 
            if ($insert_stmt = $mysqli->prepare("INSERT INTO members (email, password, salt, registrant_status) VALUES (?, ?, ?, ?)")) {
                $insert_stmt->bind_param('sssi', $email, $password, $random_salt, $regstatus);

                // Execute the prepared query.
                if (! $insert_stmt->execute()) {
                    header('Location: ../error.php?err=Registration failure: INSERT USER');
                }
                $member_id = $insert_stmt->insert_id;
               
            }
    		//Insert user detail to the database
    		//for registrant status student
    		if ($regstatus == '1'){			
    			if ($insert_detail = $mysqli->prepare("INSERT INTO student_detail (member_id, first_name, last_name, degree, title, department, university,
    			uni_address, uni_city, uni_state, uni_postcode, uni_country, reference_letter) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
                $insert_detail->bind_param('issiissssssss', $member_id, $first_name, $last_name, $degree, $title, $department, $university, 
    			$univ_address, $city, $state, $zip, $country, $upfilename);
                // Execute the prepared query.
                if (! $insert_detail->execute()) {
                    header('Location: ../error.php?err=Registration failure: INSERT DETAIL');
    				}
    			}		
    		}
    		
    		//for registrant status resident
    		if ($regstatus == '2'){
    			
    			if ($insert_detail = $mysqli->prepare("INSERT INTO resident_detail (member_id, first_name, last_name, degree, institution, 
    			street_address, city, state, postcode, country, work_tel, work_fax) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
                $insert_detail->bind_param('ississssssss', $member_id, $first_name, $last_name, $degree, $institution, 
    			$address, $city, $state, $zip, $country, $telephone, $fax );
                // Execute the prepared query.
                if (! $insert_detail->execute()) {
                    header('Location: ../error.php?err=Registration failure: INSERT DETAIL');
    				}
    			}		
    		}
    		
    		//for registrant status academic/government/civil society
    		if ($regstatus == '3' || $regstatus == '4' || $regstatus == '5' ){			
    			if ($insert_detail = $mysqli->prepare("INSERT INTO academic_detail (member_id, first_name, last_name, degree, position, department, institution,
    			street_address, city, state, postcode, country, work_tel, work_fax, email_cc) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
                $insert_detail->bind_param('ississsssssssss', $member_id, $first_name, $last_name, $degree, $position, $department, $institution, 
    			$street_address, $city, $state, $zip, $country, $telephone, $fax, $ccemail);
                // Execute the prepared query.
                if (! $insert_detail->execute()) {
                    header('Location: ../error.php?err=Registration failure: INSERT DETAIL');
    				}
    			}		
    		}
    		
    		//for registrant status industry
    		if ($regstatus == '6'){			
    			if ($insert_detail = $mysqli->prepare("INSERT INTO industry_detail (member_id, first_name, last_name, title, position, company, street_address,
    			city, state, postcode, country, work_tel, work_fax, email_cc) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
                $insert_detail->bind_param('ississssssssss', $member_id, $first_name, $last_name, $title, $position, $company, $address, $city, 
    			$state, $zip, $country, $work_tel, $work_fax, $ccemail);
                // Execute the prepared query.
                if (! $insert_detail->execute()) {
                    header('Location: ../error.php?err=Registration failure: INSERT DETAIL');
    				}
    			}		
    		}
    		
    		header('Location: ./register_success.php');
        }

    	}
    
}
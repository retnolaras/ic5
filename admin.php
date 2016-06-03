<?php
              session_start();
        
              if ($_SESSION['level']!="adminicrpv5") {
                  header('location:index.php');
              }
              include "includes/db_connect.php";
              $batas=10;
              $halaman=isset($_GET['halaman']) ? $_GET['halaman'] : '';
              if(empty($halaman)) {
                  $posisi=0;
                  $halaman=1;
              } else {
                  $posisi = ($halaman-1) * $batas;
              }
              $sql1=$mysqli->query("SELECT * FROM members ORDER BY id DESC LIMIT $posisi,$batas") or die(mysqli_error($mysqli));

              $sql2=$mysqli->query("SELECT * FROM members") or die(mysqli_error($mysqli));

              $jmldata = $sql2->num_rows;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Administrator | The 5th International Conference of Research on Plasmodium vivax malaria, Bali.</title>
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
   	
   
<table width="1000" border="0" cellspacing="0" cellpadding="0" align="center" >
       
		
        <tr>
          <td align="center" class="HeaderColor" div id="Separator"><hr width="980" size="1" color="#FFFFFF"/></td>
        </tr>
        <tr>
          <td align="right">
            <a href="includes/logoutadmin.php">Logout Admin</a>
          </td>
        </tr>
        <tr>
          <td>
            <h3>Registrant List</h3>
            Total : <?php echo $jmldata; ?>

            <table width="100%">
              <thead>
                <tr>
                  <th>No.</th>
                  <!-- <th>ID Member</th> -->
                  
                  <!-- <th>Username</th> -->
                  <th>Email</th>
                  <th>Status</th>
                  <th>Reference (student)</th>
                  <th>Approval</th>
                  <!-- <th>Payment</th> -->

                </tr>
              </thead>
              <tbody>
                <?php 
                  if (empty($halaman) OR $halaman==1) {
                    $i = $halaman;
                  }else{
                    $i = $posisi+1;
                  }
                    
                  while ($row1 = $sql1->fetch_array()) { 
                ?>
                <tr>
                  <td><?= $i ?></td>
                  <!-- <td><?php echo $row1['id']; ?></td> -->
                  
                  <!-- <td><?php echo $row1['username']; ?></td> -->
                  <td><?php echo $row1['email']; ?></td>
                  <td>
                    <?php 
                      if ($row1['registrant_status'] == 1) {
                        echo "Student";
                        $tabel = "student_detail";
                      }elseif ($row1['registrant_status'] == 2) {
                        echo "Resident of P. vivax Endemic Nation";
                        $tabel = "resident_detail";
                      }elseif ($row1['registrant_status'] == 3) {
                        echo "Academic";
                        $tabel = "academic_detail";
                      }elseif ($row1['registrant_status'] == 4) {
                        echo "Government";
                        $tabel = "academic_detail";
                      }elseif ($row1['registrant_status'] == 5) {
                        echo "Civil Society";
                        $tabel = "academic_detail";
                      }elseif ($row1['registrant_status'] == 6) {
                        echo "Industry";
                        $tabel = "industry_detail";
                      }
                    ?>
                  </td>
                  <td>
                    <?php

                          $sql3=$mysqli->query("SELECT * FROM ".$tabel." WHERE member_id=".$row1['id']) or die(mysqli_error($mysqli));
                          $row2 = $sql3->fetch_array();
                          // echo "<pre>";
                          // print_r($row2);
                          // die();
                          if ($row2['reference_letter'] != "") {
                            echo '<a href="uploads/reference/'.$row2['reference_letter'].'" target="_blank">PDF</a>';
                          }
                    ?>
                  </td>
                  <td>
                    <?php
                      if ($row1['approved'] != 1) {
                    ?>
                        <a href="poststatus.php?id=<?php echo $row1['id']?>&amp;email=<?php echo $row1['email'] ?>&amp;tipe=approval" onclick="return confirm('Approve Registrant?')">Approve</a>
                        <?php 
                          // if ($row1['registrant_status'] == 1) {
                            if ($row2['reference_flag'] == 1) {
                              
                        ?>
                              | <a href="requestupload.php?id=<?php echo $row1['id']?>&amp;email=<?php echo $row1['email'] ?>&amp;reg_stat=<?php echo $row1['registrant_status'] ?>" onclick="return confirm('Request Reupload Reference to Registrant?')">Request Reference</a>
                        <?php
                            }elseif($row2['reference_flag'] == 2){
                        ?>
                              | <font color="red">Waiting Reupload</font>
                        <?php                              
                            }elseif($row2['reference_flag'] == 3){
                        ?>
                              | <a href="requestupload.php?id=<?php echo $row1['id']?>&amp;email=<?php echo $row1['email'] ?>&amp;reg_stat=<?php echo $row1['registrant_status'] ?>" onclick="return confirm('Please check the latest uploaded Reference. Request Reupload Again?')">Reupload Done!</a>
                        <?php
                            }
                          // }
                        ?>
                    <?php
                      }else{
                    ?>
                        <font color="red">Approved</font>
                    <?php
                      }
                    ?>
                  </td>
                  
                </tr>
                <?php $i++; } ?>
              </tbody>
                
            </table>

          </td>
        </tr>

        <tr>
          <td align="center">
            
          <?              
                
                        $jmlhalaman=ceil($jmldata/$batas);
                        $file="admin.php";
                                
                if($halaman > 1)
                        {
                            $previous=$halaman-1;
                            echo "<a href=$file?halaman=1><< First</a> <a href=$file?halaman=$previous>< Previous</a> ";
                        }
                        $angka=($halaman > 3 ? " ... " : " ");
                        for($i=$halaman-2;$i<$halaman;$i++)
                        {
                            if ($i < 1) 
                            continue;
                            $angka .= "<a href=$file?halaman=$i>$i</a> ";
                        }
                        $angka .= " <b style='font-size: 25px;'>$halaman</b> ";
                        for($i=$halaman+1;$i<($halaman+3);$i++)
                        {
                            if ($i > $jmlhalaman) 
                            break;
                            $angka .= "<a href=$file?halaman=$i>$i</a> ";
                        }
                        $angka .= ($halaman+2<$jmlhalaman ? " ... <a href=$file?halaman=$jmlhalaman>$jmlhalaman</a> " : " ");
                        echo "$angka";
                        if($halaman < $jmlhalaman)
                        {
                            $next=$halaman+1;
                            echo " <a href=$file?halaman=$next>Next ></a> <a href=$file?halaman=$jmlhalaman>Last >></a> ";
                        }
                        
                        ?>
        
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
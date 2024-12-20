<?php 
   require_once "connection.php";
   $query = "SELECT * FROM tblresident";
   $result = $con->query($query);
   $row = $result->fetch_assoc();
   ?>
<!DOCTYPE html>
<html id="clearance">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>JOB SEEKER CERTIFICATE</title>
      <link rel="icon" href="image/logo.png" type="image">
   </head>
   <style>
      @media print {
      .noprint {
      visibility: hidden;
      }
      }
      @page {
      size: a4;
      margin: 4mm;
      }
      body {
      font-family: Arial, sans-serif;
      }
   </style>
   <body>
      <div class="book">
         <?php
            session_start();
            if(!isset($_SESSION['role'])){
                header("Location: ../../../login.php"); 
            } else{
            //ob_start() - prevents the script from sending output to the browser until you're ready to send it
            ob_start(); 
            ?>
         <div class="page" style="width: 21cm; min-height: 29.7cm; padding: 20px; border: 1px #D3D3D3 solid; border-radius: 5px; background: white; margin: 0 auto;">
            <div>
               <img style="position:absolute; margin-top:190px; margin-left:40px; opacity:0.1;" src="image/logo.jpg" alt="">
            </div>
            <div class="container" style="width: 210mm; height: 297mm; margin: 0 auto; padding: 1px; border: 2px solid #4CAF50; position: relative; box-sizing: border-box;">
               <div class="card-header" style="display: flex; justify-content: space-between;">
                  <div class="topleft" style="width: 100px; height: 100px;">
                     <?php 
                        $query = mysqli_query($con, "SELECT image, certL, certR FROM dashboard");
                        while ($row = mysqli_fetch_array($query)) {
                            echo '<img src="../../../settings/img/'.basename($row['certL']).'" style="width:100px; height:100px; border-radius:50%; margin-left:140px; margin-top:50px;">';
                        }
                        ?>
                  </div>
                  <div style="text-align: center; margin-top: 50px; margin-left: 130px;">
                     <span style="font-size: 12px;">REPUBLIC OF THE PHILIPPINES<br></span>
                     <span style="font-size: 12px;">PROVINCE OF NUEVA ECIJA<br></span>
                     <span style="font-size: 12px;">MUNICIPALITY OF GUIMBA<br></span>
                     <span style="font-size: 18px; margin-top: 10px;"><b>BARANGAY SAN AGUSTIN<br></b></span>
                     <!-- <div style="margin-top: 30px;">
                        <span style="font-size: 20px; font-weight: bold; margin-top: 20px;">Office of the Punong Barangay</span>
                        <hr style="margin-top: 0; border-top: 2px solid black;">
                        </div>
                        <div style="margin-top: 30px;">
                        <span style="font-size: 20px; font-weight: bold;  margin-top:40px;">Barangay Certification</span>
                        </div>
                        <span style="font-size: 12px; font-weight: bold;  margin-top:10px;">(First Time Jobseekers Assistance Act-RA 11261)</span> -->
                  </div>
                  <div class="topright">
                     <?php 
                        $query = mysqli_query($con, "SELECT image, certL, certR FROM dashboard");
                        while ($row = mysqli_fetch_array($query)) {
                            echo '<img src="../../../settings/img/'.basename($row['certR']).'" style="width:100px; height:100px; margin-right:140px; margin-top:50px; margin-bottom:0;">';
                        }
                        ?>
                  </div>
               </div>
               <div style="padding: 40px;">
                  <div style="text-align: center;">
                     <div>
                        <span style="font-size: 20px; font-weight: bold; ">Office of the Punong Barangay</span>
                        <hr style="margin-top: 0; border-top: 2px solid black; width:60%;">
                     </div>
                     <div style="margin-top: 30px;">
                        <span style="font-size: 20px; font-weight: bold;  margin-top:40px;">Barangay Certification</span>
                     </div>
                     <span style="font-size: 12px; font-weight: bold;  margin-top:10px;">(First Time Jobseekers Assistance Act-RA 11261)</span>
                  </div>
                  <div>
                     <?php
                        $sql = "SELECT * FROM tblresident WHERE id = 5";
                        $result = $con->query($sql);
                        $row = $result->fetch_assoc();
                        ?>
                     <?php
                        $con = mysqli_connect("localhost", "root", "", "barangay_system_db", "3307");
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $query = "SELECT * FROM tblresident WHERE id='$id'";
                            $query_run = mysqli_query($con, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                                $row = mysqli_fetch_assoc($query_run);
                        ?>
                     <form action="function.php" method="POST" id="insert_report">
                        <input type="hidden" name="id" value="<?php echo $row['id']?>" />
                        <input type="hidden" name="lastname" value="<?php echo $row['lastname']?>" />
                        <input type="hidden" name="firstname" value="<?php echo $row['firstname']?>" />
                        <input type="hidden" name="middlename" value="<?php echo $row['middlename']?>" />
                        <input type="hidden" name="purokNo" value="<?php echo $row['purokNo']?>" />
                        <input type="hidden" name="province" value="<?php echo $row['province']?>" />
                        <input type="hidden" name="city" value="<?php echo $row['city']?>" />
                        <input type="hidden" name="barangay" value="<?php echo $row['barangay']?>" />
                        <input type="hidden" name="clearanceType" value="First Time Jobseeker certificate" />
                        <input type="hidden" name="session_role" value="<?php echo $_SESSION['role']?>" />
                     </form>
                     <div class="main">
                        <div style="margin-top: 60px;">
                           <span style="font-weight: 600;">TO WHOM IT MAY CONCERN:</span>
                           <div style="margin-top: 40px; ;">
                              <span style="margin-left: 40px;">This is to certify<span style="margin-left: 10px;"><u><?php echo '<span style="font-size: 15px;text-decoration: underline;">' . $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname']; ?></u></span> </span>
                              <span>is a bonafide resident of <u>Brgy. San Agustin,</u></span>
                              </span>
                              <span><u> Guimba, Nueva Ecija</u>
                              since year <u>
                              <?php 
                                 $query = "SELECT YEAR(birthdate) AS birthyear FROM tblresident";
                                 $result = $con->query($query);
                                 $row = $result->fetch_assoc();
                                 echo $row['birthyear'];
                                 ?>
                              </u> <span> to</span> <u>present</u> <span>and is qualified availee of RA 11261 or the First Time Job Seekers Assistance Act of 2019.</span>
                              </span>
                           </div>
                        </div>
                        <div style="margin-top: 20px;">
                           <div style="margin-top: 20px;">
                              <span style="margin-left: 40px;">I further certify that the holder/bearer was informed of his/her right including the duties and responsibilities accorded by RA 11261 through the Oath of Undertaking he/she has signed and executed in the presence of Barngay Official/s.</span>
                           </div>
                        </div>
                        <div style="margin-top: 20px;">
                           <div style="margin-top: 20px;">
                              <?php
                                 // Set the timezone
                                 date_default_timezone_set('Asia/Manila');
                                 // Get the current day with the ordinal suffix
                                 $day = date('j');
                                 $ordinalSuffix = ($day % 10 == 1 && $day != 11) ? 'st' :
                                                 (($day % 10 == 2 && $day != 12) ? 'nd' :
                                                 (($day % 10 == 3 && $day != 13) ? 'rd' : 'th'));
                                 // Combine day with the suffix
                                 $dayWithSuffix = $day . $ordinalSuffix;
                                 ?>
                              <span style="margin-left: 40px;">Issued this
                              <u><?php echo '<span style="text-decoration:underline;">' . $dayWithSuffix . '</span>'; ?></u> day of
                              <u style="text-transform: uppercase;"><?php date_default_timezone_set('Asia/Manila'); echo date('F,Y'); ?></u>
                              in the office of the Punong Barangay of San Agustin, Guimba, Nueva Ecija.
                              </span>
                           </div>
                        </div>
                        <div style="margin-top: 60px;">
                           <span>Prepared by:</span>
                           <div style="margin-top: 40px; margin-left:60px;">
                              <span>
                              <?php 
                                 $qry = mysqli_query($con, "SELECT * FROM tblofficials");
                                 while ($row = mysqli_fetch_array($qry)) {
                                     if ($row['position'] == "Secretary") {
                                         echo '
                                             <span>
                                                 <span style="font-weight:600; text-decoration: underline;">
                                                     ' . strtoupper($row['firstname']) . ' ' . strtoupper($row['middlename']) . ' ' . strtoupper($row['lastname']) . '<br>
                                                 </span>
                                             </span>
                                             <span style="margin-left:20px;">
                                                 Barangay Secretary
                                             </span>
                                         ';
                                     }
                                 }
                                 ?>
                              </span>
                           </div>
                        </div>
                        <div style="margin-top: 60px; margin-right:60px; display: flex; justify-content: flex-end; ">
                           <span>Approved by:</span>
                           <div style="margin-top: 40px; margin-left:20px">
                              <span>
                              <?php 
                                 $qry = mysqli_query($con, "SELECT * FROM tblofficials");
                                 while ($row = mysqli_fetch_array($qry)) {
                                     if ($row['position'] == "Barangay Captain") {
                                         echo '
                                             <span>
                                                 <span style="font-weight:600; text-decoration: underline;">
                                                     ' . strtoupper($row['firstname']) . ' ' . strtoupper($row['middlename']) . ' ' . strtoupper($row['lastname']) . '<br>
                                                 </span>
                                             </span>
                                             <span style="margin-left:20px;">
                                                 Barangay Captain
                                             </span>
                                         ';
                                     }
                                 }
                                 ?>
                              </span>s
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <?php
                  }
                  }
                  ?>
            </div>
         </div>
      </div>
      <!-- Print button -->
      <button class="noprint" id="printpagebutton" form="insert_report" name="insert_seeker_form" onclick="handlePrint()" style="background-color: #0004ff; border: none; color: white; padding: 15px 32px; text-align: left; text-decoration: none; 
         display: inline-block; font-size: 16px; position: absolute; top: 10px; left: 10px;">Print</button>
      <script src="../../../../includes/assets/libs/js/sweetalert2.min.js"></script>
      
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                  <script>
                     function handlePrint() {
                        // Print the page
                        window.print();
                        
                        // After printing, show SweetAlert and redirect
                        window.onafterprint = function () {
                              Swal.fire({
                                 icon: 'success',
                                 title: 'Print Successful',
                                 text: 'You will be redirected to the Resident page.',
                                 confirmButtonText: 'OK'
                              }).then(() => {
                                 // Redirect after SweetAlert confirmation
                                 window.location.href = "../../resident.php";
                              });
                        };
                     }
                  </script>
   </body>
   <?php } ?>
</html>
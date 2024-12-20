<?php
    require_once "connection.php";
   ?>
<!DOCTYPE html>
<html id="clearance">
   <head>
      <meta charset="UTF-8">
      <link rel="icon" href="image/logo.png" type="image">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Barangay Clearance</title>
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
   </head>
   <body>
      <?php
         session_start();
         if(!isset($_SESSION['role'])){
             header("Location: ../../../../login.php"); 
         } else{
         ob_start(); 
         ?>
      <div class="book">
         <div class="page" style="width: 21cm; min-height: 29.7cm; padding: 20px; border: 1px #D3D3D3 solid;  background: white; margin: 0 auto;">
            <div>
               <img style="position:absolute; margin-top:190px; margin-left:40px; opacity:0.1;" src="image/logo.jpg" alt="">
            </div>
            <div class="container" style="width: 21cm; min-height: 29.7cm; border: 2px solid #4CAF50; position: relative; box-sizing: border-box;">
               <!-- Header with logo -->
               <div class="card-header" style="display: flex; justify-content: space-between;">
                  <div class="topleft" style="width: 100px; height: 100px;">
                     <?php 
                        $query = mysqli_query($con, "SELECT image, certL, certR FROM dashboard");
                        while ($row = mysqli_fetch_array($query))
                            echo '<img src="../../../settings/img/'.basename($row['certL']).'" style="width:100px; height:100px; border-radius:50%; margin-left:140px; margin-top:30px;">';
                        
                        
                        ?>
                  </div>
                  <div style="text-align: center; margin-top: 30px; margin-left: 130px;">
                     <span style="font-size: 12px;">REPUBLIC OF THE PHILIPPINES<br></span>
                     <span style="font-size: 12px;">PROVINCE OF NUEVA ECIJA<br></span>
                     <span style="font-size: 12px;">MUNICIPALITY OF GUIMBA<br></span>
                     <span style="font-size: 18px; margin-top: 10px;"><b>BARANGAY SAN AGUSTIN<br></b></span>
                  </div>
                  <div class="topright">
                     <?php 
                        $query = mysqli_query($con, "SELECT image, certL, certR FROM dashboard");
                        while ($row = mysqli_fetch_array($query))
                            echo '<img src="../../../settings/img/'.basename($row['certR']).'" style="width:100px; height:100px; margin-right:140px; margin-top:30px;">';
                        ?>
                  </div>
               </div>
               <!-- Content -->
               <div class="card-body" style="padding: 20px;">
                  <div style="margin-top: 10px; text-align:center;">
                     <span style="font-size: 20px; font-weight: bold; margin-top: 20px;">Office of the Punong Barangay</span>
                     <hr style="width:60%;margin-bottom: 0; border-top: 2px solid black;">
                     <span style="font-size: 20px; font-weight: bold;">BARANGAY CLEARANCE</span>
                  </div>
                  <div style="display: flex; justify-content: flex-end; margin-bottom: 20px;">
                     <div style="text-align: right;">
                        <p style="right: 320px; margin-right: 20px;">
                           <span>Date: </span> <?php date_default_timezone_set('Asia/Manila'); echo date('F j, Y'); ?>
                        </p>
                     </div>
                     <div style="text-align: right;">
                        <?php 
                           $query = mysqli_query($con, "SELECT captured_image FROM tblresident WHERE id = '".$_GET['id']."' ");
                           {
                               while($row = mysqli_fetch_array($query))
                               echo'
                               <image src="../../images/'.basename($row['captured_image']).'" style="width:100px; height:100px; margin-right:20px;">';
                           }
                           ?>
                     </div>
                  </div>
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
                     <input type="hidden" name="civilStatus" value="<?php echo $row['civilStatus']?>" />
                     <input type="hidden" name="purokNo" value="<?php echo $row['purokNo']?>" />
                     <input type="hidden" name="province" value="<?php echo $row['province']?>" />
                     <input type="hidden" name="height" value="<?php echo $row['height']?>" />
                     <input type="hidden" name="weight" value="<?php echo $row['weight']?>" />
                     <input type="hidden" name="city" value="<?php echo $row['city']?>" />
                     <input type="hidden" name="barangay" value="<?php echo $row['barangay']?>" />
                     <input type="hidden" name="clearanceType" value="Barangay Clearance" />
                     <input type="hidden" name="session_role" value="<?php echo $_SESSION['role']?>" />
                  </form>
                  <div class="main">
                     <!-- Resident Info -->
                     <div>
                        <span>Name: </span>
                        <span style="margin-left: 10px; text-decoration: underline;">
                        <?php echo '<span style="text-decoration: underline;font-size:15px;">' .$row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname']; ?>
                        </span>
                     </div>
                     <div style="margin-top: 10px;">
                        <span>Address: </span>
                        <span style="margin-left: 10px; text-decoration: underline;">
                        Purok <?php echo $row['purokNo']; ?>, San Agustin, Guimba, Nueva Ecija
                        </span>
                     </div>
                     <div style="margin-top: 10px;">
                        <span>Date of Birth: </span>
                        <span style="margin-left: 5px; text-decoration: underline;"> <?php echo date('F j, Y', strtotime($row['birthdate'])); ?></span>
                        <span style="margin-left: 5px;">Place of Birth: <span style="text-decoration: underline;"><?php echo $row['city'] . ' ' . $row['province']; ?></span></span>
                     </div>
                     <div style="margin-top: 10px;">
                        <span>Height: </span>
                        <span style="margin-left: 5px; text-decoration: underline;"><?php echo $row['height']; ?></span>
                        <span style="margin-left: 5px;">Weight: <span style="text-decoration: underline;"><?php echo $row['weight']; ?></span></span>
                        <span style="margin-left: 5px;">Civil Status: <span style="text-decoration: underline;"><?php echo $row['civilStatus']; ?></span></span>
                     </div>
                     <div style="margin-top: 20px;">
                        <span>FINDINGS:</span>
                        <div style="margin-top: 20px; margin-left: 40px;">
                           <span>NO DEROGATORY RECORD/S</span>
                        </div>
                     </div>
                     <div style="margin-top: 20px;">
                        <span>PURPOSE:</span>
                        <div style="margin-top: 20px; margin-left: 40px;">
                           <span style="text-decoration: underline; font-weight: bold;">FOR EMPLOYMENT</span>
                        </div>
                     </div>
                     <div style="margin-top: 20px; font-family: Arial, sans-serif;">
                        <span style="font-weight: 600; font-size: 1.2em; display: block; text-align: start;">TO WHOM IT MAY CONCERN:</span>
                        <div style="margin-top: 20px;">
                           <span style="display: block; margin: 0 auto; text-align: justify;">
                           This is to certify
                           <span style="text-decoration: underline; font-weight: bold;"><?php echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname']; ?></span>
                           whose left and right thumbmark and signature appear below have undergone the identification process of this office. This clearance is valid only for ninety (90) days from the date of issuance.
                           </span>
                        </div>
                     </div>
                     <div style="margin-top: 20px;">
                        <span>Comm. Tax Number:________________________</span>
                        <span style="margin-left: 5px;"></span>
                     </div>
                     <div style="margin-top: 10px;">
                        <span>Issued at:________________________</span>
                     </div>
                     <div style="position: absolute; margin-left:450px;">
                        <div>________________________</div>
                        <div style="margin-left: 20px; font-weight: bold;">Applicant’s Signature</div>
                     </div>
                     <div style="margin-top: 10px;">
                        <span>Issued on:________________________</span>
                        <span style="margin-left: 5px;"></span>
                     </div>
                     <div style="margin-top: 10px;">
                        <span>O.R Number:________________________</span>
                        <span style="margin-left: 5px;"></span>
                     </div>
                     <div style="margin-top: 10px;">
                        <span>Issued at:</span>
                        <span style="margin-left: 5px; text-decoration: underline;">Brgy. San Agustin, Guimba N.E</span>
                     </div>
                     <div style="margin-top: 10px; display: flex;">
                        <div>
                           <div style="width: 70px;height:100px; border: 3px solid black; padding: 10px; text-align: center; margin-right: 20px; border-radius:20px;">
                              <span style="display: block; height: 50px; "></span>
                           </div>
                           <span style="margin-top: 10px; display: block;">Left</span>
                        </div>
                        <div>
                           <div style="width: 70px;height:100px; border: 3px solid black; padding: 10px; text-align: center; margin-right: 20px; border-radius: 20px;">
                              <span style="display: block; height: 50px;"></span>
                           </div>
                           <span style="margin-top: 10px; display: block;">Right</span>
                           <div>
                              <span style="margin-top:10px;display: inline-block; font-size: 16px; position: absolute; left: 10px; color:red;">****NOT VALID WITHOUT OFFICIAL SEAL****</span>
                           </div>
                        </div>
                        <div>
                           <!-- Prepared and Verified by Section -->
                           <div style="margin-top: 10px;">
                              <span style="margin-left: 50px;">Prepared and Verified by:</span>
                              <div style="margin-top: 10px;">
                                 <span style="margin-left: 20px;">
                                 <?php 
                                    $qry = mysqli_query($con, "SELECT * FROM tblofficials");
                                    while ($row = mysqli_fetch_array($qry)) {
                                        if ($row['position'] == "Secretary") {
                                            echo '
                                                <span>
                                                    <span style="margin-left: 200px; text-decoration: underline;"><b>
                                                        ' . strtoupper($row['firstname']) . ' ' . strtoupper($row['middlename']) . ' ' . strtoupper($row['lastname']) . '<br>
                                                    </b></span>
                                                </span>
                                                <span style="margin-left: 240px;">
                                                    Barangay Secretary
                                                </span>
                                            ';
                                        }
                                    }
                                    ?>
                                 </span>
                              </div>
                           </div>
                           <!-- Approved by Section -->
                           <div style="margin-top: 10px;">
                              <span style="margin-left: 50px;">Approved by:</span>
                              <div style="margin-top: 10px;">
                                 <span style="margin-left: 20px;;">
                                 <?php 
                                    $qry = mysqli_query($con, "SELECT * FROM tblofficials");
                                    while ($row = mysqli_fetch_array($qry)) {
                                        if ($row['position'] == "Barangay Captain") {
                                            echo '
                                                <span>
                                                    <span style="margin-left: 220px; text-decoration: underline;"><b>
                                                        ' . strtoupper($row['firstname']) . ' ' . strtoupper($row['middlename']) . ' ' . strtoupper($row['lastname']) . '<br>
                                                    </b></span>
                                                </span>
                                                <span style="margin-left: 250px;">
                                                    Barangay Captain
                                                </span>
                                            ';
                                        }
                                    }
                                    ?>
                                 </span>
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
      </div>
      
      <button class="noprint" id="printpagebutton" form="insert_report" name="insert_barangay_clearance" onclick="handlePrint()"  style="background-color: #0004ff; border: none; color: white; padding: 15px 32px; text-align: left; text-decoration: none;  display: inline-block; font-size: 16px; position: absolute; top: 10px; left: 10px;">Print</button>
       <script src="../../../../includes/assets/libs/js/sweetalert2.min.js"></script>
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
      </div>
      <?php } ?>
   </body>
</html>
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
      <title>JOB SEEKER OATH</title>
      <link rel="icon" href="image/logo.png" type="image">
   </head>
   <style>
      @media print {
      .noprint {
      visibility: hidden;
      }
      }
      @page {
      size: auto;
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
               </div>
               <div class="topright">
                  <?php 
                     $query = mysqli_query($con, "SELECT image, certL, certR FROM dashboard");
                     while ($row = mysqli_fetch_array($query)) {
                         echo '<img src="../../../settings/img/'.basename($row['certR']).'" style="width:100px; height:100px; margin-right:140px; margin-top:50px;">';
                     }
                     ?>
               </div>
               <div>
               </div>
            </div>
            <div style="padding: 40px;">
               <div style="text-align: center;">
                  <div>
                     <span style="font-size: 24px; font-weight: bold; ">Oath of Undertaking</span>
                     <hr style="margin-top: 0; border-top: 2px solid black; width:40%;">
                  </div>
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
                     <input type="hidden" name="clearanceType" value="Oath of undertaking" />
                     <input type="hidden" name="session_role" value="<?php echo $_SESSION['role']?>" />
                  </form>
                  <div style="margin-top: 40px;">
                     <span style="margin-left: 40px;">
                     <?php echo '<span style="text-decoration: underline;font-size:15px;">' .$row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname']; ?>,
                     </span>
                     <span>
                     <?php echo date('d', strtotime($row['birthdate'])); ?> years of age, resident of Barangay San Agustin, Guimba, Nueva Ecija, availing the benefits of
                     Republic Act No. 11261, otherwise known as the First Time Job Seekers Act of 2019, do hereby declare,
                     agree and the benefits to abide be bound by the following:
                     </span>
                  </div>
                  <div style="margin-top: 40px; padding: 0 40px 40px 40px;">
                     <div>
                        <span>1. That this is the first time that i will Actively look for a job, and therefore requesting that
                        <span style="margin-left: 18px;">a Barangay Certification be issued in my favor to avail the benefits of the law.</span></span>
                     </div>
                     <div style="margin-top: 20px;">
                        <span>2. That I am aware that the benefit and privileged undet the said law shall be valid only
                        <span style="margin-left: 18px;">for one year from the date that the Barangay Certification is issued.</span></span>
                     </div>
                     <div style="margin-top: 20px;">
                        <span>3. That I can avail the benefits of the law only once.
                     </div>
                     <div style="margin-top: 20px;">
                        <span>4. That I understand that my personal information shall be included in the Roster/ List of
                        <span style="margin-left: 18px;">First Time Job Seekers and will not be used for any unlawful purpose.</span></span>
                     </div>
                     <div style="margin-top: 20px;">
                        <span>5. That I will inform and report to the Barangay personally through test or other means,
                        <span style="margin-left: 18px;">or through my relatives once I get employed. </span></span>
                     </div>
                     <div style="margin-top: 20px;">
                        <span>6. That I am not be beneficiary of the Job start Program under RA No. 10869 and other
                        <span style="margin-left: 18px;">laws that give similar exemptions for the documents or transactions exempted under</span>
                        <span style="margin-left: 18px;">RA No. 11261.</span>
                        </span>
                     </div>
                     <div style="margin-top: 20px;">
                        <span>7. That if issued the requested certification, I will not use the same in any fraud, and
                        <span style="margin-left: 18px;">neither falsify not help and/or assist in the fabrication of the said certification.</span></span>
                     </div>
                     <div style="margin-top: 20px;">
                        <span>8. That this undertaking is made solely for the purpose of obtaining a Barangay
                        <span style="margin-left: 18px;">Certification consistent with the objective of RA No. 11261 and not for any other.</span>
                        <span style="margin-left: 18px;">purpose</span>
                        </span>
                     </div>
                     <div style="margin-top: 20px;">
                        <span>9. That I consent in the use of my personal information pursuant to the data privacy act
                        <span style="margin-left: 18px;">and other applicable laws, rules and regulations.</span></span>
                     </div>
                     <div style="margin-top: 20px;">
                        <?php
                           date_default_timezone_set('Asia/Manila');
                           $day = date('j');
                           $ordinalSuffix = ($day % 10 == 1 && $day != 11) ? 'st' :
                                           (($day % 10 == 2 && $day != 12) ? 'nd' :
                                           (($day % 10 == 3 && $day != 13) ? 'rd' : 'th'));
                           $dayWithSuffix = $day . $ordinalSuffix;
                           ?>
                        <span>
                        Signed this <u><b><?php echo $dayWithSuffix; ?></b></u>
                        of <u><b><?php echo date('F, Y'); ?></b></u>,
                        in Barangay San Agustin, Guimba, Nueva Ecija.
                        </span>
                     </div>
                     <div style="margin-top: 50px; display: flex; justify-content:flex-end;">
                        <span>Witnessed by:</span>
                        <div style="margin-top: 30px;">
                           <?php 
                              $qry = mysqli_query($con, "SELECT * FROM tblofficials");
                              while ($row = mysqli_fetch_array($qry)) {
                                  if ($row['position'] == "Barangay Captain") {
                                      echo '
                                          <span>
                                              <span style="text-decoration: underline; font-weight: 600;">HON.
                                                  ' . strtoupper($row['firstname']) . ' ' . strtoupper($row['middlename']) . ' ' . strtoupper($row['lastname']) . '<br>
                                              </span>
                                          </span>
                                          <span style="text-align: center; margin-left: 30px;">
                                              Punong Barangay
                                          </span>
                                      ';
                                  }
                              }
                              ?>
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
      <!-- Print button -->
      <button class="noprint" id="printpagebutton" form="insert_report" name="insert_seeker_oath" onclick="handlePrint()" style="background-color: #0004ff; border: none; color: white; padding: 15px 32px; text-align: left; text-decoration: none; 
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
<?php 
   require_once "connection.php";
   $query = "SELECT * FROM tblresident";
   $result = $con->query($query);
   $row = $result->fetch_assoc();
   ?>
<title>Goodmoral certificate</title>
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
   <div class="book">
      <?php
         session_start();
         if(!isset($_SESSION['role'])){
             header("Location: ../../../login.php"); 
         } else{
         ob_start(); 
         ?>
      <div class="page" style="width: 21cm; min-height: 29.7cm; padding: 20px; border: 1px #D3D3D3 solid; border-radius: 5px; background: white; margin: 0 auto;">
         <div id="watermark">
            <img style="position:absolute; margin-top:190px; margin-left:40px; opacity:0.1;" src="image/logo.jpg" alt="">
         </div>
         <!--End watermark -->
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
               <!--End topleft image -->
               <div id="header" style="text-align: center; margin-top: 50px; margin-left: 130px;">
                  <span style="font-size: 14px;">REPUBLIC OF THE PHILIPPINES<br></span>
                  <span style="font-size: 14px;">PROVINCE OF NUEVA ECIJA<br></span>
                  <span style="font-size: 14px;">MUNICIPALITY OF GUIMBA<br></span>
                  <span style="font-size: 14px; margin-top: 10px;"><b>BARANGAY SAN AGUSTIN<br></b></span>
               </div>
               <!--End header -->
               <div class="topright">
                  <?php 
                     $query = mysqli_query($con, "SELECT image, certL, certR FROM dashboard");
                     while ($row = mysqli_fetch_array($query)) {
                         echo '<img src="../../../settings/img/'.basename($row['certR']).'" style="width:100px; height:100px; margin-right:140px; margin-top:50px;">';
                     }
                     ?>
               </div>
               <!--End topright image -->
            </div>
            <!--End  card header -->
            <div id="card-body" style="text-align: justify;">
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
                  <input type="hidden" name="clearanceType" value="BARC Certificate" />
                  <input type="hidden" name="session_role" value="<?php echo $_SESSION['role']?>" />
               </form>
               <div id="sub-header" style="margin-top: 30px; text-align: center;">
                  <span style="font-size: 20px; font-weight: bold; margin-top: 20px;">Tanggapan ng Punong Barangay</span>
                  <hr style="margin-top: 0; width: 60%; margin-bottom: 0; border-top: 2px solid black;">
               </div>
               <!--End sub-header -->
               <div style="text-align: center; margin-top: 20px;">
                  <span style="font-size: 14px; font-weight: bold;">CERTIFICATE OF GOOD MORAL CHARACTER</span>
               </div>
               <div style="margin-top: 60px; padding:40px">
                  <div>
                     <b>TO WHOM IT MAY CONCERN:</b>
                  </div>
                  <div style="margin-left: 80px; margin-top:40px;">
                     <span>This is to certify that <b style="font-size: 15px;"><?php echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname']; ?></b>
                     of legal age, <?php echo $row['civilStatus']?> and a
                     <br>
                     </span>
                  </div>
                  <div>
                     <span>resident of <b>Purok <?php echo $row['purokNo']?>, Barangay San Agustin, Guimba, Nueva Ecija</b>
                     is personally known to me to be a good moral character and reputation in the community. He is peacefully and law-abiding citizen.</span>
                  </div>
                  <div style="margin-left: 80px; margin-top: 20px;">
                     <div>
                        <span>As per records available in the files of this office, said subject has never been convicted
                        </span>
                     </div>
                  </div>
                  <div>
                     nor accused of any crime what so ever nor he is he a member of any subversive organization.
                  </div>
                  <div style="margin-left: 80px; margin-top: 20px;">
                     <div>
                        <span>This certification is issued upon request of the above mentioned name for whatever legal
                        </span>
                     </div>
                  </div>
                  <div>
                     purpose this may serve him best.
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
                        <u><b><?php echo '<span style="text-decoration:underline;">' . $dayWithSuffix . '</span>'; ?></b></u> day of
                        <u style="text-transform: uppercase;"><b><?php date_default_timezone_set('Asia/Manila'); echo date('F,Y'); ?></b></u>
                        at Barangay of San Agustin, Guimba, Nueva Ecija.
                        </span>
                     </div>
                  </div>
                  <div style="display: flex; justify-content: space-between; margin-top: 120px;">
                     <!-- Left Column for Secretary -->
                     <div style="width: 48%; margin-right: 2%;">
                        <div>
                           <span>Prepared by:</span>
                           <div style="margin-top: 20px;">
                              <span>
                              <?php 
                                 $qry = mysqli_query($con, "SELECT * FROM tblofficials");
                                 while ($row = mysqli_fetch_array($qry)) {
                                     if ($row['position'] == "Secretary") {
                                         echo '
                                             <span style="margin-top:20px; text-decoration: underline; font-weight:600;">
                                                 ' . strtoupper($row['firstname']) . ' ' . strtoupper($row['middlename']) . ' ' . strtoupper($row['lastname']) . '<br>
                                             </span>
                                             <span>
                                                 Barangay Secretary
                                             </span>
                                         ';
                                     }
                                 }
                                 ?>
                              </span>
                           </div>
                        </div>
                     </div>
                     <!-- Right Column for Barangay Treasurer -->
                     <div style="width: 48%; margin-left:160px;">
                        <div>
                           <span>Attested by:</span>
                           <div style="margin-top: 20px;">
                              <span>
                              <?php 
                                 $qry = mysqli_query($con, "SELECT * FROM tblofficials");
                                 while ($row = mysqli_fetch_array($qry)) {
                                     if ($row['position'] == "Barangay Captain") {
                                         echo '
                                             <span style="margin-top:20px; text-decoration: underline; font-weight:600;">
                                                 ' . strtoupper($row['firstname']) . ' ' . strtoupper($row['middlename']) . ' ' . strtoupper($row['lastname']) . '<br>
                                             </span>
                                             <span>
                                                 Barangay Chairman
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
                  <!-- <div>
                     <span style="margin-top:80px;display: inline-block; font-size: 16px; position: absolute; left: 40px; color:red;">****NOT VALID WITHOUT OFFICIAL SEAL****</span>
                     </div> -->
               </div>
            </div>
         </div>
         <!--End card-body -->
      </div>
      <!--End container -->
      <?php
         }
         }
         ?>
   </div>
   <!--End PAGE -->
   </div><!--End Book -->
   <button class="noprint" id="printpagebutton" form="insert_report" name="insert_good_moral" onclick="handlePrint()" style="background-color: #0004ff; border: none; color: white; padding: 15px 32px; text-align: left; text-decoration: none; 
      display: inline-block; font-size: 16px; position: absolute; top: 10px; left: 10px;">Print</button>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
</body>
<?php } ?>
</html>
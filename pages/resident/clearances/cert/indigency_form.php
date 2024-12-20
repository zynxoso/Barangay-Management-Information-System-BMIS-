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
      <title>INDIGENCY</title>
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
                     <span style="font-size: 12px;">REPUBLIC OF THE PHILIPPINES<br></span>
                     <span style="font-size: 12px;">PROVINCE OF NUEVA ECIJA<br></span>
                     <span style="font-size: 12px;">MUNICIPALITY OF GUIMBA<br></span>
                     <span style="font-size: 18px; margin-top: 10px;"><b>BARANGAY SAN AGUSTIN<br></b></span>
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
               <div id="card-body">
                  <div id="sub-header" style="margin-top: 30px; text-align: center;">
                     <span style="font-size: 20px; font-weight: bold; margin-top: 20px;">Tanggapan ng Punong Barangay</span>
                     <hr style="margin-top: 0; width: 60%; margin-bottom: 0; border-top: 2px solid black;">
                  </div>
                  <!--End sub-header -->
                  <div style="text-align: center; margin-top: 20px;">
                     <u style="font-size: 18px; font-weight: bold;">CERTIFICATE OF INDIGENCY</u>
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
                     <input type="hidden" name="purokNo" value="<?php echo $row['purokNo']?>" />
                     <input type="hidden" name="province" value="<?php echo $row['province']?>" />
                     <input type="hidden" name="city" value="<?php echo $row['city']?>" />
                     <input type="hidden" name="barangay" value="<?php echo $row['barangay']?>" />
                     <input type="hidden" name="clearanceType" value="Good Moral" />
                     <input type="hidden" name="session_role" value="<?php echo $_SESSION['role']?>" />
                  </form>
                  <div class="main">
                     <div style="margin-top: 60px; padding:40px">
                        <div>
                           <b>TO WHOM IT MAY CONCERN:</b>
                        </div>
                        <div style="margin-left: 80px; margin-top:40px;">
                           <span>This is to certify that <b style="font-size:15px"><?php echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname']; ?></b>
                           resident of Purok <?php echo $row['purokNo']?>
                           <br>
                           </span>
                        </div>
                        <div>
                           <span> Barangay San Agustin, Guimba, Nueva Ecija is known to me personally, belongs to one of the INDIGENT FAMILIES in the Barangay. Said person needs assistance for the following reason(s).</span>
                        </div>
                        <div style="margin-top: 20px;">
                           <div style="margin-top: 20px;">
                              <?php
                                 date_default_timezone_set('Asia/Manila');
                                 $day = date('j');
                                 $ordinalSuffix = ($day % 10 == 1 && $day != 11) ? 'st' :
                                                 (($day % 10 == 2 && $day != 12) ? 'nd' :
                                                 (($day % 10 == 3 && $day != 13) ? 'rd' : 'th'));
                                 $dayWithSuffix = $day . $ordinalSuffix;
                                 ?>
                              <span style="margin-left: 40px;">Issued this
                              <u><b><?php echo '<span style="text-decoration:underline;">' . $dayWithSuffix . '</span>'; ?></b></u> day of
                              <u style="text-transform: uppercase;"><b><?php date_default_timezone_set('Asia/Manila'); echo date('F,Y'); ?></b></u>
                              here at Barangay of San Agustin, Guimba, Nueva Ecija.
                              </span>
                           </div>
                        </div>
                        <div style="margin-top: 20px; display: inline-flex; align-items: center;">
                           <!-- Box container -->
                           <div style="width: 40px; height: 40px; padding: 20px; border: 2px solid black; background-color: #fff;"></div>
                           <!-- Text to the right of the box -->
                           <span style="margin-left: 40px;">Presently confined at the hospital</span>
                        </div>
                        <div>
                           <div style="margin-top: 20px; display: inline-flex; align-items: center;">
                              <!-- Box container -->
                              <div style="width: 40px; height: 40px; padding: 20px; border: 2px solid black; background-color: #fff;"></div>
                              <!-- Text to the right of the box -->
                              <span style="margin-left: 40px;">Need burial assistance</span>
                           </div>
                        </div>
                        <div style="margin-top: 20px; display: inline-flex; align-items: center;">
                           <!-- Box container -->
                           <div style="width: 40px; height: 40px; padding: 20px; border: 2px solid black; background-color: #fff;"></div>
                           <!-- Text to the right of the box -->
                           <span style="margin-left: 40px;">others (specify) ____________________________________________</span>
                        </div>
                        <div style="margin-top: 20px;">
                           <span style="margin: top 20px;">Any assistance given to the bearer/ relative(s) shall be highly appreciated by the under sign.</span>
                        </div>
                        <div style="display: flex; justify-content:flex-end; margin-top: 60px;">
                           <div>
                              <div style="margin-top: 20px; margin-right:40px;">
                                 <span>
                                 <?php 
                                    $qry = mysqli_query($con, "SELECT * FROM tblofficials");
                                    while ($row = mysqli_fetch_array($qry)) {
                                        if ($row['position'] == "Barangay Captain") {
                                            echo '
                                                <span style="margin-top:20px; text-decoration: underline; font-weight:600;">HON.
                                                    ' . strtoupper($row['firstname']) . ' ' . strtoupper($row['middlename']) . ' ' . strtoupper($row['lastname']) . '<br>
                                                </span>
                                                <span style="margin-left:20px;">
                                                    Punong Barangay
                                                </span>
                                            ';
                                        }
                                    }
                                    ?>
                                 </span>
                              </div>
                           </div>
                        </div>
                        <!-- <div>
                           <span style="margin-top:80px;display: inline-block; font-size: 16px; position: absolute; left: 40px; color:red;">****NOT VALID WITHOUT OFFICIAL SEAL****</span>
                           </div> -->
                     </div>
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
      <button class="noprint" id="printpagebutton" form="insert_report" name="insert_indigency" onclick="handlePrint()" style="background-color: #0004ff; border: none; color: white; padding: 15px 32px; text-align: left; text-decoration: none; 
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
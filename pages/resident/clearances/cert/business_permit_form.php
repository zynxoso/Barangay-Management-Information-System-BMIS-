<?php 
   include "connection.php";
   session_start();
   ?>
<!DOCTYPE html>
<html id="clearance">
   <head>
      <meta charset="UTF-8">
      <link rel="icon" href="image/logo.png" type="image">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Business permit</title>
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
            if(!isset($_SESSION['role'])){
                header("Location: ../../../login.php"); 
            } else{
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
                     <div style="margin-top: 30px;">
                        <span style="font-size: 20px; font-weight: bold; margin-top: 20px;">Office of the Punong
                        Barangay</span>
                        <hr style="margin-top: 0; margin-bottom: 0; border-top: 2px solid black;">
                        <span style="font-size: 14px; font-weight: bold;  margin-top:10px; color:green;">NEGOSYO O
                        GAWAIN SA BARANGAY</span>
                     </div>
                  </div>
                  <div class="topright">
                     <?php 
                        $query = mysqli_query($con, "SELECT image, certL, certR FROM dashboard");
                        while ($row = mysqli_fetch_array($query)) {
                            echo '<img src="../../../settings/img/'.basename($row['certR']).'" style="width:100px; height:100px; margin-right:140px; margin-top:50px;">';
                        }
                        ?>
                  </div>
               </div>
               <div class="card-body" style="padding: 0 40px 40px 40px;">
                  <?php
                     if(isset($_GET['id'])) {
                         $id = $_GET['id'];
                         $query =    "SELECT tblresident.middlename, tblresident.lastname, tblresident.firstname,
                                     tbl_business_logs.BusinessName, tbl_business_logs.BusinessLocation, 
                                     tbl_business_logs.BusinessType, tbl_business_logs.BusinessAmount, tbl_business_logs.Official_receipt
                                     FROM tblresident 
                                     INNER JOIN tbl_business_logs
                                     ON tblresident.id = tbl_business_logs.user_id
                                     WHERE tblresident.id = '$id'
                                     ORDER BY tbl_business_logs.ID DESC LIMIT 1";
                                     $query_run = mysqli_query($con, $query);
                         if(mysqli_num_rows($query_run) > 0) {
                             $resident = mysqli_fetch_assoc($query_run);
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
                     <input type="hidden" name="clearanceType" value="Business Permit" />
                     <input type="hidden" name="session_role" value="<?php echo $_SESSION['role']?>" />
                  </form>
                  <div>
                     <?php 
                        $query = mysqli_query($con, "SELECT captured_image FROM tblresident WHERE id = '".$_GET['id']."' ");
                        {
                            while($row = mysqli_fetch_array($query))
                            echo'
                            <image src="../../images/'.basename($row['captured_image']).'" style="display:absolute;width:100px; height:100px; margin-left:500px;margin-right:20px; border:3px solid black;">';
                        }
                        ?>
                  </div>
                  <div>
                     <span><b>SA MGA KINAUUKULAN</b></span>
                  </div>
                  <div style="margin-top: 10px;">
                     <span>Sang-ayon sa itinadhana ng <span><u><b>LOCAL GOVERNMENT CODE 1991</b></u></span>, ang
                     Barangay Clearance</span>
                     <span>o pahintulot ay ipinagkakaloob batay sa mga sumusunod:</span>
                  </div>
               </div>
               <div style="margin-top: 20px; margin-right: 0; margin-bottom: 0; margin-left: 40px;">
                  <span><b>PANGALAN NG APLIKANTE :</b></span>
                  <div>
                     <span style="margin-left: 20px;">
                     <?php echo '<span style="text-decoration:underline;">' . $resident['firstname'] . ' ' . $resident['middlename'] . ' ' . $resident['lastname'] . '</span>'; ?>
                     </span>
                  </div>
               </div>
               <div style="margin-top: 30px; margin-right: 0; margin-bottom: 0; margin-left: 40px;">
                  <span> <b>PANGALAN NG NEGOSYO O AKTIBIDAD:</b></span>
                  <div>
                     <span style="margin-left: 20px;">
                     <?php echo '<span style="text-decoration:underline;">' . htmlspecialchars($resident['BusinessName']) . '</span>'; ?>
                     </span>
                  </div>
               </div>
               <div style="margin-top: 30px; margin-right: 0; margin-bottom: 0; margin-left: 40px;">
                  <span> <b>SAAN ITATAYO O GAGAWIN:</b></span>
                  <div>
                     <span style="margin-left: 20px;">
                     <?php echo '<span style="text-decoration:underline;">' . htmlspecialchars($resident['BusinessLocation']) . '</span>'; ?>
                     </span>
                  </div>
               </div>
               <div style="margin-top: 30px; margin-right: 0; margin-bottom: 0; margin-left: 40px;">
                  <span><b>URI NG NEGOSYO O AKTIBIDAD:</b></span>
                  <div>
                     <span style="margin-left: 20px;">
                     <?php echo '<span style="text-decoration:underline;">' . htmlspecialchars($resident['BusinessType']) . '</span>'; ?>
                     </span>
                  </div>
               </div>
               <div style="margin-top: 20px; margin-left:20px;">
                  <div style="margin-top: 10px;">
                     <span>IBINIGAY NGAYONG IKA-
                     <?php date_default_timezone_set('Asia/Manila'); echo date('j'); ?> NG
                     <span style="text-transform: uppercase;"><?php echo date('F,Y'); ?></span>
                     MAY BISA HANGGANG DECEMBER 31, <?php echo date('Y'); ?>
                     </span>
                  </div>
               </div>
               <div style="display: flex; justify-content: space-between; margin-top: 40px;">
                  <div style="width: 48%; margin-right: 2%;margin-left:20px;">
                     <div>
                        <span>Prepared by:</span>
                        <div style="margin-top: 20px;">
                           <?php 
                              $qry = mysqli_query($con, "SELECT * FROM tblofficials WHERE position='Secretary'");
                              if($secretary = mysqli_fetch_array($qry)) {
                                 echo '<span style="margin-top:20px; text-decoration: underline; font-weight:600;">'
                                      . strtoupper($secretary['firstname']) . ' ' 
                                      . strtoupper($secretary['middlename']) . ' ' 
                                      . strtoupper($secretary['lastname']) . '</span><br>'
                                      . '<span>Barangay Secretary</span>';
                              }
                              ?>
                        </div>
                     </div>
                  </div>
                  <div style="width: 48%; margin-left:160px;">
                     <div>
                        <span>Collected by:</span>
                        <div style="margin-top: 20px;">
                           <?php 
                              $qry = mysqli_query($con, "SELECT * FROM tblofficials WHERE position='Treasurer'");
                              if($treasurer = mysqli_fetch_array($qry)) {
                                 echo '<span style="margin-top:20px; text-decoration: underline; font-weight:600;">'
                                      . strtoupper($treasurer['firstname']) . ' ' 
                                      . strtoupper($treasurer['middlename']) . ' ' 
                                      . strtoupper($treasurer['lastname']) . '</span><br>'
                                      . '<span>Barangay Treasurer</span>';
                              }
                              ?>
                        </div>
                     </div>
                  </div>
               </div>
               <div style="margin-top: 10px; text-align: center; margin-left:20px;">
                  <span>Approved by:</span>
                  <div style="margin-top: 20px;">
                     <?php 
                        $qry = mysqli_query($con, "SELECT * FROM tblofficials WHERE position='Barangay Captain'");
                        if($captain = mysqli_fetch_array($qry)) {
                           echo '<span style="text-decoration: underline; font-weight:600;">'
                                . strtoupper($captain['firstname']) . ' ' 
                                . strtoupper($captain['middlename']) . ' ' 
                                . strtoupper($captain['lastname']) . '</span><br>'
                                . '<span>Punong Barangay</span>';
                        }
                        ?>
                  </div>
               </div>
               <div style="margin-top: 20px;margin-left:20px;">
                  <span> <b>Amount</b><span style="margin-left: 90px;">:
                  <?php echo '<span style="text-decoration:underline;">₱' . number_format((float)$resident['BusinessAmount'], 2, '.', ',') . '</span>'; ?></span></span>
               </div>
               <div style="margin-left:20px;">
                  <span><b>Official Receipt No.</b><span style="margin-left: 10px">:</span>
                  <?php echo '<span style="text-decoration:underline;">' . htmlspecialchars($resident['Official_receipt']) . '</span>'; ?></span>
               </div>
               <div style="margin-left:20px;">
                  <span><b>Date issued</b><span style="margin-left: 65px;">:</span>
                  <u><?php echo date('m-j-Y'); ?></u></span>
               </div>
               <div>
                  <span style="margin-top:40px;display: inline-block; font-size: 16px; position: absolute; left: 40px; color:red;">****NOT
                  VALID WITHOUT OFFICIAL SEAL****</span>
               </div>
               <?php 
                  }
                  }
                  ?>
            </div>
            <?php
               }
               }
               ?>
         </div>
      </div>
      </div>
      <button class="noprint" id="printpagebutton" onclick="handlePrint()"  form="insert_report" name="insert_business_permit" style="background-color: #0004ff; border: none; color: white; padding: 15px 32px; 
         text-align: left; text-decoration: none; display: inline-block; 
         font-size: 16px; position: absolute; top: 10px; left: 10px;">
      Print
      </button>
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
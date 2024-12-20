<?php
   include "connection.php";
   ?>
<!DOCTYPE html>
<html id="clearance">
   <head>
      <meta charset="UTF-8">
      <link rel="icon" href="image/logo.png" type="image">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>BARC Certificate</title>
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
             header("Location: ../../../login.php"); 
         } else{
         ob_start(); 
         ?>
      <div class="book">
      <div class="page" style="width: 21cm; min-height: 29.7cm; padding: 20px; border: 1px #D3D3D3 solid; border-radius: 5px; background: white; margin: 0 auto;">
      <div>
         <img style="position:absolute; margin-top:190px; margin-left:40px; opacity:0.1;" src="image/logo.jpg" alt="">
      </div>
      <div class="container" style="width: 210mm; height: 297mm; margin: 0 auto; padding: 1px; border: 2px solid #4CAF50; position: relative; box-sizing: border-box;">
         <!-- Header with logo -->
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
                  <span style="font-size: 20px; font-weight: bold; margin-top: 20px;">Office of the Punong Barangay</span>
                  <hr style="margin-top: 0; margin-bottom: 0; border-top: 2px solid black;">
                  <span style="font-size: 20px; font-weight: bold;  margin-top:10px; color:green;">CERTIFICATION</span>
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
         <div class="main">
            <!-- Content -->
            <div class="card-body" style="padding: 40px;">
               <div style="margin-top: 40px;">
                  <span style="font-weight: 600;">TO WHOM IT MAY CONCERN:</span>
                  <div style="margin-top: 20px; margin-left: 40px;">
                     <span>This is to certify
                     <span><?php echo '<span style="text-decoration: underline;">' . $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname']; ?></span> of legal age, Filipino, married/single/</span>
                     </span>
                  </div>
                  <span>widow/separated and resident of <span style="text-decoration: underline;">PUROK <?php echo $row['purokNo']?> <span style="margin-left: 5px;">SAN AGUSTIN, GUIMBA, NUEVA ECIJA</span></span></span>
               </div>
               <div style="margin-top: 10px;">
                  <div style="margin-top: 20px;">
                     <?php
                        // Function to convert numbers into words
                        function numberToWords($num) {
                            $belowTwenty = ["", "ONE", "TWO", "THREE", "FOUR", "FIVE", "SIX", "SEVEN", "EIGHT", "NINE", "TEN", 
                                            "ELEVEN", "TWELVE", "THIRTEEN", "FOURTEEN", "FIFTEEN", "SIXTEEN", "SEVENTEEN", 
                                            "EIGHTEEN", "NINETEEN"];
                            $tens = ["", "", "TWENTY", "THIRTY", "FORTY", "FIFTY", "SIXTY", "SEVENTY", "EIGHTY", "NINETY"];
                            $thousands = ["", "THOUSAND", "MILLION", "BILLION"];
                            if ($num == 0) return "ZERO";
                            $words = "";
                            $i = 0;
                            while ($num > 0) {
                                if ($num % 1000 != 0) {
                                    $words = convertChunk($num % 1000) . ($thousands[$i] ? " " . $thousands[$i] : "") . " " . $words;
                                }
                                $num = intval($num / 1000);
                                $i++;
                            }
                            return trim($words);
                        }
                        function convertChunk($num) {
                            global $belowTwenty, $tens;
                            $words = "";
                            if ($num >= 100) {
                                $words .= $belowTwenty[intval($num / 100)] . " HUNDRED ";
                                $num %= 100;
                            }
                            if ($num >= 20) {
                                $words .= $tens[intval($num / 10)] . " ";
                                $num %= 10;
                            }
                            if ($num > 0) {
                                $words .= $belowTwenty[$num] . " ";
                            }
                            return trim($words);
                        }
                        $landSize = $row['LandSize']; 
                        $landSizeInWords = strtoupper(numberToWords($landSize)); 
                        ?>
                     <span>This certifies that the above-mentioned person is a farmer occupying/tiling agricultural land containing an area of <?php echo $landSizeInWords; ?> SQUARE METERS (<?php echo number_format($landSize); ?> SQ.M) located in the <?php echo $row['LandDirection']?> part of Barangay San Agustin, Guimba, Nueva Ecija.</span>
                  </div>
                  <div style="margin-top: 20px;">
                     <span>This certification is being issued upon the request of the subject person for reference and whatever legal purposes it may serve in his/her favor.</span>
                  </div>
                  <div style="margin-top: 10px;">
                     <div style="margin-top: 20px; ">
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
                        <span>Issued this <?php echo '<span style="text-decoration:underline;">' . $dayWithSuffix . '</span>'; ?> day of
                        <?php date_default_timezone_set('Asia/Manila');
                           echo '<span style="text-decoration:underline;">' . date('F,Y') . '</span>';
                           ?>
                        here in Barangay San Agustin,<span> Guimba Nueva Ecija.</span></span>
                        </span>
                     </div>
                  </div>
                  <div style="margin-top: 100px;">
                     <span style="font-weight: 600;">APPROVED BY:</span>
                     <div style="margin-top: 20px;">
                        <?php 
                           $qry = mysqli_query($con, "SELECT * FROM tblofficials");
                           while ($row = mysqli_fetch_array($qry)) {
                               if ($row['position'] == "Kagawad(Agriculture)") {
                                   echo '
                                       <span>
                                           <span style="margin-left: 120px; text-decoration: underline;">
                                               ' . strtoupper($row['firstname']) . ' ' . strtoupper($row['middlename']) . ' ' . strtoupper($row['lastname']) . '<br>
                                           </span>
                                       </span>
                                       <span style="margin-left: 140px;">
                                           BARC Chairman
                                       </span>
                                   ';
                               }
                           }
                           ?>
                     </div>
                     <?php
                        }
                        }
                        ?>
                  </div>
                  <!-- Print button -->
                  <button class="noprint" id="printpagebutton" form="insert_report" name="insert_barc_form" onclick="handlePrint()" style="background-color: #0004ff; border: none; color: white; padding: 15px 32px; text-align: left; text-decoration: none; 
                     display: inline-block; font-size: 16px; position: absolute; top: 10px; left: -240px;">Print</button>
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
               </div>
            </div>
         </div>
      </div>
   </body>
   <?php } ?>
</html>
<?php
    include '../connection.php';
    include '../../includes/header.php';
    include '../../includes/scripts.php';
    // Total Distributed list
    $BarangayClearance = mysqli_query($con, "SELECT * FROM tbl_reports WHERE clearanceType = 'Barangay Clearance';");
    $BARC = mysqli_query($con, "SELECT * FROM tbl_reports WHERE clearanceType = 'Certificate of BARC';");
    $GoodMoral = mysqli_query($con, "SELECT * FROM tbl_reports WHERE clearanceType = 'Certificate of Good Moral';");
    $Indigency = mysqli_query($con, "SELECT * FROM tbl_reports WHERE clearanceType = 'Certificate of Indigency';");
    $Residency = mysqli_query($con, "SELECT * FROM tbl_reports WHERE clearanceType = 'Certificate of Residency';");
    $CertificateofJobSeeker = mysqli_query($con, "SELECT * FROM tbl_reports WHERE clearanceType = 'Certificate of Job Seeker';");
    $OathofJobSeeker = mysqli_query($con, "SELECT * FROM tbl_reports WHERE clearanceType = 'Oath of Job Seeker';");
    $BusinessPermit = mysqli_query($con, "SELECT * FROM tbl_reports WHERE clearanceType = 'Certificate of Business Permit';");
?> 
<nav>
   <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <button class="nav-link active  " id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Table of Reports</button>
      <button class="nav-link  " id="nav-purok-tab" data-bs-toggle="tab" data-bs-target="#nav-purok" type="button" role="tab" aria-controls="nav-purok" aria-selected="false">Total Residents by Purok</button>
   </div>
</nav>
<div class="tab-content" id="nav-tabContent">
   <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
      <div class="row mt-3">
         <div class=" col-md-3">
            <div class="card text-white mb-4 " style="background-color: #4CAF50;">
               <!-- <div class="card-header  -header" style="background-color: #4CAF50;"><h4>Total Distributed</h4></div> -->
               <div class="card-body text-white">
                  <div>
                     <h6>Total Distributed</h6>
                  </div>
                  <b class="mb-4 fs-3 text-center">
                     <span class="fas fa-user" style="color:#fff"></span> <?php
                            $q = mysqli_query($con,"SELECT * from tbl_reports");
                            $num_rows = mysqli_num_rows($q);
                            // echo $num_rows;
                            echo '
							<small style="color:#fff;">' . $num_rows . '</small> '; 
                            ?> </b>
               </div>
            </div>
         </div>
         <div class=" col-md-3">
            <div class="card text-white mb-4" style="background-color: #fff;">
               <!-- <div class="card-header  -header" style="background-color: #4CAF50;"><h4>Brgy. Clearance</h4></div> -->
               <div class="card-body text-dark">
                  <div>
                     <h6>Brgy. Clearance</h6>
                  </div>
                  <b class="mb-4 fs-3 text-center">
                     <span class="fas fa-user" style="color:#4CAF50"></span> <?php echo '
							<small style="color:#4CAF50;">' . $BarangayClearance->num_rows . '</small> '; ?> </b>
               </div>
            </div>
         </div>
         <div class=" col-md-3">
            <div class="card text-white mb-4" style="background-color: #fff;">
               <!-- <div class="card-header  -header" style="background-color: #4CAF50;"><h4>BARC Certificate</h4></div> -->
               <div class="card-body  -body text-dark">
                  <div>
                     <h6>BARC Certificate</h6>
                  </div>
                  <b class="mb-4 fs-3 text-center">
                     <span class="fas fa-user" style="color:#4CAF50"></span> <?php echo '
							<small style="color:#4CAF50;">' . $BARC->num_rows . '</small> '; ?> </b>
               </div>
            </div>
         </div>
         <div class=" col-md-3">
            <div class="card text-white mb-4" style="background-color: #fff;">
               <!-- <div class="card-header  -header" style="background-color: #4CAF50;"><h4>Business Permit</h4></div> -->
               <div class="card-body text-dark">
                  <div>
                     <h6>Business Permit</h6>
                  </div>
                  <b class="mb-4 fs-3 text-center">
                     <span class="fas fa-user" style="color:#4CAF50"></span> <?php echo '
							<small style="color:#4CAF50;">' . $BusinessPermit->num_rows . '</small> '; ?> </b>
               </div>
            </div>
         </div>
         <div class=" col-md-3">
            <div class="card text-white mb-4" style="background-color: #fff;">
               <!-- <div class="card-header  -header" style="background-color: #4CAF50;"><h4>Jobseeker Cert</h4></div> -->
               <div class="card-body text-dark">
                  <div>
                     <h6>Jobseeker Cert</h6>
                  </div>
                  <b class="mb-4 fs-3 text-center">
                     <span class="fas fa-user" style="color:#4CAF50"></span> <?php echo '
							<small style="color:#4CAF50;">' . $CertificateofJobSeeker->num_rows . '</small> '; ?> </b>
               </div>
            </div>
         </div>
         <div class=" col-md-3">
            <div class="card text-white mb-4" style="background-color: #fff;">
               <!-- <div class="card-header  -header" style="background-color: #4CAF50;"><h4>Jobseeker Oath</h4></div> -->
               <div class="card-body text-dark">
                  <div>
                     <h6>Jobseeker Oath</h6>
                  </div>
                  <b class="mb-4 fs-3 text-center">
                     <span class="fas fa-user" style="color:#4CAF50"></span> <?php echo '
							<small style="color:#4CAF50;">' . $OathofJobSeeker->num_rows . '</small> '; ?> </b>
                  </b>
               </div>
            </div>
         </div>
         <div class=" col-md-3">
            <div class="card text-white mb-4" style="background-color: #fff;">
               <!-- <div class="card-header  -header" style="background-color: #4CAF50;"><h4>Good Moral</h4></div> -->
               <div class="card-body text-dark">
                  <div>
                     <h6>Good Moral</h6>
                  </div>
                  <b class="mb-4 fs-3 text-center">
                     <span class="fas fa-user" style="color:#4CAF50"></span> <?php echo '
						<small style="color:#4CAF50;">' . $GoodMoral->num_rows . '</small> '; ?> </b>
               </div>
            </div>
         </div>
         <div class=" col-md-3">
            <div class="card text-white mb-4" style="background-color: #fff;">
               <!-- <div class="card-header  -header" style="background-color: #4CAF50;"><h4>Indigency</h4></div> -->
               <div class="card-body text-dark">
                  <div>
                     <h6>Indigency</h6>
                  </div>
                  <b class="mb-4 fs-3 text-center">
                     <span class="fas fa-user" style="color:#4CAF50"></span> <?php echo '
						<small style="color:#4CAF50;">' . $Indigency->num_rows . '</small> '; ?> </b>
               </div>
            </div>
         </div>
         <div class=" col-md-3">
            <div class="card text-white mb-4">
               <!-- <div class="card-header  -header" style="background-color: #4CAF50;"><h4>Residency</h4></div> -->
               <div class="card-body text-dark">
                  <div>
                     <h6>Residency</h6>
                  </div>
                  <b class="mb-4 fs-3 text-center">
                     <span class="fas fa-user" style="color:#4CAF50"></span> <?php echo '
						<small style="color:#4CAF50;">' . $Residency->num_rows . '</small> '; ?> </b>
               </div>
            </div>
         </div>
      </div>
      <div class="container px-4">
         <div class="row">
            <div class="col-md-12">
               <div class="row">
                  <h1 class="my-2">REPORTS</h1>
               </div>
               <hr>
               <div class="card d-flex">
                  <div class="card-body">
                     <div class="card-header" style="margin-bottom:10px;">
                        <button title="Download Excel Report" class="btn btn-sm btn-outline-primary rounded-pill" type="button" id="downloadExcelButton">
                           <i class="fas fa-file-excel"></i> Download Excel </button>
                        <button title="Download PDF Report" class="btn btn-sm btn-outline-primary rounded-pill" type="button" id="downloadPdfButton">
                           <i class="fas fa-file-pdf"></i> Download PDF </button>
                     </div>
                     <table class="table table-bordered table-hover" id="myTable">
                        <thead style="background-color:rgba(0, 127, 6, 0.21);">
                           <tr class="col text-center">
                              <th class="col-md-1">#</th>
                              <th class="col-md-3">Name</th>
                              <th class="col-md-4">Addresss</th>
                              <th class="col-md-3">Clearance</th>
                              <th class="col">Date</th>
                           </tr>
                        </thead>
                        <tbody> 
                                    <?php
                                        include '../connection.php';
                                        $stmt = $con->prepare("SELECT *, concat('#',houseNo, purokNo, ' ',barangay,' ',city,' ',province,'') as address 
                                        FROM tbl_reports 
                                        ORDER BY STR_TO_DATE(date, '%M %d, %Y - %h:%i:%p') DESC");
                                        $stmt->execute();
                                        $result = $stmt->get_result();
                                        $i = 1;
                                        while ($report = $result->fetch_assoc()):
                                    ?> 
                           <tr class="text-center">
                              <td> <?php echo $i++ ; ?> </td>
                              <td> <?php echo strtoupper($report['lastname']) ; ?>, <?php echo strtoupper($report['firstname']) ; ?> <?php echo strtoupper($report['middlename'][0]) ; ?>. </td>
                              <td> <?php echo strtoupper($report['address']) ; ?> </td>
                              <td> <?php echo strtoupper($report['clearanceType']) ; ?> </td>
                              <td> <?php echo strtoupper($report['date']) ; ?> </td>
                           </tr> 
                           <?php endwhile; ?> 
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="tab-pane fade" id="nav-purok" role="tabpanel" aria-labelledby="nav-purok-tab">
      <div class="row mt-3"> 
         <?php
            // Loop through Purok 1 to Purok 7

            for ($purokNo = 1; $purokNo <= 7; $purokNo++) {
                // Query to count total residents
                $queryTotal = "SELECT COUNT(*) as total FROM tblresident WHERE purokNo = '$purokNo';";
                $resultTotal = mysqli_query($con, $queryTotal);
                $totalResidents = mysqli_fetch_assoc($resultTotal)['total'];
                // Query to count male residents
                $queryMale = "SELECT COUNT(*) as male FROM tblresident WHERE purokNo = '$purokNo' AND gender = 'MALE';";
                $resultMale = mysqli_query($con, $queryMale);
                $maleCount = mysqli_fetch_assoc($resultMale)['male'];
                // Query to count female residents
                $queryFemale = "SELECT COUNT(*) as female FROM tblresident WHERE purokNo = '$purokNo' AND gender = 'FEMALE';";
                $resultFemale = mysqli_query($con, $queryFemale);
                $femaleCount = mysqli_fetch_assoc($resultFemale)['female'];
            ?> 
            <div class="col-md-3">
            <div class="card text-white mb-4" style="background-color: #fff;">
               <div class="card-body text-dark">
                  <div>
                     <h6>
                        <strong style="color:#4CAF50;">Purok <?php echo $purokNo; ?> </strong>
                        <hr>
                     </h6>
                  </div>
                  <b class="mb-4 fs-4 text-center text-muted">
                     <span class="fas fa-user" style="color:#4CAF50"></span> Total: <?php echo $totalResidents; ?>
                     <hr>
                  </b>
                  <div class="text-center">
                     <span style="margin-right: 20px;">Male: <?php echo $maleCount; ?></span>
                     <span>Female: <?php echo $femaleCount; ?> </span>
                  </div>
               </div>
            </div>
         </div> 
         <?php } ?>
       </div>
      <div class="row mt-3">
         <div class="row">
            <h1 class="my-2">AGE GROUP CLASSIFICATION</h1>
         </div>
         <hr> 
         <?php
            // Age group classification with ranges
            $ageGroups = [
                'Infant' => ['query' => "SELECT COUNT(*) as count FROM tblresident WHERE age BETWEEN 0 AND 1;", 'range' => '0 - 1 year'],
                'Toddler' => ['query' => "SELECT COUNT(*) as count FROM tblresident WHERE age BETWEEN 2 AND 3;", 'range' => '2 - 3 years'],
                'Child' => ['query' => "SELECT COUNT(*) as count FROM tblresident WHERE age BETWEEN 4 AND 12;", 'range' => '4 - 12 years'],
                'Teen/Adolescent' => ['query' => "SELECT COUNT(*) as count FROM tblresident WHERE age BETWEEN 13 AND 17;", 'range' => '13 - 17 years'],
                'Young Adult' => ['query' => "SELECT COUNT(*) as count FROM tblresident WHERE age BETWEEN 18 AND 24;", 'range' => '18 - 24 years'],
                'Adult' => ['query' => "SELECT COUNT(*) as count FROM tblresident WHERE age BETWEEN 25 AND 39;", 'range' => '25 - 39 years'],
                'Mid-aged Adult' => ['query' => "SELECT COUNT(*) as count FROM tblresident WHERE age BETWEEN 40 AND 59;", 'range' => '40 - 59 years'],
                'Senior Citizen' => ['query' => "SELECT COUNT(*) as count FROM tblresident WHERE age >= 60;", 'range' => '60 years and above']
            ];
            // Loop through age groups and create cards
            foreach ($ageGroups as $ageGroup => $data) {
                $result = mysqli_query($con, $data['query']);
                $count = mysqli_fetch_assoc($result)['count'];
            ?> <div class="col-md-3">
            <div class="card text-white mb-4" style="background-color: #fff;">
               <!-- <div class="card-header  -header" style="background-color: #4CAF50;"><h4>
								<?php echo $ageGroup; ?></h4><small class="text-light">
								<?php echo $data['range']; ?></small></div> -->
               <div class="card-body text-dark">
                  <div>
                     <h5 class="card-title" style="color:#4CAF50;"> <?php echo $ageGroup; ?> </h5>
                     <small class="text-muted"> <?php echo $data['range']; ?> </small>
                     <hr>
                  </div>
                  <b class="mb-4 fs-4 text-center text-muted">
                     <span class="fas fa-user" style="color:#4CAF50"></span> Total: <?php echo $count; ?> </b>
               </div>
            </div>
         </div> 
         <?php } ?>
      </div>
   </div>
</div>

<script>
   // Function to gather report content from the table
   function getReportContent() {
      let reportContent = '';
      const rows = document.querySelectorAll('#myTable tbody tr');
      rows.forEach(row => {
         const cells = row.querySelectorAll('td');
         cells.forEach((cell, index) => {
            reportContent += cell.innerText + (index < cells.length - 1 ? '\t' : '\n');
         });
      });
      return reportContent;
   }

   function downloadExcel() {
      const rows = document.querySelectorAll('#myTable tbody tr');
      const data = [];
      rows.forEach(row => {
         const rowData = [];
         const cells = row.querySelectorAll('td');
         cells.forEach(cell => {
            rowData.push(cell.innerText);
         });
         data.push(rowData);
      });

      // Convert data to worksheet
      const worksheet = XLSX.utils.aoa_to_sheet(data);
      const workbook = XLSX.utils.book_new();
      XLSX.utils.book_append_sheet(workbook, worksheet, 'Report');
      // Export as Excel file
      XLSX.writeFile(workbook, 'report.xlsx');
   }

   // Improved PDF download using jsPDF with autoTable plugin
   async function downloadPdf() {
      const {
         jsPDF
      } = window.jspdf;
      const doc = new jsPDF();
      // Use jsPDF's autoTable plugin for better table handling
      const rows = [];
      const headers = [];
      // Get table headers
      document.querySelectorAll('#myTable thead th').forEach(th => {
         headers.push(th.innerText);
      });


      // Get table rows
      document.querySelectorAll('#myTable tbody tr').forEach(tr => {
         const rowData = [];
         tr.querySelectorAll('td').forEach(td => {
            rowData.push(td.innerText);
         });
         rows.push(rowData);
      });

      // Generate the PDF table with autoTable
      doc.autoTable({
         head: [headers],
         body: rows,
         theme: 'grid',
         startY: 20
      });
      doc.save('report.pdf');
   }

   $(document).ready(function() {
      $('#downloadExcelButton').on('click', function() {
         downloadExcel();
      });
      $('#downloadPdfButton').on('click', function() {
         downloadPdf();
      });
   });
</script> 

<!-- Pagination -->
<?php 
include 'pagination/pagination.php';
include '../../includes/footer.php';
?>
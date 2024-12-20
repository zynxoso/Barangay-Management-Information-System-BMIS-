<?php
    include '../../includes/header.php';
    include '../../includes/scripts.php';
?>
 <div class="row">
            <div class="col-md-12">
                <h1 class="my-2">Resident List</h1>
                <hr>
                <div class="card d-flex" style=" border-radius: 14px">
                    <!-- <div class="card-header d-flex">
                      </div> -->
                      <div class="card-body">
                        <div class="card-header mb-3 d-flex justify-content-between align-items-center" style="font-size: 0.8rem;">
                          <div class="d-flex align-items-center">
                          <?php if ($_SESSION['role'] == "Administrator") { ?>
                          <button type="button" class="btn btn-sm btn-outline-success rounded-pill me-2" id="takepicture" title="Add new resident" data-bs-toggle="modal" data-bs-target="#Add_Resident">
                            <i class="bi bi-person-plus me-1"></i> New 
                          </button>
                        <?php } ?>
                            <button type="button" class="btn btn-sm btn-outline-success rounded-pill" title="View business logs" data-bs-toggle="modal" data-bs-target="#businessLogsModal">
                              <i class="bi bi-file-text me-1"></i> Bus. Logs </button>
                          </div>
                          <div class="d-flex align-items-center">
                            <label for="purokFilter" class="form-label me-2" style="font-size: 0.8rem;">Filter by Purok No.</label>
                            <div class="input-group">
                              <select id="purokFilter" class="form-select form-select-sm rounded-pill" style="margin-right: 10px;">
                                <option value="">All</option> <?php for ($i = 1; $i <= 7; $i++): ?> <option value="Purok 
                                    <?php echo $i; ?>">Purok <?php echo $i; ?> </option> <?php endfor; ?>
                              </select>
                              <button type="button" class="btn btn-sm btn-outline-danger rounded-pill" id="clearFilter" title="Clear Filter" style=" display: flex; justify-content: center; align-items: center; padding: 0.25rem 0.5rem;">
                                <i class="bi bi-x-circle"></i>
                              </button>
                            </div>
                          </div>
                        </div>

                        <table class="table table-bordered table-hover table-striped" id="myTable">
                            <thead>
                                <tr class="col text-center">
                                    <th class="col">Image</th>
                                    <th class="col">Name</th>
                                    <th class="col-md-3">House No.</th>
                                    <th class="col-md-3">Purok No.</th>
                                    <th class="col-md-1">Age</th>
                                    <th class="col-md-1">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            include '../connection.php';
                            $stmt = $con->prepare("SELECT *, CONCAT('#', houseNo) as houseno, CONCAT('Purok ', purokNo) as purokno FROM tblresident");
                            $stmt->execute();
                            $result = $stmt->get_result();
                            while ($resident = $result->fetch_assoc()):
                            ?>
                                <tr class="text-center">
                                    <td style="width: 70px;">
                                        <?php
                                    $image = $resident['captured_image'];
                                    $userpic = $image;
                                    $default = "img/default1.png";
                                    if(file_exists($userpic)){
                                        $profile_picture = $userpic;
                                    }else{
                                        $profile_picture = $default;
                                    }
                                    if(isset($profile_picture))
                                    {
                                        echo '<img src="'.$profile_picture.'" style="width: 60px; height: 60px;" />';
                                    }
                                    ?>
                                    </td>
                                    <td><?php echo strtoupper($resident['lastname']); ?>,
                                        <?php echo strtoupper($resident['firstname']); ?>
                                        <?php echo strtoupper($resident['middlename'][0]); ?></td>
                                    <td><?php echo strtoupper($resident['houseno']); ?></td>
                                    <td><?php echo strtoupper($resident['purokno']); ?></td>
                                    <td><?php echo strtoupper($resident['age']); ?></td>
                                    <td class="col-6">
                                        <form action="function.php" method="POST" class="d-inline">
                                            <button type="button" class="btn  btn-outline-success btn btn-sm text-dark" title="View"
                                                data-bs-toggle="modal" data-bs-target="#View_Resident<?php echo $resident['id']; ?>"> <i class="fa-solid fa-eye text-success"></i></button>

                                            <?php if ($_SESSION['role'] == "Administrator") {

                                            echo '<button type="button" class=" btn-outline-success btn btn-sm" data-bs-toggle="modal" data-bs-target="#Edit_Resident' . $resident['id'] . '"> 
                                            <i class="fa-solid fa-edit" aria-hidden="true"></i></button>';

                                            } ?>

                                            <button type="button" class="btn-outline-success btn btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#Generate_Certificate<?php echo $resident['id']; ?>">Generate
                                                <i class="fa-solid fa-file-alt"></i></button>
                                            <button type="button" class="btn-outline-success btn btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#Generate_BusinessPermit<?php echo $resident['id']; ?>">Business
                                                Permit
                                                <i class="fa-solid fa-file-alt"></i></button>
                                            <?php if ($_SESSION['role'] == "Administrator") {
                                            echo '<button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Delete_Resident' . $resident['id'] . '">
                                             <i class="fa-solid fa-trash"></i></button>';
                                        } ?>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            include 'resident-edit.php';
                            include 'resident-delete.php';
                            include 'resident-view.php';
                            ?>
                                <!-- Generate Certificate Modal -->
                                <div class="modal fade" id="Generate_Certificate<?php echo $resident['id']; ?>"
                                    tabindex="-1" aria-labelledby="generateCertificateLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="generateCertificateLabel">Generate
                                                    Certificate
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="certificateForm<?php echo $resident['id']; ?>"
                                                    action="clearances/cert/barangay_form.php" target="_blank"
                                                    method="GET">
                                                    <input type="hidden" name="id"
                                                        value="<?php echo $resident['id']; ?>">
                                                    <div class="mb-3">
                                                        <label for="certificateType" class="form-label">Select Certificate Type</label>
                                                        <select class="form-select"
                                                            id="certificateType<?php echo $resident['id']; ?>"
                                                            name="certificate_type">
                                                            <option value="brgyclearance">Barangay Clearance</option>
                                                            <option value="barc">BARC Certificate</option>
                                                            <option value="jobcert">First Time Jobseeker Certificate
                                                            </option>

                                                            <option value="joboat">First Time Jobseeker Oath</option>
                                                            <option value="goodmoral">Good Moral Character Certificate
                                                            </option>
                                                            <option value="indigency">Indigency Certificate</option>
                                                            <option value="residency">Residency Certificate</option>
                                                        </select>
                                                    </div>
                                                    <div class="d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary">Generate</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="Generate_BusinessPermit<?php echo $resident['id']; ?>"
                                    tabindex="-1" aria-labelledby="generateCertificateLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-md modal-dialog-centered">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="generateCertificateLabel">Generate Business
                                                    Permit</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <!-- Modal Body -->
                                            <div class="modal-body text-center">
                                            <div class="mb-3">
                                                <i class="bi bi-question-circle" style="font-size: 100px; color:#0d6efd;"></i> 
                                            </div>
                                                <p>
                                                    Are you sure you want to generate the business permit
                                                </p>
                                            </div>

                                            <!-- Modal Footer -->
                                            <div class="modal-footer justify-content-center">
                                                <!-- Form to redirect to businesspermit.php -->
                                                <form id="businessPermitForm<?php echo $resident['id']; ?>"
                                                    action="businesspermit.php" method="POST">
                                                    <!-- Include resident ID as a hidden input -->
                                                    <input type="hidden" name="resident_id"
                                                        value="<?php echo htmlspecialchars($resident['id']); ?>">
                                                    <button type="submit" class="btn btn-primary">Continue</button>
                                                </form>
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            </tbody>
            </table>
        </div>
        <?php include('resident-create.php'); ?>
    </div>
</main>

 <!-- Modal -->
 <div class="modal fade" id="businessLogsModal" tabindex="-1" aria-labelledby="businessLogsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <h5 class="modal-title" id="businessLogsModalLabel">BUSINESS LOGS</h5> -->
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                <!-- </div> -->
                <div class="modal-body">
                    <div class="container mt-4">
                        <h3>Business Logs</h3>
                        <table class="table table-bordered table-striped table-success table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Owner Name</th>
                                    <th>Business Name</th>
                                    <th>Business Location</th>
                                    <th>Business Type</th>
                                    <th>Business Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "
                                    SELECT 
                                        tbl_business_logs.id AS BusinessID,
                                        tbl_business_logs.BusinessName,
                                        tbl_business_logs.BusinessLocation,
                                        tbl_business_logs.BusinessType,
                                        tbl_business_logs.BusinessAmount,
                                        CONCAT(tblresident.FirstName, ' ', tblresident.LastName) AS UserName
                                    FROM 
                                        tbl_business_logs
                                    INNER JOIN 
                                        tblresident 
                                    ON 
                                        tbl_business_logs.user_id = tblresident.id
                                ";
                                $result = mysqli_query($con, $query);

                                if (mysqli_num_rows($result) > 0) {
                                    $counter = 1; // Initialize counter for the No. column
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr class="text-center">';
                                        
                                        echo '<td>' . $counter++ . '</td>'; // Display and increment the counter for each row
                                        echo '<td>' . htmlspecialchars($row['UserName']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['BusinessName']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['BusinessLocation']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['BusinessType']) . '</td>';
                                        echo '<td>₱' . number_format((float)$row['BusinessAmount'], 2, '.', ',') . '</td>';
                                       
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="7" class="text-center text-danger">No records found.</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>

        <script>
    document.getElementById('clearFilter').addEventListener('click', function() {
      document.getElementById('purokFilter').value = '';
      const tableRows = document.querySelectorAll('#myTable tbody tr');
      tableRows.forEach(row => {
        row.style.display = '';
      });
    });
  </script>

<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
});
document.querySelectorAll('.info-tooltip').forEach(function(tooltipIcon) {
    tooltipIcon.addEventListener('click', function() {
        var content = this.getAttribute('data-content');
        document.getElementById('tooltipContent').innerText = content;
        var myModal = new bootstrap.Modal(document.getElementById('tooltipModal'));
        myModal.show();
    });
});
$(document).ready(function() {
    $('#myTable').DataTable();
    document.querySelectorAll('[id^="certificateType"]').forEach(select => {
        select.addEventListener('change', function() {
            const formId = 'certificateForm' + this.id.replace('certificateType', '');
            const form = document.getElementById(formId);
            switch (this.value) {
                case 'Businesspermit':
                    form.action = 'clearances/cert/business_permit_form.php';
                    break;
            }
        });
    });
});
$(document).ready(function() {
    $('#myTable').DataTable();
    document.querySelectorAll('[id^="certificateType"]').forEach(select => {
        select.addEventListener('change', function() {
            const formId = 'certificateForm' + this.id.replace('certificateType', '');
            const form = document.getElementById(formId);
            switch (this.value) {
                case 'brgyclearance':
                    form.action = 'clearances/cert/barangay_form.php';
                    break;
                case 'barc':
                    form.action = 'clearances/cert/barccertificate.php';
                    break;
                case 'jobcert':
                    form.action = 'clearances/cert/jobseeker_cert.php';
                    break;
                case 'joboat':
                    form.action = 'clearances/cert/jobseeker_oath.php';
                    break;
                case 'goodmoral':
                    form.action = 'clearances/cert/goodmoral_form.php';
                    break;
                case 'indigency':
                    form.action = 'clearances/cert/indigency_form.php';
                    break;
                case 'residency':
                    form.action = 'clearances/cert/residency_form.php';
                    break;
            }
        });
    });
});
document.getElementById('purokFilter').addEventListener('change', function() {
    const selectedPurok = this.value.toLowerCase();
    const tableRows = document.querySelectorAll('#myTable tbody tr');
    tableRows.forEach(row => {
        const purokCell = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
        if (selectedPurok === '' || purokCell === selectedPurok) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
</script>
  </body>
<?php
    include 'pagination/pagination.php';
    include '../../includes/footer.php';
?>

<script>
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

<?php 
if (isset($_GET['status'])) {
    switch($_GET['status']) {
        case 'success':
            echo "Toast.fire({
                icon: 'success',
                title: 'Resident information saved successfully'
            });";
            break;
        case 'error':
            echo "Swal.fire({
                icon: 'error',
                title: 'Save Failed',
                text: 'There was an error saving the resident information. Please try again.',
                confirmButtonColor: '#d33',
                confirmButtonText: 'Close'
            });";
            break;
    }
}
?>
</script>
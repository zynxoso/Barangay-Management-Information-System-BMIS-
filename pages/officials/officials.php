<?php
    include '../../includes/header.php';
    include '../../includes/scripts.php';
    include '../connection.php'; 
?> <div class="container px-4">
  <div class="row">
    <div class="col-md-12">
      <h1 class="my-2">Barangay Officials List</h1>
      <hr>
      <div class="card d.flex">
        <div class="card-body">
          <div class="card-header">
            <button type="button" class="btn btn-outline-success rounded-pill" title="Create" data-bs-toggle="modal" data-bs-target="#Add_Official"> New <i class="bi bi-person-fill-add"></i>
            </button>
          </div>
          <table class="table table-bordered table-hover table-striped" id="myTable">
            <thead style="background-color:rgba(0, 127, 6, 0.1);">
              <tr class="col text-center my-auto">
                <th class="col-2">Position</th>
                <th class="col-4">Full Name</th>
                <th class="col">Contact</th>
                <th class="col-2">Action</th>
                <th class="col">Status</th>
              </tr>
            </thead>
            <tbody> <?php
                  /* $squery = mysqli_query($con, "SELECT *, CONCAT(lastname, ', ', firstname, ' ', middlename,'.') as fullname FROM tblofficials;"); */
                  $squery = mysqli_query($con, "SELECT *, CONCAT(barangay, ', ', City, ' ', province,'.') as address FROM tblofficials;");
                  while($row = mysqli_fetch_array($squery))
                  {
                      echo '
                                    
								<tr class="text-center">
									<td> '.strtoupper($row['position']).' </td>
									<td> '.strtoupper($row['lastname']).', '.strtoupper($row['firstname']).' '.strtoupper($row['middlename'][0]).'. </td>
									<td> '.strtoupper($row['contactNo']).' </td>
                                        ';
              ?> <td class="col-3">
                <form action="function.php" method="POST" class="col-3 d-inline">
                    <button type="button" class="btn btn-outline-success btn-sm" title="View" data-bs-toggle="modal" data-bs-target="#View_Official<?php echo $row['id']; ?>"><i class="fas fa-eye"></i></button>
                    <button type="button" class="btn btn-outline-success btn-sm" title="Edit" data-bs-toggle="modal" data-bs-target="#Edit_Official<?php echo $row['id']; ?>"><i class="fas fa-pencil-alt"></i></button>
                    <!-- <button type="button" class="btn btn-danger btn-sm" title="Delete" data-bs-toggle="modal" data-bs-target="#Delete_Official<?php echo $row['id']; ?>"><i class="fas fa-trash-alt"></i></button> -->
                </form>
              </td>
              <td class="col"> <?php


              if($row['status'] == "Active")
              {
                  echo '
                                                        
										<form action="function.php" method="GET">
											<button type="button" class="btn btn-outline-success" title="select to change" data-bs-toggle="modal" data-bs-target="#setInactive'.$row['id'].'">'.$row['status'].'</button>
										</form>
                      ';
                  }

                  if($row['status'] == "Inactive")
                  {
                      echo '
                                                        
										<form action="function.php" method="GET">
											<button type="button" class="btn btn-outline-success" title="select to change" data-bs-toggle="modal" data-bs-target="#setInactive'.$row['id'].'">'.$row['status'].'</button>
										</form>
                      ';
                  }
              ?> </td>
            </tr> <?php
                include 'Inactive.php';
                include 'Active.php';
                include 'view_official.php';
                include 'edit_official.php';
                include 'delete_official.php';
                
            }
        ?>
            </tbody>
          </table>
        </div>
        <!-- add modal--> <?php include ('add_official.php'); ?>
      </div>
    </div>
  </div>
</div>
<!-- Pagination -->
<script>
  $(document).ready(function() {
    $('#myTable').DataTable();
  });
</script> <?php 
include 'pagination/pagination.php';
include '../../includes/footer.php';
?>

<script>
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true
});

<?php 
if (isset($_GET['status'])) {
    switch($_GET['status']) {
        case 'success':
            echo "Toast.fire({
                icon: 'success',
                title: 'Official account created successfully'
            });";
            break;
        case 'success1':
            echo "Toast.fire({
                icon: 'success',
                title: 'Official information updated successfully'
            });";
            break;
        case 'success2':
            echo "Toast.fire({
                icon: 'success',
                title: 'Official term ended successfully'
            });";
            break;
        case 'error_create':
            echo "Swal.fire({
                icon: 'error',
                title: 'Creation Failed',
                text: 'There was an error creating the official account. Please check all fields and try again.',
                confirmButtonColor: '#d33',
                confirmButtonText: 'Close'
            });";
            break;
        case 'error_update':
            echo "Swal.fire({
                icon: 'error',
                title: 'Update Failed',
                text: 'There was an error updating the official information. Please check all fields and try again.',
                confirmButtonColor: '#d33',
                confirmButtonText: 'Close'
            });";
            break;
        case 'error_end':
            echo "Swal.fire({
                icon: 'error',
                title: 'End Term Failed',
                text: 'There was an error ending the official term. Please try again or contact support.',
                confirmButtonColor: '#d33',
                confirmButtonText: 'Close'
            });";
            break;
    }
}
?>
</script>
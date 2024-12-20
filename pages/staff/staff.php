<?php
    include '../../includes/header.php';
    include '../../includes/scripts.php';
?>
    
    <div class="container px-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="my-2">Staff list</h1>
                <hr>
                <div class="card d.flex">
                    
                    <div class="card-body">
                        <div class="card-header mb-3">
                            <button type="button"  class="btn btn-sm btn-outline-success rounded-pill me-2" title="Create" data-bs-toggle="modal" data-bs-target="#Add_Staff">
                                New <i class="bi bi-person-fill-add"></i>
                            </button>
                        </div>
                        <table class="table table-bordered table-hover" id="reportTable">
                        <thead style="background-color:rgba(0, 127, 6, 0.1);">
                                <tr class="col text-center">
                                    <th class="col">#</th>
                                    <th class="col">Full Name</th>
                                    <th class="col">Contact No.</th>
                                    <th class="col">Gender</th> 
                                    <th class="col">Username</th>
                                    <th class="col-sm-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                                include '../connection.php';
                                $stmt = $con->prepare("SELECT *, concat(barangay,', ',City,', ',province,' ') as address FROM tblstaff");
                                $stmt->execute();
                                $result = $stmt->get_result();
                                // $grand_total = 0;
                                while ($staff = $result->fetch_assoc()):
                            ?>

                                
                                <tr class="text-center">
                                    <td><?php echo $staff['id'] ; ?></td>
                                    <td><?php echo strtoupper($staff['lastname']) ; ?>, <?php echo strtoupper($staff['firstname']) ; ?> <?php echo strtoupper($staff['middlename'][0]) ; ?>.</td>
                      
                                    <td><?php echo strtoupper($staff['contactNo']) ; ?></td>
                                    <td><?php echo strtoupper($staff['gender']) ; ?></td>
                                    <td><?php echo $staff['username'] ; ?></td>
                                    
                                    <td class="text-center">
                                        <form action="function.php" method="POST" class="d-inline">
                                            <button type="button" class="btn-outline-primary btn btn-sm rounded" title="View" data-bs-toggle="modal" data-bs-target="#View_Staff<?php echo $staff['id']; ?>"><i class="fa-solid fa-eye"></i></button>
                                            <button type="button" class="btn-outline-info btn btn-sm " title="Edit" data-bs-toggle="modal" data-bs-target="#Edit_Staff<?php echo $staff['id']; ?>" ><i class="fa-solid fa-pen-to-square" aria-hidden="true"></i></button>
                                            <button type="button" class="btn btn-outline-danger btn-sm" title="Delete" data-bs-toggle="modal" data-bs-target="#Delete_Staff<?php echo $staff['id']; ?>"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                    include 'staff-edit.php'; 
                                    include 'staff-delete.php';
                                    include 'staff-view.php';
                                ?>
                                <?php endwhile; ?>
                            </tbody>
                            <?php  ?>
                        </table>
                    </div>
                    <!-- add modal-->
                    <?php include ('staff-create.php'); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <script>
        $(document).ready( function () 
        {
            $('#reportTable').DataTable();
        } );
    </script>
    
<?php 
include 'pagination/pagination.php';
include '../../includes/footer.php';
?>

<?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Account Created',
        text: 'The staff account has been successfully created!',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    });
</script>
<?php elseif (isset($_GET['status']) && $_GET['status'] == 'error'): ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Update Failed',
        text: 'There was an error Creating the account. Please try again.',
        confirmButtonColor: '#d33',
        confirmButtonText: 'Close'
    });
</script>
<?php endif; ?>

<!-- sweetalert -->
<?php if (isset($_GET['status']) && $_GET['status'] == 'success1'): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Account Updated',
        text: 'The staff account has been successfully updated!',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    });
</script>
<?php elseif (isset($_GET['status']) && $_GET['status'] == 'error'): ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Update Failed',
        text: 'There was an error updating the account. Please try again.',
        confirmButtonColor: '#d33',
        confirmButtonText: 'Close'
    });
</script>
<?php endif; ?>

<?php if (isset($_GET['status']) && $_GET['status'] == 'success2'): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Account Deleted',
        text: 'The staff account has been successfully deleted!',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    });
</script>
<?php elseif (isset($_GET['status']) && $_GET['status'] == 'error'): ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Update Failed',
        text: 'There was an error Deleting the account. Please try again.',
        confirmButtonColor: '#d33',
        confirmButtonText: 'Close'
    });
</script>
<?php endif; ?>
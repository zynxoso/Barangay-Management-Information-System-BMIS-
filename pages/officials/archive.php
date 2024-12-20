<?php
   include '../connection.php';
   include '../../includes/header.php';
   include '../../includes/scripts.php';
?>

<div class="container px-4">
   <div class="row">
      <div class="col-md-12">
         <h1 class="my-2">Officials Inactive List</h1>
         <hr>
         <div class="card d.flex">
            <div class="card-body">
               <table class="table table-bordered table-hover table-striped text-center" id="myTable">
                  <thead>
                     <tr class="col text-center my-auto">
                        <th class="col-2">Position</th>
                        <th class="col-4">Full Name</th>
                        <th class="col">Contact</th>
                        <th class="col-2">Action</th>
                        <th class="col">Option</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $squery = mysqli_query($con, "SELECT *, CONCAT(barangay, ', ', City, ' ', province,'.') as address FROM tbl_archives;");
                        while($row = mysqli_fetch_array($squery))
                        {
                            echo '
                            <tr class="text-center">
                                <td> '.strtoupper($row['position']).' </td>
                                <td> '.strtoupper($row['lastname']).' '.strtoupper($row['firstname']).' '.strtoupper($row['middlename']).' </td>
                                <td> '.strtoupper($row['contactNo']).' </td>
                                ';
                        ?>
                     <td>
                        <form action="function.php" method="POST" class="d-inline">
                           <button type="button" class="btn btn-outline-success btn btn-sm" title="View" data-bs-toggle="modal" data-bs-target="#Archive_View<?php echo $row['id']; ?>"><i class="fas fa-eye"></i></button>
                           <button type="button" class="btn btn-outline-danger btn-sm" title="Delete" data-bs-toggle="modal" data-bs-target="#Delete_Official_Archive<?php echo $row['id']; ?>"><i class="fas fa-pencil-alt"></i></button>
                        </form>
                     </td>
                     <td class="col">
                        <?php
                           $query = mysqli_query($con, "SELECT status FROM tbl_archives where status='Inactive'");
                           
                           if($query)
                           {
                               echo '
                                   <form action="function.php" method="POST">
                                       <button type="button" class="btn btn-outline-success" title="Set Active" data-bs-toggle="modal" data-bs-target="#setActive'.$row['id'].'">Restore</button>
                                   </form>
                               ';
                           }
                           ?>
                     </td>
                     </tr>
                     <?php
                        include 'active.php';
                        include 'archive_view.php';
                        include 'delete_official_archive.php';
                        
                        }
                        ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Pagination -->
<script>
   $(document).ready( function () 
   {
       $('#myTable').DataTable();
   } );
</script>

<?php 
   include 'pagination/pagination.php';
   include '../../includes/footer.php';
   ?>
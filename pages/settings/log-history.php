<?php 

include ('../connection.php');

include '../../includes/header.php';
include '../../includes/scripts.php';
?>

<!-- Card content -->
<div class="container px-4">
  <div class="row">
    <div class="col-md-12">
    <h1 class="my-2">Log History</h1>
    <hr>
      <div class="card d.flex">
        <div class="card-body">
          <table class="table table-bordered table-hover table-striped" id="myTable">
          <thead style="background-color:rgba(0, 127, 6, 0.1);">
              <tr class="col text-center">
                <th class="col-sm-1">ID</th>
                <th class="col-sm-1">User</th>
                <th class="col-sm-2">Date</th>
                <th class="col-sm-4">Remarks</th>
              
              </tr>
            </thead>
            <tbody>
           <?php
              $query = mysqli_query($con, "SELECT * FROM tbl_logs ORDER BY id DESC;");
              while($row = mysqli_fetch_array($query))
              {
                echo '
                <tr class="text-center">
                  <td>'.$row['id'].'</td>
                  <td>'.$row['usertype'].'</td>
                  <td>'.$row['created_at'].'</td>
                  <td>'.$row['remarks'].'</td>
                  </tr>
                ';
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
?>

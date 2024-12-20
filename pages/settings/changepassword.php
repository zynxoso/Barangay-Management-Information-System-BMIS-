<?php 

include ('../connection.php');

?>

<?php
include '../../includes/header.php';
include '../../includes/scripts.php';
?>


<!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Administrator</button>
  </li>
</ul> -->

<div class="tab-content mt-5" id="myTabContent">
  <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="card d.flex">
      <div class="card-header">
        <span class="row">
          <div class="col">
            <h4>Administrator</h4>
          </div>
        </span>
      </div>
            
      <div class="card-body">
        <table class="table table-bordered table-hover table-striped">
          <thead>
            <tr class="col text-center">
              <th class="col">ID</th>
              <th class="col">Username</th>
              <!-- <th class="col">Password</th> -->
              <th class="col">Option</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $query = mysqli_query($con, "SELECT * FROM tbluser;");
            while($row = mysqli_fetch_array($query))
            {
              echo '
              <tr class="text-center">
                <td>'.$row['id'].'</td>
                <td>'.$row['username'].'</td>
               
                <td>
              ';?>
                  <form action="function.php" method="POST" class="d-inline">
                  <button type="button" class="btn btn-outline-primary btn-sm" title="Edit" data-bs-toggle="modal" data-bs-target="#admin<?php echo $row['id']; ?>">Edit <i class="fa-solid fa-pen-to-square" aria-hidden="true"></i></button>
                  </form>
                </td>
              </tr>
            <?php
            include 'admin-edit.php'; 
            }
          ?>
          </tbody>
        </table>
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

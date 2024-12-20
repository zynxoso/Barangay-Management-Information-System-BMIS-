<?php 
include ('../connection.php');
?>


<?php
include '../../includes/header.php';
include '../../includes/scripts.php';
?>


<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Staff</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Administrator</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="card d.flex">
      <div class="card-header">
        <span class="row">
          <div class="col">
            <h4>Staff</h4>
          </div>
        </span>
      </div>
        
      <div class="card-body">
        <table class="table table-bordered table-hover table-striped" id="myTable">
          <thead>
            <tr class="col text-center">
              <th class="col">ID</th>
              <th class="col">Name</th>
              <th class="col">Username</th>
              <th class="col">Password</th>
              <th class="col-2">Option</th>
            </tr>
          </thead>
          <tbody>
          <?php
              $query = mysqli_query($con, "SELECT * , concat(firstname,' ',lastname) as fullname FROM tblstaff;");
              while($row = mysqli_fetch_array($query))
              {
                echo '
                <tr class="text-center">
                  <td>'.$row['id'].'</td>
                  <td>'.$row['fullname'].'</td>
                  <td>'.$row['username'].'</td>
                  <td>'.str_repeat('*', strlen($row['password'])).'</td>
                  <td>
                  
                ';?>
                      <form action="function.php" method="POST" class="d-inline">
                          <button type="button" class="btn btn-outline-success btn-sm" title="Edit" data-bs-toggle="modal" data-bs-target="#Edit_User<?php echo $row['id']; ?>">Edit <i class="fa-solid fa-pen-to-square" aria-hidden="true"></i></button>
                      </form>
                  </td>
                </tr>
              <?php
              include 'user-edit.php'; 
              }
              ?>
          </tbody>
        </table>
      </div>
      
    </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
              <th class="col">Password</th>
              <th class="col">Option</th>
            
            </tr>
          </thead>
          <tbody>
          <?php
            $query = mysqli_query($con, "SELECT *  FROM tbluser;");
            while($row = mysqli_fetch_array($query))
            {
              echo '
              <tr class="text-center">
                <td>'.$row['id'].'</td>
                <td>'.$row['username'].'</td>
                <td>'.str_repeat('*', strlen($row['password'])).'</td>
                <td>
                
              ';?>
                  <form action="function.php" method="POST" class="d-inline">
                  <button type="button" class="btn btn-outline-success btn-sm" title="Edit" data-bs-toggle="modal" data-bs-target="#admin<?php echo $row['id']; ?>">Edit <i class="fa-solid fa-pen-to-square" aria-hidden="true"></i></button>
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
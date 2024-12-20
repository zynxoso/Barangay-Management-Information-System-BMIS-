<!-- View Staff Modal -->
<div class="modal fade" id="View_Staff<?php echo $staff['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">View mode</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row g-2">
                        <div class="col">
                            <label>Last Name</label>
                            <p class="form-control" name="lastname"><?php echo $staff['lastname']?></p>
                        </div>
                        <div class="col">
                            <label>First Name</label>
                            <p class="form-control" name="firstname"><?php echo $staff['firstname']?></p>
                        </div>
                        <div class="col">
                            <label>Middle Name</label>
                            <p class="form-control" name="middlename"><?php echo $staff['middlename']?></p>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col">
                            <label>House No</label>
                            <p class="form-control">
                                <?php echo $staff['houseNo']; ?>
                            </p>    
                        </div>
                        <div class="col">
                            <label>Purok No</label>
                            <p class="form-control">
                                <?php echo $staff['purokNo']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col">
                            <label>Contact No.</label>
                            <p class="form-control">
                                <?php echo $staff['contactNo']; ?>
                            </p>    
                        </div>
                        <div class="col">
                            <label>Gender</label>
                            <p class="form-control">
                                <?php echo $staff['gender']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col">
                            <label>Staff Username</label>
                            <p class="form-control">
                                <?php echo $staff['username']; ?>
                            </p>
                        </div>
                        <div class="col">
                            <label>Staff Password</label>
                            <p class="form-control">
                            <?php echo str_repeat('*', strlen($staff['password'])); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
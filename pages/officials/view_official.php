<!-- View Staff Modal -->
<div class="modal fade" id="View_Official<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                            <label> Last Name </label>
                            <p class="form-control"><?php echo strtoupper($row['lastname']);?></p>
                        </div>
                        <div class="col">
                            <label> First Name </label>
                            <p class="form-control"><?php echo strtoupper($row['firstname']);?></p>
                        </div>
                        <div class="col">
                            <label> Middle Name </label>
                            <p class="form-control"><?php echo strtoupper($row['middlename']);?></p>
                        </div>
                    </div>
                    <div class="row g-2 mb-2">
                        <div class="col">
                            <label> Email Address </label>
                            <p class="form-control">
                                <?php echo strtoupper($row['email']); ?>
                            </p>
                        </div>
                        <div class="col-4">
                            <label> Contact No. </label>
                            <p class="form-control">
                                <?php echo strtoupper($row['contactNo']); ?>
                            </p>    
                        </div>
                    </div>
                    <div class="row g-2 mb-2">
                        <div class="col">
                            <label> Position </label>
                            <p class="form-control">
                                <?php echo strtoupper($row['position']); ?>
                        </p>
                        </div>
                        <div class="col-4">
                            <label> Gender </label>
                            <p class="form-control">
                                <?php echo strtoupper($row['gender']); ?>
                            </p>    
                        </div>
                    </div>
                    <!-- Start/End Date -->
                    <div class="row g-2 mb-2">
                        <div class="col-md-6">
                            <label class="form-label"> Start Date </label>
                            <p class="form-control" type="date" name="start_date" id="" required>
                                <?php echo strtoupper($row['start_date']); ?>
                            </p>
                        </div>
                        <div class="col">
                            <label class="form-label"> End Date </label>
                            <p class="form-control" type="date" name="end_date" id="" requried>
                                <?php echo strtoupper($row['end_date']); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
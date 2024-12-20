<div class="row">
   <div class="col-md-12">
      <h1 class="my-2">Resident List</h1>
      <hr>
      <div class="card d-flex" style=" border-radius: 14px">
         <div class="card-header">
            <button type="button" class="btn float-start btn-primary" id="takepicture" title="Add new resident" data-bs-toggle="modal" data-bs-target="#Add_Resident" style=" border-radius:12px;"> New <i class="bi bi-person-plus"></i>
            </button>
         </div>
         <div class="card-body">
            <div class="mb-3">
               <label for="purokFilter" class="form-label">Filter by Purok No.</label>
               <select id="purokFilter" class="form-select">
                  <option value="">All</option> <?php for ($i = 1; $i <= 7; $i++): ?> <option value="Purok 
								<?php echo $i; ?>">Purok <?php echo $i; ?> </option> <?php endfor; ?>
               </select>
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
               <tbody> <?php
                            include '../connection.php';
                            $stmt = $con->prepare("SELECT *, CONCAT('#', houseNo) as houseno, CONCAT('Purok ', purokNo) as purokno FROM tblresident");
                            $stmt->execute();
                            $result = $stmt->get_result();
                            while ($resident = $result->fetch_assoc()):
                            ?> <tr class="text-center">
                     <td style="width: 70px;"> <?php
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
                                        echo '
									<img src="'.$profile_picture.'" style="width: 60px; height: 60px;" />';
                                    }
                                    ?> </td>
                     <td> <?php echo strtoupper($resident['lastname']); ?>, <?php echo strtoupper($resident['firstname']); ?> <?php echo strtoupper($resident['middlename'][0]); ?> </td>
                     <td> <?php echo strtoupper($resident['houseno']); ?> </td>
                     <td> <?php echo strtoupper($resident['purokno']); ?> </td>
                     <td> <?php echo strtoupper($resident['age']); ?> </td>
                     <td class="col-7">
                        <form action="function.php" method="POST" class="d-inline">
                           <button type="button" class="btn-info btn btn-sm text-white" title="View" data-bs-toggle="modal" data-bs-target="#View_Resident
											<?php echo $resident['id']; ?>">View <i class="fa-solid fa-eye text-white"></i>
                           </button> <?php if ($_SESSION['role'] == "Administrator") {
                                            echo '
										<button type="button" class="btn-secondary btn btn-sm" data-bs-toggle="modal" data-bs-target="#Edit_Resident' . $resident['id'] . '">Edit 
											<i class="fa-solid fa-edit" aria-hidden="true"></i>
										</button>';
                                        } ?> <button type="button" class="btn-primary btn btn-sm" data-bs-toggle="modal" data-bs-target="#Generate_Certificate
											<?php echo $resident['id']; ?>">Generate <i class="fa-solid fa-file-alt"></i>
                           </button>
                           <button type="button" class="btn-primary btn btn-sm" data-bs-toggle="modal" data-bs-target="#Generate_BusinessPermit
											<?php echo $resident['id']; ?>">Business Permit <i class="fa-solid fa-file-alt"></i>
                           </button> <?php if ($_SESSION['role'] == "Administrator") {
                                            echo '
										<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Delete_Resident' . $resident['id'] . '">Delete 
											<i class="fa-solid fa-trash"></i>
										</button>';
                                        } ?>
                        </form>
                     </td>
                  </tr> <?php
                            include 'resident-edit.php';
                            include 'resident-delete.php';
                            include 'resident-view.php';
                            ?>
                  <!-- Generate Certificate Modal -->
                  <div class="modal fade" id="Generate_Certificate
								<?php echo $resident['id']; ?>" tabindex="-1" aria-labelledby="generateCertificateLabel" aria-hidden="true">
                     <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="generateCertificateLabel">Generate Certificate </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <div class="modal-body">
                              <form id="certificateForm
												<?php echo $resident['id']; ?>" action="clearances/cert/barangay_form.php" target="_blank" method="GET">
                                 <input type="hidden" name="id" value="
													<?php echo $resident['id']; ?>">
                                 <div class="mb-3">
                                    <label for="certificateType" class="form-label">Select Certificate Type</label>
                                    <select class="form-select" id="certificateType
															<?php echo $resident['id']; ?>" name="certificate_type">
                                       <option value="brgyclearance">Barangay Clearance</option>
                                       <option value="barc">BARC Certificate</option>
                                       <option value="jobcert">First Time Jobseeker Certificate </option>
                                       <option value="joboat">First Time Jobseeker Oath</option>
                                       <option value="goodmoral">Good Moral Character Certificate </option>
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
                  <div class="modal fade" id="Generate_BusinessPermit
									<?php echo $resident['id']; ?>" tabindex="-1" aria-labelledby="generateCertificateLabel" aria-hidden="true">
                     <div class="modal-dialog modal-md modal-dialog-centered">
                        <div class="modal-content">
                           <!-- Modal Header -->
                           <div class="modal-header">
                              <h5 class="modal-title" id="generateCertificateLabel">Generate Business Permit</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <!-- Modal Body -->
                           <div class="modal-body text-center">
                              <p> Are you sure you want to generate the business permit for </p>
                           </div>
                           <!-- Modal Footer -->
                           <div class="modal-footer justify-content-center">
                              <!-- Form to redirect to businesspermit.php -->
                              <form id="businessPermitForm
													<?php echo $resident['id']; ?>" action="businesspermit.php" method="POST">
                                 <!-- Include resident ID as a hidden input -->
                                 <input type="hidden" name="resident_id" value="
														<?php echo htmlspecialchars($resident['id']); ?>">
                                 <button type="submit" class="btn btn-primary">Continue</button>
                              </form>
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                           </div>
                        </div>
                     </div>
                  </div>
         </div>
      </div>
   </div> <?php endwhile; ?> </tbody>
   </table>
</div>
<!-- View Resident Modal -->
<div class="modal fade" id="View_Resident<?php echo $resident['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Resident's Personal Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="font-size: 20px; padding-left: 50px;">
        <div class="container">
          <div class="d-flex flex-column align-items-center text-center p-3 mb-3">
            <div id="camera">
                <a href="<?php echo $resident['captured_image'];?>" target="_blank">
                    <img src="images/<?php echo basename($resident['captured_image']); ?>" 
                        class="capture_frame border border-dark rounded-circle" 
                        height="150" 
                        width="150"
                        alt="Picture" 
                        style="border-radius: 50%; object-fit: cover;"> <!-- Added object-fit for better image handling -->
                </a>
            </div><br>
            <p style="font-size: 1.5em; font-weight: bold;">
                <?php echo $resident['firstname'] . ' ' . substr($resident['middlename'], 0, 1) . '. ' . $resident['lastname'] . ' ' . $resident['suffixname'];?>
            </p>
          </div>

          <!-- Personal Information -->
          <p><b>Gender:</b> <?php echo $resident['gender']; ?></p>
          <?php 
          $birthdate = new DateTime($resident['birthdate']);
          $formattedBirthdate = strtoupper($birthdate->format('F j, Y'));
          ?>
          <p><b>Birthdate:</b> <?php echo $formattedBirthdate; ?></p>
          <p><b>Age:</b> <?php echo $resident['age']; ?></p>

          <hr>
          <!-- Place of Birth -->
          <p><b>Place of Birth:</b></p>
          <p><?php echo $resident['city'] . ', ' . $resident['province']; ?></p>

          <hr>
          <!-- Home Address -->
          <p><b>Home Address:</b></p>
          <p><?php echo '#' . $resident['houseNo'] . ', PUROK ' . $resident['purokNo']  . ', SAN AGUSTIN, GUIMBA, NUEVA ECIJA'; ?></p>

          <hr>
          <!-- Contact Information -->
          <p><b>Contact Information:</b></p>
          <p><b>Contact No.:</b> <?php echo $resident['contactNo']?></p>
          <p><b>Email Address:</b> <?php echo $resident['emailAddress']?></p>

          <hr>
          <!-- Parents' Information -->
          <p><b>Parents' Information:</b></p>
          <p><b>Mother's Name:</b> <?php echo $resident['motherName']?></p>
          <p><b>Mother's Contact No.:</b> <?php echo $resident['motherContactNo']?></p>
          <p><b>Father's Name:</b> <?php echo $resident['fatherName']?></p>
          <p><b>Father's Contact No.:</b> <?php echo $resident['fatherContactNo']?></p>

          <hr>
          <!-- Additional Information -->
          <p><b>Additional Information:</b></p>
          <p><b>Height (cm):</b> <?php echo $resident['height']?></p>
          <p><b>Weight (kg):</b> <?php echo $resident['weight']?></p>
          <p><b>Nationality:</b> <?php echo $resident['nationality']?></p>
          <p><b>Civil Status:</b> <?php echo $resident['civilStatus']?></p>

          
          <?php
          // Educational Background
          if (
              !empty($resident['course']) || 
              !empty($resident['CSchoolName']) || 
              !empty($resident['CYearAttended']) || 
              !empty($resident['CSchoolAddress']) ||
              !empty($resident['HSchoolName']) ||
              !empty($resident['HSchoolAddress']) ||
              !empty($resident['HYearAttended']) || 
              !empty($resident['ESchoolName']) || 
              !empty($resident['ESchoolAddress']) || 
              !empty($resident['EYearAttended'])
          ) {
              echo '<hr>';
              echo '<p><b>Educational Background:</b></p>';

              if (
                  !empty($resident['course']) || 
                  !empty($resident['CSchoolName']) || 
                  !empty($resident['CSchoolAddress'])
              ) {
                  echo '<p><b>College:</b> ' . htmlspecialchars($resident['course']) . ', ' . htmlspecialchars($resident['CSchoolName']);

                  if (!empty($resident['CYearAttended'])) {
                      echo ' (' . htmlspecialchars($resident['CYearAttended']) . ')';
                  }

                  echo ' - ' . htmlspecialchars($resident['CSchoolAddress']) . '</p>';
              }

              if (
                  !empty($resident['HSchoolName']) || 
                  !empty($resident['HSchoolAddress'])
              ) {
                  echo '<p><b>High School:</b> ' . htmlspecialchars($resident['HSchoolName']);

                  if (!empty($resident['HYearAttended'])) {
                      echo ' (' . htmlspecialchars($resident['HYearAttended']) . ')';
                  }

                  echo ' - ' . htmlspecialchars($resident['HSchoolAddress']) . '</p>';
              }

              if (
                  !empty($resident['ESchoolName']) || 
                  !empty($resident['ESchoolAddress'])
              ) {
                  echo '<p><b>Elementary:</b> ' . htmlspecialchars($resident['ESchoolName']);

                  if (!empty($resident['EYearAttended'])) {
                      echo ' (' . htmlspecialchars($resident['EYearAttended']) . ')';
                  }

                  echo ' - ' . htmlspecialchars($resident['ESchoolAddress']) . '</p>';
              }
          }

          // Farmer Information
          if (
              !empty($resident['LandSize']) || 
              !empty($resident['LandDirection'])
          ) {
              echo '<hr>';
              echo '<p><b>Farmer Information:</b></p>';
              
              if (!empty($resident['LandSize'])) {
                  echo '<p><b>Land Size (sq.m):</b> ' . htmlspecialchars($resident['LandSize']) . '</p>';
              }

              if (!empty($resident['LandDirection'])) {
                  echo '<p><b>Land Direction:</b> ' . htmlspecialchars($resident['LandDirection']) . '</p>';
              }
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
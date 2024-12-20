<?php
    include '../../includes/header.php';
    include '../../includes/scripts.php';

    // Get resident_id from POST or other means (ensure the POST request has resident_id)
    if (isset($_POST['resident_id'])) {
        $resident_id = $_POST['resident_id'];
    }
?>

<div class="container my-4 d-flex justify-content-center">
    <div class="row w-100">
        <div class="col-md-8 mx-auto">
            <div class="p-4 border rounded shadow-sm" style="background-color: #f8f9fa;">
                <h3 class="mb-4 text-center">Generate Business Permit</h3>
              
                <form method="POST" action="function.php" id="businessPermitForm" class="needs-validation" novalidate>
                    <input type="hidden" name="resident_id" value="<?php echo $resident_id; ?>">
                    <div id="businessPermitFields">
                        <!-- Business Amount -->
                        <div class="row mb-3 align-items-center">
                            <div class="col-4 text-end">
                                <label for="businessAmount" class="form-label">Business Amount <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-8">
                                <div class="input-group">
                                    <span class="input-group-text">₱</span>
                                    <input type="text" class="form-control" id="businessAmount" name="business_amount" 
                                           placeholder="0.00" required
                                           pattern="^\d{1,6}(\.\d{0,2})?$"
                                           oninput="
                                               this.value = this.value.replace(/[^0-9.]/g, '');
                                               let parts = this.value.split('.');
                                               if (parts[0].length > 6) parts[0] = parts[0].slice(0, 6);
                                               if (parts[1]) parts[1] = parts[1].slice(0, 2);
                                               this.value = parts[0] + (parts[1] ? '.' + parts[1] : '');
                                           "
                                           title="Please enter a valid amount (max 6 digits with 2 decimal places)">
                                    <div class="invalid-feedback">Please enter a valid amount</div>
                                </div>
                            </div>
                        </div>

                        <!-- Business Type -->
                        <div class="row mb-3 align-items-center">
                            <div class="col-4 text-end">
                                <label for="businessType" class="form-label">Business Type <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" id="businessType" name="business_type" 
                                       placeholder="Uri ng negosyo o aktibidad" required
                                       pattern="[A-Za-z0-9\s]+"
                                       maxlength="50"
                                       oninput="this.value = this.value.toUpperCase()"
                                       title="Please enter a valid business type (letters, numbers and spaces only)">
                                <div class="invalid-feedback">Please enter a valid business type</div>
                            </div>
                        </div>

                        <!-- Business Name -->
                        <div class="row mb-3 align-items-center">
                            <div class="col-4 text-end">
                                <label for="businessName" class="form-label">Business Name <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" id="businessName" name="business_name" 
                                       placeholder="Pangalan ng negosyo o aktibidad" required
                                       pattern="[A-Za-z0-9\s]+"
                                       maxlength="50"
                                       oninput="this.value = this.value.toUpperCase()"
                                       title="Please enter a valid business name (letters, numbers and spaces only)">
                                <div class="invalid-feedback">Please enter a valid business name</div>
                            </div>
                        </div>

                        <!-- Business Location -->
                        <div class="row mb-3 align-items-center">
                            <div class="col-4 text-end">
                                <label for="businessLocation" class="form-label">Business Location <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" id="businessLocation" name="business_location" 
                                       placeholder="Saan itatayo o gagawin" required
                                       pattern="[A-Za-z0-9\s,.-]+"
                                       maxlength="100"
                                       oninput="this.value = this.value.toUpperCase()"
                                       title="Please enter a valid business location">
                                <div class="invalid-feedback">Please enter a valid business location</div>
                            </div>
                        </div>

                        <!-- Official Receipt -->
                        <div class="row mb-3 align-items-center">
                            <div class="col-4 text-end">
                                <label for="officialReceipt" class="form-label">Official Receipt <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" id="officialReceipt" name="Official_Receipt" 
                                       placeholder="Opisyal na resibo" required
                                       pattern="[0-9]{4,10}"
                                       maxlength="10"
                                       oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                       title="Please enter a valid receipt number (4-10 digits)">
                                <div class="invalid-feedback">Please enter a valid receipt number</div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary" name="submit_business">Generate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Form Validation Script -->
<script>
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });

    // Form validation
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()

    // Format business amount as currency
    document.getElementById('businessAmount').addEventListener('blur', function(e) {
        if (this.value) {
            const num = parseFloat(this.value);
            if (!isNaN(num)) {
                this.value = num.toFixed(2);
            }
        }
    });
</script>

<?php
    include 'pagination/pagination.php';
    include '../../includes/footer.php';
?>
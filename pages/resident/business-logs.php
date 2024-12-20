<div class="container mt-4">
   <h3>Business Logs</h3>
   <table class="table table-bordered table-striped">
      <thead>
         <tr class="text-center">
            <th>No.</th>
            <th>Owner Name</th>
            <th>Business Name</th>
            <th>Business Location</th>
            <th>Business Type</th>
            <th>Business Amount</th>
            <th>Date</th>
         </tr>
      </thead>
      <tbody> 
        <?php
            $query = "SELECT tbl_business_logs.id AS BusinessID, tbl_business_logs.BusinessName, tbl_business_logs.BusinessLocation, tbl_business_logs.BusinessType, tbl_business_logs.BusinessAmount, tbl_business_logs.Date, CONCAT(tblresident.FirstName, ' ', tblresident.LastName) AS UserName FROM tbl_business_logs INNER JOIN tblresident ON tbl_business_logs.user_id = tblresident.id;";
            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) > 0) {
                $counter = 1; 
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '
                <tr class="text-center">';
                    
                    echo '
                    <td>' . $counter++ . '</td>';
                    echo '
                    <td>' . htmlspecialchars($row['UserName']) . '</td>';
                    echo '
                    <td>' . htmlspecialchars($row['BusinessName']) . '</td>';
                    echo '
                    <td>' . htmlspecialchars($row['BusinessLocation']) . '</td>';
                    echo '
                    <td>' . htmlspecialchars($row['BusinessType']) . '</td>';
                    echo '
                    <td>' . htmlspecialchars($row['BusinessAmount']) . '</td>';
                    echo '
                    <td>' . htmlspecialchars($row['Date']) . '</td>';
                    echo '
                </tr>';
                }
            } else {
                echo '
                <tr>
                    <td colspan="8" class="text-center">No records found.</td>
                </tr>';
            }
        ?> 
        </tbody>
   </table>
</div>
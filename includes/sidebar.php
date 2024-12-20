<style>.sb-sidenav .nav-link{color:#1d1c1c;font-weight:600;transition:all 0.3s ease;border-radius:0;}.sb-sidenav .nav-link:hover{background-color:#4CAF50;color:#ffffff;border-radius:5px;}.sb-sidenav .nav-link.active{background-color:#4CAF50;color:#ffffff;border-radius:5px;}.nav-link:hover .sb-nav-link-icon,.nav-link.active .sb-nav-link-icon{color:#ffffff;}.nav-link.active .fa-angle-down{color:#ffffff;transform:rotate(90deg);}</style>

<?php
echo '
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="text-center mt-3">
                        <h6>' . $_SESSION['role'] . '</h6>
                        <hr>
                    </div>';
                    if ($_SESSION['role'] == "Administrator") {
                        echo '
                        <div class="nav">
                            <li>
                                <a class="nav-link ' . ($page == "dashboard.php" ? "active" : "") . '" href="../dashboard/dashboard.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a class="nav-link ' . ($page == "resident.php" ? "active" : "") . '" href="../resident/resident.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                    Resident
                                </a>
                            </li>
                            <li>
                                <a class="nav-link ' . ($page == "report.php" ? "active" : "") . '" href="../report/report.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-flag"></i></div>
                                    Reports
                                </a>
                            </li>
                            <li>
                                <a class="nav-link ' . ($page == "staff.php" ? "active" : "") . '" href="../staff/staff.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                    Staff
                                </a>
                            </li>
                            <li>
                                <a class="nav-link collapsed ' . ($page == "userAccount.php" || $page == "log-history.php" || $page == "officials.php" || $page == "maintenance.php" || $page == "archive.php" ? "active" : "") . '" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSetting" aria-expanded="false">
                                    <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                                    Settings
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                            </li>
                            <li style="font-size:12px;">
                                <div class="collapse ' . ($page == "userAccount.php" || $page == "log-history.php" || $page == "officials.php" || $page == "maintenance.php" || $page == "archive.php"  || $page == "changepass.php" ? "show" : "") . '" id="collapseSetting" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                        <a class="nav-link mt-2 ' . ($page == "userAccount.php" ? "active" : "") . '" href="../settings/userAccount.php">User Account</a>
                                        <a class="nav-link ' . ($page == "log-history.php" ? "active" : "") . '" href="../settings/log-history.php">Log History</a>
                                        <a class="nav-link ' . ($page == "officials.php" ? "active" : "") . '" href="../officials/officials.php">Barangay Officials</a>
                                        <a class="nav-link ' . ($page == "archive.php" ? "active" : "") . '" href="../officials/archive.php">Officials Archive</a>
                                        <a class="nav-link ' . ($page == "maintenance.php" ? "active" : "") . '" href="../settings/maintenance.php">Change Logo</a>
                                    </nav>
                                </div>
                            </li>
                        </div>';
                    } elseif (isset($_SESSION['staff'])) {
                        echo '
                        <div class="nav">
                            <li>
                                <a class="nav-link ' . ($page == "dashboard.php" ? "active" : "") . '" href="../dashboard/dashboard.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a class="nav-link ' . ($page == "resident.php" ? "active" : "") . '" href="../resident/resident.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                    Resident
                                </a>
                            </li>
                            <li>
                                <a class="nav-link ' . ($page == "report.php" ? "active" : "") . '" href="../report/report.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                                    Reports
                                </a>
                            </li>
                        </div>';
                    }
                    echo '
                </div>
            </nav>
        </div>';
?>


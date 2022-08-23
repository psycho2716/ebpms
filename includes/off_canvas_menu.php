<!-- Off Canvas Menu -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="sidebar-header">
        <img src="images/logo.png">
        <div class="sidebar-text-container">
            <h4><strong>EBPMS</strong></h4>
        </div>
        <div class="close-btn-container">
            <a class="close-btn-sidebar text-dark" role="button" data-bs-dismiss="offcanvas" aria-label="Close"><i class='bx bx-x'></i></a>
        </div>
    </div>
    <div class="sidebar-body">
        <h5 class="welcome-message welcome-sidebar text-dark text-center mt-3">Welcome! <strong>Barangay <?php echo $barangay_name; ?></strong></h5>
        <div class="sidebar-links">
            <ul>
                <li class="<?= ($activePage == 'index') ? 'active' : ''; ?>">
                    <a href="index.php" class="sidebar-link">Dashboard</a>
                </li>
                <li class="<?= ($activePage == 'purok') ? 'active' : ''; ?>">
                    <a href="purok.php" class="sidebar-link">Purok/Sitio</a>
                </li>
                <li class="<?= ($activePage == 'household') ? 'active' : ''; ?>">
                    <a href="household.php" class="sidebar-link">Household</a>
                </li>
                <li class="<?= ($activePage == 'beneficiaries') ? 'active' : ''; ?>">
                    <a href="beneficiaries.php" class="sidebar-link">Beneficiaries</a>
                </li>
                <li class="<?= ($activePage == 'residents') ? 'active' : ''; ?>">
                    <a href="residents.php" class="sidebar-link">Residents</a>
                </li>
                <li class="<?= ($activePage == 'certificates') ? 'active' : ''; ?>">
                    <a href="certificates.php" class="sidebar-link">Certificates</a>
                </li>
                <li class="<?= ($activePage == 'officials') ? 'active' : ''; ?>">
                    <a href="officials.php?barangay_id=<?php echo $result_barangay_id; ?>" class="sidebar-link">Barangay Officials</a>
                </li>
                <li>
                    <a href="logout.php" class="sidebar-link logout-alt">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Off Canvas Menu -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="sidebar-header">
        <img src="images/logo.png">
        <div class="sidebar-text-container">
            <h4>EBPMS</h4>
        </div>
        <div class="close-btn-container">
            <a class="close-btn-sidebar text-dark" role="button" data-bs-dismiss="offcanvas" aria-label="Close"><i class='bx bx-x'></i></a>
        </div>
    </div>
    <div class="sidebar-body">
        <div class="sidebar-links">
            <ul>
                <li class="<?= ($activePage == 'index') ? 'active' : ''; ?>">
                    <a href="index.php" class="sidebar-link">Dashboard</a>
                </li>
                <li class="<?= ($activePage == 'barangays') ? 'active' : ''; ?>">
                    <a href="barangays.php" class="sidebar-link">Barangays</a>
                </li>
                <li class="<?= ($activePage == 'population') ? 'active' : ''; ?>">
                    <a href="population.php" class="sidebar-link">Population</a>
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
                <li>
                    <a href="logout.php" class="sidebar-link logout-alt">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</div>
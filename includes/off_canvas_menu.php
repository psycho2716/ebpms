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
                    <a href="#" class="sidebar-link">Dashboard</a>
                </li>
                <li class="<?= ($activePage == 'officials') ? 'active' : ''; ?>">
                    <a href="#" class="sidebar-link">Barangay Officials</a>
                </li>
                <li class="<?= ($activePage == 'population') ? 'active' : ''; ?>">
                    <a href="#" class="sidebar-link">Population</a>
                </li>
                <li class="<?= ($activePage == 'household') ? 'active' : ''; ?>">
                    <a href="#" class="sidebar-link">Household</a>
                </li>
                <li class="<?= ($activePage == 'beneficiaries') ? 'active' : ''; ?>">
                    <a href="#" class="sidebar-link">Beneficiaries</a>
                </li>
                <li class="<?= ($activePage == 'residents') ? 'active' : ''; ?>">
                    <a href="#" class="sidebar-link">Residents</a>
                </li>
                <li class="<?= ($activePage == 'certificates') ? 'active' : ''; ?>">
                    <a href="#" class="sidebar-link">Certificates</a>
                </li>
            </ul>
        </div>
    </div>
</div>
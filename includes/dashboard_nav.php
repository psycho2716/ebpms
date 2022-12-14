<nav class="navbar navbar-expand-md navbar-dark bg-dark px-3">
    <div class="navbar-logo-container">
        <a href="index.php" class="navbar-brand">
            <img src="images/logo.png"><span> EBPMS</span>
        </a>
    </div>
    <a class="navbar-brand" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
        <i class='bx bx-menu-alt-left menu-btn'></i>
    </a>

    <div class="container-fluid">
        <span class="welcome-message text-light"><span>Welcome!</span> <strong>Barangay <?php echo $barangay_name; ?></strong></span>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li>
                    <h3 class="welcome-message ">Welcome</h3>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link logout-btn text-light"><i class="fa-solid fa-arrow-up-left-from-circle"></i> Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
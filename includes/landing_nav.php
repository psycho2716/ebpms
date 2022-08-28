<nav class="navbar navbar-expand-md navbar-dark bg-dark px-3 sticky-top">
    <div class="container-fluid">
        <a href="login.php" class="navbar-brand">
            <img src="images/logo.png"> EBPMS
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="login.php" class="nav-link <?= ($activePage == 'login') ? 'active':''; ?>">Login</a>
                </li>
                <li class="nav-item">
                    <a href="signup.php" class="nav-link <?= ($activePage == 'signup') ? 'active':''; ?>">Sign Up</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
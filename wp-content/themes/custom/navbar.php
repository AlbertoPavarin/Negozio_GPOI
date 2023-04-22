<nav class="navbar navbar-expand-lg bg-white">
    <div class="container-fluid">
        <a class="navbar-brand" href="/prenotazioni">
            <h4>Prenotazioni</h4>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/prenotazioni/kit">
                        <h6>Kit</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/prenotazioni/device">
                        <h6>Device</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/prenotazioni/class">
                        <h6>Class</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/prenotazioni/insert">
                        <h6>Insert</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/prenotazioni/archive">
                        <h6>Archive</h6>
                    </a>
                </li>
            </ul>

            <a class="navbar-brand">Ciao, <?php echo $user->display_name; ?>!</a>

            <?php if (isAdmin() == true) : ?>
                <a class="btn btn-primary admin-btn" href="/prenotazioni/wp-admin" role="button">Manage</a>
            <?php endif; ?>

            <button class="btn btn-danger logout-btn" onclick="window.location.href='<?php echo wp_logout_url(); ?>'">Logout</button>
        </div>
    </div>
</nav>
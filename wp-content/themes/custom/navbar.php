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
                    <a class="nav-link active" aria-current="page" href="/Negozio_GPOI">
                        <h6>a</h6>
                    </a>
                </li>
                </li>
            </ul>

            <a class="navbar-brand">Ciao, <?php echo $user->display_name; ?>!</a>

            <?php if (isAdmin() == true) : ?>
                <a class="btn btn-primary admin-btn" href="/Negozio_GPOI/wp-admin" role="button">Manage</a>
            <?php endif; ?>

            <button class="btn btn-danger logout-btn" onclick="window.location.href='<?php echo wp_logout_url(); ?>'">Logout</button>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg bg-white">
    <div class="container-fluid">
        <a class="navbar-brand" href="/Negozio_GPOI">
            <img src="/Negozio_GPOI/wp-content/themes/custom/screenshot.png" class="img-cont" alt="">
            <!--<h4>ShOAP</h4>-->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/Negozio_GPOI/">
                        <h6>Home</h6>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/Negozio_GPOI/ordini">
                        <h6>Ordini</h6>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/Negozio_GPOI/carrello">
                        <h6>Carrello</h6>
                    </a>
                </li>
                <?php if (isAdmin() == true) : ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/Negozio_GPOI/aggiungi-prodotto">
                            <h6>Aggiungi prodotto</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/Negozio_GPOI/aggiungi-categoria">
                            <h6>Aggiungi categoria</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/Negozio_GPOI/amministrazione-prodotti">
                            <h6>Gestione Prodotti</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/Negozio_GPOI/ordini-totali">
                            <h6>Gestione Ordini</h6>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>

            <a class="navbar-brand">Ciao, <?php echo $user->display_name; ?>!</a>

            <?php if (isAdmin() == true) : ?>
                <div class="manage-div"><a class="btn btn-primary admin-btn" href="/Negozio_GPOI/wp-admin" role="button">Amministrazione</a></div>
            <?php endif; ?>

            <button class="btn btn-danger logout-btn" onclick="window.location.href='<?php echo wp_logout_url(); ?>'">Logout</button>
        </div>
    </div>
</nav>
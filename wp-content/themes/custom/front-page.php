<?php
get_header();
$user = wp_get_current_user();
?>

<div class="container-fluid">
    <?php require("navbar.php"); ?>
    <br />
    <br />
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><?php bloginfo('name'); ?></h1>
            <p>Benvenuto nella nostra pagina principale!</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_content(); ?></p>
            <?php endwhile;
            endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <!-- <img src="..." class="card-img-top" alt="..."> -->
                <div class="card-body">
                    <h5 class="card-title">Prenota un Kit</h5>
                    <p class="card-text">Carrelli mobili, Computer, MacBook, iPad, Raspberry, Arduino, PLC</p>
                    <a href="/prenotazioni/home-kit" class="btn btn-primary">Vai alla pagina</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <!-- <img src="..." class="card-img-top" alt="..."> -->
                <div class="card-body">
                    <h5 class="card-title">Prenota un'aula</h5>
                    <p class="card-text">Lab. Informatica 1-2, Lab. Sistemi, Lab. TPSI, Robotica Educativa, Aula PNRR, Lab. Linguistico</p>
                    <a href="/prenotazioni/home-class" class="btn btn-primary">Vai alla pagina</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
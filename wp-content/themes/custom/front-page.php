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


</div>

<?php get_footer(); ?>
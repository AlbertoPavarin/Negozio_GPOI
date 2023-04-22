<?php
get_header();
$user = wp_get_current_user();
?>

<div class="container-fluid">
    <?php require("navbar.php"); ?>
    <div class="row">
        <div class="col-12">
            <h2 class="title text-center"><?php echo get_the_title(); ?></h2>
            <hr />
        </div>
    </div>
</div>

<?php get_footer(); ?>
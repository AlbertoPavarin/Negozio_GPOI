<?php
get_header();
$user = wp_get_current_user();

require_once('functions.php');

?>

<div class="container-fluid">
    <?php require("navbar.php"); ?>
</div>

<?php get_footer(); ?>
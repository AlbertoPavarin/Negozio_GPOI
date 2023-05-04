<?php
get_header();
$user = wp_get_current_user();

if ($user->user_status > 1)
{
    wp_destroy_current_session();
    echo ('<script>
        location.href = "' . wp_login_url() . '"
    </script>');
}

require_once('functions.php');

?>

<div class="container-fluid">
    <?php require("navbar.php"); ?>
</div>

<?php get_footer(); ?>
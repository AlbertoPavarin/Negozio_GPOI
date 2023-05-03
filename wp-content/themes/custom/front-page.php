<?php
get_header();
$user = wp_get_current_user();
?>
<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Category/getActiveCategories.js"></script>

<div class="container-fluid">
    <?php require("navbar.php"); ?>
</div>

<div class="mb-4">
    <div class="col-12 title-img d-flex align-items-center justify-content-center">
        <h2 class="title">Categorie</h2>
    </div>
</div>
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1>ShOAP</h1>
            <?php if(is_user_logged_in()) :?>
                <p class="">Ciao, <b><?php echo $user->display_name; ?></b>!</p>
            <?php endif; ?>
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
    <hr>
    <div class="row">
        <script>
            categories = getActiveCategories();
            if (categories == "404")
                document.querySelector('.cat-cont').innerHTML = "Nessuna categoria";
        </script>
        <div class="row cats-cont col-12 col-md-12 col-xl-12 col-12">
            <script>
                categories.forEach((category) => {
                    const catDiv = document.createElement('div');
                    catDiv.classList = "col-12 category-container mt-3 p-3";
                    catDiv.innerHTML = `<a class="a-cat" href="Negozio_GPOI/catalogo?id=${category.id}">${category.description}</a>`;
                    document.querySelector('.cats-cont').appendChild(catDiv);
                })
            </script>
        </div>  
    </div>
</div>

<?php get_footer(); ?>
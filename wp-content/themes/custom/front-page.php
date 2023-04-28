<?php
get_header();
$user = wp_get_current_user();
?>
<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Category/getActiveCategories.js"></script>

<div class="container-fluid">
    <?php require("navbar.php"); ?>
    <br />
    <br />
</div>

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1>ShOAP</h1>
            <p class="">Ciao, <b><?php echo $user->display_name; ?></b>!</p>
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
            <div class="col-md-4 col-4 col-xl-4 col-12">
                <h5>I più votati</h5>
                <div class="prod-container col-5">
                    SAPONI DA BUCATO ALLA CENERE - PER LAVAGGI A MANO
                </div>
                <div class="col-6">
                    <img src="https://bioapinatura.com/wp-content/uploads/2020/02/LAGO-DI-GARDA-LIMONE.jpg" class="img-prod" alt="">
                    <hr>
                </div>

            </div>
        <script>
            categories = getActiveCategories();
            if (categories == "404")
                document.querySelector('.cat-cont').innerHTML = "Nessuna categoria";
        </script>
        <div class="row cats-cont col-8 col-md-8 col-xl-8 col-12">
            <h1>Categorie</h1>
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
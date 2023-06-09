<!--
Il file header.php contiene il codice per la parte superiore del sito, inclusi elementi come il logo, 
il menu di navigazione, la barra di ricerca e l'intestazione. Il codice presente in questo file viene 
incluso in ogni pagina del sito, quindi è possibile utilizzarlo per creare un'intestazione coerente per tutte le pagine.
-->

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Negozio</title>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.6.4.min.js">
    </script>
    <link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet" type="text/css">
    <?php
    /*
    wp_head() è utilizzato all'interno del file header.php del tema per aggiungere script e stili in cima alla pagina HTML, 
    prima della chiusura del tag <head>. Questa funzione è importante perché permette ai plugin e ai temi di aggiungere i 
    propri script e stili alla pagina, senza dover modificare manualmente il file header.php.
    */
    wp_head();
    ?>
</head>

<body <?php body_class(); ?>>
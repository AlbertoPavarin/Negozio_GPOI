<?php
require_once('page.php');
?>
<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/CategoryProducts/getActiveProductsByCategory.js"></script>

<script>
    console.log(getActiveProductsByCategory(<?php echo $_GET["id"] ?>));
</script>
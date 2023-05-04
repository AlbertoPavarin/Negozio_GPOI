<?php
require_once('page.php');

if (!is_user_logged_in())
{
    echo ('<script>
        location.href = "/Negozio_GPOI/login"
    </script>');
}

$avatar = get_avatar_url($user->ID);
?>

<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/User/deleteUser.js"></script>

<!-- Success Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="successModalLabel">Successo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Sei sicuro di voler eliminare l'account?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-modal" data-bs-dismiss="modal" onclick="deleteAccount()">Si</button>
        <button type="button" class="btn btn-modal" data-bs-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>

<div class="">
    <div class="col-12 title-img d-flex align-items-center justify-content-center">
        <h2 class="title">Profilo</h2>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-12 mt-5 d-flex justify-content-center align-items-center">
            <img src="<?php echo $avatar ?>" alt="">
        </div>
        <div class="col-12 mt-3 d-flex justify-content-center align-items-center">
            <h4><?php echo $user->display_name; ?></h4>
        </div>
        <div class="col-12 mt-3 d-flex justify-content-center align-items-center">
            <h4><?php echo $user->user_email; ?></h4>
        </div>
        <div class="col-12 mt-3 d-flex justify-content-center align-items-center">
            <input type="button" value="Elimina account" class="btn btn-danger delete-btn">
        </div>
    </div>
</div>

<script>
    document.querySelector(".delete-btn").onclick = () => {
        var myModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        myModal.show();
    }

    function deleteAccount()
    {
        deleteUser(<?php echo $user->ID ?>);
        wp_destroy_current_session();
        location.href='<?php echo wp_login_url(); ?>';
    }
</script>
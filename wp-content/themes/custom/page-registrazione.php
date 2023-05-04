<?php
get_header();
if (is_user_logged_in())
{

    echo ('<script>
        location.href = "/Negozio_GPOI"
    </script>');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])) {
        $result = wp_create_user($_POST['username'], $_POST['password'], $_POST['email']);

        if(is_wp_error($result)){
            $error = $result->get_error_message();
            //handle error here
        }else{
            $user = get_user_by('id', $result);
            echo ('<script>
                  location.href = "' . wp_login_url() .'"
                  </script>');
            //handle successful creation here
        }
    }
  }
  ?>

<div class="mr-4 ml-4">
  <div class="login mt-5">
    <h1>Registrazione</h1>
    <form class="mt-4" method="post">
      <label class="mt-4" for="username">
        Username
      </label>
      <input name="username" type="text" class="form-control w-100" autoComplete="Off" placeholder="Inserisci il tuo username"/>
      <label class="mt-4" for="username">
        Email
      </label>
      <input name="email" type="email" class="form-control w-100" autoComplete="Off" placeholder="Inserisci la tua email"/>
      <label class="mt-4" for="password">
        Password
      </label>
      <input name="password" type="password" class="form-control w-100" placeholder="Inserisci la tua password"/>
      <input type="Submit" class="sub-btn mt-4" value="Accedi" />
    </form>
  </div>
</div>

<?php get_footer(); ?>
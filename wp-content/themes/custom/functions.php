<?php

/**
 * Description of front-page.php
 *Il file functions.php è un file presente all'interno di ogni tema di WordPress e serve a specificare le 
 *funzionalità e le personalizzazioni del tema. Il file functions.php è un file PHP, quindi può contenere 
 *codice PHP, ma anche codice HTML, CSS e JavaScript.
 *
 *Il file functions.php è un file importante perché permette di aggiungere funzionalità al tuo tema, senza 
 *modificare il codice del tema stesso. Ciò significa che, se si decide di cambiare tema in futuro, le personalizzazioni 
 *create nel file functions.php non verranno perse.
 *
 *Il file functions.php può essere utilizzato per:
 *Aggiungere funzionalità al tuo tema, come ad esempio la creazione di un menu personalizzato, l'aggiunta di 
 *widget personalizzati o la creazione di shortcode personalizzati.
 *Personalizzare il comportamento predefinito di WordPress, come ad esempio la modifica della lunghezza 
 *dell'estratto dei post o la modifica della lunghezza del titolo della pagina.
 *
 *Caricare risorse esterne, come ad esempio i file CSS o JavaScript.
 *Eseguire qualsiasi altra operazione che si desidera eseguire prima che il tema venga caricato.
 *In sintesi, il file functions.php è un file presente in ogni tema di wordpress, permette di aggiungere 
 *funzionalità e personalizzazioni al tema senza modificare il codice del tema stesso, può contenere diversi 
 *tipi di codice e permette di personalizzare il comportamento predefinito di wordpress.
 */

/**
 * Description of function|method
 * Carica correttamente i file .css
 */
function load_stylesheets()
{
	wp_enqueue_style('bootstrap', get_template_directory_uri() . "/css/Bootstrap/bootstrap.min.css", array(), '5.2.3', 'all');
	wp_enqueue_style('responsive', get_template_directory_uri() . "/css/Responsive/responsive.bootstrap5.min.css", array(), '5.2.3', 'all');
	wp_enqueue_style('select', get_template_directory_uri() . "/css/Select/select.bootstrap5.min.css", array(), '1.5.0', 'all');
	wp_enqueue_style('buttons', get_template_directory_uri() . "/css/Buttons/buttons.bootstrap5.min.css", array(), '1.5.0', 'all');
}
add_action('wp_enqueue_scripts', 'load_stylesheets');

/**
 * Description of function|method
 * Carica correttamente i file .js
 */
function load_js()
{
	//wp_enqueue_script('jQuery', get_template_directory_uri() . "/js/jquery-3.6.4.min.js", array(), '3.6.3', true);
	wp_enqueue_script('bootstrap', get_template_directory_uri() . "/js/Bootstrap/bootstrap.bundle.min.js", array(), '5.1.3', true);
	wp_enqueue_script('jquery_dataTables', get_template_directory_uri() . "/js/DataTables/jquery.dataTables.min.js", array(), '5.1.3', true);
	wp_enqueue_script('bootstrap_dataTables', get_template_directory_uri() . "/js/DataTables/dataTables.bootstrap5.min.js", array(), '5.1.3', true);
	wp_enqueue_script('dataTables_responsive', get_template_directory_uri() . "/js/Responsive/dataTables.responsive.min.js", array(), '5.1.3', true);
	wp_enqueue_script('responsive', get_template_directory_uri() . "/js/Responsive/responsive.bootstrap5.js", array(), '5.1.3', true);
	wp_enqueue_script('select', get_template_directory_uri() . "/js/Select/dataTables.select.min.js", array(), '1.5.0', true);
	wp_enqueue_script('buttons_datatables', get_template_directory_uri() . "/js/Buttons/dataTables.buttons.min.js", array(), '2.3.6', true);
	wp_enqueue_script('buttons', get_template_directory_uri() . "/js/Buttons/buttons.bootstrap5.min.js", array(), '2.3.6', true);
}
add_action('wp_enqueue_scripts', 'load_js');

/**
 * Ridireziona un visitatore che non ha effettuato l'accesso al sito alla pagina di log in
 */
function login_redirect()
{
	$the_slug = get_post_field( 'post_name' );
	if (!is_user_logged_in() && $the_slug != "registrazione") {
		wp_redirect(wp_login_url());
		exit();
	}
}
//add_action('template_redirect', 'login_redirect');

/**
 * Nasconde l'admin bar
 */
function hide_admin_bar()
{
	add_filter('show_admin_bar', '__return_false');
}
 add_action('after_setup_theme', 'hide_admin_bar');

/**
 * Logout custom 
 */
function logout()
{
	wp_logout();
	wp_redirect(home_url());
	exit();
}
// add_action('wp_logout', 'custom_logout');


/**
 * Ritorna i ruoli dell'utente
 */
function wpget_current_user_roles()
{
	if (is_user_logged_in()) {
		$user = wp_get_current_user();
		$roles = (array) $user->roles;
		return $roles;
	} else {
		return array();
	}
}

/**
 * Verifica se l'utente corrente è admin
 */
function isAdmin()
{
	$roles = wpget_current_user_roles();
	foreach ($roles as $role) {
		if ($role == "administrator")
			return true;
	}

	return false;
}

/**
 * Dopo il login rimanda alla home page
 */
function redirect_to_front_page()
{
	wp_redirect(home_url());
	exit();
}
add_action('wp_login', 'redirect_to_front_page');

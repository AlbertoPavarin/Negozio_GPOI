<?php
/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file viene utilizzato, durante l’installazione, dallo script
 * di creazione di wp-config.php. Non è necessario utilizzarlo solo via web
 * puoi copiare questo file in «wp-config.php» e riempire i valori corretti.
 *
 * Questo file definisce le seguenti configurazioni:
 *
 * * Impostazioni del database
 * * Chiavi segrete
 * * Prefisso della tabella
 * * ABSPATH
 *
 * * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Impostazioni database - È possibile ottenere queste informazioni dal proprio fornitore di hosting ** //
/** Il nome del database di WordPress */
define( 'DB_NAME', 'shop_wp' );

/** Nome utente del database */
define( 'DB_USER', 'root' );

/** Password del database */
define( 'DB_PASSWORD', '' );

/** Hostname del database */
define( 'DB_HOST', 'localhost' );

/** Charset del Database da utilizzare nella creazione delle tabelle. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Il tipo di collazione del database. Da non modificare se non si ha idea di cosa sia. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chiavi univoche di autenticazione e di sicurezza.
 *
 * Modificarle con frasi univoche differenti!
 * È possibile generare tali chiavi utilizzando {@link https://api.wordpress.org/secret-key/1.1/salt/ servizio di chiavi-segrete di WordPress.org}
 *
 * È possibile cambiare queste chiavi in qualsiasi momento, per invalidare tutti i cookie esistenti.
 * Ciò forzerà tutti gli utenti a effettuare nuovamente l'accesso.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'eQCtHhSF&XqIUA6rP;d:gPwG&&I*$xyu_;IUh[)y)?Y;V54os*e%&f-UrLfD2`St' );
define( 'SECURE_AUTH_KEY',  'iBx~9R8uA&`i+V@ZvU([XD8P12!GAAt!b53.R_&S.67s< vhtwx/xr(UB72yo^cT' );
define( 'LOGGED_IN_KEY',    'Q2$T`>z`0M5._FD|-9tx-v7*6-1j/aJ!4&Kx N/lY4in76F4}i2~Ta T*@kK5/:^' );
define( 'NONCE_KEY',        '_YFHc8fEv2u0r!e5* .NjieWGEH[8`q_:=_&:x^FIm)Ko]xx0;qHw|q]6IB?UXd@' );
define( 'AUTH_SALT',        '!-[%vIlGf|q!N|V6q7h*0&_Uls0;Wp9/k=kb A9~5.XbeT>a9#hmXNyhJa:igZyi' );
define( 'SECURE_AUTH_SALT', '0o}+Yj6b}w&M~UTsKkTH[]k-JK3e.Zp1yR<.f3_H(mz8(b7]0ui(T6PV4j_|NLOx' );
define( 'LOGGED_IN_SALT',   '^K!YG1@{VYjO.keT,Hd.8bohA+ft,QW.;gHe2W ,RS`|(RLVC{,G:;GB$iE*/Uu$' );
define( 'NONCE_SALT',       'bAxZB?Qo*|nZ+djJ=^L|j%0aVT;_cNV-Wu2/7)/d<x E7d<aHY*+VM9`J :j#QCp' );

/**#@-*/

/**
 * Prefisso tabella del database WordPress.
 *
 * È possibile avere installazioni multiple su di un unico database
 * fornendo a ciascuna installazione un prefisso univoco. Solo numeri, lettere e trattini bassi!
 */
$table_prefix = 'wp_';

/**
 * Per gli sviluppatori: modalità di debug di WordPress.
 *
 * Modificare questa voce a TRUE per abilitare la visualizzazione degli avvisi durante lo sviluppo
 * È fortemente raccomandato agli svilupaptori di temi e plugin di utilizare
 * WP_DEBUG all’interno dei loro ambienti di sviluppo.
 *
 * Per informazioni sulle altre costanti che possono essere utilizzate per il debug,
 * leggi la documentazione
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Aggiungere qualsiasi valore personalizzato tra questa riga e la riga "Finito, interrompere le modifiche". */



/* Finito, interrompere le modifiche! Buona pubblicazione. */

/** Path assoluto alla directory di WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Imposta le variabili di WordPress ed include i file. */
require_once ABSPATH . 'wp-settings.php';

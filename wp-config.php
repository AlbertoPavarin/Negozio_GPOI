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
define( 'AUTH_KEY',         'Yt{+6b=M5!z;=MR?qAK?So&Fi!rYw1)ou34)w+zUk)KQ- `i,}$G0YqmGN+]7b~x' );
define( 'SECURE_AUTH_KEY',  'Y1R+?E`:0f-Pxpm/QE+!Q^+2q45iI[91GEpYDtFb&xNkQrS_Ig?xyUngvhD8 5#J' );
define( 'LOGGED_IN_KEY',    '?_9m8v-]T%?L[)w9L +uB?B[Qq4F:(Y~Q3WdNIO(NOPU,:n$|/nn;N#W;)T6,RB:' );
define( 'NONCE_KEY',        'M8igHh%J!]!X*;n/C+lc%sf.~np#%r~JFIm3X?b(r@iGn,%/DCL@0HsxS)N2B]w5' );
define( 'AUTH_SALT',        'wcC4SGKo:>7cu3.`%)*BI)Y>7HPT3,$|rR G0R2J{7Hn~ol>xE_y~?h.)>@gkM@s' );
define( 'SECURE_AUTH_SALT', '3s~01_uilpGOT66Ae/9P~hqYCQEz%`MKU}{UJ^8U}t]JJPs%|E6uVxm e5}$;R(`' );
define( 'LOGGED_IN_SALT',   'YYF@5h$HA)M^|QJCE~+rW._#Yfm}jzClLd$D+njaBm#60TXe[1{{.S{uD6#OE=R0' );
define( 'NONCE_SALT',       '?KaxJecXv^G}#tlu4$kV$,qZXaJ(!Ko^$~@dnE.%T[O6Y7Wcc4h|X`uzCe,J<0Oj' );

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

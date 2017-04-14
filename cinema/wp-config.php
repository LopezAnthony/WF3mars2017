<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'cinema');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '^q48VFv#)S+ZQu]/^u^r.+*,W,7fi>X}%|qAP:FT#wo%WkJJZopgCnrt?/_.gg#:');
define('SECURE_AUTH_KEY',  'e8Bf(-G{e7]v j[;.R]o> _mcPlOf21WEt}Zi(z!fY)-b|~l !^s^F{^L$@<pGc@');
define('LOGGED_IN_KEY',    'Vo{4,N # ]G.=WYEbwUav&._yT,>b(|v/j[_O,e<$utC5:Fpqe*{{zxZkM,:I!2X');
define('NONCE_KEY',        '$1_$=@(a%!vhyQ)T9wBU8@T:UR/i6T%[e$91z]}b=y~)8t}]}7;f9+x{7n1|RF[B');
define('AUTH_SALT',        'qB0EzSkA).V^M7{3/t;(X^HW=A~BVX$LakSVTtxoeq}##;)7J$Y,WR0Mps9``!C}');
define('SECURE_AUTH_SALT', 'UCwHPU`.kL/vTMO<bo7;G#Q4_Qxp 6Y3x@pT!Eh#[.B<Pt|-;ueGk+|[mbBd Ld.');
define('LOGGED_IN_SALT',   'G{M%UK?zlLh9^c<?+y4)>1pN 4RXQ&H2WL(H~>E]%u21YXEY$isIY=7Df_!6AhD+');
define('NONCE_SALT',       '$Q_W,0z{Tsr.n}8NetE@hCG)@Hp0R0[hONB(&*!!P#yx B|:3y:2qS$UL^TEJLt>');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
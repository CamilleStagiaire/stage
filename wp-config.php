<?php

/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'stage' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'k;tkC$?paXUTTD8ygbHm8A%!@-]]=u2i5oNTyQ2H`=bynFBz$Pqwo1-XXL;E4){o' );
define( 'SECURE_AUTH_KEY',  'W)x9|~R<4XhN}4u/N@M4AtRE_jx/J{(K_Nc,+VS>8h{;<xz1VL!DZ8ANA<->gqv<' );
define( 'LOGGED_IN_KEY',    '#/;f+Ur#(l5<iGsG-C5=TB)#vok*F*(lgu(MR//>&A?ZqP$dC&O>V$ *>*`u?_#B' );
define( 'NONCE_KEY',        'nc%9Sv@rJ</]:)NNC+k~-rCvgARY96iz9#3^$=z1B;@[0[{!_DU%#y;1}[icPg6~' );
define( 'AUTH_SALT',        '8Y6KiHcRzd<+}2248tKy/x$BXkK_sLekNN>@1GkR$|@pcleRf?),j=Ftff1%h1LQ' );
define( 'SECURE_AUTH_SALT', ']m#x;r+24#cs,x6=7`NY#>U !r>5$f}r_:g,uT^Q/WWBEM~F8`rBJ~/MGh<AOu@t' );
define( 'LOGGED_IN_SALT',   'bCE ?bZd1f{RyN_:.13oN%vOCBv TP9r}1*Vz@RoE8zZeHB5|o*-GbP$E}qj7ZiJ' );
define( 'NONCE_SALT',       '3YC;w)@$~1=fV?`rY}?$?~_p~@NWI(I7qk4I9v z&FYtbPlpCA5IlP1E39LhqFox' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'cs_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );

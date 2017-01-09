<?php
/**
 * WordPress için taban ayar dosyası.
 *
 * Bu dosya şu ayarları içerir: MySQL ayarları, tablo öneki,
 * gizli anahtaralr ve ABSPATH. Daha fazla bilgi için 
 * {@link https://codex.wordpress.org/Editing_wp-config.php wp-config.php düzenleme}
 * yardım sayfasına göz atabilirsiniz. MySQL ayarlarınızı servis sağlayıcınızdan edinebilirsiniz.
 *
 * Bu dosya kurulum sırasında wp-config.php dosyasının oluşturulabilmesi için
 * kullanılır. İsterseniz bu dosyayı kopyalayıp, ismini "wp-config.php" olarak değiştirip,
 * değerleri girerek de kullanabilirsiniz.
 *
 * @package WordPress
 */

// ** MySQL ayarları - Bu bilgileri sunucunuzdan alabilirsiniz ** //
/** WordPress için kullanılacak veritabanının adı */
define('DB_NAME', 'u333607580_blog');

/** MySQL veritabanı kullanıcısı */
define('DB_USER', 'u333607580_blog');

/** MySQL veritabanı parolası */
define('DB_PASSWORD', '2745Yakup.');

/** MySQL sunucusu */
define('DB_HOST', 'localhost');

/** Yaratılacak tablolar için veritabanı karakter seti. */
define('DB_CHARSET', 'utf8mb4');

/** Veritabanı karşılaştırma tipi. Herhangi bir şüpheniz varsa bu değeri değiştirmeyin. */
define('DB_COLLATE', '');

/**#@+
 * Eşsiz doğrulama anahtarları.
 *
 * Her anahtar farklı bir karakter kümesi olmalı!
 * {@link http://api.wordpress.org/secret-key/1.1/salt WordPress.org secret-key service} servisini kullanarak yaratabilirsiniz.
 * Çerezleri geçersiz kılmak için istediğiniz zaman bu değerleri değiştirebilirsiniz. Bu tüm kullanıcıların tekrar giriş yapmasını gerektirecektir.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '>sAvggNX-@0[m-G4cf1EcsoYvF3Y(YzwnV3`]Dgm7LB@HKN+w N`5 Uu(HRa/8bq');
define('SECURE_AUTH_KEY',  '/V5`0:5JY6XBr89+.y9+YoAB!`oqaojY@e?||jxPXch^)Z&HUx>.A^S~v31g]0aZ');
define('LOGGED_IN_KEY',    'ZJ@%NO7$}([Q:jdc| -oH<i`5X1cH3Et+~mis<Oh8;W..EWK{-@[,9p/A}*DQ:/}');
define('NONCE_KEY',        '<7>3BUvo^1a}!G?Y%7dEg|v`` Gd|_1a7-L#?/+bR)dD69yXgDl;^QR/HoG_u?{g');
define('AUTH_SALT',        '_`qcWMH=0sty~Fr$Jyo.9W-{&K~IvH6!%PsV<aXMK.]!Tw|%?lVmVahKFdWO&&NH');
define('SECURE_AUTH_SALT', '20]nnrw7lo=2 |P2Qn=uvKM7(-1g9&Wgv$.lAPY$4dk_:-K/K{ S7;Q1ahj<<V*t');
define('LOGGED_IN_SALT',   'x(45uq*n^&p>g7G`hp=W1]M{IklOkO6<DiOEJ>lQU]CB04_;ICjB0&8=Ff%.h%-S');
define('NONCE_SALT',       'VQ;K]dk0DoLW-yi@NWAc]g{5!>i^z_/4K,G#d@Nw+l$L|RSzYx.*u|@C%ak0KrAG');
/**#@-*/

/**
 * WordPress veritabanı tablo ön eki.
 *
 * Tüm kurulumlara ayrı bir önek vererek bir veritabanına birden fazla kurulum yapabilirsiniz.
 * Sadece rakamlar, harfler ve alt çizgi lütfen.
 */
$table_prefix  = 'wp_';

/**
 * Geliştiriciler için: WordPress hata ayıklama modu.
 *
 * Bu değeri "true" yaparak geliştirme sırasında hataların ekrana basılmasını sağlayabilirsiniz.
 * Tema ve eklenti geliştiricilerinin geliştirme aşamasında WP_DEBUG
 * kullanmalarını önemle tavsiye ederiz.
 */
define('WP_DEBUG', false);

/* Hepsi bu kadar. Mutlu bloglamalar! */

/** WordPress dizini için mutlak yol. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** WordPress değişkenlerini ve yollarını kurar. */
require_once(ABSPATH . 'wp-settings.php');

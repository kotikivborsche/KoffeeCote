<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'catcaffee' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'wWCzn]x5_mqR:od3riKAX.Npw]|WZtH-u=`Y=(mUMUlW|FCR@AD7)?AN`R-So&n:' );
define( 'SECURE_AUTH_KEY',  'jrsP2iOyrM} )J|4M!`G8?&762C Ispw(:AWC&PIt=DTdqZL}:E@~>5hXj$Rw:n)' );
define( 'LOGGED_IN_KEY',    '-rQs:sv{`!iiD(tKj)Z8Um..011dQhCR2pxwm/onOEd&p#&EjNlu`Z405hqEd#{o' );
define( 'NONCE_KEY',        'g,if!Z%k@8#fM2N?u)24~59`=Buq(mt|jh{tSyO29Ox>od0:NX2B!.sX#I<C8HLA' );
define( 'AUTH_SALT',        'Eb%,]9hN(?24DrO?<D^V=BoULAy1~nYm<^?n$lL%98E,op4)^B)~$5ddQ3k4Y[[y' );
define( 'SECURE_AUTH_SALT', 'j7O!V9Wh8Wq}ipT/9o[g6n&oMmn5|=!ev@GG*:X<2AbAfSkp&8<Wk6bQ2vvV9^D^' );
define( 'LOGGED_IN_SALT',   'UGS57fH4(_Q{0e0]Vgk%; $R`JOG=NCpyJ%&p5~U<6L>u;y/x<lUPLhnv}W;xzBT' );
define( 'NONCE_SALT',       'b.FSeI`|IC}mTX$E7TAm:ty( T~/KXyAG(*Srp7nx@42IeSuFU;V 2Jna|N&yH8a' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';

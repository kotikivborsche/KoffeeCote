<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/** @var string[] $missing_plugin_names */
?>

<div class="error notice">
    <p>
        <strong>Error:</strong>
        The "<em>Innozilla Skins for Contact Form 7</em>" plugin won't execute
        because "<?php echo esc_html( implode( ', ', $missing_plugin_names ) ) ?>" plugin is not active.
        Please activate the plugin.
    </p>
</div>
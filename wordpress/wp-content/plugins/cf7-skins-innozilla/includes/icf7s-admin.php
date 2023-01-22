<?php

    /**
    * Description : Easy to use skins for Contact Form 7
    * Package : Innozilla Skins for Contact Form 7
    * Version : 1.0.0
    * Author : Innozilla
    */

	// Wordpress admin action hooks
	add_action('admin_menu', 'ICF7S_admin_sub_menu');
	add_action('admin_init','ICF7S_settings_init');
	

	//  Register Settings Sub Menu

	function ICF7S_admin_sub_menu() {
		add_submenu_page( 'wpcf7' , 'Innozilla Skins for Contact Form 7 - Settings', 'ICF7 Skins Settings', 'manage_options', 'icf7s-settings', 'iICF7S_admin_display_settings');
	}

	// Display Submenu - Callback

	function iICF7S_admin_display_settings() {
	?>
		<div class="wrap">

			<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

			<?php
				// Error Settings
				settings_errors();

				// Get options
				$options = get_option('icf7s_options');
				
			?>

			 <form action="options.php" method="post">

				<?php
					settings_fields( 'icf7s-dir-options' );
					do_settings_sections( 'icf7s-dir-options' );
				?>

				<table class="form-table icf7s-table">
					<tr valign="top">
						<h2>Instructions</h2>
						<h3 style="margin-bottom:0px; font-weight: 400;">1. The format of the form should be the same as below. </h3><br>

						<h4 style="margin-top:0px;">Contact form 7 Default Code</h4>
<pre>
<code style="display:table-cell; padding: 10px 20px;">&lt;label&gt;Your Name (required)
[text* your-name] &lt;/label&gt;
&lt;label&gt; Your Email (required)
[email* your-email] &lt;/label&gt;
&lt;label&gt; Subject
[text your-subject] &lt;/label&gt;
&lt;label&gt; Your Message
[textarea your-message] &lt;/label&gt;
[submit &quot;Send&quot;]
</code>
</pre>

<h3 style="margin-bottom:0px; font-weight: 400;">2. to add a custom style of the form please go to <b>Contact forms->Choose Contact form->Go to "Skin/Style - ICF7 Tab"</b> </h3><br>
<h3 style="margin-bottom:0px; font-weight: 400;">3. Add custom style and press "<b>Save"</b> </h3><br>
			</tr>

				</table>

				<?php
					// Submit Button
					//submit_button('Save Settings');
				?>
			</form>
		</div>
	<?php
	}

	/*  Register Custom Settings */

	function ICF7S_settings_init() {
		// Group name, Option Name
		register_setting( 'icf7s-dir-options', 'icf7s_options' );
	}

?>
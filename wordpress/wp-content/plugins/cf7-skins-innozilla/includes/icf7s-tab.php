<?php 

    /**
    * Description : Easy to use skins for Contact Form 7
    * Package : Innozilla Skins for Contact Form 7
    * Version : 1.0.0
    * Author : Innozilla
    */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



class ICF7S_Skin {

	/**
	 * Construct class
	 */
	public function __construct() {
		$this->plugin_url       = plugin_dir_url( __FILE__ );
		$this->plugin_path      = plugin_dir_path( __FILE__ );
		$this->version          = '1.0';
		$this->add_actions();
	}

	/**
	 * Add actions
	 */
	private function add_actions() {
		add_action( 'wpcf7_editor_panels', array( $this, 'add_panel' ) );
		add_action( 'wpcf7_after_save', array( $this, 'store_meta' ) );
		add_action( 'wpcf7_after_create', array( $this, 'duplicate_form_support' ) );
	}




	/**
	 * Adds a tab on contact form edit page
	 *
	 * @param array $panels an array of panels.
	 */
	public function add_panel( $panels ) {
		$panels['skin-panel'] = array(
			'title'     => __( 'Skin/Style - ICF7', 'icf7s-skin' ),
			'callback'  => array( $this, 'create_panel_inputs' ),
		);
		return $panels;
	}


	/**
	 * Create plugin fields
	 *
	 * @return array of plugin fields: name and type
	 */
	public function get_plugin_fields() {
		$fields = array(

			// GENERAL SETTING
			array(
				'name' => 'columns_icf7s',
				'type' => 'text',
			),
			array(
				'name' => 'maxwidth_icf7s',
				'type' => 'text',
			),
			array(
				'name' => 'form_center_icf7s',
				'type' => 'text',
			),
			array(
				'name' => 'form-bgcolor-icf7s',
				'type' => 'text',
			),

			// LABEL STYLE
			array(
				'name' => 'label-fs-icf7s',
				'type' => 'text',
			),
			array(
				'name' => 'label-fc-icf7s',
				'type' => 'text',
			),
			array(
				'name' => 'button_bold_icf7s',
				'type' => 'text',
			),

			// BORDER STYLE
			array(
				'name' => 'border-size-icf7s',
				'type' => 'text',
			),
			array(
				'name' => 'border-rad-icf7s',
				'type' => 'text',
			),
			array(
				'name' => 'field-bg-color-icf7s',
				'type' => 'text',
			),
			array(
				'name' => 'button_trans_icf7s',
				'type' => 'text',
			),
			array(
				'name' => 'border-color-icf7s',
				'type' => 'text',
			),
			array(
				'name' => 'fl-font-size-icf7s',
				'type' => 'text',
			),
			array(
				'name' => 'field-fc-icf7s',
				'type' => 'text',
			),		


			// PLACE HOLDER STYLE
			array(
				'name' => 'pl-sz-icf7s',
				'type' => 'text',
			),
			array(
				'name' => 'pl-fc-icf7s',
				'type' => 'text',
			),

			// Button Border Style
			array(
				'name' => 'bt-border-size-icf7s',
				'type' => 'text',
			),
			array(
				'name' => 'bt-border-rad-icf7s',
				'type' => 'text',
			),
			array(
				'name' => 'bt-border-color-icf7s',
				'type' => 'text',
			),
			array(
				'name' => 'bt-field-bg-color-icf7s',
				'type' => 'text',
			),
			array(
				'name' => 'button_style_trans_icf7s',
				'type' => 'text',
			),


			// Button Font Size
			array(
				'name' => 'bt-fsize-icf7s',
				'type' => 'text',
			),
			array(
				'name' => 'bt-fc-icf7s',
				'type' => 'text',
			),

			// Button Layout
			array(
				'name' => 'bt_maxwidth_icf7s',
				'type' => 'text',
			),
			array(
				'name' => 'button_center_icf7s',
				'type' => 'text',
			),


			//Validation
			array(
				'name' => 'vali-fsize-icf7s',
				'type' => 'text',
			),
			array(
				'name' => 'vali-fc-icf7s',
				'type' => 'text',
			),
			array(
				'name' => 'vali-b-color-icf7s',
				'type' => 'text',
			),
			array(
				'name' => 'vali-font-color-icf7s',
				'type' => 'text',
			),	

		);

		return $fields;
	}

	/**
	 * Get all fields values
	 *
	 * @param integer $post_id Form ID.
	 * @return array of fields values keyed by fields name
	 */
	public function get_fields_values( $post_id ) {
		$fields = $this->get_plugin_fields();

		foreach ( $fields as $field ) {
			$values[ $field['name'] ] = get_post_meta( $post_id, 'icf7s_skin_' . $field['name'] , true );
		}

		return $values;
	}

	/**
	 * Validate and store meta data
	 *
	 * @param object $contact_form ICF7S_ContactForm Object - All data that is related to the form.
	 */
	public function store_meta( $contact_form ) {
		if ( ! isset( $_POST ) || empty( $_POST ) ) {
			return;
		} else {
			if ( ! wp_verify_nonce( $_POST['icf7s_skin_page_metaboxes_nonce'], 'icf7s_skin_page_metaboxes' ) ) {
				return;
			}

			$form_id = $contact_form->id();
			$fields = $this->get_plugin_fields( $form_id );
			$data = $_POST['icf7s-skin'];

			foreach ( $fields as $field ) {
				$value = isset( $data[ $field['name'] ] ) ? $data[ $field['name'] ] : '';

				switch ( $field['type'] ) {
					case 'text':
						$value = sanitize_text_field( $value );
						break;
				}

				update_post_meta( $form_id, 'icf7s_skin_' . $field['name'], $value );
			}
		}
	}

	/**
	 * Copy skin page key and assign it to duplicate form
	 *
	 * @param object $contact_form ICF7S_ContactForm Object - All data that is related to the form.
	 */
	public function duplicate_form_support( $contact_form ) {
		$contact_form_id = $contact_form->id();

		if ( ! empty( $_REQUEST['post'] ) && ! empty( $_REQUEST['_wpnonce'] ) ) {
			$post_id = intval( $_REQUEST['post'] );

			$fields = $this->get_plugin_fields();

			foreach ( $fields as $field ) {
				update_post_meta( $contact_form_id, 'icf7s_skin_' . $field['name'], get_post_meta( $post_id, 'icf7s_skin_' . $field['name'], true ) );
			}
		}
	}


	/**
	 * Create the panel inputs
	 *
	 * @param  object $post Post object.
	 */
	public function create_panel_inputs( $post ) {

		wp_nonce_field( 'icf7s_skin_page_metaboxes', 'icf7s_skin_page_metaboxes_nonce' );
		$fields = $this->get_fields_values( $post->id() );
		
		$post_id = sanitize_text_field($_GET['post']);
		
		?>
		<div class="style-activation-wrap">
			<div class="inner-wrap">
				<h5>Activate Style <span class="bgbtn">
				<?php 
				if (isset($fields['form_activate'])) {
					$checkbox1 = $fields['form_activate'];
				}
				 ?>
				<input type="checkbox" name="icf7s-skin[form_activate]" class="ck" value="1" checked="checked" />
					</span>
					<small class="act-style">
						<span class="dashicons dashicons-lock"></span>
						This Feature is only available on our PRO VERSION. <span>Please <a href="https://innozilla.com/wordpress-plugins/contact-form-7-skins/#pro" target="_blank">click here</a> to purchase the PRO version of the plugin. (One time payment)</span>
						<br>
						<span class="add-info">- PRO VERSION also includes real time styling and many more. for questions or customization please email us at innozilla@gmail.com</span>
					</small>
				</h5>
			
			
		</div>
		<div class="icf7-admin-wrap">
			<div class="inner-coll">
				
				<fieldset>
					<h3><?php esc_html_e( 'Form Style Settings', 'icf7s-skin' );?></h3>
						<div class="second-coll">
							<br>
							<h2>General Setting</h2>
							<hr>
							<table class="form-table">
								
								<tbody>
									<tr>
										<tr>
											<th scope="row">
												<label><?php esc_html_e( 'No. of Column', 'icf7s-skin' );?></label>
											</th>
											<td>
												<?php 
												if (isset($fields['columns_icf7s'])) {
													$lbox = $fields['columns_icf7s'];
												}
												 ?>
												<div style="margin-bottom:5px">
												<input type="radio" name="icf7s-skin[columns_icf7s]" value="1" <?php checked('1', $lbox, true ); ?>  > 1 Column
												</div>
												<div style="margin-bottom:5px">
  												<input type="radio" name="icf7s-skin[columns_icf7s]" value="2" <?php checked('2', $lbox, true ); ?> > 2 Column
  												</div>
  												<div style="margin-bottom:5px">
  												<input type="radio" name="icf7s-skin[columns_icf7s]" value="3" <?php checked('3', $lbox, true ); ?> > 3 Column
  												</div>
  												<div>
  													<small><i>note: textarea will always be full width.</i></small>
  												</div>
											</td>
										</tr>
										<!--Form Width-->
										<tr>
											<th scope="row">
												<label><?php esc_html_e( 'Form Width', 'icf7s-skin' );?></label>
											</th>
											<td>
												<div class="range-slider rs1">
													<?php 
													if (isset($fields['maxwidth_icf7s'])) {
														$form_full = $fields['maxwidth_icf7s'];
													}
													 ?>
												  <input class="range-slider__range rsr1" type="range" name="icf7s-skin[maxwidth_icf7s]" value="<?php ( $form_full ) ? print "$form_full" : print "100" ; ?>" min="0" max="100">
												  <span class="range-slider__value rsv1">0</span>
												</div>
											</td>
										</tr>
										<!--Form Center-->
										<tr>
											<th scope="row">
												<label><?php esc_html_e( 'Form Align Center', 'icf7s-skin' );?></label>
											</th>
											<td>
												<?php 
												if (isset($fields['form_center_icf7s'])) {
													$checkbox1 = $fields['form_center_icf7s'];
												}
												 ?>
												<input type="checkbox" name="icf7s-skin[form_center_icf7s]" class="ck" value="0" <?php checked(1, $checkbox1, true); ?>  />
											</td>
										</tr>
										<!--Form Background Color-->
										<tr>
											<th scope="row">
												<label><?php esc_html_e( 'Form Background Color', 'icf7s-skin' );?></label>
											</th>
											<td>
												<input type="text" name="icf7s-skin[form-bgcolor-icf7s]" id="form-bgcolor-icf7s" value="<?php echo ( isset($fields['form-bgcolor-icf7s']) ? esc_attr( $fields['form-bgcolor-icf7s'] ) : '' ); ?>" style="display: none;">
											</td>
										</tr>
									</tr>
								</tbody>
							</table>
							<!-- COLUMN 2 -->
							<br>
							<h2>Form Setting</h2>
							<small>(Field Color, Font size, Borders etc.)</small>
							<hr>

							<!-- LABEL STYLE -->
							<h4>LABEL STYLE</h4>
							<small>(This will be the style for each title on the fields.)</small>
								<table class="form-table">
									
									<tbody>
										<tr>
											<th scope="row">
												<label><?php esc_html_e( 'Title Font Size', 'icf7s-skin' );?></label>
											</th>
											<td>
												<input type="number" class="large-text" placeholder="16" name="icf7s-skin[label-fs-icf7s]" value="<?php echo ( isset($fields['label-fs-icf7s']) ? esc_attr( $fields['label-fs-icf7s'] ) : '' ); ?>" style="max-width: 60px;">
												<small>(ex. 18 default size: 16;)</small>
											</td>
										</tr>
										<tr>
											<th scope="row">
												<label><?php esc_html_e( 'Title Font Color', 'icf7s-skin' );?></label>
											</th>
											<td>
												<input type="text" name="icf7s-skin[label-fc-icf7s]" id="label-fc-icf7s" value="<?php echo ( isset($fields['label-fc-icf7s']) ? esc_attr( $fields['label-fc-icf7s'] ) : '' ); ?>" style="display: none;">
											</td>
										</tr>
										<!--Label font weight-->
										<tr>
											<th scope="row">
												<label><?php esc_html_e( 'Make Title Bold', 'icf7s-skin' );?></label>
											</th>
											<td>
												<?php 
												if (isset($fields['button_bold_icf7s'])) {
													$checkbox2 = $fields['button_bold_icf7s'];
												}
												 ?>
												<input type="checkbox" name="icf7s-skin[button_bold_icf7s]" class="ck" value="0" <?php checked(1, $checkbox2, true); ?>  />
											</td>
										</tr>
									</tbody>

								</table>
							<!-- FIELD STYLE -->
							<h4>FIELD STYLE</h4>
							<small>(This will be the style for all input, textrea fields.)</small>
								<table class="form-table">
									<!-- Border Style -->
									<tbody>
										<tr>
											<th scope="row">
												<label><?php esc_html_e( 'Border Style', 'icf7s-skin' );?></label>
											</th>
											<td>
												<input type="number" class="large-text" placeholder="1" name="icf7s-skin[border-size-icf7s]" value="<?php echo ( isset($fields['border-size-icf7s']) ? esc_attr( $fields['border-size-icf7s'] ) : '' ); ?>" style="max-width: 60px;">
												<small> Border Size</small>
											</td>

											<td>
												<input type="number" class="large-text" placeholder="1" name="icf7s-skin[border-rad-icf7s]" value="<?php echo ( isset($fields['border-rad-icf7s']) ? esc_attr( $fields['border-rad-icf7s'] ) : '' ); ?>" style="max-width: 60px;">
												<small> Border Radius</small>
											</td>
											<td>
												<input type="text" name="icf7s-skin[border-color-icf7s]" id="border-color-icf7s" value="<?php echo ( isset($fields['border-color-icf7s']) ? esc_attr( $fields['border-color-icf7s'] ) : '' ); ?>" style="display: none;">
												<small> Border Color</small>
											</td>
										</tr>
										<tr>
											<th scope="row">
												<label><?php esc_html_e( 'Field Background', 'icf7s-skin' );?></label>
											</th>
											<td>
												<input type="text" name="icf7s-skin[field-bg-color-icf7s]" id="field-bg-color-icf7s" value="<?php echo ( isset($fields['field-bg-color-icf7s']) ? esc_attr( $fields['field-bg-color-icf7s'] ) : '' ); ?>" style="display: none;">
												<small> Background Color</small>
											</td>
											<td>
												<?php 
												if ( isset( $fields['button_trans_icf7s'] ) ) {
													$checkbox2 = $fields['button_trans_icf7s'];
												}
												
												 ?>
												<input type="checkbox" name="icf7s-skin[button_trans_icf7s]" class="ck" value="0" <?php checked(1, $checkbox2, true); ?>  />
												<small>Transparent</small>
											</td>

										</tr>
									</tbody>

									<!-- Field Font Style -->
									<tbody>
										<tr>
											<th scope="row">
												<label><?php esc_html_e( 'Field Font Style', 'icf7s-skin' );?></label>
											</th>
											<td>
												<input type="number" class="large-text" placeholder="16" name="icf7s-skin[fl-font-size-icf7s]" value="<?php echo ( isset($fields['fl-font-size-icf7s']) ? esc_attr( $fields['fl-font-size-icf7s'] ) : '' ); ?>" style="max-width: 60px;">
												<small> Font Size</small>
											</td>
											<td>
												<input type="text" name="icf7s-skin[field-fc-icf7s]" id="field-fc-icf7s" value="<?php echo ( isset($fields['field-fc-icf7s']) ? esc_attr( $fields['field-fc-icf7s'] ) : '' ); ?>" style="display: none;">
												<small> Font Color</small>
											</td>
										</tr>
									</tbody>

									<!-- Placeholder Font Style -->
									<tbody>
										<tr>
											<th scope="row">
												<label><?php esc_html_e( 'Placefolder Field Font Style', 'icf7s-skin' );?></label>
											</th>
											<td>
												<input type="number" class="large-text" placeholder="16" name="icf7s-skin[pl-sz-icf7s]" value="<?php echo ( isset($fields['pl-sz-icf7s']) ? esc_attr( $fields['pl-sz-icf7s'] ) : '' ); ?>" style="max-width: 60px;">
												<small> Font Size</small>
											</td>
											<td>
												<input type="text" name="icf7s-skin[pl-fc-icf7s]" id="pl-fc-icf7s" value="<?php echo ( isset($fields['pl-fc-icf7s']) ? esc_attr( $fields['pl-fc-icf7s'] ) : '' ); ?>" style="display: none;">
												<small> Font Color</small>
											</td>
										</tr>
									</tbody>
									

								</table>
							<!-- Button Settings -->
							<h4>BUTTON STYLE</h4>
							<small>(Overall button appearance)</small>
								<table class="form-table">
									<!-- Border Style -->
									<tbody>
										<tr>
											<th scope="row">
												<label><?php esc_html_e( 'Border Style', 'icf7s-skin' );?></label>
											</th>
											<td>
												<input type="number" class="large-text" placeholder="1" name="icf7s-skin[bt-border-size-icf7s]" value="<?php echo ( isset($fields['bt-border-size-icf7s']) ? esc_attr( $fields['bt-border-size-icf7s'] ) : '' ); ?>" style="max-width: 60px;">
												<small> Border Size</small>
											</td>

											<td>
												<input type="number" class="large-text" placeholder="1" name="icf7s-skin[bt-border-rad-icf7s]" value="<?php echo ( isset($fields['bt-border-rad-icf7s']) ? esc_attr( $fields['bt-border-rad-icf7s'] ) : '' ); ?>" style="max-width: 60px;">
												<small> Border Radius</small>
											</td>

											<td>
												<input type="text" name="icf7s-skin[bt-border-color-icf7s]" id="bt-border-color-icf7s" value="<?php echo ( isset($fields['bt-border-color-icf7s']) ? esc_attr( $fields['bt-border-color-icf7s'] ) : '' ); ?>" style="display: none;">
												<small> Border Color</small>
											</td>
										</tr>
										<tr>
											<th scope="row">
												<label><?php esc_html_e( 'Button Background', 'icf7s-skin' );?></label>
											</th>
											<td>
												<input type="text" name="icf7s-skin[bt-field-bg-color-icf7s]" id="bt-field-bg-color-icf7s" value="<?php echo ( isset($fields['bt-field-bg-color-icf7s']) ? esc_attr( $fields['bt-field-bg-color-icf7s'] ) : '' ); ?>" style="display: none;">
												<small> Background Color</small>
											</td>
											<td>
												<?php 
												if (isset($fields['button_style_trans_icf7s'])) {
													$checkbox2 = $fields['button_style_trans_icf7s'];
												}
												 ?>
												<input type="checkbox" name="icf7s-skin[button_style_trans_icf7s]" class="ck" value="0" <?php checked(1, $checkbox2, true); ?>  />
												<small>Transparent</small>
											</td>
											

										</tr>

									<!-- Button Field Font Style -->
										<tr>
											<th scope="row">
												<label><?php esc_html_e( 'Button Font Style', 'icf7s-skin' );?></label>
											</th>
											<td>
												<input type="number" class="large-text" placeholder="16" name="icf7s-skin[bt-fsize-icf7s]" value="<?php echo ( isset($fields['bt-fsize-icf7s']) ? esc_attr( $fields['bt-fsize-icf7s'] ) : '' ); ?>" style="max-width: 60px;">
												<small> Font Size</small>
											</td>
											<td>
												<input type="text" name="icf7s-skin[bt-fc-icf7s]" id="bt-fc-icf7s" value="<?php echo ( isset($fields['bt-fc-icf7s']) ? esc_attr( $fields['bt-fc-icf7s'] ) : '' ); ?>" style="display: none;">
												<small> Font Color</small>
											</td>
										</tr>
										<!--Button Form Width-->
										<tr>
											<th scope="row">
												<label><?php esc_html_e( 'Button Max Width', 'icf7s-skin' );?></label>
											</th>
											<td colspan="3">
												<div class="range-slider rs2">
													<?php 
													if (isset($fields['bt_maxwidth_icf7s'])) {
														$form_full = $fields['bt_maxwidth_icf7s'];
													}
													 ?>
												  <input class="range-slider__range rsr2" type="range" name="icf7s-skin[bt_maxwidth_icf7s]" value="<?php ( $form_full ) ? print "$form_full" : print "15" ; ?>" min="0" max="100">
												  <span class="range-slider__value rsv2">0</span>
												</div>
											</td>
										</tr>
										<!--Button Center-->
										<tr>
											<th scope="row">
												<label><?php esc_html_e( 'Button Align Center', 'icf7s-skin' );?></label>
											</th>
											<td>
												<?php 
												if (isset($fields['button_center_icf7s'])) {
													$checkbox3 = $fields['button_center_icf7s'];
												}
												 ?>
												<input type="checkbox" name="icf7s-skin[button_center_icf7s]" class="ck" value="1" <?php checked(1, $checkbox3, true); ?>  />
											</td>
										</tr>
									</tbody>


								</table>

							<!-- Validation Settings -->
							<h4>VALIDATION STYLE</h4>
							<small>(Overall validation appearance)</small>
								<table class="form-table">
									<!-- Border Style -->
									<tbody>
										<tr>
											<th scope="row">
												<label><?php esc_html_e( 'Fail Validation', 'icf7s-skin' );?></label>
											</th>
											<td>
												<input type="number" class="large-text" placeholder="16" name="icf7s-skin[vali-fsize-icf7s]" value="<?php echo ( isset($fields['vali-fsize-icf7s']) ? esc_attr( $fields['vali-fsize-icf7s'] ) : '' ); ?>" style="max-width: 60px;">
												<small> Font Size</small>
											</td>
											<td>
												<input type="text" name="icf7s-skin[vali-fc-icf7s]" id="vali-fc-icf7s" value="<?php echo ( isset($fields['vali-fc-icf7s']) ? esc_attr( $fields['vali-fc-icf7s'] ) : '' ); ?>" style="display: none;">
												<small> Font Color</small>
											</td>
										</tr>
										<tr>
											<th scope="row">
												<label><?php esc_html_e( 'Validation Button Message', 'icf7s-skin' );?></label>
											</th>
											<td>
												<input type="text" name="icf7s-skin[vali-b-color-icf7s]" id="vali-b-color-icf7s" value="<?php echo ( isset($fields['vali-b-color-icf7s']) ? esc_attr( $fields['vali-b-color-icf7s'] ) : '' ); ?>" style="display: none;">
												<small> Border Color</small>
											</td>
											<td>
												<input type="text" name="icf7s-skin[vali-font-color-icf7s]" id="vali-font-color-icf7s" value="<?php echo ( isset($fields['vali-font-color-icf7s']) ? esc_attr( $fields['vali-font-color-icf7s'] ) : '' ); ?>" style="display: none;">
												<small> Font Color</small>
											</td>
										</tr>
									</tbody>
								</table>
								<hr>
								<div style="margin-top: 20px;">
									<button type="reset" onclick="resetSkins()" class="button-secondary">Reset Style</button>
									<button type="submit" value="Save" class="button-primary" style="margin-left:5px; float: right;">Save</button>
									<small class="reset-inst">Please click <b>"Save"</b> to reset the style. </small>
								</div>
								<script type="text/javascript">
									function resetSkins() {
										jQuery(document).ready(function($) {
											
											if (confirm('Are you sure you want to reset the style?')) {
												$(".second-coll input").each(function() {
											        $(this).removeAttr('value');
											        $('.rsr1').attr('value','100');
											        $('.rsv1').html('100%');
											        $('.rsr2').attr('value','15');
											        $('.rsv2').html('15%');
											    });
											    $(".reset-inst").slideDown("slow");
											} else {
												
											}
										});
									}
								</script>	
							
						</div>
					</fieldset>
					
			</div>
			<div class="inner-coll">
				<h3>Form Preview </h3>
				<div style="margin:30 0px;">
					<?php echo do_shortcode('[contact-form-7 id="' . $post_id . '" ]'); ?>
				</div>
			</div>
		</div>
	<?php $path = untrailingslashit( plugins_url( '', ICF7S_PLUGIN ) ); ?>
	<style type="text/css">	
		.tzCBPart {
			background:url('<?php echo $path; ?>/images/background.png; ') no-repeat left bottom;
		}
		.tzCheckBox{
			background:url('<?php echo $path; ?>/images/background.png; ') no-repeat right bottom;
		}
	</style>
		
	<?php

	}

}


$cf7_skin = new ICF7S_skin();

?>
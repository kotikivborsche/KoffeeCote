<?php 

    /**
    * Description : Easy to use skins for Contact Form 7
    * Package : Innozilla Skins for Contact Form 7
    * Version : 1.0.0
    * Author : Innozilla
    */

// front end enqueue

function icf7s_sript_enqueue() {  

    $icf7s_option = get_option( 'icf7s_options' );
    wp_enqueue_script( 'filter_js_icf7s', ICF7S_PLUGIN_URL . '/js/icf7s_configure.js', array('jquery') );
    wp_enqueue_style( 'font_style_js_icf7s', ICF7S_PLUGIN_URL . '/css/front_style.css' );
    wp_localize_script('filter_js_icf7s', 'icf7s_option', $icf7s_option );

}
add_action('wp_enqueue_scripts', 'icf7s_sript_enqueue', 11);


// admin enqueue

function icf7s_load_custom_wp_admin_style() {
    wp_enqueue_style( 'color-picker-sprecturm-style', ICF7S_PLUGIN_URL . '/css/spectrum.css' );
    wp_enqueue_style( 'icf7s-admin-style', ICF7S_PLUGIN_URL . '/css/admin_style.css' );
    wp_enqueue_script( 'color-picker-sprecturm-script', ICF7S_PLUGIN_URL . '/js/spectrum.js' );
    wp_enqueue_script( 'icf7s-admin-script', ICF7S_PLUGIN_URL . '/js/icf7s_configure_admin.js' );
    wp_enqueue_script( 'filter_js_icf7s', ICF7S_PLUGIN_URL . '/js/icf7s_configure.js', array('jquery') );
}
add_action( 'admin_enqueue_scripts', 'icf7s_load_custom_wp_admin_style' );


// 
function custom_skin_query_icf7s() {

    $args = array(
            'post_type' => 'wpcf7_contact_form', 
            'posts_per_page' => -1
        );
    $rs = array();

    if( $data = get_posts($args)){

    foreach($data as $key){

        $meta = get_post_meta( $key->ID );
        $ID = (explode(" ",$key->ID));
        $pc = ".icf7s-" . $ID[0];

        // General Setting

        if (isset($meta['icf7s_skin_columns_icf7s'][0])) {
            $form_column = $meta['icf7s_skin_columns_icf7s'][0];
        }
        if (isset($meta['icf7s_skin_maxwidth_icf7s'][0])) {
            $form_width = $meta['icf7s_skin_maxwidth_icf7s'][0];
        }
        if (isset($meta['icf7s_skin_form_center_icf7s'][0])) {
            $form_center = $meta['icf7s_skin_form_center_icf7s'][0];
        }
        if (isset($meta['icf7s_skin_form-bgcolor-icf7s'][0])) {
            $form_bg_color = $meta['icf7s_skin_form-bgcolor-icf7s'][0];
        }

        // Label Style
        if (isset($meta['icf7s_skin_label-fs-icf7s'][0])) {
            $title_font_size = $meta['icf7s_skin_label-fs-icf7s'][0];
        }
        if (isset($meta['icf7s_skin_label-fc-icf7s'][0])) {
            $title_font_color = $meta['icf7s_skin_label-fc-icf7s'][0];
        }
        if (isset($meta['icf7s_skin_button_bold_icf7s'][0])) {
            $title_font_bold = $meta['icf7s_skin_button_bold_icf7s'][0];
        }

        // Field Style
        if (isset($meta['icf7s_skin_border-size-icf7s'][0])) {
            $f_border_size = $meta['icf7s_skin_border-size-icf7s'][0];
        }
        if (isset($meta['icf7s_skin_border-rad-icf7s'][0])) {
            $f_border_rad = $meta['icf7s_skin_border-rad-icf7s'][0];
        }
        if (isset($meta['icf7s_skin_border-color-icf7s'][0])) {
            $f_border_color = $meta['icf7s_skin_border-color-icf7s'][0];
        }
        if (isset($meta['icf7s_skin_field-bg-color-icf7s'][0])) {
            $f_bg_color = $meta['icf7s_skin_field-bg-color-icf7s'][0];
        }
        if (isset($meta['icf7s_skin_button_trans_icf7s'][0])) {
            $f_bg_trans_color = $meta['icf7s_skin_button_trans_icf7s'][0];
        }
        if (isset($meta['icf7s_skin_fl-font-size-icf7s'][0])) {
            $f_font_size = $meta['icf7s_skin_fl-font-size-icf7s'][0];
        }
        if (isset($meta['icf7s_skin_field-fc-icf7s'][0])) {
            $f_font_color = $meta['icf7s_skin_field-fc-icf7s'][0];
        }
        if (isset($meta['icf7s_skin_pl-sz-icf7s'][0])) {
            $pl_font_size = $meta['icf7s_skin_pl-sz-icf7s'][0];
        }
        if (isset($meta['icf7s_skin_pl-fc-icf7s'][0])) {
            $pl_font_color = $meta['icf7s_skin_pl-fc-icf7s'][0];
        }

        // Button Style
        if (isset($meta['icf7s_skin_bt-border-size-icf7s'][0])) {
            $bt_border_size = $meta['icf7s_skin_bt-border-size-icf7s'][0];
        }
        if (isset($meta['icf7s_skin_bt-border-rad-icf7s'][0])) {
            $bt_border_rad = $meta['icf7s_skin_bt-border-rad-icf7s'][0];
        }
        if (isset($meta['icf7s_skin_bt-border-color-icf7s'][0])) {
            $bt_border_color = $meta['icf7s_skin_bt-border-color-icf7s'][0];
        }
        if (isset($meta['icf7s_skin_bt-field-bg-color-icf7s'][0])) {
            $bt_bg_color = $meta['icf7s_skin_bt-field-bg-color-icf7s'][0];
        }
        if (isset($meta['icf7s_skin_bt-fsize-icf7s'][0])) {
            $bt_font_size = $meta['icf7s_skin_bt-fsize-icf7s'][0];
        }
        if (isset($meta['icf7s_skin_bt-fc-icf7s'][0])) {
            $bt_font_color = $meta['icf7s_skin_bt-fc-icf7s'][0];
        }
        if (isset($meta['icf7s_skin_button_center_icf7s'][0])) {
            $bt_center = $meta['icf7s_skin_button_center_icf7s'][0];
        }
        if (isset($meta['icf7s_skin_bt_maxwidth_icf7s'][0])) {
            $bt_mx_width = $meta['icf7s_skin_bt_maxwidth_icf7s'][0];
        }
        if (isset($meta['icf7s_skin_vali-fsize-icf7s'][0])) {
            $valid_font_size = $meta['icf7s_skin_vali-fsize-icf7s'][0];
        }
        if (isset($meta['icf7s_skin_vali-fc-icf7s'][0])) {
            $valid_font_color = $meta['icf7s_skin_vali-fc-icf7s'][0];
        }
        if (isset($meta['icf7s_skin_button_style_trans_icf7s'][0])) {
            $button_styl_trans_icf7s = $meta['icf7s_skin_button_style_trans_icf7s'][0];
        }

        if (isset($meta['icf7s_skin_vali-b-color-icf7s'][0])) {
            $valid_b_border_color = $meta['icf7s_skin_vali-b-color-icf7s'][0];
        }
        if (isset($meta['icf7s_skin_vali-font-color-icf7s'][0])) {
            $valid_b_font_color = $meta['icf7s_skin_vali-font-color-icf7s'][0];
        }


     ?>

<style type="text/css">


    .wpcf7<?php echo $pc; ?> :hover, 
    .wpcf7<?php echo $pc; ?> :active, 
    .wpcf7<?php echo $pc; ?> :focus{
        outline: 0;
        outline: none;
        box-shadow: none;
    }
    .wpcf7<?php echo $pc; ?> {
        max-width: <?php ($form_width) ? print($form_width) : print '100';  ?>%;
        height: inherit;
        display: inline-block;
        padding: 20px;
        <?php if ( $form_bg_color ) { ?> background-color: <?php echo $form_bg_color; ?>;<?php } ?>
        <?php if ( $form_center ) { ?> margin: 0 auto; display: block; <?php } ?>
    }
    .wpcf7<?php echo $pc; ?> p {
        padding: 0px;
    }
    .wpcf7<?php echo $pc; ?> label {
        width: 100%;
        display: inline-block;
        font-size: <?php ($title_font_size) ? print($title_font_size) : print '16' ; ?>px;
        color: <?php ($title_font_color) ? print($title_font_color) : print '#444' ; ?>;
        <?php if ($title_font_bold){ ?> font-weight: bold; <?php } ?>
        line-height: 100%;
        font-family: sans-serif;
        cursor: inherit;
        margin-bottom: 15px;
    }
    .wpcf7<?php echo $pc; ?> br {
        display: none;
    }
    .wpcf7<?php echo $pc; ?> .wpcf7-range {
        width: 100%;
        min-height: 40px;
    }

    .wpcf7<?php echo $pc; ?> label.text-area-full {
        width: 100%;
    }
    /* 1.1.3 Update */
    .wpcf7<?php echo $pc; ?> label .wpcf7-list-item-label{
        margin: 0;
    }
    .wpcf7<?php echo $pc; ?> .wpcf7-list-item.first {
        margin: 0;
    }
    .wpcf7<?php echo $pc; ?> label .wpcf7-list-item {
        margin-bottom: 0;
    }
    .wpcf7<?php echo $pc; ?> .wpcf7-list-item-label {
        display: inline-block;
        font-size: <?php ($title_font_size) ? print($title_font_size) : print '16' ; ?>px;
        color: <?php ($title_font_color) ? print($title_font_color) : print '#444' ; ?>;
        <?php if ($title_font_bold){ ?> font-weight: bold; <?php } ?>
        line-height: 100%;
        font-family: sans-serif;
        cursor: inherit;
        margin-bottom: 15px;
        font-style: initial;
    }
    .wpcf7<?php echo $pc; ?> .wpcf7-checkbox input[type=checkbox] {
        transform: scale(1.2);
        margin: 0 10px;
        position: relative;
        top: -2px;
    }
    .wpcf7<?php echo $pc; ?> .wpcf7-acceptance .wpcf7-list-item {
        margin: 0;
    }
    .wpcf7<?php echo $pc; ?> label input[type=checkbox] {
        transform: scale(1.2);
        margin-top: 0px;
        margin-right: 10px;
    }
    /* end of 1.1.3 Update */
    .wpcf7<?php echo $pc; ?> label input,
    .wpcf7<?php echo $pc; ?> label textarea,
    .wpcf7<?php echo $pc; ?> label select {
        margin-top: 10px;
        font-family: sans-serif;
        padding: 5px 10px;
    }
    .wpcf7<?php echo $pc; ?> label .wpcf7-text,
    .wpcf7<?php echo $pc; ?> label .wpcf7-textarea,
    .wpcf7<?php echo $pc; ?> label .wpcf7-number,
    .wpcf7<?php echo $pc; ?> label .wpcf7-date,
    .wpcf7<?php echo $pc; ?> label .wpcf7-select {     
        min-height: 40px;
        height: inherit;
        background-color:<?php if($f_bg_trans_color == 1 ) { ?> rgba(255, 255, 255, 0); <?php  } else { ($f_bg_color) ? print($f_bg_color) : print '#fff' ; } ?>;
        border-width: <?php ($f_border_size) ? print($f_border_size) : print '1' ; ?>px;
        border-color: <?php ($f_border_color) ? print($f_border_color) : print '#444' ; ?>;
        border-style: solid;
        border-radius: <?php ($f_border_rad) ? print($f_border_rad) : print '0' ; ?>px;
        color: <?php ($f_font_color) ? print($f_font_color) : print '#444' ; ?>;
        width: 100%;
        font-size:<?php ($f_font_size) ? print($f_font_size) : print '16' ; ?>px;
        font-weight: 400;
        box-shadow: none;
    }

    .wpcf7<?php echo $pc; ?> label .wpcf7-text::placeholder,
    .wpcf7<?php echo $pc; ?> label .wpcf7-text::-webkit-input-placeholder,
    .wpcf7<?php echo $pc; ?> label .wpcf7-textarea::placeholder,
    .wpcf7<?php echo $pc; ?> label .wpcf7-textarea::-webkit-input-placeholder,
    .wpcf7<?php echo $pc; ?> label .wpcf7-number::placeholder,
    .wpcf7<?php echo $pc; ?> label .wpcf7-number::-webkit-input-placeholder,
    .wpcf7<?php echo $pc; ?> label .wpcf7-date::placeholder,
    .wpcf7<?php echo $pc; ?> label .wpcf7-date::-webkit-input-placeholder,
    .wpcf7<?php echo $pc; ?> label .wpcf7-select::placeholder,
    .wpcf7<?php echo $pc; ?> label .wpcf7-select::-webkit-input-placeholder { 
        font-size:<?php ($pl_font_size) ? print($pl_font_size) : print '16' ; ?>px;
        color: <?php ($pl_font_color) ? print($pl_font_color) : print '#ababab' ; ?>;
    }


    .wpcf7<?php echo $pc; ?> label .wpcf7-file {
        font-size: 16px;
    }
    .wpcf7<?php echo $pc; ?> label .wpcf7-checkbox,
    .wpcf7<?php echo $pc; ?> label .wpcf7-radio {
        width: 100%;
        display: inline-block;
        margin-top: 10px;
    }
    .wpcf7<?php echo $pc; ?> label .wpcf7-checkbox .wpcf7-list-item,
    .wpcf7<?php echo $pc; ?> label .wpcf7-radio .wpcf7-list-item {
        width: 40%;
        float: left;
        font-size: 16px;
        position: relative;
        margin-bottom: 10px;
        left: 30px;
        margin-right: 10%;
        height: 35px;
        display: table;
    }
    .wpcf7<?php echo $pc; ?> label .wpcf7-checkbox .wpcf7-list-item label,
    .wpcf7<?php echo $pc; ?> label .wpcf7-radio .wpcf7-list-item label {
        width: 100%;
    }
    .wpcf7<?php echo $pc; ?> label .wpcf7-checkbox .wpcf7-list-item .wpcf7-list-item-label,
    .wpcf7<?php echo $pc; ?> label .wpcf7-radio .wpcf7-list-item .wpcf7-list-item-label,
    .wpcf7<?php echo $pc; ?> label .wpcf7-checkbox .wpcf7-list-item label,
    .wpcf7<?php echo $pc; ?> label .wpcf7-radio .wpcf7-list-item label {
        vertical-align: middle;
        display: table-cell;
        float:  none;
    }

    .wpcf7<?php echo $pc; ?> label .wpcf7-checkbox .wpcf7-list-item input,
    .wpcf7<?php echo $pc; ?> label .wpcf7-radio .wpcf7-list-item input {
        position: absolute;
        left: -25px;
        top: 10px;
        margin: 0;
    }
    .wpcf7<?php echo $pc; ?> label .wpcf7-select[multiple] {
        min-height: 55px;
    }
    .wpcf7<?php echo $pc; ?> label .wpcf7-date {
        display: block;
        padding: 0.5rem 1rem;
    }
    .wpcf7<?php echo $pc; ?> label .wpcf7-number {
        max-width: 100px;
        text-align: center;
    }
    .wpcf7<?php echo $pc; ?> label .wpcf7-textarea {
        max-height: 250px;
        resize: vertical;
        height: inherit;
    }

    /* button */
    .wpcf7<?php echo $pc; ?> .icf7s-button {
        width: 100%;
        display: inline-block;
    }
    .wpcf7<?php echo $pc; ?> .icf7s-button .wpcf7-submit {
        border: 1px solid #fff;
        border-width: <?php ($bt_border_size) ? print($bt_border_size) : print '1' ; ?>px;
        border-radius: <?php ($bt_border_rad) ? print($bt_border_rad) : print '1' ; ?>px;
        border-style: solid;
        border-color: <?php ($bt_border_color) ? print($bt_border_color) : print '#444' ; ?>;
        background-color: <?php if( $button_styl_trans_icf7s == 1 ) { ?> rgba(255, 255, 255, 0); <?php  } else { ($bt_bg_color) ? print($bt_bg_color) : print '#444' ; } ?>;
        font-size:<?php ($bt_font_size) ? print($bt_font_size) : print '16' ; ?>px;
        color: <?php ($bt_font_color) ? print($bt_font_color) : print '#fff' ; ?>;
        width: 100%;
        <?php if ( $bt_center ) { ?> margin: 0 auto; display: block; <?php } ?>
        max-width: <?php ($bt_mx_width) ? print($bt_mx_width) : print '15';  ?>%;
        min-width: 95px;
        padding: 5px 0px;
        height: 100px;
        cursor: pointer;
        height: 40px;
        font-weight: 500;
        -webkit-transition: opacity .3s ease-in-out;
        -moz-transition: opacity .3s ease-in-out;
        -ms-transition: opacity .3s ease-in-out;
        -o-transition: opacity .3s ease-in-out;
        transition: opacity .3s ease-in-out;
    }
    .wpcf7<?php echo $pc; ?> .icf7s-button .wpcf7-submit:hover {
        opacity: 0.8;
    }

    /* validation */
    .wpcf7<?php echo $pc; ?> .wpcf7-not-valid-tip {
        margin-top: 15px;
        font-size: <?php ($valid_font_size) ? print($valid_font_size) : print '16' ; ?>px;
        color: <?php ($valid_font_color) ? print($valid_font_color) : print '#f00' ; ?>;
        display: block;
    }
    .wpcf7<?php echo $pc; ?> .wpcf7-response-output {
        font-family: sans-serif;
        border-color: <?php ($valid_b_border_color) ? print($valid_b_border_color) : print '#f7e700' ; ?>;
        color: <?php ($valid_b_font_color) ? print($valid_b_font_color) : print '#444' ; ?>;
    }


    /* range style */

    .wpcf7<?php echo $pc; ?> label input[type="range"] {
        width: 100%;
        margin: 0px;
        padding: 8px 0px;
        outline: none;
        background-color: transparent;
        -webkit-appearance: none;
        margin-top: 10px;
    }

    .wpcf7<?php echo $pc; ?> label input[type="range"]:focus {
        outline: none;
    }

    .wpcf7<?php echo $pc; ?> label input[type="range"]::-webkit-slider-runnable-track {
        width: 100%;
        height: 4px;
        background: #CCC;
        border-radius: 7px;
        cursor: pointer;
    }

    .wpcf7<?php echo $pc; ?> label input[type="range"]:focus::-webkit-slider-runnable-track {
        background:<?php ($f_font_color) ? print($f_font_color) : print '#444' ; ?>;
    }

    .wpcf7<?php echo $pc; ?> label input[type="range"]::-webkit-slider-thumb {
        height: 18px;
        width: 18px;
        margin-top: -7px;
        border:1px solid <?php ($f_font_color) ? print($f_font_color) : print '#444' ; ?>;
        background:<?php ($f_font_color) ? print($f_font_color) : print '#444' ; ?>;
        border-radius: 50%;
        cursor: pointer;
        -webkit-appearance: none;
    }

    .wpcf7<?php echo $pc; ?> label input[type="range"]::-moz-range-thumb {
        height: 18px;
        width: 18px;
        border:1px solid <?php ($f_font_color) ? print($f_font_color) : print '#444' ; ?>;
        background: <?php ($f_font_color) ? print($f_font_color) : print '#444' ; ?>;
        border-radius: 50%;
        cursor: pointer;
    }

    .wpcf7<?php echo $pc; ?> label input[type="range"]::-moz-range-track {
        width: 100%;
        height: 4px;
        background: #CCC;
        border-radius: 7px;
        cursor: pointer;
    }

    .wpcf7<?php echo $pc; ?> label input[type="range"]:focus::-moz-range-track {
        background:#00AD7A;
    }

    .wpcf7<?php echo $pc; ?> label input[type="range"]::-ms-thumb {
        height: 18px;
        width: 18px;
        border:1px solid <?php ($f_font_color) ? print($f_font_color) : print '#444' ; ?>;
        background: <?php ($f_font_color) ? print($f_font_color) : print '#444' ; ?>;
        border-radius: 50%;
        cursor: pointer;
    }

    .wpcf7<?php echo $pc; ?> label input[type="range"]::-ms-track {
        width: 100%;
        height: 4px;
        color: transparent;
        border-width: 16px 0;
        border-color: transparent;
        background: transparent;
        cursor: pointer;
    }

    .wpcf7<?php echo $pc; ?> label input[type="range"]::-ms-fill-lower {
        background: #CCC;
        border-radius: 3px;
    }

    .wpcf7<?php echo $pc; ?> label input[type="range"]::-ms-fill-upper {
        background: #CCC;
        border-radius: 3px;
    }

    .wpcf7<?php echo $pc; ?> label input[type="range"]:focus::-ms-fill-lower {
        background: <?php ($f_font_color) ? print($f_font_color) : print '#444' ; ?>;
    }

    .wpcf7<?php echo $pc; ?> label input[type="range"]:focus::-ms-fill-upper {
        background:<?php ($f_font_color) ? print($f_font_color) : print '#444' ; ?>;
    }

    <?php 
    // conditions
                if ( $form_column == 1 ) { ?>
                .wpcf7<?php echo $pc; ?> label {
                    width:100%;
                }
                .wpcf7<?php echo $pc; ?> {
                    width: -webkit-fill-available;
                }
        <?php } else if ( $form_column == 2 ) { ?>
                .wpcf7<?php echo $pc; ?> {
                    width: -webkit-fill-available;
                }
                .wpcf7<?php echo $pc; ?> label {
                    width: 48%;
                    margin-right: 2%;
                    float: left;
                }
                .wpcf7<?php echo $pc; ?> label.text-area-full {
                    width: 98%;
                }

                @media only screen and (max-width: 767px) {
                    .wpcf7<?php echo $pc; ?> label {
                        width: 100%;
                        margin-right: 0%;
                        float: none;
                    }
                    .wpcf7<?php echo $pc; ?> p {
                        margin: 0;
                    }
                }
        <?php } else if( $form_column == 3 )  { ?>
                .wpcf7<?php echo $pc; ?> {
                    width: -webkit-fill-available;
                }
                .wpcf7<?php echo $pc; ?> label {
                    width: 31%;
                    margin-right: 2.333%;
                    float: left;
                }
                .wpcf7<?php echo $pc; ?> label.text-area-full {
                    width: 98.3%;
                }
                @media only screen and (max-width: 1024px) {
                    .wpcf7<?php echo $pc; ?> label {
                        width: 48%;
                        margin-right: 2%;
                        float: left;
                    }
                    .wpcf7<?php echo $pc; ?> p {
                        margin: 0;
                    }
                }
                @media only screen and (max-width: 767px) {
                    .wpcf7<?php echo $pc; ?> label {
                        width: 100%;
                        margin-right: 0%;
                        float: none;
                    }

                }
        <?php } else { ?>
                .wpcf7<?php echo $pc; ?> label {
                    width:100%;
                }
                .wpcf7<?php echo $pc; ?> {
                    width: -webkit-fill-available;
                }
        <?php } ?>
    ?>

</style>

<?php

    }
} 

}

add_action( 'wpcf7_admin_footer', 'custom_skin_query_icf7s' );
add_action( 'wp_footer', 'custom_skin_query_icf7s' );
<?php
//Resist Wordpress Theme Functions
if ( ! function_exists ( 'one_page_express_copyright' ) ) {
    function one_page_express_copyright() {
       return '&copy;2019 Resist.Network | All Rights Reserved';
    }
}
//Overrides the Avatar System for Minotar
function resist_network_override_avatar ($avatar_html, $id_or_email, $size, $default, $alt) {
    $user_info = get_userdata($id_or_email);
    $username = $user_info->user_login;
    $avatar_url = "https://minotar.net/avatar/".$username;
    $new_avatar_html = preg_replace('/alt([^>]*)src=["\']([^"\'\\/][^"\']*)["\']/', 'alt\1src="'.$avatar_url.'"', $avatar_html);
    return $new_avatar_html;
}
add_filter ('get_avatar', 'resist_network_override_avatar', 10, 5);
//Customizes the WooCommerce Loading Animation
add_action('wp_head', 'custom_ajax_spinner', 1000 );
function custom_ajax_spinner() {
    ?>
    <style>
    .woocommerce .blockUI.blockOverlay:before,
    .woocommerce .loader:before {
        height: 3em;
        width: 3em;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-left: -.5em;
        margin-top: -.5em;
        display: block;
        content: "";
        -webkit-animation: none;
        -moz-animation: none;
        animation: none;
        background-image:url('<?php echo get_stylesheet_directory_uri() . "/images/laoding.gif"; ?>') !important;
        background-position: center center;
        background-size: cover;
        line-height: 1;
        text-align: center;
        font-size: 2em;
    }
    </style>
    <?php
}
//More to come...
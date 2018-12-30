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
//More to come...
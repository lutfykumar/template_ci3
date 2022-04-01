<?php

function isLogin() {
    $CI = & get_instance();
    $cek = $CI->session->userdata('hujan_id_user') ? TRUE : FALSE;          
    if (!$cek) {
        return redirect(base_url('login'));
    }
}



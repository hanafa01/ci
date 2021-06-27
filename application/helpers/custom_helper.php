<?php

function customFlash($value, $redirectURL, $isSuccess){
    $CI = get_instance();
    $CI->load->helper('url');
    $CI->load->library('session');
    if($isSuccess){
        $CI->session->set_flashdata('success_message', $value);
    }else{
        $CI->session->set_flashdata('error_message', $value);
    }
    redirect($redirectURL);
}
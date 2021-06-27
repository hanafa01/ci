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

function checkFlash(){
    $CI = get_instance();
    $CI->load->library('session');
    if($CI->session->flashdata('error_message') || $CI->session->flashdata('success_message')){
        $data['success_message'] = $CI->session->flashdata('success_message');
        $data['error_message'] = $CI->session->flashdata('error_message');
        $CI->load->view('errors/customError',$data);
    }
    
}
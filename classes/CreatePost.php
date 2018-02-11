<?php

/**
 * Created by PhpStorm.
 * User: wp-4
 * Date: 23.01.2018
 * Time: 19:30
 */






add_action('wp_enqueue_scripts', 'addJS' );

function addJS(){
    wp_enqueue_script('getdata', plugins_url('../js/getFormData.js', __FILE__));

    wp_localize_script('getdata', 'getdata_form', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));

    add_action( 'wp_ajax_nopriv_getForm',  'getForm');
    add_action( 'wp_ajax_getForm',  'getForm' );
}
function getForm(){

}






/*
class CreatePost
{
    public function __constract(){
        add_action('wp_enqueue_scripts', array($this, 'addJS') );
    }
    public function addJS(){
        wp_enqueue_script('getdata', plugins_url('../js/getFormData.js', __FILE__));
    }
    public function addCSS(){
    }
}

*/
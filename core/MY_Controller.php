<?php defined('BASEPATH') OR exit('No direct script access allowed');

// FILE LOCATION: application/core/MY_Controller.php

class MY_Controller extends CI_Controller
{
    // INITIALIZE GLOBAL DATA ARRAY AND ANY STATIC AND ABSOLUTE SYSTEM VALUES
    public $data = array(
        'user' => NULL,
        'is_admin' => FALSE,
        'is_financial_manager' => FALSE,
        'is_rss_manager' => FALSE,
        'is_cpy_manager' => FALSE,
        'is_logged_in' => FALSE,
        'view_specific_css' => array(),
        'view_specific_js' => array()
    );
	
    // INHERIT FUNCTINOALITY FROM ANCESTOR CLASSES
    function __construct()
    {
        parent::__construct();
        $this->load->database();
		$this->load->library(['authentication']);
		//$this->load->model('global_model');
		$this->load->helper( array( 'url', 'dousic_helper', 'views_sets_helper' ) );

    }

    // GET GLOBAL SITE SETTINGS DATA VIA A MODEL'S METHOD
    //$this->data['global_site_settings'] = $this->some_model->get_global_site_settings_data();
}

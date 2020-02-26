<?php defined('BASEPATH') OR exit('No direct script access allowed');

// FILE LOCATION: application/core/Unauthenticated_Controller.php

class Unauthenticated_Controller extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->helper(array('url', 'file', 'form', 'dousic_helper'));
        // LOAD SOME OTHER GLOBAL MODEL
        //$this->load->model(['some_other_model']);
		
		//LOAD PUBLIC NAVBAR LIBRARY
		 $this->load->library('publicnavbar');
		 $this->load->library('authentication');

        // IF CURRENT USER IS LOGGED IN
        if ($this->authentication->logged_in())
        {
            // ADD AUTHENTICATION STATUS TO GLOBAL DATA ARRAY
            $this->data['is_logged_in'] = $this->authentication->logged_in();
            //$this->data['user'] = $this->authentication->user()->row();
			if($this->authentication->is_admin()){
				
				$this->data['is_admin'] = $this->authentication->is_admin();
				
			}else if($this->authentication->is_financial_manager()){
				
				$this->data['is_financial_manager'] = $this->authentication->is_financial_manager();
				
			}else if($this->authentication->is_rss_manager()){
				
				$this->data['is_rss_manager'] = $this->authentication->is_rss_manager();
				
			}
        }
		
        // GET GLOBAL PUBLIC SITE SETTINGS DATA FROM MODEL METHOD
        //$this->data['public_site_settings'] = $this->some_other_model->get_global_public_site_settings_data();

        // ADD SOME CSS/JS FILES TO ALL UNAUTHENTICATED PAGES
        array_push($this->data['view_specific_css'], 'unauthenticated-styles.css', 'another-file.css');
        array_push($this->data['view_specific_js'], 'unauthenticated-scripts.js', 'another-file.js');
    }
}
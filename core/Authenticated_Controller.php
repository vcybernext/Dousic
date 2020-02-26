<?php defined('BASEPATH') OR exit('No direct script access allowed');

// FILE LOCATION: application/core/Authenticated_Controller.php

class Authenticated_Controller extends Unauthenticated_Controller
{

	protected $role = '';
	protected $admin_id = '';
	protected $admin_fullname = '';
	protected $global = array ();

    // INHERIT FUNCTINOALITY FROM ANCESTOR CLASSES
    function __construct()
    {
        parent::__construct();
		//LOAD ADMIN NAVBAR LIBRARY
		 $this->load->library('adminnavbar');
        // IF CURRENT USER IS NOT LOGGED IN
        if (!$this->authentication->logged_in())
        {
            // REDIRECT THEM TO THE LOGIN PAGE
            redirect('/adminLogin', 'refresh');
			
        }else if($this->authentication->is_admin())
        {
            // OTHERWISE ADD USER AUTHENTICATION STATUS TO GLOBAL DATA ARRAY
            $this->data['is_logged_in'] = $this->authentication->logged_in();
            //$this->data['user'] = $this->authentication->user()->row();
            $this->data['is_admin'] = $this->authentication->is_admin();
        }else if($this->authentication->is_financial_manager())
        {
            // OTHERWISE ADD USER AUTHENTICATION STATUS TO GLOBAL DATA ARRAY
            $this->data['is_logged_in'] = $this->authentication->logged_in();
            //$this->data['user'] = $this->authentication->user()->row();
            $this->data['is_admin'] = $this->authentication->is_financial_manager();
        }else if($this->authentication->is_rss_manager()){
				
            // OTHERWISE ADD USER AUTHENTICATION STATUS TO GLOBAL DATA ARRAY
            $this->data['is_logged_in'] = $this->authentication->logged_in();
            //$this->data['user'] = $this->authentication->user()->row();
            $this->data['is_admin'] = $this->authentication->is_rss_manager();
				
		}
		
    }
	
	/**
	 * THIS FUNCTION IS USED TO LOGGED OUT USER FROM SYSTEM
	 */
	function logout() {
		
		$this->session->sess_destroy ();
		redirect ( '/adminLogin' );
		
	}	

	/**
     * THIS FUNCTION IS USED TO LOAD VIEWS
     * @param {string} $viewName : THIS IS VIEW NAME
     * @param {mixed} $headerInfo : THIS IS ARRAY OF HEADER INFORMATION
     * @param {mixed} $pageInfo : THIS IS ARRAY OF PAGE INFORMATION
     * @param {mixed} $footerInfo : THIS IS ARRAY OF FOOTER INFORMATION
     * @return {null} $result : null
     */
    function loadViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL){
		
		$data['menu'] = $this->adminnavbar->show_menu();
        $this->load->view('template/header', $headerInfo);
		$this->load->view ( 'template/top-navigation',$data );
        $this->load->view($viewName, $pageInfo);
        $this->load->view('template/footer', $footerInfo);
		
    }

	/**
	 * THIS FUNCTION IS USED TO LOAD THE SET OF VIEWS
	 */
	function loadThis() {
		
		$this->global ['pageTitle'] = 'Dousic : Access Denied';
		$data['menu'] = $this->adminnavbar->show_menu();
		$this->load->view ( 'template/header', $this->global );
		$this->load->view ( 'template/top-navigation', $data );
		
		$this->load->view ( 'access' );
		$this->load->view ( 'template/footer' );
		
	}
	
	/**
	 * THIS FUNCTION IS USED PROVIDE THE PAGINATION RESOURCES
	 * @param {string} $link : THIS IS PAGE LINK
	 * @param {number} $count : THIS IS PAGE COUNT
	 * @param {number} $perPage : THIS IS RECORDS PER PAGE LIMIT
	 * @return {mixed} $result : THIS IS ARRAY OF RECORDS AND PAGINATION DATA
	 */
	function paginationCompress($link, $count, $perPage = 10, $segment = SEGMENT) {
		
		$this->load->library ( 'pagination' );
		$config ['base_url'] = base_url () . $link;
		$config ['total_rows'] = $count;
		$config ['uri_segment'] = $segment;
		$config ['per_page'] = $perPage;
		$config ['num_links'] = 5;
		$config ['full_tag_open'] = '<nav><ul class="pagination">';
		$config ['full_tag_close'] = '</ul></nav>';
		$config ['first_tag_open'] = '<li class="arrow">';
		$config ['first_link'] = 'First';
		$config ['first_tag_close'] = '</li>';
		$config ['prev_link'] = 'Previous';
		$config ['prev_tag_open'] = '<li class="arrow">';
		$config ['prev_tag_close'] = '</li>';
		$config ['next_link'] = 'Next';
		$config ['next_tag_open'] = '<li class="arrow">';
		$config ['next_tag_close'] = '</li>';
		$config ['cur_tag_open'] = '<li class="active"><a href="#">';
		$config ['cur_tag_close'] = '</a></li>';
		$config ['num_tag_open'] = '<li>';
		$config ['num_tag_close'] = '</li>';
		$config ['last_tag_open'] = '<li class="arrow">';
		$config ['last_link'] = 'Last';
		$config ['last_tag_close'] = '</li>';
	
		$this->pagination->initialize( $config );
		$page = $config ['per_page'];
		$segment = $this->uri->segment( $segment );
	
		return array (
				"page" => $page,
				"segment" => $segment
		);
	}
}
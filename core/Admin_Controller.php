<?php defined('BASEPATH') OR exit('No direct script access allowed');
// FILE LOCATION: application/core/MY_Controller.php

class Admin_Controller extends Authenticated_Controller
{
    // INHERIT FUNCTINOALITY FROM ANCESTOR CLASSES
    function __construct()
    {
        parent::__construct();

        // IF CURRENT USER IS NOT AN ADMIN LEVEL USER
        if (!$this->data['is_admin'])
        {
            // REDIRECT THEM TO THE AN ADMIN LOGIN PAGE
            redirect('admin-login', 'refresh');
        }
    }
}
?>
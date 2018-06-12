<?php

/**
* 
*/
class Auth extends CI_Controller {

    public function __construct()
    {
        // Execute CI_Controller Constructor
        parent::__construct();

        if (!$_SESSION['admin']) {
            redirect('adminpanel/login');
        }
    }
}

?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Rest Controller And HMVC
 * A fully RESTful server implementation for CodeIgniter using one library, one config file and one controller.
 *
 * @package         CodeIgniter
 * @category        HMVC
 * @author          gyugie
 * @license         MIT
 * @link            https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc/src/codeigniter-3.x/
 * @link            https://github.com/Stockholder/ci-hmvc-features
 * @version         3.0.0
 */

require APPPATH.'/libraries/REST_Controller.php';

class Users extends REST_Controller {

	function __construct() {
        parent::__construct(); 
	}
	
	public function index_get()
	{
		echo 'hai';
	}
}

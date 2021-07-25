<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Secure Class
 *
 * @author      Cecep Aprilianto
 * @copyright	Copyright (c) 2017
 * @link        http://sibatur.com
 */
class Secure {

    protected $CI;

	public function __construct()
	{
		// Assign the CodeIgniter super-object
		$this->CI =& get_instance();

		$this->CI->load->model('md_users');
	}


    public function is_login_admin()
	{
		if ($this->CI->session->userdata('is_login_admin'))
		{
			redirect(base_url('dashboard'));
		} 
	}

	public function is_login()
	{
		if (!$this->CI->session->userdata('is_login_admin'))
		{
			redirect(base_url('login'));
		} 
	}

}
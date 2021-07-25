<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
	{
		parent::__construct();

		$this->load->model("md_login");
	}

    public function index()
    {
        $this->login();
    }

    public function login()
	{
		$this->secure->is_login_admin();

		$data = array(
			'results'		=> ''
		);

		$config = array(
			array(
				'field' => 'username',
                'label' => 'User ID',
                'rules' => 'required|trim|callback_username_check',
                'errors' => array(
                    'required' => '%s tidak boleh kosong.',
                )
			),
			array(
				'field' => 'password',
                'label' => 'Password',
                'rules' => 'required',
                'errors' => array(
                    'required' => '%s tidak boleh kosong.',
                )
			)
		);

		// Initialize
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() === FALSE) 
		{
			$this->load->view("login/login");

		} else
		{
			$username		= $this->input->post('username');
			$password		= $this->input->post('password');

			if ($this->md_login->active_user($username))
			{
				$data_user = $this->md_users->profile($username)->result();

				$data = array(
					'data_user' 		=> $data_user,
					'is_login_admin'	=> TRUE
				);

				$this->session->set_userdata($data);


				$redirect = ($this->input->post('redirect')!=NULL) ? $this->input->post('redirect'): base_url('dashboard');

				redirect($redirect);

				// redirect(base_url('dsb0605'));

			} else
			{

				$this->session->set_flashdata('login_error', 'Akun belum aktif.');
                
                redirect(base_url('login'));
			}
		}
	}

	// callback method
	public function username_check()
	{
		if ($this->md_login->username_check())
		{
			return true;

		} else
		{
			// set error
			$this->form_validation->set_message('username_check', 'User ID/Password Salah!');
			return false;
		}
	}

	public function logout()
	{
		// $this->session->sess_destroy();
		unset($_SESSION['is_login_admin']);
		unset($_SESSION['data_user']);

		redirect(base_url('login'));
	}
}
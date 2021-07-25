<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Template {

	protected $CI;
	private $css;
	private $js;

	public function __construct()
	{
		// Assign the CodeIgniter super-object
		$this->CI 	=& get_instance();
		$this->css 	= array();
		$this->js 	= array();
	}

	public function addCss($path){
		$this->css[] = $path;
	}

	public function addJs($path){
		$this->js[] = $path;
	}

	/**
	 * TEMPLATE BACKEND
	 *
	 * Untuk memparsing view yang di split / multiple view
	 *
	 * @param       string 		$template 		direktori untuk me-loading view file, bisa juga di sub-direktori
	 * @param       array 		$data 	NULL 	memasukan data dinamis ke view berupa array (bisa juga object)
	 * @return      mixing
	 */
	public function load($template, $data=NULL)
	{
		$page               		= $template;
        $data['js_source']			= $this->js;
        $data['css_source']			= $this->css;

		/**
		 * ---------------------------------------------------------------
		 * RETURN VIEW AS DATA
		 * ---------------------------------------------------------------
		 *
		 * Mengembalikan view sebagai DATA
		 *
		 * Parameter ke-3 di set TRUE (boolean) akan mengembalikan data sebagai string
		 * yang di parsing dan akan di tampilkan di browser
		 */

		$data['header']     = $this->CI->load->view("templates/header", $data, TRUE);

		$data['sidebar']       = $this->CI->load->view("templates/sidebar", $data, TRUE);

		$data['content']    = $this->CI->load->view($template, $data, TRUE);

		$data['footer']     = $this->CI->load->view("templates/footer", $data, TRUE);

		// parsing array(header,menu,content,footer) ke sebuah file menggunakan library parser CI
		$this->CI->parser->parse("templates/main", $data);
	}
}
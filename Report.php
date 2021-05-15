<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		check_not_login();
		//check_admin();
		$this->load->model('sale_m', 'sale');
		//$this->load->library('form_validation');
	}

	public function sale()
	{
		$data['row'] = $this->sale->get_sale();
		$this->template->load('template', 'report/sale_report', $data);
	}

	public function sale_product($sale_id = null)
	{
		$detail = $this->sale->get_sale_detail($sale_id)->result();
		echo json_encode($detail);
	}
}

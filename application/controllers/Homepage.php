<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['categories'] = $this->CategoryModel->get_data();
		$this->data['products'] = $this->ProductModel->get_popular_products();

		$this->load->view('template/header');
		$this->load->view('homepage', $this->data);
		$this->load->view('template/footer');
	}
}
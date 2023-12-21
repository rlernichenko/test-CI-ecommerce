<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!$this->UserModel->is_logged_in()){
            redirect(base_url('/dashboard/users/login'), 'refresh');
        }
    }

    public function index()
    {
        $this->load->view('dashboard/template/header');
        $this->load->view('dashboard/main');
        $this->load->view('dashboard/template/footer');
    }

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('dashboard/template/header');
        $this->load->view('dashboard/users');
        $this->load->view('dashboard/template/footer');
    }

    public function login()
    {
        $rules = array(
            array(
                'field' => 'login',
                'label' => 'Login',
                'rules' => 'required|min_length[4]|max_length[32]'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[4]|max_length[32]',
            )
        );

        $this->form_validation->set_rules($rules);

        $this->form_validation->set_error_delimiters('<div class="alert alert-dismissible alert-danger">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('dashboard/template/header');
            $this->load->view('dashboard/login');
            $this->load->view('dashboard/template/footer');
        } else {

            if (!empty($this->input->post())) {

                if ($this->UserModel->login()) {
                    redirect('/dashboard/');
                } else {
                    $data['response'] = 'Invalid data. Please, try again';
                    $this->load->view('dashboard/template/header');
                    $this->load->view('dashboard/login', $data);
                    $this->load->view('dashboard/template/footer');
                }

            }

        }
    }

    public function register()
    {
        $rules = array(
            array(
                'field' => 'login',
                'label' => 'Login',
                'rules' => 'required|is_unique[users.login]|min_length[4]|max_length[32]'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[4]|max_length[32]',
            ),
            array(
                'field' => 'confirm_password',
                'label' => 'Password Confirmation',
                'rules' => 'required|matches[password]|min_length[4]|max_length[32]'
            )
        );

        $this->form_validation->set_rules($rules);

        $this->form_validation->set_error_delimiters('<div class="alert alert-dismissible alert-danger">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('dashboard/template/header');
            $this->load->view('dashboard/register');
            $this->load->view('dashboard/template/footer');
        } else {

            if (!empty($this->input->post())) {

                if ($this->UserModel->register()) {
                    redirect('/dashboard/');
                } else {
                    redirect('/dashboard/users/register');
                }

            }

        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/dashboard/');
    }
}

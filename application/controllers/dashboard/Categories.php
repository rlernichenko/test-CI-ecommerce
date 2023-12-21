<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

    public $data;

    public function __construct()
    {
        parent::__construct();

        if(!$this->UserModel->is_logged_in()){
            redirect(base_url('/dashboard/users/login'), 'refresh');
        }
    }

    public function index()
    {
        $this->data['categories'] = $this->CategoryModel->get_data();

        $this->load->view('dashboard/template/header');
        $this->load->view('dashboard/categories', $this->data);
        $this->load->view('dashboard/template/footer');
    }

    public function create()
    {
        $this->load->view('dashboard/template/header');
        $this->load->view('dashboard/categories-edit-form');
        $this->load->view('dashboard/template/footer');
    }

    public function edit($id)
    {
        $this->data['category'] = $this->CategoryModel->get_data_by_id($id);

        $this->load->view('dashboard/template/header');
        $this->load->view('dashboard/categories-edit-form', $this->data);
        $this->load->view('dashboard/template/footer');
    }

    public function save()
    {

        $rules = array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required|min_length[3]|max_length[64]'
            ),
            array(
                'field' => 'slug',
                'label' => 'Slug',
                'rules' => 'required|min_length[3]|max_length[32]',
            ),
            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required|min_length[4]|max_length[500]'
            ),
        );

        $this->form_validation->set_rules($rules);

        $this->form_validation->set_error_delimiters('<div class="alert alert-dismissible alert-danger">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('dashboard/template/header');
            $this->load->view('dashboard/categories-edit-form');
            $this->load->view('dashboard/template/footer');
        } else {

            if (!empty($this->input->post()) && !empty($this->input->post('id'))) {
                $this->CategoryModel->update();
            } else {
                $this->CategoryModel->insert();
            }

            redirect('/dashboard/categories');
        }
    }

    public function delete($id)
    {
        $json['response'] = $this->CategoryModel->delete($id);

        echo json_encode($json);
    }
}
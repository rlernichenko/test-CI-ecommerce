<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!$this->UserModel->is_logged_in()) {
            redirect(base_url('/dashboard/users/login'), 'refresh');
        } else {
            $this->load->library('pagination');

            $this->data['config'] = array();

            $this->data['config']['full_tag_open'] = '<ul class="pagination">';
            $this->data['config']['full_tag_close'] = '</ul>';

            $this->data['config']['first_link'] = '<<';
            $this->data['config']['first_tag_open'] = '<li>';
            $this->data['config']['first_tag_close'] = '</li>';


            $this->data['config']['last_link'] = '>>';
            $this->data['config']['last_tag_open'] = '<li>';
            $this->data['config']['last_tag_close'] = '</li>';

            $this->data['config']['cur_tag_open'] = '<li class="active"><a>';
            $this->data['config']['cur_tag_close'] = '</a></li>';

            $this->data['config']['next_tag_open'] = '<li>';
            $this->data['config']['next_tag_close'] = '</li>';

            $this->data['config']['prev_tag_open'] = '<li>';
            $this->data['config']['prev_tag_close'] = '</li>';

            $this->data['config']['num_tag_open'] = '<li>';
            $this->data['config']['num_tag_close'] = '</li>';
        }
    }

    public function index($page = 0)
    {
        $this->data['config']["base_url"] = site_url('dashboard/products');
        $this->data['config']["total_rows"] = $this->ProductModel->record_count();
        $this->data['config']["per_page"] = 12;

        $this->pagination->initialize($this->data['config']);

        $this->data['products'] = $this->ProductModel->get_data_by_page($this->data['config']["per_page"], $page);
        $this->data['links'] = $this->pagination->create_links();

        $this->load->view('dashboard/template/header');
        $this->load->view('dashboard/products', $this->data);
        $this->load->view('dashboard/template/footer');
    }

    public function create()
    {
        $this->data['categories'] = $this->CategoryModel->get_data();
        $this->data['properties'] = $this->PropertiesModel->get_data();

        $this->load->view('dashboard/template/header');
        $this->load->view('dashboard/products-edit-form', $this->data);
        $this->load->view('dashboard/template/footer');
    }

    public function edit($id)
    {
        $this->data['product'] = $this->ProductModel->get_data_by_id($id);
        $this->data['categories'] = $this->CategoryModel->get_data();
        $this->data['properties'] = $this->PropertiesModel->get_data();

        $this->load->view('dashboard/template/header');
        $this->load->view('dashboard/products-edit-form', $this->data);
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
            array(
                'field' => 'price',
                'label' => 'Price',
                'rules' => 'required|numeric|max_length[10]'
            )
        );

        $this->form_validation->set_rules($rules);

        $this->form_validation->set_error_delimiters('<div class="alert alert-dismissible alert-danger">', '</div>');

        if ($this->form_validation->run() == FALSE) {

            $this->data['categories'] = $this->CategoryModel->get_data();
            $this->data['properties'] = $this->PropertiesModel->get_data();

            $this->load->view('dashboard/template/header');
            $this->load->view('dashboard/products-edit-form', $this->data);
            $this->load->view('dashboard/template/footer');
        } else {

            if (!empty($this->input->post()) && !empty($this->input->post('id'))) {
                $this->ProductModel->update();
            } else {
                $this->ProductModel->insert();
            }

            redirect('/dashboard/products');
        }
    }

    public function delete($id)
    {
        $json['response'] = $this->ProductModel->delete($id);

        echo json_encode($json);
    }
}
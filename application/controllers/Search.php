<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Search Extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

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

    function index()
    {
        $this->data["search"] = $this->input->post('search');

        $this->data['config']["base_url"] = site_url('search/'.$this->data["search"]);
        $this->data['config']["total_rows"] = $this->ProductModel->record_count_by_search($this->data["search"]);
        $this->data['config']["per_page"] = 12;

        $this->pagination->initialize($this->data['config']);

        $this->data['categories'] = $this->CategoryModel->get_data();
        $this->data['products'] = $this->ProductModel->get_data_by_search($this->data["search"]);
        $this->data['links'] = $this->pagination->create_links();

        $this->load->view('template/header');
        $this->load->view('search', $this->data);
        $this->load->view('template/footer');
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller
{

    public function __construct()
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

    public function index($page = 0)
    {
        $this->data['config']["base_url"] = site_url('products');
        $this->data['config']["total_rows"] = $this->ProductModel->record_count();
        $this->data['config']["per_page"] = 12;

        $this->pagination->initialize($this->data['config']);

        $this->data['categories'] = $this->CategoryModel->get_data();
        $this->data['products'] = $this->ProductModel->get_data_by_page($this->data['config']["per_page"], $page);
        $this->data['links'] = $this->pagination->create_links();

        $this->load->view('template/header');
        $this->load->view('products', $this->data);
        $this->load->view('template/footer');
    }

    public function category($slug, $page = 0)
    {
        $sort = '';
        $order = '';


        if(!empty($this->input->get('sort')) && !empty($this->input->get('order'))) {
            $sort = $this->security->xss_clean($this->input->get('sort'));
            $order = $this->security->xss_clean($this->input->get('order'));
        }

        $category = $this->CategoryModel->get_data_by_slug($slug);
        $this->data['config']["base_url"] = site_url('category/'.$slug);
        $this->data['config']["total_rows"] = $this->ProductModel->record_count_by_category($category->id);
        $this->data['config']["per_page"] = 12;
        if (count($_GET) > 0) $this->data['config']["suffix"] = '?' . http_build_query($_GET, '', "&");

        $this->pagination->initialize($this->data['config']);

        $this->data['categories'] = $this->CategoryModel->get_data();
        $this->data['products'] = $this->ProductModel->get_data_by_category_paged($category->id, $this->data['config']["per_page"], $page, $sort, $order);
        $this->data['links'] = $this->pagination->create_links();

        $this->load->view('template/header');
        $this->load->view('products', $this->data);
        $this->load->view('template/footer');
    }

    public function product($slug)
    {
        $this->data['categories'] = $this->CategoryModel->get_data();
        $this->data['product'] = $this->ProductModel->get_data_by_slug($slug);
        $this->data['properties'] = $this->PropertiesModel->get_data_by_product($this->data['product']->id);
        $this->data['related_products'] = $this->ProductModel->get_related_products($this->data['product']->id, $this->data['product']->category);

        $this->ProductModel->update_views($this->data['product']->id);

        $this->load->view('template/header', $this->data);
        $this->load->view('single-product', $this->data);
        $this->load->view('template/footer', $this->data);
    }
}

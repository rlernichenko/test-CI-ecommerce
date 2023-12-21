<?php
class ProductModel extends CI_Model {

    public $id;
    public $title;
    public $slug;
    public $description;
    public $category;
    public $price;
    public $image;
    public $views = 0;
    public $creating_date;

    private $table = 'products';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_data()
    {
        $this->db->select('p.*, c.title as category');
        $this->db->from($this->table.' p');
        $this->db->join('categories c', 'p.category = c.id');
        $query = $this->db->get();

        $data = $query->result();

        return $data;
    }

    public function get_data_by_category($id)
    {
        $category = $this->CategoryModel->get_data_by_id($id);

        $this->db->select('p.*, c.title as category');
        $this->db->from($this->table . ' p');
        $this->db->join('categories c', 'p.category = c.id');
        $this->db->where('p.category', $category->id);
        $query = $this->db->get();

        $data = $query->result();

        return $data;
    }

    public function get_data_by_page($limit, $page)
    {
        $this->db->select('p.*, c.title as category');
        $this->db->from($this->table.' p');
        $this->db->join('categories c', 'p.category = c.id');
        $this->db->limit($limit, $page);
        $query = $this->db->get($this->table);

        return $query->result();
    }

    public function get_data_by_category_paged($id, $limit, $page, $sort = null, $order = null)
    {
        $category = $this->CategoryModel->get_data_by_id($id);

        $this->db->select('p.*, c.title as category');
        $this->db->from($this->table . ' p');
        $this->db->join('categories c', 'p.category = c.id');
        $this->db->where('p.category', $category->id);
        $this->db->limit($limit, $page);

        if(!empty($sort) && !empty($order)) {
            $this->db->order_by($sort, $order);
        }

        $query = $this->db->get();

        $data = $query->result();

        return $data;
    }

    public function get_popular_products()
    {
        $limit = 6;
        $this->db->select('p.*, c.title as category');
        $this->db->from($this->table.' p');
        $this->db->join('categories c', 'p.category = c.id');
        $this->db->order_by('p.views', 'desc');
        $this->db->limit($limit);
        $query = $this->db->get();

        $data = $query->result();

        return $data;
    }

    public function get_related_products($id, $category)
    {
        $limit = 4;
        $this->db->select('p.*, c.title as category');
        $this->db->from($this->table.' p');
        $this->db->join('categories c', 'p.category = c.id');
        $this->db->where('p.id !=', $id);
        $this->db->where('p.category', $category);
        $this->db->order_by('p.views', 'desc');
        $this->db->limit($limit);
        $query = $this->db->get();

        $data = $query->result();

        return $data;
    }

    public function get_data_by_id($id)
    {
        $query = $this->db->get_where($this->table, array('id' => $id));

        $data = $query->result();

        return end($data);
    }

    public function get_data_by_slug($slug)
    {
        $query = $this->db->get_where($this->table, array('slug' => $slug));

        $data = $query->result();

        return end($data);
    }

    public function get_data_by_search($search)
    {
        $this->db->select('p.*, c.title as category');
        $this->db->from($this->table.' p');
        $this->db->join('categories c', 'p.category = c.id');
        $this->db->like('p.title', $search);
        $this->db->or_like('p.description', $search);
        $query = $this->db->get();

        $data = $query->result();

        return $data;
    }

    public function convert_price($price)
    {
        setlocale(LC_MONETARY, 'en_US');

        return money_format('%i', $price);
    }

    public function record_count() {
        return $this->db->count_all($this->table);
    }

    public function record_count_by_category($id)
    {
        $this->db->where('category', $id);

        return $this->db->count_all_results($this->table);
    }

    public function record_count_by_search($search)
    {
        $this->db->like('title', $search);
        $this->db->or_like('description', $search);

        return $this->db->count_all_results($this->table);
    }

    public function update_views($id)
    {
        $query = $this->db->get_where($this->table, array('id' => $id));
        $result = $query->result();
        $data = end($result);

        $views = $data->views + 1;

        if($this->db->update($this->table, array('views' => $views), "id = " . $id)) {
            return true;
        }

        return false;
    }

    public function insert()
    {
        $this->title = $this->security->xss_clean($this->input->post('title'));
        $this->slug = $this->security->xss_clean($this->input->post('slug'));
        $this->description = $this->security->xss_clean($this->input->post('description'));
        $this->category = $this->security->xss_clean($this->input->post('category'));
        $this->price = $this->security->xss_clean($this->input->post('price'));
        $this->creating_date = date('Y-m-d H:i:s');

        $this->image = $this->upload();

        $this->db->insert($this->table, $this);

        $this->PropertiesModel->insert_relations($this->db->insert_id());
    }

    public function upload()
    {
        $file_element_name = 'image';

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size']	= '10240';
        $config['max_width']  = '5000';
        $config['max_height']  = '5000';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload($file_element_name)) {
            $data = $this->upload->data();

            return $data['file_name'];
        }

        return false;
    }

    public function update()
    {
        $id = $this->security->xss_clean($this->input->post('id'));

        if(!empty($this->get_data_by_id($id))) {
            $data = array(
                'title' => $this->security->xss_clean($this->input->post('title')),
                'slug' => $this->security->xss_clean($this->input->post('slug')),
                'description' => $this->security->xss_clean($this->input->post('description')),
                'category' => $this->security->xss_clean($this->input->post('category')),
                'price' => $this->security->xss_clean($this->input->post('price')),
            );

            if(!empty($_FILES['image']['name'])) {
                $data['image'] = $this->upload();
            }

            if($this->db->update($this->table, $data, array('id' => $id))) {

                $this->PropertiesModel->delete_by_product($id);
                $this->PropertiesModel->insert_relations($id);

                return true;
            }
        }

        return false;
    }

    public function delete($id)
    {
        $product = $this->get_data_by_id($id);

        if(!empty($product)) {
            if($this->db->delete($this->table, array('id' => $id)) &&
                unlink('./images/'.$product->image) &&
                $this->PropertiesModel->delete_by_product($id)) {
                return true;
            }
        }

        return false;
    }
}
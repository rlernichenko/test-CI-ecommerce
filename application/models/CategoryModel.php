<?php
class CategoryModel extends CI_Model {

    public $id;
    public $title;
    public $slug;
    public $description;
    public $creating_date;

    private $table = 'categories';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_data()
    {
        $query = $this->db->get($this->table);

        $query = $query->result();

        return $query;
    }

    public function get_data_by_id($id)
    {
        $query = $this->db->get_where($this->table, array('id' => $id));

        $query = $query->result();

        return end($query);
    }

    public function get_data_by_slug($slug)
    {
        $query = $this->db->get_where($this->table, array('slug' => $slug));

        $query = $query->result();

        return end($query);
    }

    public function insert()
    {
        $this->title = $this->security->xss_clean($this->input->post('title'));
        $this->slug = $this->security->xss_clean($this->input->post('slug'));
        $this->description = $this->security->xss_clean($this->input->post('description'));
        $this->creating_date = date('Y-m-d H:i:s');

        if($this->db->insert($this->table, $this)) {
            return true;
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
                'description' => $this->security->xss_clean($this->input->post('description'))
            );

            if($this->db->update($this->table, $data, array('id' => $id))) {
                return true;
            }
        }

        return false;
    }

    public function delete($id)
    {
        if(!empty($this->get_data_by_id($id))) {
            $query = $this->db->delete($this->table, array('id' => $id));
        }

        return (boolean) $query;
    }
}
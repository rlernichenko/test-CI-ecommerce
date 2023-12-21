<?php
class PropertiesModel extends CI_Model {

    public $id;
    public $title;

    private $table = 'properties';
    private $rel_table = 'properties_relationship';

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

    public function get_data_by_product($id)
    {
        $this->db->select('p.*, pr.value');
        $this->db->from($this->rel_table . ' pr');
        $this->db->join($this->table .' p', 'pr.property_id = p.id');
        $this->db->where('pr.product_id', $id);
        $query = $this->db->get();

        $data = $query->result();

        return $data;
    }

    public function get_value($product_id, $property_id)
    {
        $this->db->select('value');
        $this->db->from($this->rel_table);
        $this->db->where('product_id', $product_id);
        $this->db->where('property_id', $property_id);
        $query = $this->db->get();

        $data = $query->result();

        return end($data);
    }

    public function insert_relations($product_id)
    {
        if(!empty($product_id) && !empty($this->security->xss_clean($this->input->post('properties')))) {
            foreach($this->security->xss_clean($this->input->post('properties')) as $key=>$property) {

                if(!empty($property)) {
                    $data = array(
                        'product_id' => $product_id,
                        'property_id' => $key,
                        'value' => $property
                    );
                    $this->db->insert($this->rel_table, $data);
                }
            }
        }
    }

    public function delete_by_product($id)
    {
        if($this->db->delete($this->rel_table, array('product_id' => $id))) {
            return true;
        }

        return false;
    }
}
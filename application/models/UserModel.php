<?php
class UserModel extends CI_Model {

    public $id;
    public $login;
    public $password;
    public $role = 0;

    private $table = 'users';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_user()
    {
        $user_id = $this->session->userdata('user_id');

        if (!empty($user_id)){
            $query = $this->db->get_where($this->table, array('id' => $user_id));

            $query = $query->result();

            return end($query);
        }

        return false;
    }

    public function get_data_by_id($id)
    {
        $query = $this->db->get_where($this->table, array('id' => $id));

        return $query->result();
    }

    public function get_admin()
    {
        if (!empty($this->input->post())){

            $data = array(
                'role' => 1,
                'login' => $this->input->post('login'),
                'password' => sha1($this->input->post('password'))
            );
            $query = $this->db->get_where($this->table, $data);

            return $query->result();
        }

        return false;
    }

    public function login()
    {
        $data = array(
            'login' => $this->security->xss_clean($this->input->post('login')),
            'password' => md5($this->security->xss_clean($this->input->post('password')))
        );
        $query = $this->db->get_where($this->table, $data);
        $result = $query->result();
        $result = end($result);

        if (!empty($result)){
            $this->session->set_userdata('user_id', $result->id);

            return true;
        }

        return false;
    }

    public function register()
    {
        $this->login = $this->security->xss_clean($this->input->post('login'));
        $this->password = md5($this->security->xss_clean($this->input->post('password')));
        $this->role = 1;

        $user = $this->db->insert($this->table, $this);

        if($user){
            $this->session->set_userdata('user_id', $this->db->insert_id());

            return true;
        }

        return false;
    }

    public function is_logged_in()
    {
        if(!empty($this->session->userdata['user_id'])){
            return true;
        }

        return false;
    }
}
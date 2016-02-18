<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('takmoph_model', 'tak');
        $this->load->model('upload_model', 'upload');
        $this->load->model('news_model', 'news');
        $this->load->model('user', 'user');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function output($deta = '', $page = '', $head = '') {

        if (!empty($this->session->userdata['status']) && ($this->session->userdata['status'] == "S" || $this->session->userdata['status'] == "A")) {
            $data['detail'] = $deta;
            $data['page'] = $page;
            $data['head'] = $head;
            $this->load->view('template_admin', $data);
        } else {
            echo "<script>window.location='" . site_url('') . "'</script>";
        }
    }

    public function show_user() {
        $data['user'] = $this->user->get_user();
        $head = "จัดการผู้ใช้งาน";
        $page = "backend/user/show_user";

        $this->output($data, $page, $head);
    }

    public function save_user() {
        $data = array(
            'name' => $_POST['name'],
            'lname' => $_POST['lname'],
            'username' => $_POST['username'],
            'password' => md5($_POST['password']),
            'status' => 'A'
        );
        $this->db->insert('mas_user', $data);
        $user_id = $this->tak->max_id('mas_user', 'user_id');
        echo $this->tak->redir('backend/users/from_permissions/' . $user_id);
    }

    public function edit_user() {
        $user_id = $_POST['user_id'];
        $data = array(
            'name' => $_POST['name'],
            'lname' => $_POST['lname'],
            'username' => $_POST['username'],
            'password' => md5($this->input->post('password'))
        );
        $this->db->where("user_id", $user_id);
        $this->db->update('mas_user', $data);
    }

    public function del_user() {
        $user_id = $this->input->post('id');
        $this->db->where('user_id', $user_id);
        $this->db->delete('mas_user');

        echo $this->tak->redir('takmoph_admin/show_user/');
    }

    public function from_permissions($user_id = null) {

        $data['user'] = $this->user->view($user_id);
        $data['menu_admin'] = $this->user->get_menu_permissions($user_id);
        $data['permission_homepage'] = $this->user->permissions_homepage($user_id);
        $head = "สิทธิ์จัดการเมนูระบบไฟล์ Download";
        $page = "backend/user/show_permissions";

        $this->output($data, $page, $head);
    }

     public function add_permissions() {
        $data = array(
            'user_id' => $_POST['user_id'],
            'admin_menu_id' => $_POST['admin_menu_id']
        );
        $this->db->insert('permissions', $data);
    }

    public function del_permissions() {
        $id = $_POST['id'];
        $this->db->where('id', $id);
        $this->db->delete('permissions');
    }

    public function addpermission_homepage(){
      $input = $this->input;
      $columns = array(
        "homepage_id" => $input->post('homepage_id'),
        "user_id" => $input->post('user_id')
      );
      $this->db->insert("permission_homepage",$columns);
    }

    public function deletepermission_homepage(){
      $id = $this->input->post('id');
      $this->db->where("id",$id);
      $this->db->delete("permission_homepage");
    }

}

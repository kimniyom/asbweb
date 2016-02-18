<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class sub_homepage extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('takmoph_model', 'tak');
        $this->load->model('homepage_model', 'model');
        $this->load->model('sub_homepage_model');
        $this->load->library('takmoph_libraries');
        $this->load->helper('url');
        $this->load->library('session');

        $user = $this->session->userdata('user_id');
        if (empty($user)) {
            echo $this->tak->redir('takmoph_admin');
        }
    }

    public function output($deta = '', $page = '', $head = '') {

        if (!empty($this->session->userdata['status']) && ($this->session->userdata['status'] == "S" || $this->session->userdata['status'] == "A")) {

            $data['detail'] = $deta;
            $data['page'] = $page;
            $data['head'] = $head;

            $this->load->view('template_admin', $data);
        } else {
            echo "<script>window.location='" . site_url('takmoph_admin') . "'</script>";
        }
    }

    public function all($menu_id = null) {
        $homepage = new homepage_model();
        $subhomepage = new sub_homepage_model();
        $data['homepage'] = $homepage->get_menu_where($menu_id)->row();
        $data['result'] = $subhomepage->get_subhomepage($menu_id);
        $page = "backend/sub_homepage/all";
        $head = $data['homepage']->title_name;
        $this->output($data, $page, $head);
    }

    public function view($Id = null) {
        $subhomepage = new sub_homepage_model();
        $data['result'] = $subhomepage->get_subhomepage_where($Id)->row();
        $head = "view";
        $page = "backend/sub_homepage/view";
        $this->output($data, $page, $head);
    }

    public function create_subhomepage($Id = null) {
        $homepage = new homepage_model();
        $data['menu'] = $homepage->get_menu_where($Id)->row();
        $page = "backend/sub_homepage/create";
        $head = $data['menu']->title_name;
        $this->output($data, $page, $head);
    }

    public function save_subhomepage() {
        $input = $this->input;
        $columns = array(
            "title" => $input->post("title"),
            "detail" => $input->post("detail"),
            "homepage_id" => $input->post("homepage_id"),
            "owner" => $this->session->userdata('user_id'),
            "create_date" => date("Y-m-d H:i:s")
        );

        $this->db->insert("sub_homepage", $columns);
    }

    public function update($Id = null) {
        $sub_homepage = new sub_homepage_model();
        $page = "backend/sub_homepage/update";
        $data['result'] = $sub_homepage->get_subhomepage_where($Id)->row();
        $head = $data['result']->title;
        $this->output($data, $page, $head);
    }

    public function save_update() {
        $input = $this->input;
        $id = $input->post('id');
        $columns = array(
            "title" => $input->post("title"),
            "detail" => $input->post("detail")
        );
        $this->db->update("sub_homepage", $columns, "id = '$id'");
    }

    public function delete() {
        $Id = $this->input->post('id');
        $this->db->where("id", $Id);
        $this->db->delete("sub_homepage");
    }

}

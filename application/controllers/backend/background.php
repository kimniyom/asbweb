<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class background extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('menubar_model', 'menu');
        $this->load->model('style_model', 'style');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function output($deta = '', $page = '', $head = '') {
        $data['detail'] = $deta;
        $data['page'] = $page;
        $data['head'] = $head;
        $this->load->view('template_admin', $data);
    }

    public function index() {
        $model = new menubar_model();

        $background = $this->style->get_background();
        $sql = "SELECT * FROM style LIMIT 1";
        $result = $this->db->query($sql)->row();
        $data['navbar'] = $model->get_navbarmenu_all();
        $data['style'] = $result;
        $data['background'] = $background;
        $this->output($data, "backend/background/index", "พื้นหลัง");
    }

}

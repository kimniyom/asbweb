<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class newexpress extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('takmoph_model', 'tak');
        $this->load->model('upload_model', 'upload');
        $this->load->model('newexpress_model');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function output($deta = '', $page = '', $head = '') {
        $data['detail'] = $deta;
        $data['page'] = $page;
        $data['head'] = $head;

        $this->load->view('template2015', $data);
    }

    public function Index() {
        $express = new newexpress_model();
        $data['express'] = $express->get_express();

        $page = "new_express/index";
        $head = "ประกาศด่วน";

        $this->output($data, $page, $head);
    }


    public function view($id = null) {
        $model = new newexpress_model();
        $data['model'] = $model->get_detail($id)->row();
        $head = $data['model']->title;
        $this->output($data, "new_express/view", $head);
    }

 
}

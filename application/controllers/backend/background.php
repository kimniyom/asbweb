<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class background extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('menubar_model', 'menu');
        $this->load->model('background_model', 'bg');
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
        //$page = "web_page/news_all";
        $page = "backend/background/index";
        $head = "ภาพพื้นหลัง";
        $this->output($data = "", $page, $head);
    }

    public function page() {
        $page = "backend/background/background";
        $data['bg'] = $this->bg->get_data();

        $this->load->view($page, $data);
    }

    public function upload() {
        if ($this->session->userdata('user_id') != '') {
            $targetFolder = 'upload_images/bg'; // Relative to the root
            if (!empty($_FILES)) {

                $tempFile = $_FILES['Filedata']['tmp_name'];
                $FULLNAME = $_FILES['Filedata']['name'];
                $type = substr($FULLNAME, -3);
                $Name = "bg" . random_string('alnum', 30) . "." . $type;
                $targetFile = $targetFolder . '/' . $Name;

                //$targetFile = $targetFolder . '/' . $_FILES['Filedata']['name'];
                $targetFile = $targetFolder . '/' . $Name;
                // Validate the file type
                $fileTypes = array('jpg', 'jpeg', 'gif', 'png', 'JPG'); // File extensions
                $fileParts = pathinfo($_FILES['Filedata']['name']);
                if (in_array($fileParts['extension'], $fileTypes)) {
                    $file_string = addslashes(fread(fopen($thefile[tmp_name], "r"), $thefile[size]));

                    $data = array(
                        'background' => $Name
                    );
                    $this->db->insert('background', $data);
                    move_uploaded_file($tempFile, $targetFile);
                    echo $Name;
                } else {
                    echo 'Invalid file type.';
                }
            }
        } else {
            echo "0";
        }
    }

    public function set_bg() {
        $id = $this->input->post('id');
        
        $clearConfig = array(
          "active" => "0"  
        );
        $this->db->where("active","1");
        $this->db->update("background",$clearConfig);
        
        $columns = array(
            "active" => '1'
        );
        $this->db->where("id", $id);
        $this->db->update("background", $columns);
    }

}

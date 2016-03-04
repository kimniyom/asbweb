<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class template extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('unzip');
    }

    public function output($deta = '', $page = '', $head = '') {
        $data['detail'] = $deta;
        $data['page'] = $page;
        $data['head'] = $head;

        $this->load->view("template_admin", $data);
    }

    public function index() {
        $page = "backend/template/index";
        $head = "Template";
        $this->output($data = '', $page, $head);
    }

    public function set_template() {
        $themes = $this->input->post('template');
        $this->session->set_userdata("template", 'themes/'.$themes.'/index');
    }

    public function page() {
        $page = "backend/template/themes";
        $Model = new template_model();
        $data['themes'] = $Model->get_template_setup();

        $this->load->view($page, $data);
    }

    public function upload() {
        if ($this->session->userdata('user_id') != '') {
            $targetFolder = 'themes'; // Relative to the root
            if (!empty($_FILES)) {

                $tempFile = $_FILES['Filedata']['tmp_name'];
                $FULLNAME = $_FILES['Filedata']['name'];
                //$type = substr($FULLNAME, -3);
                $Name = $FULLNAME;
                $targetFile = $targetFolder . '/' . $Name;
                $FileName = explode('.', $Name);
                $nof = substr($Name, 0, -(strlen($FileName[count($FileName) - 1]) + 1));

                //$targetFile = $targetFolder . '/' . $_FILES['Filedata']['name'];
                $targetFile = $targetFolder . '/' . $Name;
                // Validate the file type
                $fileTypes = array('zip', 'rar'); // File extensions
                $fileParts = pathinfo($_FILES['Filedata']['name']);
                if (in_array($fileParts['extension'], $fileTypes)) {
                    //$file_string = addslashes(fread(fopen($thefile[tmp_name], "r"), $thefile[size]));

                    if (!is_dir($targetFolder . '/' . $nof)) { //create the folder if it's not already exists
                        $data = array(
                            'template' => $nof
                        );
                        $this->db->insert('template', $data);

                        move_uploaded_file($tempFile, $targetFile);

                        // Optional: Only take out these files, anything else is ignored
                        //$this->unzip->allow(array('css', 'js', 'png', 'gif', 'jpeg', 'jpg', 'tpl', 'html', 'swf'));
                        // Give it one parameter and it will extract to the same folder
                        $this->unzip->extract($targetFolder . '/' . $Name);
                        unlink($targetFolder . '/' . $Name);
                        // or specify a destination directory
                        //$this->unzip->extract('uploads/my_archive.zip', '/path/to/directory/');

                        echo $Name;
                    } else {
                        echo "error";
                    }
                } else {
                    echo 'Invalid file type.';
                }
            }
        } else {
            echo "0";
        }
    }

}

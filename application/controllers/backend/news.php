<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class news extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('takmoph_model', 'tak');
        $this->load->model('upload_model', 'upload');
        $this->load->model('news_model', 'news');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper('string');
    }

    public function output($deta = '', $page = '', $head = '') {

        if (!empty($this->session->userdata['status']) && ($this->session->userdata['status'] == "S" || $this->session->userdata['status'] == "A")) {

            $data['detail'] = $deta;
            $data['page'] = $page;
            $data['head'] = $head;

            $this->load->view('template_admin', $data);
        } else {
            echo "<script>window.location='" . site_url('takmoph2014') . "'</script>";
        }
    }

    public function get_news() {
        $data['news'] = $this->news->get_news();
        $page = "backend/news/show_news";
        $head = "ข่าวประชาสัมพันธ์ สสจ.";

        $this->output($data, $page, $head);
    }

    public function save_news() {
        $data = array(
            'id' => $_POST['new_id'],
            'titel' => $_POST['title'],
            'detail' => $_POST['detail'],
            'user_id' => $this->session->userdata('user_id'),
            'date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tb_news', $data);

        //echo $this->tak->redir('backend/news/from_upload_images_news/' . $_POST['new_id']);
    }

    public function from_edit_news() {
        $new_id = $_POST['id'];
        $data['news'] = $this->news->get_news_where($new_id);
        $this->load->view("backend/news/from_edit_news", $data);
        //$head = "แก้ไขข้อมูลข่าว";
        //$this->output($data, $page, $head);
        //echo json_encode($json);
    }

    public function edit_news() {
        $data_update = array(
            'titel' => $_POST['_title'],
            'detail' => $_POST['_detail']
        );
        $this->db->where('id', $_POST['_new_id']);
        $this->db->update('tb_news', $data_update);
        //echo $this->tak->redir('takmoph_admin/get_news/');
    }

    public function delete_news() {

        $new_id = $this->input->post('news_id');

        $sql = "SELECT * FROM images_news WHERE new_id = '" . $new_id . "'";
        $result = $this->db->query($sql);
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $rs):
                unlink('upload_images/news/' . $rs->images);
            endforeach;
        }

        $this->db->where('new_id', $new_id);
        $this->db->delete('images_news');

        $this->db->where('id', $new_id);
        $this->db->delete('tb_news');

        //echo $this->tak->redir('backend/news/get_news/');
    }

    public function delete_news_flag() {
        $news_id = $this->input->post('news_id');

        $column = array(
            "flag_delete" => "1",
            "flag_delete_user" => $this->session->userdata('user_id')
        );

        $this->db->where("id", $news_id);
        $this->db->update("tb_news", $column);
    }

    public function from_upload_images_news($new_id = '') {

        $new_model = new news_model();
        $data['news'] = $new_model->get_news_where($new_id);

        $data['new_id'] = $new_id;
        $page = "backend/news/upload_images_news";
        $head = "รูปภาพข่าว";

        $this->output($data, $page, $head);
    }

    public function album_news() {
        $new_id = $_POST['news_id'];
        $data['images'] = $this->news->get_images_news($new_id);
        $this->load->view("backend/news/album_news", $data);
    }

    public function delete_images_news() {
        $id = $_POST['id'];
        $images = $_POST['images'];

        if (!empty($images)) {
            unlink("upload_images/news/" . $images);
        }

        $this->db->where("id", $id);
        $this->db->delete("images_news");
    }

    public function upload_images_news($new_id = '') {
        $targetFolder = 'upload_images/news'; // Relative to the root
        $toDatabase = true;
        if (!empty($_FILES)) {
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $FULLNAME = $_FILES['Filedata']['name'];
            $type = substr($FULLNAME, -3);
            $Name = "img_" . random_string('alnum',30) . "." . $type;
            $targetFile = $targetFolder . '/' . $Name;

            //$targetFile = $targetFolder . '/' . $_FILES['Filedata']['name'];
            $targetFile = $targetFolder . '/' . $Name;
            // Validate the file type
            $fileTypes = array('jpg', 'jpeg', 'gif', 'png', 'JPG'); // File extensions
            $fileParts = pathinfo($_FILES['Filedata']['name']);
            //$GalleryShot = $_FILES['Filedata']['name'];
            if (in_array($fileParts['extension'], $fileTypes)) {
                $file_string = addslashes(fread(fopen($thefile[tmp_name], "r"), $thefile[size]));
                $data = array(
                    'new_id' => $new_id,
                    'images' => $Name
                );
                $this->db->insert('images_news', $data);
                move_uploaded_file($tempFile, $targetFile);
                echo '1';
            } else {
                echo 'Invalid file type.';
            }
        }
    }

}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class complain extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('takmoph_model', 'tak');
        $this->load->model('upload_model', 'upload');
        $this->load->model('news_model', 'news');
        $this->load->model('complain_model', 'complain');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper('captcha');
    }

    public function output($deta = '', $page = '', $head = '') {
        $data['detail'] = $deta;
        $data['page'] = $page;
        $data['head'] = $head;

        $this->load->view('template', $data);
    }

    public function Index() {
        $page = "complain/index";

        $path = './captcha/';
        $delete = "DELETE FROM captcha";
        $this->db->query($delete);

        $files = glob($path . '*'); // get all file names
        foreach ($files as $file) { // iterate files
            if (is_file($file))
                unlink($file); // delete file
        }


        $vals = array(
            'img_path' => './captcha/',
            'img_url' => 'http://example.com/captcha/'
        );
        $cap = create_captcha($vals);
        $data = array(
            'captcha_time' => $cap['time'],
            'ip_address' => $this->input->ip_address(),
            'word' => $cap['word']
        );
        $query = $this->db->insert_string('captcha', $data);
        $this->db->query($query);
        $sql = "SELECT * FROM captcha ORDER BY captcha_id DESC LIMIT 1";
        $rs = $this->db->query($sql)->row();
        $data['images'] = $rs->captcha_time;
        $data['word'] = $rs->word;
        //echo 'พิมพ์ตัวอักษรที่เห็นในรูปด้านล่าง:';
        //echo $cap['image'];
        //$data['cap'] = $cap['image'];
        $this->output($data, $page, "เรื่องร้องทุกข์");
    }

    public function Send_complain() {
        $data = array(
            "name" => $this->input->post("name"),
            "email" => $this->input->post("email"),
            "card" => $this->input->post("card"),
            "tel" => $this->input->post("tel"),
            "head_complain" => $this->input->post("head_complain"),
            "detail" => $this->input->post("detail"),
            "d_update" => date("Y-m-d H:i:s"),
            "ip" => $this->input->ip_address()
        );

        $this->db->insert("complain", $data);
        /*
          $client = new SoapClient("http://tools.modoeye.com/thid/ws/?WSDL");
          $result = $client->Check(new SoapParam("1234567891011", "id"));
          var_dump($result);
         * 
         */
    }

    public function Success() {
        $page = "complain/success";
        $this->output("", $page, "เรื่องร้องทุกข์");
    }

    public function View() {
        $complain = new complain_model();
        $data['complain'] = $complain->Get_complainAll();
        $page = "complain/view";
        $this->output($data, $page, "เรื่องร้องทุกข์");
    }

    public function Detail() {
        $id = $this->uri->segment(3);
        $complain = new complain_model();
        $data['complain'] = $complain->Get_complain_By_id($id);

        $page = "complain/detail";
        $this->output($data, $page, "เรื่องร้องทุกข์");
    }

    public function Delet() {
        $id = $this->input->post("id");
        $this->db->where("id", $id);
        $this->db->delete("complain");
    }

}

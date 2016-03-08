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
        $this->load->library('pagination');
    }

    public function output($deta = '', $page = '', $head = '') {
        $data['detail'] = $deta;
        $data['page'] = $page;
        $data['head'] = $head;
        $template = $this->template_model->get_template();
        $this->load->view($template['template'], $data);
    }

    public function index() {
        //$deta['new'] = $this->news->get_news();

        $count = $this->news->count();
        //$page = "web_page/news_all";
        $page = "news/index";
        $head = "ข่าวทั้งหมด";

        /*
          แบ่งหน้า
        */

        $config['base_url'] = site_url("news/page");//url ของหน้าที่เราจะแบ่ง
        $config['total_rows'] = $count;//จำนวนอะไรบางอย่างทั้งหมดของเราโดยปกติจะใช้การนับจำนวนใน database เอา
        $config['per_page'] = 8;//จำนวนอะไรบางอย่างของเราต่อหนึ่งหน้า ซึ่งจะได้จำนวนหน้าทั้งหมดเท่ากับ total_rows/per_page
        $config['uri_segment'] = 3;

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';


        $config['first_link'] = 'หน้าแรก';
        $config['last_link'] = 'หน้าสุดท้าย';

        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $data['new'] = $this->news->fetch_data($config['per_page'],$this->uri->segment(3));

        $this->pagination->initialize($config);
        $data['s_pagination'] = $this->pagination->create_links();
        //$data['page'] = $page;

        //$this->load->view('pages/test', $a_data);

        $this->output($data, $page, $head);
    }

    public function page() {
        //$deta['new'] = $this->news->get_news();

        $count = $this->news->count();
        //$page = "web_page/news_all";
        $page = "news/index";
        $head = "ข่าวทั้งหมด";

        /*
          แบ่งหน้า
        */

        $config['base_url'] = site_url("news/page");//url ของหน้าที่เราจะแบ่ง
        $config['total_rows'] = $count;//จำนวนอะไรบางอย่างทั้งหมดของเราโดยปกติจะใช้การนับจำนวนใน database เอา
        $config['per_page'] = 8;//จำนวนอะไรบางอย่างของเราต่อหนึ่งหน้า ซึ่งจะได้จำนวนหน้าทั้งหมดเท่ากับ total_rows/per_page
        $config['uri_segment'] = 3;

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';


        $config['first_link'] = 'หน้าแรก';
        $config['last_link'] = 'หน้าสุดท้าย';

        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $data['new'] = $this->news->fetch_data($config['per_page'],$this->uri->segment(3));

        $this->pagination->initialize($config);
        $data['s_pagination'] = $this->pagination->create_links();
        //$data['page'] = $page;

        //$this->load->view('pages/test', $a_data);

        $this->output($data, $page, $head);
    }



    public function show_detail_news($new_id = '') {
        $data['news'] = $this->news->get_news_where($new_id);
        $data['images'] = $this->news->get_images_news($new_id);
        $data['images_first'] = $this->news->get_first_images_news($new_id);
        $page = "web_page/detail_news";
        $head = "ข่าวประชาสัมพันธ์";

        $this->output($data, $page, $head);
    }

    public function view($new_id = '') {
        $maxread = $this->news->max_read($new_id);
        $maxnew = ($maxread + 1);
        $columns = array("views" => $maxnew);
        $this->db->update("tb_news",$columns,"id = '$new_id' ");
        $data['near'] = $this->news->last_news();
        $data['hot'] = $this->news->hot();
        $data['news'] = $this->news->get_news_where($new_id);
        $data['images'] = $this->news->get_images_news($new_id);
        $data['images_first'] = $this->news->get_first_images_news($new_id);
        $page = "news/view";
        $head = "ข่าวประชาสัมพันธ์";

        $this->output($data, $page, $head);
    }

    public function page_news() {
        $this->load->view('from/page_news');
    }

}

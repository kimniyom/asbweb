<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class menu extends CI_Controller {
    /*
     *  Creart Code By kimniyom
     *  Date 27/05/2556 | Time 22.26.00 
     * 
     */

    public function __construct() {
        parent::__construct();
        $this->load->model('takmoph_model', 'tak');
        $this->load->model('menu_model');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function output($deta = '', $page = '', $head = '') {
        $data['detail'] = $deta;
        $data['page'] = $page;
        $data['head'] = $head;
        $template = $this->template_model->get_template();
        $this->load->view($template['template'], $data);
    }

    public function get_menu() {
        $page = $this->uri->segment(3);
        $deta = '';
        $page = "from/$page";
        $head = '';
        $this->output($deta, $page, $head);
    }

    /* เมนูจากการสร้างใน เมนูเว็บไซต์ */

    public function submenu($id = null) {
        $menu = new menu_model();
        $data['masmenu'] = $menu->get_mas_menu($id);
        $data['submenu'] = $this->tak->get_sub_menu($id);
        $page = "menu/submenu";
        $head = $data['masmenu']->mas_menu;

        $this->output($data, $page, $head);
    }

    /* เมนูจากการสร้างใน ระบบฝ่าย ไฟล์ดาวน์โหลด */

    public function filemenu($id = null) {
        $menu = new menu_model();
        $data['file'] = $menu->get_filemenu_system($id);
        $page = "menu/filemenu";
        $groupmenu = $menu->get_detail_menu($id);
        $head = $groupmenu->mas_menu;
        $data['icon'] = $groupmenu->icon;
        $this->output($data, $page, $head);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
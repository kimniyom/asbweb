<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class template_model extends CI_Model {

    var $CI;

    function __construct() {
        parent::__construct();
        $this->CI = $this->load->database('default', TRUE);
        $this->CI->query("SET NAMES 'UTF8'");
    }

    // Fetch data according to per_page limit.
    public function get_template() {
        $this->db->cache_on();
        $sql = "SELECT * FROM template WHERE active = '1' LIMIT 1";
        $query = $this->db->query($sql)->row();

        if (!empty($query->template)) {
            return 'themes/'.$query->template .'/index';
        } else {
            return "template2015";
        }
    }

    public function themes() {
        $template = $this->session->userdata('template');
        if ($template == '') {
            $themes = $this->get_template();
            $this->session->set_userdata('template', $themes);
        }
    }

    public function get_template_setup() {
        $this->db->select("*");
        $this->db->from("template");
        $this->db->order_by("id", "desc");
        $query = $this->db->get();

        return $query;
    }

}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

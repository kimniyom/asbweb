<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author  : kimniyom
 * @company : Takmoph 2016
 * @create  : 24 ม.ค. 2559 21:47:33
 * @Write From Thailand
 */
class sub_homepage_model extends CI_Model {

    var $CI;

    function __construct() {
        parent::__construct();
        $this->CI = $this->load->database('default', TRUE);
        $this->CI->query("SET NAMES 'UTF8'");
    }

    function get_subhomepage($Id = null, $limit = null) {
        $this->db->cache_on();
        $this->db->select("*");
        $this->db->from("sub_homepage");
        $this->db->where("homepage_id", $Id);
        $this->db->where("upper", null);
        $this->db->order_by("id", "DESC");
        if ($limit != null || $limit != '') {
            $this->db->limit($limit);
        }

        $query = $this->db->get();

        return $query;
    }

    function get_subhomepage_where($Id = null) {
        $this->db->select("sub_homepage.*,menu_homepage.title_name");
        $this->db->from("sub_homepage");
        $this->db->join("menu_homepage", "sub_homepage.homepage_id = menu_homepage.id");
        $this->db->where("sub_homepage.id", $Id);
        $this->db->order_by("id", "DESC");
        //$this->db->limit("5");
        $query = $this->db->get();

        return $query;
    }
    
    function getupper($subid = null) {
        $this->db->select("*");
        $this->db->from("sub_homepage");
        $this->db->where("upper", "$subid");

        $query = $this->db->get();

        return $query;
    }

}

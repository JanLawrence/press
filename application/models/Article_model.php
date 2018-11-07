<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends CI_Model{
    public function __construct(){
        $this->user = isset($this->session->userdata['user']) ? $this->session->userdata['user'] : 1; //get session
    }
    public function getArticleTypePerUser(){
        $this->db->select("at.id , at.type")
        ->from("tbl_user_article_type uat")
        ->join("tbl_article_type at", "ON at.id = uat.article_type_id", "inner");
        $this->db->where('uat.user_id', $this->user->id); 
        $article = $this->db->get();
        $article = $article->result();
        $data = array();
        if(strtolower($article[0]->type) == 'all'){

        }
        
    }
    public function getArticles(){
        $this->db->select("a.id,
                    a.title,
                    CONCAT(ui.fname, ' ', ui.mname, ' ', ui.lname) NAME
                    ,a_type.`type`,
                    a.description,
                    a.article,
                    SUBSTRING(a.article,1,300) sub_article,
                    a.date_published,
                    a.date_created")
        ->from("tbl_article a")
        ->join("tbl_article_type a_type","ON a_type.id = a.article_type","left")
        ->join("tbl_user_info ui","ON ui.user_id = a.created_by","left");
        $where = "a_type.`type` LIKE '%".$_GET['type']."%' AND a.id LIKE '%%'";
        $this->db->where($where);
        $this->db->order_by("a.date_created DESC");

        $query = $this->db->get();
        return $query->result();
    }
}
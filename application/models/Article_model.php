<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends CI_Model{
    public function __construct(){
        $this->user = isset($this->session->userdata['user']) ? $this->session->userdata['user'] : 1; //get session
    }
    public function getArticles($id = 0){
        $this->db->select("a.id,
                    a.title,
                    CONCAT(ui.fname, ' ', ui.mname, ' ', ui.lname) NAME
                    ,a_type.`type`,
                    a.description,
                    a.article,
                    ab.name image_name, ab.type image_type, ab.content image_content,
                    SUBSTRING(a.article,1,300) sub_article,
                    a.date_published,
                    a.date_created")
        ->from("tbl_article a")
        ->join("tbl_article_type a_type","ON a_type.id = a.article_type","left")
        ->join("tbl_article_banner ab","ON ab.article_id = a.id","left")
        ->join("tbl_user_info ui","ON ui.user_id = a.created_by","left");
        if($id == 0){
            $where = "a_type.`type` LIKE '%".$_GET['type']."%' AND a.id LIKE '%%' AND a.published = 'yes'";
            $this->db->where($where);
        } else {
            $this->db->where('a.id', $id);
        }
        $this->db->order_by("a.date_created DESC");

        $query = $this->db->get();
        return $query->result();
    }
    public function getArticlesType(){
        $this->db->select("a_type.*")
        ->from("tbl_article a")
        ->join("tbl_article_type a_type","ON a_type.id = a.article_type","left")
        ->group_by('a_type.id')
        ->order_by('a_type.type');
        $query = $this->db->get();
        return $query->result();
    }
    public function getArticlesPerType($id, $aview){
     
        $this->db->select("a.*, a_type.type article_type_name, ab.name image_name, ab.type image_type, ab.content image_content,   SUBSTRING(a.article,1,300) sub_article")
        ->from("tbl_article a")
        ->join("tbl_article_type a_type","ON a_type.id = a.article_type","left")
        ->join("tbl_article_banner ab","ON ab.article_id = a.id","left")
        ->where('a.article_type', $id)
        ->where('a.published', 'yes')
        ->order_by('a_type.type');
        if($id != $aview){
            $this->db->limit(3);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function showHeadlineArticle(){
        $this->db->select('a.id,a.title,at.type,CONCAT(ui.fname," ",ui.mname," ",ui.lname) author,a.published,a.date_published,a.headline,ab.content image_content, ab.type image_type')
        ->from('tbl_article a')
        ->join('tbl_article_type at','ON at.id = a.article_type','left')
        ->join('tbl_article_banner ab', 'ON ab.article_id = a.id','left')
        ->join('tbl_user_info ui','ON ui.user_id = a.created_by','left');
        $this->db->where('a.headline','yes');
        $data = $this->db->get();
        return $data->result();
    }
}

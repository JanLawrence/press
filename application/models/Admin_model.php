<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{
    public function __construct(){
        $this->user = isset($this->session->userdata['user']) ? $this->session->userdata['user'] : 1; //get session
    }
    public function articleTypeList(){
        $query = $this->db->get_where('tbl_article_type', array('status' => 'saved'));
        return $query->result();
    }
    public function userList(){
        // get data from tbl_user_info and tbl_user
        $this->db->select("ui.user_id,CONCAT(ui.lname, ', ' ,ui.fname, ' ', ui.mname) name, u.user_type,
            ui.fname f_name,ui.lname l_name, ui.mname m_name , ui.email, u.username, u.password, uat.article_type_id, at.type article_type
        ")
        ->from("tbl_user_info ui")
        ->join("tbl_user u","ON u.id = ui.user_id","inner")
        ->join("tbl_user_article_type uat","ON uat.user_id = ui.user_id","left")
        ->join("tbl_article_type at","ON at.id = uat.article_type_id","left");
        $this->db->where("u.status", "saved");
        $this->db->order_by("ui.lname");
        $query = $this->db->get();
    
        foreach($query->result() as $each){
            $each->password = $this->encryptpass->pass_crypt($each->password, 'd');
        }

        return $query->result();
    }
    public function saveUser(){

        $check = $this->db->get_where('tbl_user', array('username'=>$_POST['username'])); //check if username inputed is exisiting
        if(empty($check->result())){ // if not existing insert user
            //data that will be inserted to tbl_user
            $data = array(
                "username" => $_POST['username'],
                "password" => $this->encryptpass->pass_crypt($_POST['password']),
                "user_type" => $_POST['usertype'],
                "created_by" => $this->user->id,
                "date_created" => date('Y-m-d H:i:s')
            );
            $this->db->insert('tbl_user',$data); //insert data to tbl_user
            $userid = $this->db->insert_id(); // getting the id of the inserted data
            
            //data that will be inserted to tbl_user_info
            $data = array(
                "user_id" => $userid,
                "fname" => $_POST['fname'],
                "mname" => $_POST['mname'],
                "lname" => $_POST['lname'],
                "email" => $_POST['email'],
                "created_by" => $this->user->id,
                "date_created" => date('Y-m-d H:i:s')
            );
            $this->db->insert('tbl_user_info',$data); //insert data to tbl_user_info

            if($_POST['usertype']!= 'admin' &&  $_POST['usertype'] != 'student'){
                //data that will be inserted to tbl_user_article_type
                $data = array(
                    "user_id" => $userid,
                    "article_type_id" => $_POST['article'],
                    "created_by" => $this->user->id,
                    "date_created" => date('Y-m-d H:i:s')
                );
                $this->db->insert('tbl_user_article_type',$data); //insert data to tbl_user_article_type
            }
        } else { // if existing print 1
            echo 1; 
        }
    }
    public function editUser(){

        $checkById = $this->db->get_where('tbl_user', array('id' => $_POST['id'])); //get data by user id
        $checkById= $checkById->result();
        $check = $this->db->get_where('tbl_user', array('username' => $_POST['username'])); //check if username inputed is exisiting
        if(!empty($check->result())){ // if existing username
            if($checkById[0]->username == $_POST['username']){ // if inputed is same in data by user id
                //data that will be updated to tbl_user
                $this->db->set('username', $_POST['username']);
                $this->db->set('password', $this->encryptpass->pass_crypt($_POST['password']));
                $this->db->set('user_type', $_POST['usertype']);
                $this->db->set('modified_by', $this->user->id); 
                $this->db->set('date_modified', date('Y-m-d H:i:s'));
                $this->db->where('id', $_POST['id']);
                $this->db->update('tbl_user');
                
                //data that will be updated to tbl_user_info
                $this->db->set('fname', $_POST['fname']);
                $this->db->set('mname', $_POST['mname']);
                $this->db->set('lname', $_POST['lname']);
                $this->db->set('email', $_POST['email']);
                $this->db->set('modified_by', $this->user->id);
                $this->db->set('date_modified', date('Y-m-d H:i:s'));
                $this->db->where('user_id', $_POST['id']);
                $this->db->update('tbl_user_info');

                if($_POST['usertype']!= 'admin' &&  $_POST['usertype'] != 'student'){
                    //data that will be updated to tbl_user_article_type
                    $this->db->set('article_type_id', $_POST['article']);
                    $this->db->set('modified_by', $this->user->id);
                    $this->db->set('date_modified', date('Y-m-d H:i:s'));
                    $this->db->where('user_id', $_POST['id']);
                    $this->db->update('tbl_user_article_type');
                }
            } else {
                echo 1;
            }
        } else {
            //data that will be updated to tbl_user
            $this->db->set('username', $_POST['username']);
            $this->db->set('password', $this->encryptpass->pass_crypt($_POST['password']));
            $this->db->set('user_type', $_POST['usertype']);
            $this->db->set('modified_by', $this->user->id);
            $this->db->set('date_modified', date('Y-m-d H:i:s'));
            $this->db->where('id', $_POST['id']);
            $this->db->update('tbl_user');
            
            //data that will be updated to tbl_user_info
            $this->db->set('fname', $_POST['fname']);
            $this->db->set('mname', $_POST['mname']);
            $this->db->set('lname', $_POST['lname']);
            $this->db->set('email', $_POST['email']);
            $this->db->set('modified_by', $this->user->id);
            $this->db->set('date_modified', date('Y-m-d H:i:s'));
            $this->db->where('user_id', $_POST['id']);
            $this->db->update('tbl_user_info');

            if( $_POST['usertype']!= 'admin' &&  $_POST['usertype'] != 'student'){
                //data that will be updated to tbl_user_article_type
                $this->db->set('article_type_id', $_POST['article']);
                $this->db->set('modified_by', $this->user->id);
                $this->db->set('date_modified', date('Y-m-d H:i:s'));
                $this->db->where('user_id', $_POST['id']);
                $this->db->update('tbl_user_article_type');
            }
        }
    }  
    public function deleteUser(){
        $id = $_POST['id'];
        $this->db->set('status', 'deleted'); //update status deleted by id tbl_user
        $this->db->where('id', $_POST['id']);
        $this->db->update('tbl_user');
        
        $this->db->set('status', 'deleted'); //update status deleted by user_id tbl_user_info
        $this->db->where('user_id', $_POST['id']);
        $this->db->update('tbl_user_info');

        $this->db->set('status', 'deleted'); //update status deleted by user_id tbl_user_article_type
        $this->db->where('user_id', $_POST['id']);
        $this->db->update('tbl_user_article_type');
    }
    public function addArticleType(){
        $check = $this->db->get_where('tbl_article_type', array('type'=>$_POST['type'])); //check if type inputed is exisiting
        if(empty($check->result())){ // if not existing insert article type
            //data that will be inserted to tbl_article_type
            $data = array(
                "type" => $_POST['type'],
                "created_by" => $this->user->id,
                "date_created" => date('Y-m-d H:i:s')
            );
            $this->db->insert('tbl_article_type',$data); //insert data to tbl_article_type
        } else {
            echo 1;
        }
    }
    public function editArticleType(){
        $checkById = $this->db->get_where('tbl_article_type', array('id' => $_POST['id'])); //get data by user id
        $checkById= $checkById->result();
        $check = $this->db->get_where('tbl_article_type', array('type'=>$_POST['type'])); //check if type inputed is exisiting
        if(!empty($check->result())){  // if existing type
            if($checkById[0]->type == $_POST['type']){ // if inputed is same in data by type id
                //data that will be updated to tbl_article_type
                $this->db->set('type', $_POST['type']);
                $this->db->where('id', $_POST['id']);
                $this->db->update('tbl_article_type');
            } else {
                echo 1;
            }
        } else {
             //data that will be updated to tbl_article_type
             $this->db->set('type', $_POST['type']);
             $this->db->where('id', $_POST['id']);
             $this->db->update('tbl_article_type');
        }
    }
    public function deleteArticleType(){
        $id = $_POST['id'];
        $this->db->set('status', 'deleted'); //update status deleted by id tbl_article_type
        $this->db->where('id', $_POST['id']);
        $this->db->update('tbl_article_type');
    }
    public function getArticleTypePerUser(){
        $this->db->select("at.*")
        ->from("tbl_user_article_type uat")
        ->join("tbl_article_type at", "ON at.id = uat.article_type_id", "inner");
        $this->db->where('uat.user_id', $this->user->id); 
        $this->db->where('at.status', 'saved'); 
        $article = $this->db->get();
        $article = $article->result();
        $data = array();
        if(strtolower($article[0]->type) == 'all'){
            $this->db->where("type NOT LIKE '%all%' AND status = 'saved'");
            $article2 = $this->db->get('tbl_article_type');
            $data = $article2->result();
        } else {
            $data = $article;
        }
        return $data;
    }
    public function articleListPerWriter(){
        $this->db->select("a.*, at.type artice_type_name, ui.user_id, CONCAT(ui.lname, ', ' ,ui.fname, ' ', ui.mname) editor_name")
        ->from("tbl_article a")
        ->join("tbl_article_type at", "ON at.id = a.article_type", "inner")
        ->join("tbl_article_editor ae", "ON ae.article_id = a.id", "left")
        ->join("tbl_user_info ui", "ON ui.user_id = ae.user_id", "left");
        $this->db->where('a.created_by', $this->user->id); 
        $this->db->where('a.status', 'saved'); 
        $article = $this->db->get();
        return $article->result();
    }
    public function articleListPerEditor(){
        $articleArr = array();
        foreach($this->getArticleTypePerUser() as $each){
            $articleArr[] = $each->id;
        }
        $articleType = implode(',',  $articleArr);
        $this->db->select("a.*, at.type artice_type_name, ui.user_id, CONCAT(ui.lname, ', ' ,ui.fname, ' ', ui.mname) editor_name")
        ->from("tbl_article a")
        ->join("tbl_article_type at", "ON at.id = a.article_type", "inner")
        ->join("tbl_article_editor ae", "ON ae.article_id = a.id", "left")
        ->join("tbl_user_info ui", "ON ui.user_id = ae.user_id", "left");
        $this->db->where('a.article_type IN ('.$articleType.')'); 
        $this->db->where('a.status', 'saved'); 
        $this->db->where('a.edited = "no" OR ae.user_id = '.$this->user->id); 
        $article = $this->db->get();
        return $article->result();
    }
    public function addArticle(){
        $data = array(
            "title" => $_POST['title'],
            "writer" => $_POST['writer'],
            "article_type" => $_POST['type'],
            "description" => $_POST['description'],
            "article" => $_POST['content'],
            "date_published" => date('Y-m-d H:i:s'),
            "created_by" => $this->user->id,
            "date_created" => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_article',$data); //insert data to tbl_article
    }
    public function editArticle(){
        if($this->user->user_type == 'writer'){

            $this->db->set("title", $_POST['title']);
            $this->db->set("writer", $_POST['writer']);
            $this->db->set("article_type", $_POST['type']);
            $this->db->set("description", $_POST['description']);
            $this->db->set("article", $_POST['content']);
            $this->db->set("modified_by", $this->user->id);
            $this->db->set("date_modified", date('Y-m-d H:i:s'));
            $this->db->where('id', $_POST['id']);
            $this->db->update('tbl_article');//update data to tbl_article
        } else if($this->user->user_type == 'editor') {
            $this->db->set("title", $_POST['title']);
            $this->db->set("writer", $_POST['writer']);
            $this->db->set("article_type", $_POST['type']);
            $this->db->set("description", $_POST['description']);
            $this->db->set("article", $_POST['content']);
            $this->db->set("edited", 'yes');
            $this->db->set("editor_date_modified", date('Y-m-d H:i:s'));
            $this->db->where('id', $_POST['id']);
            $this->db->update('tbl_article');//update data to tbl_article
            
            $checkArticleEditor = $this->db->get_where('tbl_article_editor', array('user_id' => $this->user->id, 'article_id' => $_POST['id']));
            $checkArticleEditor = $checkArticleEditor->result();
            if(empty($checkArticleEditor)){
                $data = array(
                    "user_id" => $this->user->id,
                    "article_id" => $_POST['id'],
                    "created_by" => $this->user->id,
                    "date_created" => date('Y-m-d H:i:s')
                );
                $this->db->insert('tbl_article_editor',$data); //insert data to tbl_article_editor
            }
        }
    }
    public function deleteArticle(){
        $this->db->set("status", 'deleted');
        $this->db->where('id', $_POST['id']);
        $this->db->update('tbl_article');//update data to tbl_article set to deleted
    }
}
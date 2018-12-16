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
        $this->db->select("ui.user_id,
            CONCAT(ui.lname, ', ' ,ui.fname, ' ', ui.mname) name, u.user_type,
            ui.fname f_name,ui.lname l_name, ui.mname m_name , ui.email, 
            u.username, u.password, uat.article_type_id, at.type article_type
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
    public function getPublish(){
        $this->db->order_by("date_created");
        $data = $this->db->get('tbl_newspaper');
        return $data->result();

    }
    public function getNotifList(){
        $this->db->order_by("date_created");
        $data = $this->db->get('tbl_newspaper');
        return $data->result();

    }
    public function addPublish(){
        if(!isset($_POST['id'])){ // if replace is not existing

            if(isset($_FILES['file']) && $_FILES['file']['tmp_name']!=''){ //if statement is true
                
                $dir = 'assets/newspaper';
                $config['upload_path'] = './'.$dir.'/';
                $config['allowed_types'] = 'pdf';
                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('file')){
                    echo strip_tags($this->upload->display_errors());
                } else {
                    $data = $this->upload->data();
                    //insert attachment
                    list($fileName , $ext) = explode('.', $_FILES['file']['name']);
                    $tmpName  = $_FILES['file']['tmp_name'];            
                    $fileSize = $_FILES['file']['size'];                
                    $fileType = $_FILES['file']['type'];   
                    $fileNewTemp = file_get_contents($tmpName);     
                    if(!get_magic_quotes_gpc())
                    {  
                        $fileName = addslashes($fileName);
                    }
                    
                    $data = array(
                        'name' => $fileName,
                        'type' => $fileType,
                        'size' => $fileSize,
                        'content' => $fileNewTemp,
                        'directory' =>  $dir.'/'. $_FILES['file']['name'],
                        'created_by' => $this->user->id,
                        'date_created' => date('Y-m-d H:i:s')
                    );
                    $this->db->insert('tbl_newspaper', $data);
                    echo 1;
                }
                
            }
        } else { // if replace publish
            $this->db->set('active', 'no');
            $this->db->where('id', $_POST['id']);
            $this->db->update('tbl_newspaper');//update data to tbl_newspaper set to active no
            echo 2;
        }
    }
    public function getNameByUser(){
        $this->db->select("ui.user_id,
            CONCAT(ui.lname, ', ' ,ui.fname, ' ', ui.mname) name
        ")
        ->from("tbl_user_info ui")
        ->join("tbl_user u","ON u.id = ui.user_id","inner");
        $this->db->where("u.status", "saved");
        $this->db->where("u.user_type", $_POST['user']);
        $this->db->order_by("ui.lname");
        $query = $this->db->get();
        echo json_encode($query->result());
    }
    public function notifList(){
        $this->db->select("n.user_type, n.summary, n.content, n.date_created, GROUP_CONCAT(CONCAT(ui.lname, ', ' ,ui.fname, ' ', ui.mname)) names
        ")
        ->from("tbl_notif n")
        ->join("tbl_notif_name_list nl","ON nl.notif_id = n.id","inner")
        ->join("tbl_user_info ui","ON ui.user_id = nl.user_id","inner");
        $this->db->where("n.status", "saved");
        $this->db->order_by("n.date_created");
        $this->db->group_by("n.id");
        $query = $this->db->get();
        return $query->result();
    }
    public function notifByUser(){
        $this->db->select("n.id, n.user_type, n.summary, n.content, n.date_created, GROUP_CONCAT(CONCAT(ui.lname, ', ' ,ui.fname, ' ', ui.mname)) names
        ")
        ->from("tbl_notif n")
        ->join("tbl_notif_name_list nl","ON nl.notif_id = n.id","inner")
        ->join("tbl_user_info ui","ON ui.user_id = nl.user_id","inner");
        $this->db->where("n.status", "saved");
        $this->db->where("nl.user_id", $this->user->id);
        $this->db->order_by("n.date_created");
        $this->db->group_by("n.id");
        $query = $this->db->get();
        return $query->result();
    }
    public function notifById(){
        $this->db->select("n.id, n.user_type, n.summary, n.content, n.date_created, GROUP_CONCAT(CONCAT(ui.lname, ', ' ,ui.fname, ' ', ui.mname)) names
        ")
        ->from("tbl_notif n")
        ->join("tbl_notif_name_list nl","ON nl.notif_id = n.id","inner")
        ->join("tbl_user_info ui","ON ui.user_id = nl.user_id","inner");
        $this->db->where("n.status", "saved");
        $this->db->where("n.id", $_POST['id']);
        $this->db->order_by("n.date_created");
        $this->db->group_by("n.id");
        $query = $this->db->get();
        echo json_encode($query->result());
    }
    public function getCoe(){
        $data = $this->db->get('tbl_coe');
        return $data->result();
    }
    public function saveCoe(){
        $validate = $this->getCoe();
        if(empty($validate)){   
            $data = array(
                "mission" => $_POST['mission'],
                "vision" => $_POST['vision'],
                "core_values" => $_POST['core_values'],
                "palantaw_tinguha" => $_POST['palantaw_tinguha'],
                "objectives" => $_POST['objectives'],
                "program_mission" => $_POST['program_mission'],
                "created_by" => $this->user->id,
                "date_created" => date('Y-m-d H:i:s')
            );
            $this->db->insert('tbl_coe',$data); //insert data to tbl_coe
        } else {
            $this->db->set("mission", $_POST['mission']);
            $this->db->set("vision", $_POST['vision']);
            $this->db->set("core_values", $_POST['core_values']);
            $this->db->set("palantaw_tinguha", $_POST['palantaw_tinguha']);
            $this->db->set("objectives", $_POST['objectives']);
            $this->db->set("program_mission", $_POST['program_mission']);
            $this->db->set("modified_by", $this->user->id);
            $this->db->set("date_modified", date('Y-m-d H:i:s'));
            $this->db->where('id',$validate[0]->id);
            $this->db->update('tbl_coe');//update data to tbl_coe
        }
    }
    public function addFaculty(){
        $data = array(
            "fname" => $_POST['fname'],
            "mname" => $_POST['mname'],
            "lname" => $_POST['lname'],
            "address" => $_POST['address'],
            "department" => $_POST['department'],
            "position" => $_POST['position'],
            "contact_num" => $_POST['contact'],
            "email" => $_POST['email'],
            "created_by" => $this->user->id,
            "date_created" => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_faculty', $data);
        $facultyId = $this->db->insert_id(); 
        
        list($fileName , $ext) = explode('.', $_FILES['file']['name']);
        $tmpName  = $_FILES['file']['tmp_name'];            
        $fileSize = $_FILES['file']['size'];                
        $fileType = $_FILES['file']['type'];   
        $fileNewTemp = file_get_contents($tmpName);     
        if(!get_magic_quotes_gpc())
        {  
            $fileName = addslashes($fileName);
        }
        
        $data = array(
            'faculty_id' => $facultyId,
            'name' => $fileName,
            'type' => $fileType,
            'size' => $fileSize,
            'content' => $fileNewTemp,
            'directory' =>  $dir.'/'. $_FILES['file']['name'],
            'created_by' => $this->user->id,
            'date_created' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_faculty_picture', $data);

        if(isset($_POST['subject'])){
            foreach($_POST['subject'] as $key=> $each){
                $data = array(
                    'faculty_id' => $facultyId,
                    'subject' => $each,
                    'days' => $_POST['days'][$key],
                    'time' => $_POST['time'][$key],
                    'created_by' => $this->user->id,
                    'date_created' => date('Y-m-d H:i:s')
                );
                $this->db->insert('tbl_faculty_schedule', $data);
            }
        }
        echo 1;
    }
    public function editFaculty(){
        $data = $this->showFacultyList($_POST['id']);
        if(!empty($data)){
            $this->db->set("fname", $_POST['fname']);
            $this->db->set("mname", $_POST['mname']);
            $this->db->set("lname", $_POST['lname']);
            $this->db->set("address", $_POST['address']);
            $this->db->set("department", $_POST['department']);
            $this->db->set("position", $_POST['position']);
            $this->db->set("contact_num", $_POST['contact']);
            $this->db->set("email", $_POST['email']);
            $this->db->set("modified_by", $this->user->id);
            $this->db->set("date_modified", date('Y-m-d H:i:s'));
            $this->db->where('id',$_POST['id']);
            $this->db->update('tbl_faculty');//update data to tbl_coe
        }
    }
    public function deleteFaculty(){
        $this->db->set("status", 'deleted');
        $this->db->where('id', $_POST['id']);
        $this->db->update('tbl_faculty');//update data to tbl_article set to deleted
    }
    public function showFacultyList($id){
        $this->db->select('f.*, CONCAT(f.lname,", ",f.fname," ",f.mname) name')
        ->from('tbl_faculty f');
        $this->db->where('f.status','saved');
        if($id != 0){
            $this->db->where('f.id',$id);
        }
        $this->db->order_by('f.lname');
        $query = $this->db->get();
        return $query->result();
    }
    public function showPositionList(){
        $this->db->select('f.position')
        ->from('tbl_faculty f');
        $this->db->where('f.position NOT LIKE "%Faculty%"');
        $this->db->group_by('f.position');

        $query = $this->db->get();
        return $query->result();
    }
    public function addNotif(){
        $data = array(
            "user_type" => $_POST['user'],
            "summary" => $_POST['summary'],
            "content" => $_POST['content'],
            "status" => 'saved',
            "created_by" => $this->user->id,
            "date_created" => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_notif',$data);  //insert data to tbl_notif
        $notifId = $this->db->insert_id(); // getting the id of the inserted data

        foreach($_POST['name'] as $key => $each){
            $data = array(
                "notif_id" =>  $notifId,
                "user_id" => $each,
                "created_by" => $this->user->id,
                "date_created" => date('Y-m-d H:i:s')
            );
            $this->db->insert('tbl_notif_name_list',$data);  //insert data to tbl_notif_name_list
        }
    }
    public function getFaculty(){
        $this->db->select("fp.faculty_id,
            CONCAT(f.lname, ', ' ,f.fname, ' ', f.mname) name, fp.type, fp.name image_name, fp.content, f.position
        ")
        ->from("tbl_faculty f")
        ->join("tbl_faculty_picture fp","ON f.id = fp.faculty_id","left");
        $this->db->where("f.position", "Faculty");
        $query = $this->db->get();
        return $query->result();
    }
    public function getPres(){
        $this->db->select("fp.faculty_id,
            CONCAT(f.lname, ', ' ,f.fname, ' ', f.mname) name, fp.type, fp.name image_name, fp.content, f.position
        ")
        ->from("tbl_faculty f")
        ->join("tbl_faculty_picture fp","ON f.id = fp.faculty_id","left");
        $this->db->where("f.position LIKE '%University President%'");
        $query = $this->db->get();
        return $query->result();
    }
    public function getVicePres(){
        $this->db->select("fp.faculty_id,
            CONCAT(f.lname, ', ' ,f.fname, ' ', f.mname) name, fp.type, fp.name image_name, fp.content, f.position
        ")
        ->from("tbl_faculty f")
        ->join("tbl_faculty_picture fp","ON f.id = fp.faculty_id","left");
        $this->db->where("f.position LIKE '%Vice President%'");
        $query = $this->db->get();
        return $query->result();
    }
    public function getDean(){
        $this->db->select("fp.faculty_id,
            CONCAT(f.lname, ', ' ,f.fname, ' ', f.mname) name, fp.type, fp.name image_name, fp.content, f.position
        ")
        ->from("tbl_faculty f")
        ->join("tbl_faculty_picture fp","ON f.id = fp.faculty_id","left");
        $this->db->where("f.position LIKE '%Dean%'");
        $query = $this->db->get();
        return $query->result();
    }
    public function getHead(){
        $this->db->select("fp.faculty_id,
            CONCAT(f.lname, ', ' ,f.fname, ' ', f.mname) name, fp.type, fp.name image_name, fp.content, f.position
        ")
        ->from("tbl_faculty f")
        ->join("tbl_faculty_picture fp","ON f.id = fp.faculty_id","left");
        $this->db->where("f.position LIKE '%Head%'");
        $query = $this->db->get();
        return $query->result();
    }
}
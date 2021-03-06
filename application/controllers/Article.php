<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

    public function index()
	{
        if(!empty($this->session->userdata['user'])){ // if has session
            if($this->session->userdata['user']->user_type == 'student'){ // if user type student 
                // load view
                $data['notif'] = $this->admin_model->notifByUser();
                
                $this->load->view('templates/header');
                $this->load->view('article/dashboard', $data);
                $this->load->view('templates/footer');
			} else { 
				show_404(); // show 404 error page
			}
		} else {
			show_404(); // show 404 error page
        }
     
    }
    public function newspaper(){
        if(!empty($this->session->userdata['user'])){ // if has session
            if($this->session->userdata['user']->user_type == 'student'){ // if user type student 
                // load view
                $data['publish'] = $this->admin_model->getPublish();
                $this->load->view('templates/header');
                $this->load->view('article/newspaper', $data);
                $this->load->view('templates/footer');
			} else { 
				show_404(); // show 404 error page
			}
		} else {
			show_404(); // show 404 error page
        }
    }
    public function articles(){
        if(!empty($this->session->userdata['user'])){ // if has session
            if($this->session->userdata['user']->user_type == 'student'){ // if user type student 
				// load view
                // $data['articles'] = $this->article_model->getArticles();
                // $data['articleType'] = ucwords($_GET['type']);
                $logs = array(
                    "transaction" => 'Login',
                    "created_by" => $this->session->userdata['user']->id,
                    "date_created" => date('Y-m-d H:i:s')
                );
                $this->db->insert('tbl_user_logs', $logs);
                $data['article_type'] = $this->article_model->getArticlesType();
                $data['headline'] = $this->article_model->showHeadlineArticle();
                $data['announcement'] = $this->admin_model->getAnnouncements();
                $this->load->view('templates/header');
                $this->load->view('article/article',$data);
                $this->load->view('templates/footer');
			} else { 
				show_404(); // show 404 error page
			}
		} else {
			show_404(); // show 404 error page
        }
    }
    public function view(){
        if(!empty($this->session->userdata['user'])){ // if has session
            if($this->session->userdata['user']->user_type == 'student'){ // if user type student 
				// load view
                $data['article'] = $this->article_model->getArticles($_GET['id']);
                $this->load->view('templates/header');
                $this->load->view('article/view',$data);
                $this->load->view('templates/footer');
			} else { 
				show_404(); // show 404 error page
			}
		} else {
			show_404(); // show 404 error page
        }
       
    }
}

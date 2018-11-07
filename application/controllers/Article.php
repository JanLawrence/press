<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

    public function index()
	{
        if(!empty($this->session->userdata['user'])){ // if has session
            if($this->session->userdata['user']->user_type == 'student'){ // if user type student 
				// load view
                $this->load->view('templates/header');
                $this->load->view('article/dashboard');
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
                $data['articles'] = $this->article_model->getArticles();
                $data['articleType'] = ucwords($_GET['type']);
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

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

    public function index()
	{
        // if(!empty($this->session->userdata['user'])){ // if has session
        //     if($this->session->userdata['user']->user_type == 'student'){ // if user type student 
		// 		// load view
        //         // $data['articleList'] = $this->admin_model->articleTypeList();
		// 		$this->load->view('templates/header');
        //         $this->load->view('article/article');
        //         $this->load->view('templates/footer');
		// 	} else { 
		// 		show_404(); // show 404 error page
		// 	}
		// } else {
		// 	show_404(); // show 404 error page
        // }
        
        $this->load->view('templates/header');
        $this->load->view('article/article');
        $this->load->view('templates/footer');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Games extends CI_Controller {

    public function game1()
	{
        if(!empty($this->session->userdata['user'])){ // if has session
            if($this->session->userdata['user']->user_type == 'student'){ // if user type student 
                $this->load->view('templates/header');
                $this->load->view('games/game1');
                $this->load->view('templates/footer');
			} else { 
				show_404(); // show 404 error page
			}
		} else {
			show_404(); // show 404 error page
        }
     
    }
    public function game2()
	{
        if(!empty($this->session->userdata['user'])){ // if has session
            if($this->session->userdata['user']->user_type == 'student'){ // if user type student 
                $this->load->view('templates/header');
                $this->load->view('games/game2');
                $this->load->view('templates/footer');
			} else { 
				show_404(); // show 404 error page
			}
		} else {
			show_404(); // show 404 error page
        }
     
    }
    public function game3()
	{
        if(!empty($this->session->userdata['user'])){ // if has session
            if($this->session->userdata['user']->user_type == 'student'){ // if user type student 
                $this->load->view('templates/header');
                $this->load->view('games/game3');
                $this->load->view('templates/footer');
			} else { 
				show_404(); // show 404 error page
			}
		} else {
			show_404(); // show 404 error page
        }
     
    }
}
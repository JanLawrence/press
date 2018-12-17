<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index() // login page of admin
	{
        if(empty($this->session->userdata['user'])){ // if empty session

            //declared validations for username and password
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'callback_validate'); // validation is on validate method

            if($this->form_validation->run() == TRUE){ // validation success set session
                // get tbl_user data to be set to "user" session
                $user = $this->input->post('username');
                $query = $this->db->get_where('tbl_user', array('username' => $user));
                $data = $query->result();
                $this->session->set_userdata('user', $data[0]);
                // set session and redirect based on user_type
                $userSession = $this->session->userdata['user'];
                $this->redirect_admin($userSession->user_type);
            } else {
                $this->load->view('admin/login'); // redirect to login page if validation failed
            }
        } else { // if there is a session redirect to specific link in redirect_admin method
            $userSession = $this->session->userdata['user']; 
            $this->redirect_admin($userSession->user_type);
        }
	}
	public function redirect_admin($type){ // redirect based on user_type 
        if($type == 'admin'){
            redirect('admin/dashboard');
        } else if($type == 'writer'){
            redirect('admin/dashboard');
		} else if($type=="editor"){
            redirect('admin/dashboard');
        } else {
			show_404(); // show 404 error page
		}
    }
    public function validate($pass){ // validate username and password, will be used in callback for form validation
        $user = $this->input->post('username');
        if($user != ''){ // if username is inputed
            // query user by username and user type is equal to admin or president
            $this->db->select('*')
                    ->from('tbl_user');
            $this->db->where("username = '$user' AND status = 'saved' AND (user_type = 'admin' OR user_type = 'writer' OR user_type = 'editor')");
            $query = $this->db->get();
            $data = $query->result();

            
            if(empty($data)){ // if empty query ($data) validation false (invalid username)
                $this->form_validation->set_message('validate', 'Invalid Username '.$user);
                return FALSE;
            } else { // if not empty $data (query)
                if($pass != ''){   // if password is inputed
                    if($pass == $this->encryptpass->pass_crypt($data[0]->password, 'd')){ // if pass is equal to password in db validation passed
                        return TRUE;
                    } else {
                        $this->form_validation->set_message('validate', 'Invalid Password'); // if pass is not equal to password in db validation failed
                        return FALSE;
                    }
                } else { // if password is not inputed validation false (invalid pass)
                    $this->form_validation->set_message('validate', 'Invalid Password');
                    return FALSE;
                }
            }
        } else { // if username is not inputed validation false (invalid username)
            $this->form_validation->set_message('validate', 'Invalid Username');
            return FALSE;
        }
    }

	public function users()
	{
		if(!empty($this->session->userdata['user'])){ // if has session
            if($this->session->userdata['user']->user_type == 'admin'){ // if user type admin 
				// load view
				$data['userList'] = $this->admin_model->userList();
				$data['articleList'] = $this->admin_model->articleTypeList();
				$this->load->view('admin/templates/header');
				$this->load->view('admin/users/users', $data);
				$this->load->view('admin/templates/footer');
			} else { 
                show_404(); // show 404 error page
			}
		} else {
            show_404(); // show 404 error page
		}
	}
	public function articletype()
	{
        if(!empty($this->session->userdata['user'])){ // if has session
            if($this->session->userdata['user']->user_type == 'admin'){ // if user type admin 
				// load view
                $data['articleList'] = $this->admin_model->articleTypeList();
				$this->load->view('admin/templates/header');
				$this->load->view('admin/articletype/articletype', $data);
				$this->load->view('admin/templates/footer');
			} else { 
				show_404(); // show 404 error page
			}
		} else {
			show_404(); // show 404 error page
		}
	}
	public function article()
	{
		if(!empty($this->session->userdata['user'])){ // if has session
            if($this->session->userdata['user']->user_type == 'editor' || $this->session->userdata['user']->user_type == 'writer'){ // if user type writer or editor 
                // load view
                $data['type'] = $this->admin_model->getArticleTypePerUser();
                if($this->session->userdata['user']->user_type == 'writer'){
                    $data['articles'] = $this->admin_model->articleListPerWriter();
                } else if($this->session->userdata['user']->user_type == 'editor'){
                    $data['articles'] = $this->admin_model->articleListPerEditor();
                }
				$this->load->view('admin/templates/header');
				$this->load->view('admin/article/article', $data);
				$this->load->view('admin/templates/footer');
			} else { 
				show_404(); // show 404 error page
			}
		} else {
			show_404(); // show 404 error page
		}
	}
	public function dashboard()
	{
		if(!empty($this->session->userdata['user'])){ // if has session
			if($this->session->userdata['user']->user_type != 'student'){ // if user type writer or editor or admin
                // load view
                if($this->session->userdata['user']->user_type == 'writer'){
                    $total1 = $this->db->get_where('tbl_article', array('created_by' => $this->session->userdata['user']->id, 'edited' => 'yes'));
                    $total1 = $total1->result();
                    $total2 = $this->db->get_where('tbl_article', array('created_by' => $this->session->userdata['user']->id));
                    $total2 = $total2->result();
                    $notif = $this->admin_model->notifByUser();
                } else if($this->session->userdata['user']->user_type == 'editor') {
                    $total1 = $this->db->get_where('tbl_article', array('edited' => 'yes'));
                    $total1 = $total1->result();
                    $total2 = $this->db->get_where('tbl_article', array('edited' => 'no'));
                    $total2 = $total2->result();
                    $notif = $this->admin_model->notifByUser();
                } else if($this->session->userdata['user']->user_type == 'admin') {
                    $total1 = $this->db->get_where('tbl_user', array('user_type' => 'editor'));
                    $total1 = $total1->result();
                    $total2 = $this->db->get_where('tbl_user', array('user_type' => 'writer'));
                    $total2 = $total2->result();
                    $total3 = $this->db->get_where('tbl_article', array('status' => 'saved'));
                    $total3 = $total3->result();
                    $notif = array();
                    $data['total3'] = $total3;
                }
                $data['total1'] = $total1; 
                $data['total2'] = $total2;
                $data['notif'] = $notif;
				$this->load->view('admin/templates/header');
				$this->load->view('admin/dashboard/dashboard', $data);
				$this->load->view('admin/templates/footer');
			} else { 
				show_404(); // show 404 error page
			}
		} else {
			show_404(); // show 404 error page
		}
	}
	public function saveUser(){
        $this->admin_model->saveUser(); // save user controller
    }
    public function editUser(){
        $this->admin_model->editUser(); // edit user controller
    }
    public function deleteUser(){
        $this->admin_model->deleteUser(); // delete user controller
	}
	public function logout(){
        $session = $this->session->userdata['user'];
        //destroy session
        $this->session->sess_destroy();
        //redirect to homepage
        if($session->user_type== 'admin' || $session->user_type== 'editor' || $session->user_type== 'writer'){
            redirect('admin');
        } else if($session->user_type== 'student'){
            redirect('');
        }
    }
    public function addArticleType(){
        $this->admin_model->addArticleType();
    }
    public function editArticleType(){
        $this->admin_model->editArticleType();
    }
    public function deleteArticleType(){
        $this->admin_model->deleteArticleType();
    }
    public function addArticle(){
        $this->admin_model->addArticle();
    }
    public function editArticle(){
        $this->admin_model->editArticle();
    }
    public function deleteArticle(){
        $this->admin_model->deleteArticle();
    }

    public function publish()
	{
		if(!empty($this->session->userdata['user'])){ // if has session
            if($this->session->userdata['user']->user_type == 'admin'){ // if user type admin 
				// load view
				// $data['publish'] = $this->admin_model->getPublish();
				$data['article'] = $this->admin_model->showArticle();
				$this->load->view('admin/templates/header');
				$this->load->view('admin/publish/publish', $data);
				$this->load->view('admin/templates/footer');
			} else { 
                show_404(); // show 404 error page
			}
		} else {
            show_404(); // show 404 error page
		}
	}
    public function addPublish()
	{
		$this->admin_model->addPublish();
    }
    public function unpublish(){
        $this->admin_model->unpublish();
    }
    public function coe()
	{
        if(!empty($this->session->userdata['user'])){ // if has session
            if($this->session->userdata['user']->user_type == 'admin'){ // if user type admin 

                // load view
                $data['coe'] = $this->admin_model->getCoe();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/coe/coe', $data);
                $this->load->view('admin/templates/footer');
                
            } else { 
                show_404(); // show 404 error page
            }
        } else {
            show_404(); // show 404 error page
        }
        
    }
    public function saveCoe(){
        $this->admin_model->saveCoe();
    }
    
    public function faculty()
	{
        if(!empty($this->session->userdata['user'])){ // if has session
            if($this->session->userdata['user']->user_type == 'admin'){ // if user type admin 

                // load view
                $data['faculty'] = $this->admin_model->showFacultyList($id=0);
                $data['position'] = $this->admin_model->showPositionList();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/faculty/faculty', $data);
                $this->load->view('admin/templates/footer');
                
            } else { 
                show_404(); // show 404 error page
            }
        } else {
            show_404(); // show 404 error page
        }
        
    }
    public function getFacultySched(){
        $this->admin_model->getFacultySched();
    }
    public function addFaculty(){
        $this->admin_model->addFaculty();
    }
    public function editFaculty(){
        $this->admin_model->editFaculty();
    }
    public function deleteFaculty(){
        $this->admin_model->deleteFaculty();
    }
    public function getNameByUser(){
        $this->admin_model->getNameByUser();
    }
    public function addNotif(){
        $this->admin_model->addNotif();
    }
    public function notifById(){
        $this->admin_model->notifById();
    }
    public function notification()
	{
        if(!empty($this->session->userdata['user'])){ // if has session
            if($this->session->userdata['user']->user_type == 'admin'){ // if user type admin 

                // load view
                $data['notifList'] = $this->admin_model->notifList();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/notification/notification' ,$data);
                $this->load->view('admin/templates/footer');
                
            } else { 
                show_404(); // show 404 error page
            }
        } else {
            show_404(); // show 404 error page
        }
        
    }
}

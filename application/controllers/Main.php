<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function index(){
        $data['coe'] = $this->admin_model->getCoe();
        $data['faculty'] = $this->admin_model->getFaculty();
        $data['pres'] = $this->admin_model->getPres();
        $data['vice'] = $this->admin_model->getVicePres();
        $data['dean'] = $this->admin_model->getDean();
        $data['head'] = $this->admin_model->getHead();
        $data['editor'] = $this->admin_model->getEditor();
        $data['officer'] = $this->admin_model->getOfficer();
        $data['contact'] = $this->admin_model->getContactUs();
        $this->load->view('homepage' ,$data); 
    }
    public function index2(){
        $data['coe'] = $this->admin_model->getCoe();
        $data['faculty'] = $this->admin_model->getFaculty();
        $data['pres'] = $this->admin_model->getPres();
        $data['vice'] = $this->admin_model->getVicePres();
        $data['dean'] = $this->admin_model->getDean();
        $data['head'] = $this->admin_model->getHead();
        $data['editor'] = $this->admin_model->getEditor();
        $data['officer'] = $this->admin_model->getOfficer();
        $data['contact'] = $this->admin_model->getContactUs();
        $this->load->view('homepage3' ,$data); 
    }
	public function login() // login page of admin
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
                if($data[0]->user_type == 'student'){
                    $logs = array(
                        "transaction" => 'Login',
                        "created_by" => $data[0]->id,
                        "date_created" => date('Y-m-d H:i:s')
                    );
                    $this->db->insert('tbl_user_logs', $logs);
                }
                // set session and redirect based on user_type
                $userSession = $this->session->userdata['user'];
				redirect(base_url('article'));
            } else {
				$this->load->view('login'); // redirect to login page if validation failed
            }
        } else { // if there is a session redirect to specific link in redirect_admin method
            $userSession = $this->session->userdata['user']; 
			redirect(base_url('article'));
        }
	}
    public function validate($pass){ // validate username and password, will be used in callback for form validation
        $user = $this->input->post('username');
        if($user != ''){ // if username is inputed
            // query user by username and user type is equal to admin or president
            $this->db->select('*')
                    ->from('tbl_user');
            $this->db->where("username = '$user' AND user_type = 'student' AND status = 'saved' AND confirm = 'yes'");
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
    public function register(){
            $this->form_validation->set_rules('fname', 'First Name', 'required');
            $this->form_validation->set_rules('lname', 'Last Name', 'required');
            $this->form_validation->set_rules('bday', 'Birthday', 'required');
            $this->form_validation->set_rules('studId', 'Student Id', 'required|is_unique[tbl_user_info.student_id]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_user_info.email]');
            $this->form_validation->set_rules('contact', 'Contact', 'required');
            $this->form_validation->set_rules('section', 'Section', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tbl_user.username]');
            $this->form_validation->set_rules('password', 'Password', 'callback_validateconfirm'); // validation is on validate method

            if($this->form_validation->run() == TRUE){ // validation success
                 //data that will be inserted to tbl_user
                $data = array(
                    "username" => $_POST['username'],
                    "password" => $this->encryptpass->pass_crypt($_POST['password']),
                    "user_type" => 'student',
                    "confirm" => 'no',
                    "created_by" => 0,
                    "date_created" => date('Y-m-d H:i:s')
                );
                $this->db->insert('tbl_user',$data); //insert data to tbl_user
                $userid = $this->db->insert_id(); // getting the id of the inserted data
                
                //data that will be inserted to tbl_user_info
                $data2 = array(
                    "user_id" => $userid,
                    "fname" => $_POST['fname'],
                    "mname" => $_POST['mname'],
                    "lname" => $_POST['lname'],
                    "email" => $_POST['email'],
                    "student_id" => $_POST['studId'],
                    "bday" => $_POST['bday'],
                    "contact_no" => $_POST['contact'],
                    "section" => $_POST['section'],
                    "status" => 'saved',
                    "created_by" => 0,
                    "date_created" => date('Y-m-d H:i:s')
                );
                $this->db->insert('tbl_user_info',$data2); //insert data to tbl_user_info
                // // get tbl_user data to be set to "user" session
                // $user = $this->input->post('username');
                // $query = $this->db->get_where('tbl_user', array('username' => $user));
                // $data = $query->result();
                // $this->session->set_userdata('user', $data[0]);
                // // set session and redirect based on user_type
                // $userSession = $this->session->userdata['user'];
                redirect(base_url('main/login'));
            } else {
				$this->load->view('register'); // redirect to register page if validation failed
            }
       
    }
    public function validateconfirm($pass){
        $confirm = $this->input->post('confirmpass');
        if($confirm != ''){ // if confirm pass is inputed
           if($pass == $confirm){
                return TRUE;
           } else {
                $this->form_validation->set_message('validateconfirm', 'Password does not match'); // if pass is not equal to confirm pass
                return FALSE;
           }
        } else { // if confirm pass is not inputed validation false
            $this->form_validation->set_message('validateconfirm', 'Password does not match');
            return FALSE;
        }
    }
    public function accounts(){
        if(!empty($this->session->userdata['user'])){ // if has session
            $this->load->view('templates/header');
            $this->load->view('admin/accounts/manage');
            $this->load->view('templates/footer');
        } else {
            show_404(); // show 404 error page
        }
    }
}

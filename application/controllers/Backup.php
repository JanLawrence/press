<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends CI_Controller {

    public function add()
    {
    	$path = "C:/press_backup";
    	
	    if(!is_dir($path))
	    {
	      mkdir($path,0755,TRUE);
	    } 

    	$this->load->dbutil();

		$prefs = array(     
		    'format'      => 'sql',             
		    'filename'    => 'birthing_clinic.sql'
		);

		$backup = $this->dbutil->backup($prefs); 

		$db_name = date("Ymd-His").'.sql';
		$save = 'C:/press_backup/'.$db_name;

		$this->load->helper('file');
		write_file($save, $backup); 

		// $this->load->model('backup_model');
		// $data = array(
        //     "file_name"        =>$db_name,
        //     'location'		   =>'C:/birthing_backup/'.$db_name,
        //     'date_added'	   =>date("Y-m-d-H-i-s"),
        // );

        // $this->backup_model->insert($data);

        redirect( base_url(). 'admin');
    }
    public function download()
    {
    	$this->load->model('backup_model');
    	$data = $this->backup_model->get_data($this->uri->segment(3));

    	if(!empty($data)){
    		$this->load->dbutil();

    		$prefs = array(     
			    'format'      => 'zip',             
			    'filename'    => 'birthing_clinic.sql'
			);

			$backup = $this->dbutil->backup($prefs); 

    		$this->load->helper('download');
        	force_download($data[0]->file_name, $backup); 

        	redirect( base_url(). 'backup');
    	}
    }
    public function restore()
    {
        $conn = new mysqli($this->db->hostname, $this->db->username, $this->db->password, $this->db->database);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $templine = 'SET FOREIGN_KEY_CHECKS = 0;';
        $templine2 = 'SET FOREIGN_KEY_CHECKS = 1;';
        $lines = file_get_contents('C:/press_backup/'.$_FILES['file']['name'].''); 
        // echo $templine. $lines. $templine2;
        // $this->db->query( $templine. $lines. $templine2);

        if ($conn->multi_query($templine. $lines. $templine2) === TRUE) {
        } else {
            echo $conn->error;
        }
        
        $conn->close();
        // foreach ($lines as $line)
        // {
            // // Skip it if it's a comment
            // if (substr($line, 0, 2) == '--' || $line == '')
            // continue;

            // // Add this line to the current templine we are creating
            // $templine .= $line;

            // // If it has a semicolon at the end, it's the end of the query so can process this templine
            // if (substr(trim($line), -1, 1) == ';')
            // {
            // // Perform the query

            
            // $this->db->query($lines);

            // Reset temp variable to empty
            // $templine = '';
        //     }
        // }

    }
}

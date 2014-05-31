<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
    $this->load->model('authentication_model');
    $this->load->model('locate_model');
    $this->load->model('upload_model');
	}

	function index()
	{
    
		$this->load->template('upload_form', array('error' => ' ' ));
    
	}

	function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);
    
    $username = $_POST['username'];
    //if ( ($_POST['username'] != 'user') || ($_POST['password'] != 'pass') )
    if ( !($this->authentication_model->checkPassword($username,$_POST['password'])) )
    {
			$error = array('error' => 'Wrong username or password');
      
      $this->load->view('upload_failed', $error);
    }
    else
    { 
		  if ( ! $this->upload->do_upload())
		  {
			  $error = array('error' => $this->upload->display_errors());

			  //$this->load->template('upload_form', $error);
        $this->load->template('upload_failed', $error);
		  }
		  else
		  {
			  $data = array('upload_data' => $this->upload->data());
        $data['userid'] = $this->authentication_model->getid($username);
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
          $data['ip'] = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
          $data['ip'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
          $data['ip'] = $_SERVER['REMOTE_ADDR'];
        }
        //$data['ip'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
        //$data['country'] = $this->locate_model->getCountry($data['ip']);
        //$data['isp'] = $this->locate_model->getISP($data['ip']);
        
        $data['locId'] = $this->locate_model->getIdCity($data['ip']);
        //$data['city'] = $this->locate_model->getCity($data['locId']);
        
        $data['insertid'] = $this->upload_model->addUpload($data['userid'],$data['ip'],$data['locId'],$data['upload_data']['file_name']);
  			
        $this->load->template('upload_success');
	  	}
    }
	}
}
?>
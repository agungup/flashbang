<?php

class Filemanagement extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
    $this->load->model('authentication_model');
    $this->load->model('locate_model');
    $this->load->model('file_model');
	}
  
	function index()
	{
    $data['filelist'] = $this->file_model->getFileList();
    foreach($data['filelist'] as &$value)
    {
      $value['userid'] = $this->authentication_model->getuser($value['userid']);
      $temp = $this->locate_model->getCity($value['locId']);
      $value['isp'] = $this->locate_model->getISP($value['ip']);
      $value['latitude'] = $temp['latitude'];
      $value['longitude'] = $temp['longitude'];
      $value['country'] = $this->locate_model->getCountry($value['ip']);
    }
		$this->load->template('filelist', $data);
	}
  
  function byid($userid)
	{
    $data['filelist'] = $this->file_model->getFileList($userid);
    foreach($data['filelist'] as &$value)
    {
      $value['userid'] = $this->authentication_model->getuser($value['userid']);
      $temp = $this->locate_model->getCity($value['locId']);
      $value['isp'] = $this->locate_model->getISP($value['ip']);
      $value['latitude'] = $temp['latitude'];
      $value['longitude'] = $temp['longitude'];
      $value['country'] = $this->locate_model->getCountry($value['ip']);
    }
		$this->load->template('filelist', $data);
	}
  
  function csv($userid=0)
	{
    $data['filelist'] = $this->file_model->getFileList($userid);
    foreach($data['filelist'] as &$value)
    {
      $value['userid'] = $this->authentication_model->getuser($value['userid']);
      $temp = $this->locate_model->getCity($value['locId']);
      $value['isp'] = $this->locate_model->getISP($value['ip']);
      $value['latitude'] = $temp['latitude'];
      $value['longitude'] = $temp['longitude'];
      $value['country'] = $this->locate_model->getCountry($value['ip']);
    }
		$this->load->view('csv', $data);
	}
}
?>
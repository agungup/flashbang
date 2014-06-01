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
      $value['city'] = $temp['city'];
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
      $value['city'] = $temp['city'];
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
      $value['city'] = $temp['city'];
      $value['latitude'] = $temp['latitude'];
      $value['longitude'] = $temp['longitude'];
      $value['country'] = $this->locate_model->getCountry($value['ip']);
    }
		$this->load->view('csv', $data);
	}
  
  function trace($ip = 0, $hop = 15)
	{
    if($ip==0)
    {
      $data['filelist'] = $this->file_model->getFileList();
      foreach($data['filelist'] as &$value)
      {
        $value['userid'] = $this->authentication_model->getuser($value['userid']);
        $temp = $this->locate_model->getCity($value['locId']);
        $value['isp'] = $this->locate_model->getISP($value['ip']);
        $value['city'] = $temp['city'];
        $value['latitude'] = $temp['latitude'];
        $value['longitude'] = $temp['longitude'];
        $value['country'] = $this->locate_model->getCountry($value['ip']);
      }
	  	$this->load->template('filelisttotrace', $data);
    }
    else
    {
      exec("traceroute -m ".$hop." -n ".$ip." | tail -n+2 | awk '{ print $2 }'",$data['output']);
      foreach($data['output'] as &$outputip)
      {
        $tempip = $outputip;
        //echo $tempip."<br>";
        $temploc = $this->locate_model->getIdCity($tempip);
        //echo $tempip."<br>".$temploc;
        $outputip = $this->locate_model->getCity($temploc);
        
        $outputip['country'] = $this->locate_model->getCountry($tempip);
        $outputip['isp'] = $this->locate_model->getISP($tempip);
        $outputip['ip'] = $tempip;
      }
      $this->load->template('tracelist', $data);
    }
    
	}
}
?>
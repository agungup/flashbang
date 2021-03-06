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
      $value['user'] = $this->authentication_model->getuser($value['userid']);
      $value['device'] = substr($value['filename'],0,strpos($value['filename'],'_'));
      $temp = $this->locate_model->getCity($value['locId']);
      $value['isp'] = $this->locate_model->getISP($value['ip']);
      $value['city'] = $temp['city'];
      $value['latitude'] = $temp['latitude'];
      $value['longitude'] = $temp['longitude'];
      $value['country'] = $this->locate_model->getCountry($value['ip']);
    }
		$this->load->template('filelist', $data);
	}
  
  function byid($userid,$device="%")
	{
    $data['filelist'] = $this->file_model->getFileList($userid,$device);
    foreach($data['filelist'] as &$value)
    {
      $value['user'] = $this->authentication_model->getuser($value['userid']);
      $value['device'] = substr($value['filename'],0,strpos($value['filename'],'_'));
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
      $value['user'] = $this->authentication_model->getuser($value['userid']);
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
      redirect(base_url().'filemanagement/', 'refresh');
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
 
  function location($lat = 0, $lng = 0)
	{
      $data['lat'] = $lat;
      $data['lng'] = $lng;
      $this->load->template('map', $data);
  }
}
?>
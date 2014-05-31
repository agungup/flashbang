<?php
class file_model extends CI_model {
	public function __construct()
	{
		$this->load->database();
	}
	
	public function getFileList($userid = 0)
	//insert upload data
	//Input: username valid
	//Output: id
	{
    if($userid == 0)
    {
      $str = "SELECT * FROM position";
    }
    else
    {
      $str = "SELECT * FROM position WHERE userid=".$userid;
    }
    $query = $this->db->query($str);
    
		return $query->result_array();
	}
}
?>
<?php
class upload_model extends CI_model {
	public function __construct()
	{
		$this->load->database();
	}
	
	public function addUpload($userid,$ip,$locId,$filename)
	//insert upload data
	//Input: username valid
	//Output: id
	{
    $data = array('userid' => $userid, 'ip' => $ip, 'locId' => $locId, 'filename' => $filename);
    $str = $this->db->insert_string('position', $data);
    $query = $this->db->query($str);
    
		return $this->db->insert_id();
	}
}
?>
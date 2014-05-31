<?php
class authentication_model extends CI_model {
	public function __construct()
	{
		$this->load->database();
	}
	
	public function getid($username)
	//get user id
	//Input: username valid
	//Output: id
	{
    $this->db->select('id');
		$where = array('username'=>$username);
		$this->db->where($where);
		$query = $this->db->get('users');
		$temp = $query->row_array();
    return $temp['id'];
	}
  
  public function getuser($id)
	//get user name
	//Input: id valid
	//Output: user name
	{
    $this->db->select('username');
		$where = array('id'=>$id);
		$this->db->where($where);
		$query = $this->db->get('users');
		$temp = $query->row_array();
    return $temp['username'];
	}
  
  public function checkPassword($username,$password)
	//check user & pass
	//Input: username & password valid
	//Output: 0 -> wrong username/password
	{
    $this->db->select('id');
		$where = array('username'=>$username,
                   'password'=>$password);
		$this->db->where($where);
		$query = $this->db->get('users');
		return $query->num_rows();
	}
}
?>
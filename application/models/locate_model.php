<?php
class locate_model extends CI_model {
	public function __construct()
	{
		$this->load->database();
	}
	
	public function getCountry($ip)
	//get country by ip
	//Input: ip format a.b.c.d
	//Output: string location
	{
    $query = $this->db->query("SELECT country_name FROM GeoIPCountry WHERE INET_ATON('".$ip."') BETWEEN start_ip AND end_ip LIMIT 1");
		$temp = $query->row_array();
    if(empty($temp['country_name'])) $temp['country_name'] = "Reserved IP";
    return $temp['country_name'];
	}
  
  public function getIdCity($ip)
	//get id city by ip
	//Input: ip format a.b.c.d
	//Output: id city
	{
    $query = $this->db->query("SELECT locId FROM GeoLiteCityBlocks WHERE INET_ATON('".$ip."') BETWEEN startIpNum AND endIpNum LIMIT 1");
		$temp = $query->row_array();
    if(empty($temp['locId'])) $temp['locId'] = 1;
    return $temp['locId'];
	}
  
  public function getCity($id)
	//get city by id
	//Input: id
	//Output: string location
	{
    $query = $this->db->query("SELECT * FROM GeoLiteCityLocation WHERE locId = ".$id." LIMIT 1");
		return $query->row_array();
	}
  
  public function getISP($ip)
	//get ISP by ip
	//Input: id
	//Output: string location
	{
    $query = $this->db->query("SELECT name FROM GeoIPASNum WHERE INET_ATON('".$ip."') BETWEEN startIp AND endIp LIMIT 1");
		$temp = $query->row_array();
    if(empty($temp['name'])) $temp['name'] = "Local Network";
    return $temp['name'];
	}
}
?>
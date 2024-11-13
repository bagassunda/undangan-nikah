<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_wedding extends CI_Model 
{
	public function get_setting_data()
	{
		$query = $this->db->query("SELECT * from tbl_settings WHERE id=1");
		return $query->first_row('array');
	}

	public function show($userId)
{
    $this->db->where('userId', $userId);
    $query = $this->db->get('tbl_wedding');
    return $query->first_row('array');
}


	 public function update($data, $userId)
	{
        $this->db->where('userId', $userId);
        $this->db->update('tbl_wedding',$data);
    }
}
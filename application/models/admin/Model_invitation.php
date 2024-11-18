<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_invitation extends CI_Model
{
    public function get_setting_data()
    {
        $query = $this->db->query("SELECT * FROM tbl_settings WHERE id");
        return $query->first_row('array');
    }

    public function show($userId)
    {
        $sql = "SELECT * FROM tbl_invitation WHERE userId = ? ORDER BY id ASC";
        $query = $this->db->query($sql, array($userId));
        return $query->result_array();
    }

    function invitation_check($id)
    {
        $sql = 'SELECT * FROM tbl_invitation WHERE id=?';
        $query = $this->db->query($sql, array($id));
        return $query->first_row('array');
    }

    function getData($id)
    {
        $sql = 'SELECT * FROM tbl_invitation WHERE id=?';
        $query = $this->db->query($sql, array($id));
        return $query->first_row('array');
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_invitation');
    }

    function add($data)
    {
        $this->db->insert('tbl_invitation', $data);
        return $this->db->insert_id();
    }

    function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_invitation', $data);
    }
}
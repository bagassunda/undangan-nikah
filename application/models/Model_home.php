<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_home extends CI_Model
{

    public function get_guest_by_id($id)
    {
        $query = $this->db->get_where('tbl_invitation', ['userId' => $id]);
        return $query->row_array();
    }

    public function get_invitation_by_name($name)
    {
        $this->db->select('*');
        $this->db->from('tbl_invitation');
        $this->db->join('tbl_wedding', 'tbl_wedding.userId = tbl_invitation.userId');
        $this->db->where('tbl_invitation.nama_lengkap', $name);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_undangan_data($userId)
    {
        $query = $this->db->query("
        SELECT *
        FROM tbl_wedding 
        JOIN tbl_invitation ON tbl_invitation.userId = tbl_wedding.userId
        WHERE tbl_wedding.userId = ?", array($userId));

        return $query->row_array();
    }

    public function get_guestbook_data()
    {
        $query = $this->db->query("SELECT * from tbl_guestbook ORDER BY id DESC");
        return $query->result_array();
    }

    function add($data)
    {
        $this->db->insert('tbl_guestbook', $data);
        return $this->db->insert_id();
    }
}
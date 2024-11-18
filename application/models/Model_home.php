<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_home extends CI_Model
{

    // Metode untuk mengambil nama tamu dari tabel tbl_invitation berdasarkan ID
    public function get_guest_by_id($id)
    {
        $query = $this->db->get_where('tbl_invitation', ['userId' => $id]);
        return $query->row_array();
    }

    public function get_invitation_by_name($name)
    {
        $sql = "
            SELECT 
                tbl_invitation.nama_lengkap, 
                tbl_invitation.url, 
                tbl_wedding.*
            FROM 
                tbl_invitation
            JOIN 
                tbl_wedding 
            ON 
                tbl_invitation.userId = tbl_wedding.userId
            WHERE 
                tbl_invitation.nama_lengkap = ?
            ORDER BY tbl_invitation.id
        ";
        $query = $this->db->query($sql, array($name)); // Menggunakan parameter binding untuk keamanan
        return $query->result_array(); // Mengembalikan semua hasil
    }
    


    public function get_undangan_data()
    {
        $query = $this->db->query("SELECT * from tbl_wedding WHERE id=1");
        return $query->first_row('array');
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
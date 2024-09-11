<?php

class Klaim_karyawan_model extends CI_model
{
    public function get_klaim()
    {
        $query = $this->db->get('klaim_karyawan');
        return $query->result_array();
    }
    public function get_all_klaim()
    {
        $query = $this->db->get('klaim_karyawan');
        return $query->result_array();
    }

    // Fungsi untuk mengambil data klaim karyawan berdasarkan NIK
    public function get_klaim_by_nik($nik)
    {
        $this->db->where('nik', $nik);
        $query = $this->db->get('klaim_karyawan');
        return $query->row_array(); // Mengembalikan satu baris
    }
    public function get_klaim_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('klaim_karyawan');
        return $query->row_array(); // Mengembalikan satu baris
    }
    public function tambah_klaim_karyawan($data)
    {
        if ($this->db->insert('klaim_karyawan', $data)) {
            return true;
        } else {
            log_message('error', 'Database insert error: ' . $this->db->last_query());
            return false;
        }
    }
    public function getKlaimById($id)
    {
        return $this->db->get_where('klaim_karyawan', ['id' => $id])->row_array();
    }

    public function updateKlaimKaryawan($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('klaim_karyawan', $data);
    }
    public function hapusKlaimKaryawan($id)
    {
        // Delete klaim karyawan data from 'klaim_karyawan' table
        $this->db->where('id', $id);
        return $this->db->delete('klaim_karyawan');
    }
}

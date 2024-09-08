<?php

class Model_upah_karyawan extends CI_model
{    
    public function getupah()
    {
        $query = $this->db->get('upah_karyawan')->result_array();
        return $query;
    }
    public function getJoinUpahKaryawan()
    {
        // This joins `upah_karyawan` with other related tables (e.g., karyawan)
        $this->db->select('upah_karyawan.*, karyawan.nama_karyawan, karyawan.nik_karyawan, karyawan.penempatan, karyawan.status_kerja');
        $this->db->from('upah_karyawan');
        $this->db->join('karyawan', 'karyawan.id = upah_karyawan.id_karyawan', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getUpahKaryawan() {
        $this->db->select('*');
        $this->db->from('upah_karyawan');
        $query = $this->db->get();
        return $query->result_array();
    }
   
}

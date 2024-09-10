<?php

class Model_klaim extends CI_model
{
    public function getklaim($id)
    {
        $query = $this->db->get('upah_karyawan')->result_array();
        return $query;
    }
}

<?php

class Foodtin_model extends CI_Model
{

    public function getJurusan()
    {
        $this->db->from('jurusan');
        $query = $this->db->get()->result_object();

        return $query;
    }

    public function get_kelas($id)
    {
        $this->db->from('kelas');
        $this->db->where('kelas_jurusan_id', $id);
        $query = $this->db->get();

        return $query->result();
    }
}

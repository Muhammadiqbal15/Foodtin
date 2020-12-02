<?php

class Foodtin_model extends CI_Model
{

    public function getUserdata()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('jurusan', 'jurusan.id_jurusan = user.jurusan');
        $this->db->join('kelas', 'kelas.id_kelas = user.kelas');
        $this->db->where('id', $this->session->userdata('id'));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function updateuser($data, $kondisi)
    {
        $this->db->update('user', $data, $kondisi);
    }

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

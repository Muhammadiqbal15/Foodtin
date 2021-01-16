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

    public function tampilproduct()
    {
        return $this->db->get('product')->result_array();
    }

    public function getallproduct()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('user', $this->session->userdata('id'));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getallproductbyid($id_product)
    {
        $this->db->from('product');
        $this->db->join('user', 'user.id = product.user');
        $this->db->where('id_product', $id_product);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function makber()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('jenis', 'Makanan Berat');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function makring()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('jenis', 'Makanan Ringan');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function minuman()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('jenis', 'Minuman');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function updateproduct($data, $kondisi)
    {
        $this->db->update('product', $data, $kondisi);
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

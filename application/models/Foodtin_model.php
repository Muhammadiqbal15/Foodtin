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

    public function getuser()
    {
        return $this->db->get('user')->result_array();
    }

    public function tampilproduct($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function countAllproduct()
    {
        return $this->db->get('product')->num_rows();
    }

    public function cariproduct()
    {
        $key = $this->input->post('keyword', true);
        $this->db->like('nama', $key);
        return $this->db->get('product')->result_array();
    }

    public function find($id)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('user', 'user.id = product.user');
        $this->db->where('id_product', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getallproduct()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('user', $this->session->userdata('id'));
        $this->db->order_by('id_product', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getproductbyid($id)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('id_product', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getkantinbyid($id_user)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('user', 'user.id = product.user');
        $this->db->where('user', $id_user);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getidentitykantin($id_user)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('user', 'user.id = product.user');
        $this->db->join('jurusan', 'jurusan.id_jurusan = product.jurusan');
        $this->db->join('kelas', 'kelas.id_kelas = product.kelas');
        $this->db->where('user', $id_user);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getallproductbyid($id_product)
    {
        $this->db->from('product');
        $this->db->join('user', 'user.id = product.user');
        $this->db->where('id_product', $id_product);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function makber($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('jenis', 'Makanan Berat');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function countAllproductmakber()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('jenis', 'Makanan Berat');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function makring($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('jenis', 'Makanan Ringan');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function countAllproductmakring()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('jenis', 'Makanan Ringan');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function minuman($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('jenis', 'Minuman');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function countAllproductminuman()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('jenis', 'Minuman');
        $query = $this->db->get();
        return $query->num_rows();
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

    public function getalltransaksi()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('kantin', $this->session->userdata('id'));
        $this->db->where('status', 'Sedang Dibuat');
        $this->db->order_by('id_transaksi', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getsdgdibuat()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('kantin', $this->session->userdata('id'));
        $this->db->where('status', 'Sedang Dibuat');
        $this->db->order_by('id_transaksi', 'DESC');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getmenubyid($id)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_transaksi', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getsudahdiantar()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('kantin', $this->session->userdata('id'));
        $this->db->where('status', 'Diantar');
        $this->db->order_by('id_transaksi', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getsudahditerima()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('kantin', $this->session->userdata('id'));
        $this->db->where('status', 'Sudah Diterima');
        $this->db->order_by('id_transaksi', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getsdhditerima()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('kantin', $this->session->userdata('id'));
        $this->db->where('status', 'Sudah Diterima');
        $this->db->order_by('id_transaksi', 'DESC');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getsdhdiantar()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('kantin', $this->session->userdata('id'));
        $this->db->where('status', 'Diantar');
        $this->db->order_by('id_transaksi', 'DESC');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function pesanansaya()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_userpembeli', $this->session->userdata('id'));
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function pesanansayasdgdibuat()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_userpembeli', $this->session->userdata('id'));
        $this->db->where('status', 'Sedang Dibuat');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function pesanansayasdgdiantar()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_userpembeli', $this->session->userdata('id'));
        $this->db->where('status', 'Diantar');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function pesanansayaselesai()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_userpembeli', $this->session->userdata('id'));
        $this->db->where('status', 'Sudah Diterima');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getpesanansayadibuat()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_userpembeli', $this->session->userdata('id'));
        $this->db->where('status', 'Sedang Dibuat');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getpesanansayadiantar()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_userpembeli', $this->session->userdata('id'));
        $this->db->where('status', 'Diantar');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getpesanansayaselesai()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_userpembeli', $this->session->userdata('id'));
        $this->db->where('status', 'Sudah Diterima');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getpesanansayabyid($id)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_transaksi', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
}

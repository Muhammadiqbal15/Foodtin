<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('Auth/index');
        } else {
            $role = $this->session->userdata('role_id');
            if ($role != 2) {
                redirect('Auth/block');
            }
        }
        $this->load->model('Foodtin_model');
    }

    public function Userpenjual()
    {
        $tipe = $this->session->userdata('tipe');

        if ($tipe != "Penjual") {
            redirect('Auth/blockpembeli');
        } else {
            $data['title'] = "Dasboard";
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['jurusan'] = $this->Foodtin_model->getUserdata();
            $this->load->view('TemplateAdmin/HeaderAdmin', $data);
            $this->load->view('User/Userpenjual', $data);
            $this->load->view('TemplateAdmin/FooterAdmin');
        }
    }

    public function Userpembeli()
    {
        $tipe = $this->session->userdata('tipe');
        if ($tipe != "Pembeli") {
            redirect('Auth/blockpenjual');
        } else {
            $data['title'] = "Dasboard";

            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['jurusan'] = $this->Foodtin_model->getUserdata();
            $this->load->view('TemplateAdmin/HeaderAdmin', $data);
            $this->load->view('User/Userpembeli', $data);
            $this->load->view('TemplateAdmin/FooterAdmin');
        }
    }
}

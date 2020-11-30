<?php

class Admin extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('Auth/index');
        } else {
            $role = $this->session->userdata('role_id');
            $tipe = $this->session->userdata('tipe');
            if ($role > 1) {
                if ($tipe != "Penjual") {
                    redirect('Auth/blockpembeli');
                } else {
                    redirect('Auth/blockpenjual');
                }
            }
        }
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['user'] = $this->db->get_where('user', ['name' => $this->session->userdata('username')])->row_array();
        $this->load->view('TemplateAdmin/HeaderAdmin', $data);
        $this->load->view('Admin/index', $data);
        $this->load->view('TemplateAdmin/FooterAdmin');
    }
}

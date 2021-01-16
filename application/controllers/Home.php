<?php

class Home extends CI_Controller
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
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Home";

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['product'] = $this->Foodtin_model->tampilproduct();
        $this->load->view('TemplateHome/Header', $data);
        $this->load->view('Home/index', $data);
        $this->load->view('TemplateHome/Footer');
    }

    public function Makring()
    {
        $data['title'] = "Makanan Ringan";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['product'] = $this->Foodtin_model->makring();
        $this->load->view('TemplateHome/Header', $data);
        $this->load->view('Home/Makananringan', $data);
        $this->load->view('TemplateHome/Footer');
    }

    public function Makber()
    {
        $data['title'] = "Makanan Berat";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['product'] = $this->Foodtin_model->makber();
        $this->load->view('TemplateHome/Header', $data);
        $this->load->view('Home/Makananberat', $data);
        $this->load->view('TemplateHome/Footer');
    }

    public function Minuman()
    {
        $data['title'] = "Minuman";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['product'] = $this->Foodtin_model->minuman();
        $this->load->view('TemplateHome/Header', $data);
        $this->load->view('Home/Minuman', $data);
        $this->load->view('TemplateHome/Footer');
    }

    public function aboutDev()
    {
        $data['title'] = "Developer";
        $this->load->view('TemplateHome/Header', $data);
        $this->load->view('Home/Aboutdev');
        $this->load->view('TemplateHome/Footer');
    }
}

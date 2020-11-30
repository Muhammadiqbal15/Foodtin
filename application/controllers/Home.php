<?php

class Home extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Home";

        $data['user'] = $this->db->get_where('user', ['name' => $this->session->userdata('username')])->row_array();
        $this->load->view('TemplateHome/Header', $data);
        $this->load->view('Home/index', $data);
        $this->load->view('TemplateHome/Footer');
    }

    public function Makring()
    {
        $data['title'] = "Makanan Ringan";
        $this->load->view('TemplateHome/Header', $data);
        $this->load->view('Home/Makananringan');
        $this->load->view('TemplateHome/Footer');
    }

    public function Makber()
    {
        $data['title'] = "Makanan Berat";
        $this->load->view('TemplateHome/Header', $data);
        $this->load->view('Home/Makananberat');
        $this->load->view('TemplateHome/Footer');
    }

    public function Minuman()
    {
        $data['title'] = "Minuman";
        $this->load->view('TemplateHome/Header', $data);
        $this->load->view('Home/Minuman');
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

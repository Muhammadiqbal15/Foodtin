<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Foodtin_model');
    }

    public function index()
    {
        $data['title'] = "Masuk";

        $this->load->view('TemplateAuth/HeaderAuth', $data);
        $this->load->view('Auth/Login');
        $this->load->view('TemplateAuth/FooterAuth');
    }

    public function regis()
    {
        $data['title'] = "Daftar";
        $data['jurusan'] = $this->Foodtin_model->getJurusan();
        $this->load->view('TemplateAuth/HeaderAuth', $data);
        $this->load->view('Auth/Registrasi', $data);
        $this->load->view('TemplateAuth/FooterAuth');
    }

    public function get_kelas()
    {
        $id = $this->input->post('id');
        $data = $this->Foodtin_model->get_kelas($id);
        echo json_encode($data);
    }
}

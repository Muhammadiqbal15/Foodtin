<?php

class Auth extends CI_Controller
{

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

        $this->load->view('TemplateAuth/HeaderAuth', $data);
        $this->load->view('Auth/Registrasi');
        $this->load->view('TemplateAuth/FooterAuth');
    }
}

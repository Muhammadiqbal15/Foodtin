<?php

class LandingPage extends CI_Controller
{

    public function index()
    {
        $data['title'] = " Food.Tin.com";
        $this->load->view('TemplateLP/HeaderLP', $data);
        $this->load->view('LandingPage/index');
        $this->load->view('TemplateLP/FooterLp');
    }
}

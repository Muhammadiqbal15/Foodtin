<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Foodtin_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Home";


        //PAGINATION
        $this->load->library('pagination');
        //config
        $config['base_url'] = 'http://localhost/foodtin/Home/index';
        $config['total_rows'] = $this->Foodtin_model->countAllproduct();
        $config['per_page'] = 6;

        //style
        $config['full_tag_open'] = '<nav aria-label="..." class="mt-5 ml-5"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item ">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        //initialize
        $this->pagination->initialize($config);

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['start'] = $this->uri->segment(3);
        $data['product'] = $this->Foodtin_model->tampilproduct($config['per_page'], $data['start']);
        if ($this->input->post('keyword')) {
            $data['product'] = $this->Foodtin_model->cariproduct();
        }

        $this->load->view('TemplateHome/Header', $data);
        $this->load->view('Home/index', $data);
        $this->load->view('TemplateHome/Footer');
    }

    public function Makring()
    {
        $data['title'] = "Makanan Ringan";
        $this->load->library('pagination');
        //config
        $config['base_url'] = 'http://localhost/foodtin/Home/Makring';
        $config['total_rows'] = $this->Foodtin_model->countAllproductmakring();
        $config['per_page'] = 6;

        //style
        $config['full_tag_open'] = '<nav aria-label="..." class="mt-5 ml-5"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item ">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        //initialize
        $this->pagination->initialize($config);

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['start'] = $this->uri->segment(3);
        $data['product'] = $this->Foodtin_model->makring($config['per_page'], $data['start']);
        if ($this->input->post('keyword')) {
            $data['product'] = $this->Foodtin_model->cariproduct();
        }
        $this->load->view('TemplateHome/Header', $data);
        $this->load->view('Home/Makananringan', $data);
        $this->load->view('TemplateHome/Footer');
    }

    public function Makber()
    {
        $data['title'] = "Makanan Berat";

        $this->load->library('pagination');
        //config
        $config['base_url'] = 'http://localhost/foodtin/Home/Makber';
        $config['total_rows'] = $this->Foodtin_model->countAllproductmakber();
        $config['per_page'] = 6;

        //style
        $config['full_tag_open'] = '<nav aria-label="..." class="mt-5 ml-5"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item ">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        //initialize
        $this->pagination->initialize($config);

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['start'] = $this->uri->segment(3);
        $data['product'] = $this->Foodtin_model->makber($config['per_page'], $data['start']);
        if ($this->input->post('keyword')) {
            $data['product'] = $this->Foodtin_model->cariproduct();
        }
        $this->load->view('TemplateHome/Header', $data);
        $this->load->view('Home/Makananberat', $data);
        $this->load->view('TemplateHome/Footer');
    }

    public function Minuman()
    {
        $data['title'] = "Minuman";

        $this->load->library('pagination');
        //config
        $config['base_url'] = 'http://localhost/foodtin/Home/Minuman';
        $config['total_rows'] = $this->Foodtin_model->countAllproductminuman();
        $config['per_page'] = 6;

        //style
        $config['full_tag_open'] = '<nav aria-label="..." class="mt-5 ml-5"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item ">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        //initialize
        $this->pagination->initialize($config);

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['start'] = $this->uri->segment(3);
        $data['product'] = $this->Foodtin_model->minuman($config['per_page'], $data['start']);
        if ($this->input->post('keyword')) {
            $data['product'] = $this->Foodtin_model->cariproduct();
        }
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

    public function detail($id)
    {
        if (!$this->session->userdata('username')) {
            redirect('Auth/index');
        } else {
            $role = $this->session->userdata('role_id');
            if ($role != 2) {
                redirect('Auth/block');
            }
        }

        $data['title'] = "Detail";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['product'] = $this->Foodtin_model->getproductbyid($id);
        $this->load->view('TemplateHome/Header', $data);
        $this->load->view('Home/Detail', $data);
        $this->load->view('TemplateHome/Footer');
    }

    public function kantin($id_user)
    {
        if (!$this->session->userdata('username')) {
            redirect('Auth/index');
        } else {
            $role = $this->session->userdata('role_id');
            if ($role != 2) {
                redirect('Auth/block');
            }
        }
        $data['title'] = "Kantin";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['product'] = $this->Foodtin_model->getkantinbyid($id_user);
        $data['kantin'] = $this->Foodtin_model->getidentitykantin($id_user);
        $data['jurusan'] = $this->Foodtin_model->getidentitykantin($id_user);
        $this->load->view('TemplateHome/Header', $data);
        $this->load->view('Home/Kantin', $data);
        $this->load->view('TemplateHome/Footer');
    }

    public function addcart($id)
    {
        if (!$this->session->userdata('username')) {
            redirect('Auth/index');
        } else {
            $role = $this->session->userdata('role_id');
            if ($role != 2) {
                redirect('Auth/block');
            }
        }
        $product = $this->Foodtin_model->find($id);

        $data = array(
            'id'      => $product->id_product,
            'qty'     => 1,
            'price'   => $product->harga,
            'name'    => $product->nama,
            'options'  => array(
                'kantin' => $product->user,
                'foto' => $product->foto
            )
        );



        $this->cart->insert($data);
        $this->session->set_flashdata('cart', 'Ditambahkan');
        redirect('Home/index');
    }
}

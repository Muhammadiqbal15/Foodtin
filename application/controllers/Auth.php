<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Foodtin_model');
        $this->load->library('form_validation');
    }



    public function index()
    {
        $this->form_validation->set_rules('username', 'Email', 'required|trim');
        $this->form_validation->set_rules('pass', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Masuk";

            $this->load->view('TemplateAuth/HeaderAuth', $data);
            $this->load->view('Auth/Login');
            $this->load->view('TemplateAuth/FooterAuth');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $pass = $this->input->post('pass');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        //jika usernya ada
        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($pass, $user['password'])) {

                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id'],
                        'tipe' => $user['tipeakun'],
                        'id' => $user['id'],
                        'jurusan' => $user['jurusan']
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('successlogin', $this->session->userdata('username'));
                    if ($user['role_id'] == 1) {
                        redirect('Admin/index');
                    } else {
                        if ($user['tipeakun'] == "Penjual") {
                            redirect('User/Userpenjual');
                        } else {
                            redirect('User/Userpembeli');
                        }
                    }
                } else {
                    $this->session->set_flashdata('falsepass', 'Salah Atau Tidak Sesuai!!');
                    redirect('Auth/index');
                }
            } else {
                $this->session->set_flashdata('notactive', 'tidak Aktif Atau Belum Melakukan Verifikasi Email!!');
                redirect('Auth/index');
            }
        } else {
            $this->session->set_flashdata('invalid', 'tidak terdaftar!!');
            redirect('Auth/index');
        }
    }

    public function regis()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('name', 'Nama', 'required|trim', [
            'required' => 'Nama atau Nama Kantin Harus Diisi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email Sudah Terdaftar! Silahkan Gunakan Email Yang Lain!'
        ]);
        $this->form_validation->set_rules('pass', 'Password', 'required|trim|matches[repass]', [
            'matches' => 'Password Tidak Sama!'
        ]);
        $this->form_validation->set_rules('repass', 'Password', 'required|trim|matches[pass]', [
            'matches' => 'Password Tidak Sama!'
        ]);
        $this->form_validation->set_rules('nohp', 'Nomor', 'required|trim|min_length[12]|max_length[12]|numeric|is_unique[user.nohp]', [
            'min_length' => 'Nomor HP/WA Minimal 12 Angka!!',
            'max_length' => 'Nomor HP/WA Maksimal 12 Angka!',
            'numeric'  => 'Nomor HP/WA Harus Angka!',
            'is_unique' => 'Nomor ini sudah Terdaftar Mohon Gunakan Nomor Lainnya'
        ]);
        if ($this->form_validation->run() ==  false) {

            $data['title'] = "Daftar";
            $data['jurusan'] = $this->Foodtin_model->getJurusan();
            $this->load->view('TemplateAuth/HeaderAuth', $data);
            $this->load->view('Auth/Registrasi', $data);
            $this->load->view('TemplateAuth/FooterAuth');
        } else {

            $data = [

                'username' => htmlspecialchars($this->input->post('username', true)),
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.png',
                'password' => htmlspecialchars(password_hash($this->input->post('pass'), PASSWORD_DEFAULT)),
                'nohp'  => htmlspecialchars($this->input->post('nohp', true)),
                'jurusan' => htmlspecialchars($this->input->post('jurusan', true)),
                'kelas' => htmlspecialchars($this->input->post('kelas', true)),
                'tipeakun' => htmlspecialchars($this->input->post('tipe', true)),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', 'Terdaftar');
            redirect('Auth/index');
        }
    }

    public function get_kelas()
    {
        $id = $this->input->post('id');
        $data = $this->Foodtin_model->get_kelas($id);
        echo json_encode($data);
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('successlogout', 'Logout');
        redirect('Home/index');
    }

    public function block()
    {
        $data['title'] = "Page Not Found";

        $this->load->view('TemplateAuth/HeaderAuth', $data);
        $this->load->view('Auth/Block');
        $this->load->view('TemplateAuth/FooterAuth');
    }

    public function blockpenjual()
    {
        $data['title'] = "Page Not Found";

        $this->load->view('TemplateAuth/HeaderAuth', $data);
        $this->load->view('Auth/Blockpenjual');
        $this->load->view('TemplateAuth/FooterAuth');
    }

    public function blockpembeli()
    {
        $data['title'] = "Page Not Found";

        $this->load->view('TemplateAuth/HeaderAuth', $data);
        $this->load->view('Auth/Blockpembeli');
        $this->load->view('TemplateAuth/FooterAuth');
    }
}

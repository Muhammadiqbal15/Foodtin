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

        $role = $this->session->userdata('role_id');
        $tipe = $this->session->userdata('tipe');
        if ($this->session->userdata('username')) {
            if ($role > 1) {
                if ($tipe != "Penjual") {
                    redirect('User/Userpembeli');
                } else {
                    redirect('User/Userpenjual');
                }
            } else {
                redirect('Admin/index');
            }
        }
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

                    if ($user['role_id'] == 1) {
                        redirect('Admin/index');
                    } else {
                        if ($user['tipeakun'] == "Penjual") {
                            $this->session->set_flashdata('successlogin', $this->session->userdata('username'));
                            redirect('User/Userpenjual');
                        } else {
                            $this->session->set_flashdata('successlogin', $this->session->userdata('username'));
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

        $role = $this->session->userdata('role_id');
        $tipe = $this->session->userdata('tipe');
        if ($this->session->userdata('username')) {
            if ($role > 1) {
                if ($tipe != "Penjual") {
                    redirect('User/Userpembeli');
                } else {
                    redirect('User/Userpenjual');
                }
            } else {
                redirect('Admin/index');
            }
        }
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username Sudah Terdaftar! Silahkan Gunakan Username Lain!'
        ]);
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

            $email = $this->input->post('email', true);
            $data = [

                'username' => htmlspecialchars($this->input->post('username', true)),
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.png',
                'password' => htmlspecialchars(password_hash($this->input->post('pass'), PASSWORD_DEFAULT)),
                'nohp'  => htmlspecialchars($this->input->post('nohp', true)),
                'jurusan' => htmlspecialchars($this->input->post('jurusan', true)),
                'kelas' => htmlspecialchars($this->input->post('kelas', true)),
                'tipeakun' => htmlspecialchars($this->input->post('tipe', true)),
                'role_id' => 2,
                'is_active' => 0,
                'date_created' => time()
            ];

            // siapkan token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendemail($token, 'verify');


            $this->session->set_flashdata('message', 'Terdaftar');
            redirect('Auth/index');
        }
    }


    private function _sendemail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'foodtincom24@gmail.com',
            'smtp_pass' => '#foodtincom24#',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];


        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('foodtincom24@gmail.com', 'FoodtinCom24');
        $this->email->to($this->input->post('email'));
        if ($type == 'verify') {
            $this->email->subject('Verifikasi Akun Foodtin Mu');
            $this->email->message('Klik Link ini Untuk Verifikasi Akun Mu : 
                <a href="' . base_url() . 'Auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" >Aktifasi</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password Mu');
            $this->email->message('Klik Link ini Untuk Reset Password Mu : 
                <a href="' . base_url() . 'Auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" >Reset Password</a>');
        }


        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['token' => $token]);

                    $this->session->set_flashdata('eroremail', '<div class="alert alert-success" role="alert">
                    ' . $email . ' Sudah Diverifikasi! Mohon Masuk Atau Login
                    </div>');
                    redirect('Auth/index');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['token' => $token]);

                    $this->session->set_flashdata('eroremail', '<div class="alert alert-danger" role="alert">
                    Aktifasi Akun Gagal! Token Expired/Kadaluarsa! Mohon Lakukan Pendaftaran atau Registrasi Ulang!.
                    </div>');
                    redirect('Auth/index');
                }
            } else {
                $this->session->set_flashdata('eroremail', '<div class="alert alert-danger" role="alert">
                Aktifasi Akun Gagal! Token Salah! Mohon Klik Ulang Link Aktifasi Di Email Mu.
                </div>');
                redirect('Auth/index');
            }
        } else {
            $this->session->set_flashdata('eroremail', '<div class="alert alert-danger" role="alert">
            Aktifasi Akun Gagal! Email Salah.
            </div>');
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


    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        if ($this->form_validation->run() == false) {
            $data['title'] = "Lupa Password";
            $this->load->view('TemplateAuth/HeaderAuth', $data);
            $this->load->view('Auth/Lupapass');
            $this->load->view('TemplateAuth/FooterAuth');
        } else {
            $email = $this->input->post('email');

            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendemail($token, 'forgot');

                $this->session->set_flashdata('eroremail', '<div class="alert alert-success" role="alert">
                Mohon Periksa Email Mu Untuk Reset Password Mu! 
                </div>');
                redirect('Auth/forgotPassword');
            } else {
                $this->session->set_flashdata('eroremail', '<div class="alert alert-danger" role="alert">
                Email Tidak Terdaftar Atau Belum Melakukan Verifikasi!! Mohon Masukan Email Yang Terdaftar Atau Lakukan Verifikasi Lebih Dahulu
                </div>');
                redirect('Auth/forgotPassword');
            }
        }
    }

    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('eroremail', '<div class="alert alert-danger" role="alert">
                Reset Password Gagal!! Token Salah! Mohon Klik Ulang Link Yang Ada Di Email Anda!
                </div>');
                redirect('Auth/index');
            }
        } else {
            $this->session->set_flashdata('eroremail', '<div class="alert alert-danger" role="alert">
            Reset Password Gagal!! Email Salah! Mohon Masukkan Email Yang Benar!
            </div>');
            redirect('Auth/index');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('Auth/index');
        }

        $this->form_validation->set_rules('pass1', 'Password', 'required|trim|matches[pass2]', [
            'matches' => 'Password Tidak Sama!!'
        ]);
        $this->form_validation->set_rules('pass2', 'Confirm Password', 'required|trim|matches[pass1]', [
            'matches' => 'Password Tidak Sama!!'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = "Reset Password";
            $this->load->view('TemplateAuth/HeaderAuth', $data);
            $this->load->view('Auth/changePassword');
            $this->load->view('TemplateAuth/FooterAuth');
        } else {
            $password = password_hash($this->input->post('pass1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('eroremail', '<div class="alert alert-success" role="alert">
            Password Mu Sudah Ter Reset Atau Di ubah! Silahkan Login!
            </div>');
            redirect('Auth/index');
        }
    }
}

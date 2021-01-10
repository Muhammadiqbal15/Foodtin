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
        $this->load->library('form_validation');
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

    public function editprofilpembeli()
    {
        $data['title'] = "Edit Profile";

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['jurusan'] = $this->Foodtin_model->getUserdata();

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('name', 'Nama', 'required|trim', [
            'required' => 'Nama atau Nama Kantin Harus Diisi'
        ]);
        $this->form_validation->set_rules('nohp', 'Nomor', 'required|trim|min_length[12]|max_length[12]|numeric', [
            'min_length' => 'Nomor HP/WA Minimal 12 Angka!!',
            'max_length' => 'Nomor HP/WA Maksimal 12 Angka!',
            'numeric'  => 'Nomor HP/WA Harus Angka!',
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('TemplateAdmin/HeaderAdmin', $data);
            $this->load->view('User/Editprofilpembeli', $data);
            $this->load->view('TemplateAdmin/FooterAdmin');
        } else {
            $username = $this->input->post('username', true);
            $name = $this->input->post('name', true);
            $nohp = $this->input->post('nohp', true);

            $foto = $_FILES['foto'];

            if ($foto) {

                $config['upload_path'] = './asset/img/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $foto = $this->upload->data();
                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './asset/img/' . $foto['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '50%';
                    $config['width'] = 200;
                    $config['height'] = 200;
                    $config['new_image'] = './asset/img/' . $foto['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $newfoto = $foto['file_name'];
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $id = $this->input->post('id');

            $this->db->set('username', $username);
            $this->db->set('name', $name);
            $this->db->set('nohp', $nohp);
            $this->db->set('image', $newfoto);
            $this->db->where('id', $id);
            $this->db->update('user');
            redirect('User/Userpembeli');
        }
    }

    public function editprofilpenjual()
    {
        $data['title'] = "Edit Profile";

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['jurusan'] = $this->Foodtin_model->getUserdata();

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('name', 'Nama', 'required|trim', [
            'required' => 'Nama atau Nama Kantin Harus Diisi'
        ]);
        $this->form_validation->set_rules('nohp', 'Nomor', 'required|trim|min_length[12]|max_length[12]|numeric', [
            'min_length' => 'Nomor HP/WA Minimal 12 Angka!!',
            'max_length' => 'Nomor HP/WA Maksimal 12 Angka!',
            'numeric'  => 'Nomor HP/WA Harus Angka!',
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('TemplateAdmin/HeaderAdmin', $data);
            $this->load->view('User/Editprofilpenjual', $data);
            $this->load->view('TemplateAdmin/FooterAdmin');
        } else {
            $username = $this->input->post('username', true);
            $name = $this->input->post('name', true);
            $nohp = $this->input->post('nohp', true);

            $foto = $_FILES['foto'];

            if ($foto) {

                $config['upload_path'] = './asset/img/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $foto = $this->upload->data();
                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './asset/img/' . $foto['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '50%';
                    $config['width'] = 200;
                    $config['height'] = 200;
                    $config['new_image'] = './asset/img/' . $foto['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $newfoto = $foto['file_name'];
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $id = $this->input->post('id');

            $this->db->set('username', $username);
            $this->db->set('name', $name);
            $this->db->set('nohp', $nohp);
            $this->db->set('image', $newfoto);
            $this->db->where('id', $id);
            $this->db->update('user');
            redirect('User/Userpenjual');
        }
    }

    public function changePasswordpembeli()
    {
        $data['title'] = "Ubah Password";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('passlama', 'Password Saat ini', 'required|trim');
        $this->form_validation->set_rules('passbaru', 'Password Baru', 'required|trim|matches[repassbaru]', [
            'matches' => 'Password Tidak Sama!'
        ]);
        $this->form_validation->set_rules('repassbaru', 'Ulangi Password Baru', 'required|trim|matches[passbaru]', [
            'matches' => 'Password Tidak Sama!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('TemplateAdmin/HeaderAdmin', $data);
            $this->load->view('User/Ubahpasspembeli');
            $this->load->view('TemplateAdmin/FooterAdmin');
        } else {
            $passlama = $this->input->post('passlama', true);
            $newpass = $this->input->post('passbaru', true);
            if (!password_verify($passlama, $data['user']['password'])) {
                $this->session->set_flashdata('falseoldpass', 'Password Lama Salah');
                redirect('User/changePasswordpembeli');
            } else {
                if ($passlama == $newpass) {
                    $this->session->set_flashdata('notmatchnew', 'Password Baru Tidak Bisa Sama Dengan Password Lama,Mohon Gunakan Yang Baru!!');
                    redirect('User/changePasswordpembeli');
                } else {
                    //pass sudah oke
                    $password_hash = password_hash($newpass, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');

                    $this->session->set_flashdata('sukses', 'Berhasil Diubah');
                    redirect('User/Userpembeli');
                }
            }
        }
    }

    public function changePasswordpenjual()
    {
        $data['title'] = "Ubah Password";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('passlama', 'Password Saat ini', 'required|trim');
        $this->form_validation->set_rules('passbaru', 'Password Baru', 'required|trim|matches[repassbaru]', [
            'matches' => 'Password Tidak Sama!'
        ]);
        $this->form_validation->set_rules('repassbaru', 'Ulangi Password Baru', 'required|trim|matches[passbaru]', [
            'matches' => 'Password Tidak Sama!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('TemplateAdmin/HeaderAdmin', $data);
            $this->load->view('User/Ubahpasspenjual');
            $this->load->view('TemplateAdmin/FooterAdmin');
        } else {
            $passlama = $this->input->post('passlama', true);
            $newpass = $this->input->post('passbaru', true);
            if (!password_verify($passlama, $data['user']['password'])) {
                $this->session->set_flashdata('falseoldpass', 'Password Lama Salah');
                redirect('User/changePasswordpembeli');
            } else {
                if ($passlama == $newpass) {
                    $this->session->set_flashdata('notmatchnew', 'Password Baru Tidak Bisa Sama Dengan Password Lama,Mohon Gunakan Yang Baru!!');
                    redirect('User/changePasswordpenjual');
                } else {
                    //pass sudah oke
                    $password_hash = password_hash($newpass, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');

                    $this->session->set_flashdata('sukses', 'Berhasil Diubah');
                    redirect('User/Userpenjual');
                }
            }
        }
    }

    public function perbaruikelaspembeli()
    {
        $data['title'] = "Perbarui Kelas Mu";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['jurusan'] = $this->Foodtin_model->getUserdata();
        $this->load->view('TemplateAdmin/HeaderAdmin', $data);
        $this->load->view('User/Perbaruikelaspembeli', $data);
        $this->load->view('TemplateAdmin/FooterAdmin');
    }

    public function perbaruikelaspenjual()
    {
        $data['title'] = "Perbarui Kelas Mu";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['jurusan'] = $this->Foodtin_model->getUserdata();
        $this->load->view('TemplateAdmin/HeaderAdmin', $data);
        $this->load->view('User/Perbaruikelaspenjual', $data);
        $this->load->view('TemplateAdmin/FooterAdmin');
    }

    public function updatekelaspembeli()
    {
        $this->form_validation->set_rules('kls', 'Kelas', 'required|trim');
        if ($this->form_validation->run() ==  false) {

            $data['title'] = "Perbarui Kelas Mu";
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['jurusan'] = $this->Foodtin_model->getUserdata();
            $this->load->view('TemplateAdmin/HeaderAdmin', $data);
            $this->load->view('User/Perbaruikelaspembeli', $data);
            $this->load->view('TemplateAdmin/FooterAdmin');
        } else {
            $data = [
                'name' => $this->input->post('name', true),
                'jurusan' => $this->input->post('jurusan', true),
                'naik_ke_kelas' => $this->input->post('kls', true),
                'status_kls' => $this->input->post('kelas', true),
                'tipeakun' => $this->input->post('tipe', true)
            ];

            $this->db->insert('req_update_kelas', $data);
            $this->session->set_flashdata('done', 'Berhasil');
            redirect('User/Userpembeli');
        }
    }

    public function updatekelaspenjual()
    {
        $this->form_validation->set_rules('kls', 'Kelas', 'required|trim');
        if ($this->form_validation->run() ==  false) {

            $data['title'] = "Perbarui Kelas Mu";
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['jurusan'] = $this->Foodtin_model->getUserdata();
            $this->load->view('TemplateAdmin/HeaderAdmin', $data);
            $this->load->view('User/Perbaruikelaspenjual', $data);
            $this->load->view('TemplateAdmin/FooterAdmin');
        } else {
            $data = [
                'name' => $this->input->post('name', true),
                'jurusan' => $this->input->post('jurusan', true),
                'naik_ke_kelas' => $this->input->post('kls', true),
                'status_kls' => $this->input->post('kelas', true),
                'tipeakun' => $this->input->post('tipe', true)
            ];

            $this->db->insert('req_update_kelas', $data);
            $this->session->set_flashdata('done', 'Berhasil');
            redirect('User/Userpenjual');
        }
    }

    public function produkpenjual()
    {
        $data['title'] = "Produk";

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['jurusan'] = $this->Foodtin_model->getUserdata();
        $this->load->view('TemplateAdmin/HeaderAdmin', $data);
        $this->load->view('User/Produkpenjual', $data);
        $this->load->view('TemplateAdmin/FooterAdmin');
    }
}

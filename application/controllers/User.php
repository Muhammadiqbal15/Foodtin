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
            $data['notifdiantar'] = $this->Foodtin_model->getsdhdiantar();
            $data['notifdibuat'] = $this->Foodtin_model->getsdgdibuat();
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
            $data['pesanan'] = $this->Foodtin_model->pesanansaya();
            $data['diantar'] = $this->Foodtin_model->pesanansayasdgdiantar();
            $data['dibuat'] = $this->Foodtin_model->pesanansayasdgdibuat();
            $data['diterima'] = $this->Foodtin_model->pesanansayaselesai();
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
        $data['pesanan'] = $this->Foodtin_model->pesanansaya();
        $data['diantar'] = $this->Foodtin_model->pesanansayasdgdiantar();
        $data['dibuat'] = $this->Foodtin_model->pesanansayasdgdibuat();
        $data['diterima'] = $this->Foodtin_model->pesanansayaselesai();


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
        $data['notifdiantar'] = $this->Foodtin_model->getsdhdiantar();
        $data['notifdibuat'] = $this->Foodtin_model->getsdgdibuat();

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
        $data['pesanan'] = $this->Foodtin_model->pesanansaya();
        $data['diantar'] = $this->Foodtin_model->pesanansayasdgdiantar();
        $data['dibuat'] = $this->Foodtin_model->pesanansayasdgdibuat();
        $data['diterima'] = $this->Foodtin_model->pesanansayaselesai();

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
        $data['notifdiantar'] = $this->Foodtin_model->getsdhdiantar();
        $data['notifdibuat'] = $this->Foodtin_model->getsdgdibuat();

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
        $data['pesanan'] = $this->Foodtin_model->pesanansaya();
        $data['diantar'] = $this->Foodtin_model->pesanansayasdgdiantar();
        $data['dibuat'] = $this->Foodtin_model->pesanansayasdgdibuat();
        $data['diterima'] = $this->Foodtin_model->pesanansayaselesai();
        $this->load->view('TemplateAdmin/HeaderAdmin', $data);
        $this->load->view('User/Perbaruikelaspembeli', $data);
        $this->load->view('TemplateAdmin/FooterAdmin');
    }

    public function perbaruikelaspenjual()
    {
        $data['title'] = "Perbarui Kelas Mu";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['jurusan'] = $this->Foodtin_model->getUserdata();
        $data['notifdiantar'] = $this->Foodtin_model->getsdhdiantar();
        $data['notifdibuat'] = $this->Foodtin_model->getsdgdibuat();
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
            $data['pesanan'] = $this->Foodtin_model->pesanansaya();
            $data['diantar'] = $this->Foodtin_model->pesanansayasdgdiantar();
            $data['dibuat'] = $this->Foodtin_model->pesanansayasdgdibuat();
            $data['diterima'] = $this->Foodtin_model->pesanansayaselesai();
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
            $data['notifdiantar'] = $this->Foodtin_model->getsdhdiantar();
            $data['notifdibuat'] = $this->Foodtin_model->getsdgdibuat();
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
        $data['product'] = $this->Foodtin_model->getallproduct();
        $data['jurusan'] = $this->Foodtin_model->getUserdata();
        $data['notifdiantar'] = $this->Foodtin_model->getsdhdiantar();
        $data['notifdibuat'] = $this->Foodtin_model->getsdgdibuat();
        $this->load->view('TemplateAdmin/HeaderAdmin', $data);
        $this->load->view('User/Produkpenjual', $data);
        $this->load->view('TemplateAdmin/FooterAdmin');
    }

    public function addproduct()
    {
        $nama = $this->input->post('nama', true);
        $harga = $this->input->post('harga', true);
        $jumlah = $this->input->post('jumlah', true);
        $jenis = $this->input->post('jenis', true);
        $status = $this->input->post('status', true);
        $user = $this->input->post('iduser', true);
        $jurusan =  $this->input->post('jurusan', true);
        $kelas = $this->input->post('kelas', true);

        $foto = $_FILES['foto'];

        if ($foto) {

            $config['upload_path'] = './asset/img/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data();

                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/' . $foto['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                $config['width'] = 600;
                $config['height'] = 400;
                $config['new_image'] = './assets/images/' . $foto['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar = $foto['file_name'];
            } else {
                echo $this->upload->display_errors();
            }
        }

        $data = [
            'nama' => $nama,
            'harga' => $harga,
            'foto' => $gambar,
            'jumlah' => $jumlah,
            'jenis' => $jenis,
            'status' => $status,
            'user' => $user,
            'jurusan' => $jurusan,
            'kelas' => $kelas

        ];

        $this->db->insert('product', $data);
        $this->session->set_flashdata('add', 'Ditambahkan');
        redirect('User/produkpenjual');
    }

    public function editproduct($id)
    {
        $data['title'] = "Ubah Produk";
        $id_product = $id;
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['product'] = $this->Foodtin_model->getallproductbyid($id_product);
        $data['jenis'] = ['Makanan Berat', 'Makanan Ringan', 'Minuman'];
        $data['status'] = ['Ready', 'Pre Order (PO)'];
        $data['notifdiantar'] = $this->Foodtin_model->getsdhdiantar();
        $data['notifdibuat'] = $this->Foodtin_model->getsdgdibuat();
        $this->load->view('TemplateAdmin/HeaderAdmin', $data);
        $this->load->view('User/Editprodukpenjual', $data);
        $this->load->view('TemplateAdmin/FooterAdmin');
    }

    public function editpicproduct($id)
    {
        $data['title'] = "Ubah Foto Produk";
        $id_product = $id;
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['product'] = $this->Foodtin_model->getallproductbyid($id_product);
        $data['notifdiantar'] = $this->Foodtin_model->getsdhdiantar();
        $data['notifdibuat'] = $this->Foodtin_model->getsdgdibuat();
        $this->load->view('TemplateAdmin/HeaderAdmin', $data);
        $this->load->view('User/Editfotoprodukpenjual', $data);
        $this->load->view('TemplateAdmin/FooterAdmin');
    }

    public function updateproduct()
    {
        $nama = $this->input->post('nama', true);
        $harga = $this->input->post('harga', true);
        $jumlah = $this->input->post('jumlah', true);
        $jenis = $this->input->post('jenis', true);
        $status = $this->input->post('status', true);
        $id = $this->input->post('id', true);

        $data = [
            'nama' => $nama,
            'harga' => $harga,
            'jumlah' => $jumlah,
            'jenis' => $jenis,
            'status' => $status
        ];
        $kondisi = $this->db->where('id_product', $id);
        $this->Foodtin_model->updateproduct($data, $kondisi);
        $this->session->set_flashdata('update', 'Diubah');
        redirect('User/produkpenjual');
    }

    public function updatefotoproduct()
    {
        $foto = $_FILES['foto'];

        if ($foto) {

            $config['upload_path'] = './asset/img/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data();

                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/' . $foto['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                $config['width'] = 600;
                $config['height'] = 400;
                $config['new_image'] = './assets/images/' . $foto['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar = $foto['file_name'];
            } else {
                echo $this->upload->display_errors();
            }
        }

        $id = $this->input->post('id', true);


        $this->db->set('foto', $gambar);
        $this->db->where('id_product', $id);
        $this->db->update('product');

        $this->session->set_flashdata('image', 'Diubah');
        redirect('User/produkpenjual');
    }

    public function deleteproduct($id)
    {
        $this->db->where('id_product', $id);
        $this->db->delete('product');
        $this->session->set_flashdata('delete', 'Dihapus');
        redirect('User/produkpenjual');
    }

    public function keranjangpembeli()
    {
        $data['title'] = 'Keranjang';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pesanan'] = $this->Foodtin_model->pesanansaya();
        $data['diantar'] = $this->Foodtin_model->pesanansayasdgdiantar();
        $data['dibuat'] = $this->Foodtin_model->pesanansayasdgdibuat();
        $data['diterima'] = $this->Foodtin_model->pesanansayaselesai();
        $this->load->view('TemplateAdmin/HeaderAdmin', $data);
        $this->load->view('User/keranjangpembeli', $data);
        $this->load->view('TemplateAdmin/FooterAdmin');
    }

    public function addcart($id)
    {
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
        redirect('User/keranjangpembeli');
    }

    public function hapuskeranjang($rowid)
    {
        $data = array(
            'rowid' => $rowid,
            'qty'   => 0
        );

        $this->cart->update($data);
        $this->session->set_flashdata('keranjang', 'Dihapus');
        redirect('User/keranjangpembeli');
    }

    public function minuscart($rowid, $qty)
    {
        $data = array(
            'rowid' => $rowid,
            'qty' => $qty - 1
        );

        $this->cart->update($data);
        redirect('User/keranjangpembeli');
    }

    public function deleteallcart()
    {
        $this->cart->destroy();
        $this->session->set_flashdata('keranjang', 'Dihapus');
        redirect('User/keranjangpembeli');
    }

    public function checkout($id, $rowid)
    {
        $data['title'] = 'Checkout';
        $data['product'] = $this->Foodtin_model->find($id);
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['jurusan'] = $this->Foodtin_model->getUserdata();
        $data['rowid'] = $rowid;
        $this->load->view('TemplateAdmin/HeaderAdmin', $data);
        $this->load->view('User/Checkout', $data);
        $this->load->view('TemplateAdmin/FooterAdmin');
    }

    public function buatpesanan()
    {
        $qty = $this->input->post('jumlah');
        $rowid = $this->input->post('rowid');
        $data = array(
            'rowid' => $rowid,
            'qty' => $qty - $qty
        );

        $this->cart->update($data);

        $nama = $this->input->post('nama', true);
        $kls = $this->input->post('kelas', true);
        $nm_menu = $this->input->post('menu', true);
        $hrg = $this->input->post('harga', true);
        $tot_hrg = $this->input->post('total', true);
        $kantin = $this->input->post('kantin', true);
        $foto = $this->input->post('foto', true);
        $tambahan = $this->input->post('tambahan', true);
        $id_menu = $this->input->post('idproduct', true);
        $iduser = $this->input->post('idpembeli', true);

        $data = [
            'id_product' => $id_menu,
            'id_userpembeli' => $iduser,
            'nm_pembeli' => $nama,
            'kelas_pembeli' => $kls,
            'menu' => $nm_menu,
            'harga' => $hrg,
            'jumlah' => $qty,
            'tot_harga' => $tot_hrg,
            'foto'  => $foto,
            'tambahan' => $tambahan,
            'status' => 'Sedang Dibuat',
            'kantin' => $kantin
        ];

        $this->db->insert('transaksi', $data);
        $this->session->set_flashdata('pesanan', 'Dibuat');
        redirect('User/keranjangpembeli');
    }

    public function pesananpenjual()
    {
        $data['title'] = 'Pembeli';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['transaksi'] = $this->Foodtin_model->getalltransaksi();
        $data['notifdiantar'] = $this->Foodtin_model->getsdhdiantar();
        $data['notifdibuat'] = $this->Foodtin_model->getsdgdibuat();
        $this->load->view('TemplateAdmin/HeaderAdmin', $data);
        $this->load->view('User/pesananpenjual', $data);
        $this->load->view('TemplateAdmin/FooterAdmin');
    }

    public function sendmenu($id)
    {
        $data['title'] = 'Antar';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['menu'] = $this->Foodtin_model->getmenubyid($id);
        $data['notifdiantar'] = $this->Foodtin_model->getsdhdiantar();
        $data['notifdibuat'] = $this->Foodtin_model->getsdgdibuat();
        $this->load->view('TemplateAdmin/HeaderAdmin', $data);
        $this->load->view('User/Kirimmenu', $data);
        $this->load->view('TemplateAdmin/FooterAdmin');
    }

    public function kirimmenu()
    {
        $id = $this->input->post('id', true);
        $nm = $this->input->post('nama', true);
        $kls = $this->input->post('kls', true);
        $menu = $this->input->post('menu', true);
        $hrg = $this->input->post('harga', true);
        $jml = $this->input->post('jml', true);
        $tothrg = $this->input->post('tothrg', true);
        $tambahan = $this->input->post('tambahan', true);
        $status = $this->input->post('status', true);

        $this->db->set('nm_pembeli', $nm);
        $this->db->set('kelas_pembeli', $kls);
        $this->db->set('menu', $menu);
        $this->db->set('harga', $hrg);
        $this->db->set('jumlah', $jml);
        $this->db->set('tot_harga', $tothrg);
        $this->db->set('tambahan', $tambahan);
        $this->db->set('status', $status);
        $this->db->where('id_transaksi', $id);
        $this->db->update('transaksi');
        $this->session->set_flashdata('kirim', 'Berhasil');
        redirect('User/pesananpenjual');
    }

    public function pesanandiantar()
    {
        $data['title'] = 'Sudah Di Antar';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['transaksi'] = $this->Foodtin_model->getsudahdiantar();
        $data['notifdiantar'] = $this->Foodtin_model->getsdhdiantar();
        $data['notifdibuat'] = $this->Foodtin_model->getsdgdibuat();
        $this->load->view('TemplateAdmin/HeaderAdmin', $data);
        $this->load->view('User/Pesanandiantar', $data);
        $this->load->view('TemplateAdmin/FooterAdmin');
    }

    public function pesananpembelidibuat()
    {
        $data['title'] = 'Pesanan Saya';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pesanan'] = $this->Foodtin_model->pesanansaya();
        $data['diantar'] = $this->Foodtin_model->pesanansayasdgdiantar();
        $data['dibuat'] = $this->Foodtin_model->pesanansayasdgdibuat();
        $data['diterima'] = $this->Foodtin_model->pesanansayaselesai();
        $data['pesanansaya'] = $this->Foodtin_model->getpesanansayadibuat();
        $this->load->view('TemplateAdmin/HeaderAdmin', $data);
        $this->load->view('User/Pesananpembelidibuat', $data);
        $this->load->view('TemplateAdmin/FooterAdmin');
    }

    public function pesananpembelidiantar()
    {
        $data['title'] = 'Pesanan Saya';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pesanan'] = $this->Foodtin_model->pesanansaya();
        $data['diantar'] = $this->Foodtin_model->pesanansayasdgdiantar();
        $data['dibuat'] = $this->Foodtin_model->pesanansayasdgdibuat();
        $data['diterima'] = $this->Foodtin_model->pesanansayaselesai();
        $data['pesanansaya'] = $this->Foodtin_model->getpesanansayadiantar();
        $this->load->view('TemplateAdmin/HeaderAdmin', $data);
        $this->load->view('User/Pesananpembelidiantar', $data);
        $this->load->view('TemplateAdmin/FooterAdmin');
    }

    public function pesananselesai()
    {
        $data['title'] = 'Pesanan Saya';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pesanan'] = $this->Foodtin_model->pesanansaya();
        $data['diantar'] = $this->Foodtin_model->pesanansayasdgdiantar();
        $data['dibuat'] = $this->Foodtin_model->pesanansayasdgdibuat();
        $data['diterima'] = $this->Foodtin_model->pesanansayaselesai();
        $data['pesanansaya'] = $this->Foodtin_model->getpesanansayaselesai();
        $this->load->view('TemplateAdmin/HeaderAdmin', $data);
        $this->load->view('User/Pesananpembeliselesai', $data);
        $this->load->view('TemplateAdmin/FooterAdmin');
    }

    public function pesananditerima($id)
    {
        $data['title'] = 'Pesanan Diterima';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pesanan'] = $this->Foodtin_model->pesanansaya();
        $data['diantar'] = $this->Foodtin_model->pesanansayasdgdiantar();
        $data['dibuat'] = $this->Foodtin_model->pesanansayasdgdibuat();
        $data['diterima'] = $this->Foodtin_model->pesanansayaselesai();
        $data['menu'] = $this->Foodtin_model->getpesanansayabyid($id);
        $this->load->view('TemplateAdmin/HeaderAdmin', $data);
        $this->load->view('User/Pesananditerima', $data);
        $this->load->view('TemplateAdmin/FooterAdmin');
    }

    public function menuditerima()
    {
        $id = $this->input->post('id', true);
        $menu = $this->input->post('menu', true);
        $hrg = $this->input->post('harga', true);
        $jml = $this->input->post('jml', true);
        $tothrg = $this->input->post('tothrg', true);
        $tambahan = $this->input->post('tambahan', true);
        $status = $this->input->post('status', true);

        $this->db->set('menu', $menu);
        $this->db->set('harga', $hrg);
        $this->db->set('jumlah', $jml);
        $this->db->set('tot_harga', $tothrg);
        $this->db->set('tambahan', $tambahan);
        $this->db->set('status', $status);
        $this->db->where('id_transaksi', $id);
        $this->db->update('transaksi');
        redirect('User/pesananselesai');
    }

    public function pesanansdhditerima()
    {
        $data['title'] = 'Pesanan Diterima';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['transaksi'] = $this->Foodtin_model->getsudahditerima();
        $data['notifdiantar'] = $this->Foodtin_model->getsdhdiantar();
        $data['notifdibuat'] = $this->Foodtin_model->getsdgdibuat();
        $data['notifditerima'] = $this->Foodtin_model->getsdhditerima();
        $this->load->view('TemplateAdmin/HeaderAdmin', $data);
        $this->load->view('User/Pesanansdhditerima', $data);
        $this->load->view('TemplateAdmin/FooterAdmin');
    }
}

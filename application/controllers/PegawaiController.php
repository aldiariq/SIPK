<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PegawaiController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('status_login')) {
            $this->tampilPeringatan("Pastikan Sudah Melakukan Login");
            redirect(base_url(), 'refresh');
        } else {
            $this->load->model('PegawaiModel');
            $this->load->model('JabatanModel');
            $this->load->model('UserModel');
        }
    }

    private $Idpegawai = null;
    private $Namapegawai = null;
    private $Alamat = null;
    private $Jeniskelamin = null;
    private $Tempatlahir = null;
    private $Tanggallahir = null;
    private $Jeniskartuidentitas = null;
    private $Nokartuidentitas = null;
    private $Agama = null;
    private $Notelepon = null;
    private $Status = null;
    private $Idjabatan = null;

    public function pegawai()
    {
        $data_lihatpegawai = array(
            'pegawai' => $this->PegawaiModel->pegawai(),
            'jabatan' => $this->JabatanModel->ambildataJabatan()
        );

        $this->load->view('pegawai', $data_lihatpegawai);
    }

    public function lihatpegawai()
    {
        $this->Idpegawai = (int)$this->uri->segment(2);
        $data_lihatpegawai = $this->PegawaiModel->lihatpegawai($this->Idpegawai);
        echo json_encode($data_lihatpegawai);
    }

    public function ubahprofil()
    {
        $data_profil = array('jabatan' => $this->JabatanModel->ambildataJabatan());
        $this->load->view('ubahprofil', $data_profil);
    }

    public function aksiubahprofil()
    {
        $this->Idpegawai = $this->session->userdata('Idpegawai');
        $this->Namapegawai = $this->input->post('namapegawai');
        $this->Alamat = $this->input->post('alamat');
        $this->Jeniskelamin = $this->input->post('jeniskelamin');
        $this->Tempatlahir = $this->input->post('tempatlahir');
        $this->Tanggallahir = $this->input->post('tanggallahir');
        $this->Jeniskartuidentitas = $this->input->post('jeniskartuidentitas');
        $this->Nokartuidentitas = $this->input->post('nokartuidentitas');
        $this->Agama = $this->input->post('agama');
        $this->Notelepon = $this->input->post('notelepon');
        $this->Status = $this->input->post('status');
        $this->Idjabatan = $this->input->post('idjabatan');

        $data_profil = array(
            'Idpegawai' => $this->Idpegawai,
            'Namapegawai' => $this->Namapegawai,
            'Alamat' => $this->Alamat,
            'Jeniskelamin' => $this->Jeniskelamin,
            'Tempatlahir' => $this->Tempatlahir,
            'Tanggallahir' => $this->Tanggallahir,
            'Jeniskartuidentitas' => $this->Jeniskartuidentitas,
            'Nokartuidentitas' => $this->Nokartuidentitas,
            'Agama' => $this->Agama,
            'Notelepon' => $this->Notelepon,
            'Status' => $this->Status,
            'Idjabatan' => $this->Idjabatan
        );

        $status_ubahprofil = $this->PegawaiModel->aksiubahprofil($data_profil);

        if ($status_ubahprofil) {
            $this->tampilPeringatan("Berhasil Mengubah Profil");
            redirect('aksilogout', 'refresh');
        } else {
            $this->tampilPeringatan("Berhasil Mengubah Profil");
        }

        redirect('ubahprofil', 'refresh');
    }

    public function aksitambahpegawai()
    {
        $this->Namapegawai = $this->input->post('namapegawai');
        $this->Alamat = $this->input->post('alamat');
        $this->Jeniskelamin = $this->input->post('jeniskelamin');
        $this->Tempatlahir = $this->input->post('tempatlahir');
        $this->Tanggallahir = $this->input->post('tanggallahir');
        $this->Jeniskartuidentitas = $this->input->post('jeniskartuidentitas');
        $this->Nokartuidentitas = $this->input->post('nokartuidentitas');
        $this->Agama = $this->input->post('agama');
        $this->Notelepon = $this->input->post('notelepon');
        $this->Status = $this->input->post('status');
        $this->Idjabatan = $this->input->post('idjabatan');

        $data_pegawai = array(
            'Namapegawai' => $this->Namapegawai,
            'Alamat' => $this->Alamat,
            'Jeniskelamin' => $this->Jeniskelamin,
            'Tempatlahir' => $this->Tempatlahir,
            'Tanggallahir' => $this->Tanggallahir,
            'Jeniskartuidentitas' => $this->Jeniskartuidentitas,
            'Nokartuidentitas' => $this->Nokartuidentitas,
            'Agama' => $this->Agama,
            'Notelepon' => $this->Notelepon,
            'Status' => $this->Status,
            'Idjabatan' => $this->Idjabatan
        );

        $tambah_pegawai = $this->PegawaiModel->aksitambahpegawai($data_pegawai);

        if ($tambah_pegawai) {
            $data_user = array(
                'Idpegawai' => $this->db->insert_id(),
                'Username' => strtolower(str_replace(' ', '', $this->Namapegawai)),
                'Password' => md5(strtolower(str_replace(' ', '', $this->Namapegawai)))
            );
            $tambah_user = $this->UserModel->tambahuser($data_user);
            if ($tambah_user) {
                $this->tampilPeringatan("Berhasil Menambah Pegawai");
            } else {
                $this->tampilPeringatan("Gagal Menambah Pegawai");
            }
        } else {
            $this->tampilPeringatan("Gagal Menambah Pegawai");
        }
        redirect('pegawai', 'refresh');
    }

    public function aksihapuspegawai()
    {
        $this->Idpegawai = $this->uri->segment(2);
        $data_pegawai = array('Idpegawai' => $this->Idpegawai);
        $hapus_pegawai = $this->PegawaiModel->aksihapuspegawai($data_pegawai);
        if ($hapus_pegawai) {
            $this->tampilPeringatan("Berhasil Menghapus Pegawai");
        } else {
            $this->tampilPeringatan("Gagal Menghapus Pegawai");
        }
        redirect('pegawai', 'refresh');
    }

    public function aksiubahpegawai()
    {
        $this->Idpegawai = (int)$this->uri->segment(2);
        $this->Namapegawai = $this->input->post('namapegawai');
        $this->Alamat = $this->input->post('alamat');
        $this->Jeniskelamin = $this->input->post('jeniskelamin');
        $this->Tempatlahir = $this->input->post('tempatlahir');
        $this->Tanggallahir = $this->input->post('tanggallahir');
        $this->Jeniskartuidentitas = $this->input->post('jeniskartuidentitas');
        $this->Nokartuidentitas = $this->input->post('nokartuidentitas');
        $this->Agama = $this->input->post('agama');
        $this->Notelepon = $this->input->post('notelepon');
        $this->Status = $this->input->post('status');
        $this->Idjabatan = $this->input->post('idjabatan');

        $data_profil = array(
            'Idpegawai' => $this->Idpegawai,
            'Namapegawai' => $this->Namapegawai,
            'Alamat' => $this->Alamat,
            'Jeniskelamin' => $this->Jeniskelamin,
            'Tempatlahir' => $this->Tempatlahir,
            'Tanggallahir' => $this->Tanggallahir,
            'Jeniskartuidentitas' => $this->Jeniskartuidentitas,
            'Nokartuidentitas' => $this->Nokartuidentitas,
            'Agama' => $this->Agama,
            'Notelepon' => $this->Notelepon,
            'Status' => $this->Status,
            'Idjabatan' => $this->Idjabatan
        );

        $status_ubahpegawai = $this->PegawaiModel->aksiubahprofil($data_profil);

        if ($status_ubahpegawai) {
            $this->tampilPeringatan("Berhasil Mengubah Pegawai");
        } else {
            $this->tampilPeringatan("Berhasil Mengubah Pegawai");
        }

        redirect('pegawai', 'refresh');
    }

    public function tampilPeringatan($isiPeringatan)
    {
        echo "<script>alert('" . $isiPeringatan . "');</script>";
    }
}

/* End of file PegawaiController.php */

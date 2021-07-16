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
            redirect('aksilogout','refresh');
        } else {
            $this->tampilPeringatan("Berhasil Mengubah Profil");
        }

        redirect('ubahprofil', 'refresh');
    }

    public function tampilPeringatan($isiPeringatan)
    {
        echo "<script>alert('" . $isiPeringatan . "');</script>";
    }
}

/* End of file PegawaiController.php */

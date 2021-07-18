<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JabatanController extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('status_login')) {
            $this->tampilPeringatan("Pastikan Sudah Melakukan Login");
            redirect(base_url(), 'refresh');
        } else {
            $this->load->model('JabatanModel');
        }
    }

    private $Idjabatan = null;
    private $Jabatan = null;

    public function aksitambahjabatan()
    {
        $this->Jabatan = strtoupper($this->input->post('jabatan'));
        $data_jabatan = array('Jabatan' => $this->Jabatan);
        $status_jabatan = $this->JabatanModel->aksitambahjabatan($data_jabatan);

        if ($status_jabatan) {
            $this->tampilPeringatan("Berhasil Menambah Jabatan");
        } else {
            $this->tampilPeringatan("Gagal Menambah Jabatan");
        }

        redirect('jabatan', 'refresh');
    }

    public function jabatan()
    {
        $jabatan = $this->JabatanModel->ambildataJabatan();
        $data_jabatan = array('jabatan' => $jabatan);
        $this->load->view('jabatan', $data_jabatan);
    }

    public function lihatjabatan()
    {
        $this->Idjabatan = (int)$this->uri->segment(2);
        $data_lihatjabatan = $this->JabatanModel->lihatjabatan($this->Idjabatan);
        echo json_encode($data_lihatjabatan);
    }

    public function aksiubahjabatan()
    {
        $this->Idjabatan = (int)$this->uri->segment(2);
        $this->Jabatan = strtoupper($this->input->post('jabatan'));
        $data_jabatan = array(
            'Idjabatan' => $this->Idjabatan,
            'Jabatan' => $this->Jabatan
        );
        $status_jabatan = $this->JabatanModel->aksiubahjabatan($data_jabatan);
        if ($status_jabatan) {
            $this->tampilPeringatan("Berhasil Mengubah Jabatan");
        } else {
            $this->tampilPeringatan("Gagal Mengubah Jabatan");
        }

        redirect('jabatan', 'refresh');
    }

    public function aksihapusjabatan()
    {
        $this->Idjabatan = (int)$this->uri->segment(2);
        $status_jabatan = $this->JabatanModel->aksihapusjabatan($this->Idjabatan);
        if ($status_jabatan) {
            $this->tampilPeringatan("Berhasil Menghapus Jabatan");
        } else {
            $this->tampilPeringatan("Gagal Menghapus Jabatan");
        }

        redirect('jabatan', 'refresh');
    }  

    public function tampilPeringatan($isiPeringatan)
    {
        echo "<script>alert('" . $isiPeringatan . "');</script>";
    }
}

/* End of file JabatanController.php */

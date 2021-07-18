<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VariabelController extends CI_Controller
{
    private $Idvariabel = null;
    private $Namavariabel = null;

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('status_login')) {
            $this->tampilPeringatan("Pastikan Sudah Melakukan Login");
            redirect(base_url(), 'refresh');
        } else {
            $this->load->model('VariabelModel');
        }
    }

    public function variabel()
    {
        $variabel = $this->VariabelModel->ambildataVariabel();
        $data_variabel = array('variabel' => $variabel);
        $this->load->view('variabel', $data_variabel);
    }

    public function aksitambahvariabel()
    {
        $this->Namavariabel = $this->input->post('namavariabel');
        $data_variabel = array('Namavariabel' => $this->Namavariabel);
        $status_variabel = $this->VariabelModel->aksitambahvariabel($data_variabel);

        if ($status_variabel) {
            $this->tampilPeringatan("Berhasil Menambah Variabel");
        } else {
            $this->tampilPeringatan("Gagal Menambah Variabel");
        }

        redirect('variabel', 'refresh');
    }

    public function lihatvariabel()
    {
        $this->Idvariabel = (int)$this->uri->segment(2);
        $data_lihatvariabel = $this->VariabelModel->lihatvariabel($this->Idvariabel);
        echo json_encode($data_lihatvariabel);
    }

    public function aksihapusvariabel()
    {
        $this->Idvariabel = (int)$this->uri->segment(2);
        $status_variabel = $this->VariabelModel->aksihapusvariabel($this->Idvariabel);
        if ($status_variabel) {
            $this->tampilPeringatan("Berhasil Menghapus Variabel");
        } else {
            $this->tampilPeringatan("Gagal Menghapus Variabel");
        }

        redirect('variabel', 'refresh');
    }

    public function aksiubahvariabel()
    {
        $this->Idvariabel = (int)$this->uri->segment(2);
        $this->Namavariabel = $this->input->post('namavariabel');
        $data_variabel = array(
            'Idvariabel' => $this->Idvariabel,
            'Namavariabel' => $this->Namavariabel
        );
        $status_variabel = $this->VariabelModel->aksiubahvariabel($data_variabel);
        if ($status_variabel) {
            $this->tampilPeringatan("Berhasil Mengubah Variabel");
        } else {
            $this->tampilPeringatan("Gagal Mengubah Variabel");
        }

        redirect('variabel', 'refresh');
    }

    public function tampilPeringatan($isiPeringatan)
    {
        echo "<script>alert('" . $isiPeringatan . "');</script>";
    }
}

/* End of file VariabelController.php */

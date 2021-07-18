<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IndikatorController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('status_login')) {
            $this->tampilPeringatan("Pastikan Sudah Melakukan Login");
            redirect(base_url(), 'refresh');
        } else {
            $this->load->model('IndikatorModel');
            $this->load->model('VariabelModel');
        }
    }

    private $Idindikator = null;
    private $Namaindikator = null;
    private $Bobotindikator = null;
    private $Nilaipembanding = null;
    private $Idvariabel = null;

    public function indikator()
    {
        $indikator = $this->IndikatorModel->ambildataIndikator();
        $variabel = $this->VariabelModel->ambildataVariabel();
        $data_indikator = array(
            'indikator' => $indikator,
            'variabel' => $variabel
        );
        $this->load->view('indikator', $data_indikator);
    }

    public function aksitambahindikator()
    {
        $this->Namaindikator = $this->input->post('namaindikator');
        $this->Bobotindikator = $this->input->post('bobotindikator');
        $this->Nilaipembanding = $this->input->post('nilaipembanding');
        $this->Idvariabel = $this->input->post('idvariabel');

        $data_indikator = array(
            'Namaindikator' => $this->Namaindikator,
            'Bobotindikator' => $this->Bobotindikator,
            'Nilaipembanding' => $this->Nilaipembanding,
            'Idvariabel' => $this->Idvariabel
        );

        $status_variabel = $this->IndikatorModel->aksitambahindikator($data_indikator);

        if ($status_variabel) {
            $this->tampilPeringatan("Berhasil Menambah Indikator");
        } else {
            $this->tampilPeringatan("Gagal Menambah Indikator");
        }

        redirect('indikator', 'refresh');
    }

    public function aksihapusindikator()
    {
        $this->Idindikator = (int)$this->uri->segment(2);
        $status_variabel = $this->IndikatorModel->aksihapusindikator($this->Idindikator);
        if ($status_variabel) {
            $this->tampilPeringatan("Berhasil Menghapus Indikator");
        } else {
            $this->tampilPeringatan("Gagal Menghapus Indikator");
        }

        redirect('indikator', 'refresh');
    }

    public function lihatindikator()
    {
        $this->Idindikator = (int)$this->uri->segment(2);
        $data_lihatindikator = $this->IndikatorModel->lihatindikator($this->Idindikator);
        echo json_encode($data_lihatindikator);
    }

    public function aksiubahindikator()
    {
        $this->Idindikator = (int)$this->uri->segment(2);
        $this->Namaindikator = $this->input->post('namaindikator');
        $this->Bobotindikator = $this->input->post('bobotindikator');
        $this->Nilaipembanding = $this->input->post('nilaipembanding');
        $this->Idvariabel = $this->input->post('idvariabel');

        $data_indikator = array(
            'Idindikator' => $this->Idindikator,
            'Namaindikator' => $this->Namaindikator,
            'Bobotindikator' => $this->Bobotindikator,
            'Nilaipembanding' => $this->Nilaipembanding,
            'Idvariabel' => $this->Idvariabel
        );

        $status_variabel = $this->IndikatorModel->aksiubahindikator($data_indikator);

        if ($status_variabel) {
            $this->tampilPeringatan("Berhasil Merubah Indikator");
        } else {
            $this->tampilPeringatan("Gagal Merubah Indikator");
        }
        redirect('indikator', 'refresh');
    }

    public function tampilPeringatan($isiPeringatan)
    {
        echo "<script>alert('" . $isiPeringatan . "');</script>";
    }
}

/* End of file IndikatorController.php */

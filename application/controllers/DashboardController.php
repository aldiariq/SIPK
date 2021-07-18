<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('status_login')) {
            $this->tampilPeringatan("Pastikan Sudah Melakukan Login");
            redirect(base_url(), 'refresh');
        } else {
            $this->load->model('UserModel');
            $this->load->model('IndikatorModel');
            $this->load->model('VariabelModel');
            $this->load->model('PegawaiModel');
        }
    }

    private $jumlahindikator = null;
    private $jumlahvariabel = null;
    private $jumlahpegawai = null;
    private $indikator;
    private $variabel;

    public function dashboard()
    {
        $this->jumlahindikator = $this->IndikatorModel->jumlahIndikator();
        $this->jumlahvariabel = $this->VariabelModel->jumlahVariabel();
        $this->jumlahpegawai = $this->PegawaiModel->jumlahPegawai();
        $this->variabel = $this->VariabelModel->ambildataVariabel();
        $this->indikator = $this->IndikatorModel->ambildataIndikator();

        $data_dashboard = array(
            'jumlahindikator' => $this->jumlahindikator,
            'jumlahvariabel' => $this->jumlahvariabel,
            'jumlahpegawai' => $this->jumlahpegawai,
            'variabel' => $this->variabel,
            'indikator' => $this->indikator
        );

        $this->load->view('index', $data_dashboard);
    }

    public function tampilPeringatan($isiPeringatan)
    {
        echo "<script>alert('" . $isiPeringatan . "');</script>";
    }
}

/* End of file DashboardController.php */

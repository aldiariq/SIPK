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

    public function index()
    {
        $data_dashboard = array(
            'jumlahindikator' => $this->IndikatorModel->jumlahIndikator(),
            'jumlahvariabel' => $this->VariabelModel->jumlahVariabel(),
            'jumlahpegawai' => $this->PegawaiModel->jumlahPegawai(),
        );

        $this->load->view('dashboard/index', $data_dashboard);
    }

    public function tampilPeringatan($isiPeringatan)
    {
        echo "<script>alert('" . $isiPeringatan . "');</script>";
    }
}

/* End of file DashboardController.php */

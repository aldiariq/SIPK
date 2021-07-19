<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenilaianpegawaiController extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('status_login')) {
            $this->tampilPeringatan("Pastikan Sudah Melakukan Login");
            redirect(base_url(), 'refresh');
        } else {
            $this->load->model('VariabelModel');
            $this->load->model('IndikatorModel');
            $this->load->model('PegawaiModel');
            $this->load->model('PenilaianpegawaiModel');
        }
    }


    public function penilaianpegawai()
    {
        $penilaianpegawai = $this->PenilaianpegawaiModel->penilaianpegawai();
        $pegawai = $this->PegawaiModel->pegawai();
        $data_penilaianpegawai = array(
            'penilaianpegawai' => $penilaianpegawai,
            'pegawai' => $pegawai
        );
        $this->load->view('penilaianpegawai', $data_penilaianpegawai);
    }

    public function tampilPeringatan($isiPeringatan)
    {
        echo "<script>alert('" . $isiPeringatan . "');</script>";
    }
}

/* End of file PenilaianpegawaiController.php */

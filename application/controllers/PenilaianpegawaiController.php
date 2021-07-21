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

    private $Idpegawai = null;
    private $Bobot = null;
    private $Tanggallaporan = null;
    private $Idindikator = null;
    private $Nilaiindikator = null;

    public function aksitambahpenilaianpegawai()
    {
        $this->Idpegawai = $this->input->post('idpegawai');
        $this->Tanggallaporan = $this->input->post('tanggallaporan');

        $indikator = $this->IndikatorModel->ambildataIndikator();

        foreach ($indikator as $data) {
            $this->Idindikator = $data['Idindikator'];
            $this->Nilaiindikator = $this->hitungnilaiIndikator($data['Nilairentang'], $data['Nilaipembanding'], $data['Bobotindikator']);

            $data_penilaianpegawai = array(
                'Idpegawai' => $this->Idpegawai,
                'Tanggallaporan' => $this->Tanggallaporan,
                'Idindikator' => $this->Idindikator,
                'Nilaiindikator' => $this->Nilaiindikator
            );

            $status_penilaianpegawai = $this->PenilaianpegawaiModel->aksitambahpenilaianpegawai($data_penilaianpegawai);

            if (!$status_penilaianpegawai) {
                $this->tampilPeringatan("Gagal Menambah Penilaian Pegawai");
            }
        }

        $this->tampilPeringatan("Berhasil Menambah Penilaian Pegawai");

        redirect('penilaianpegawai', 'refresh');
    }

    public function penilaianpegawai()
    {
        $pegawai = $this->PegawaiModel->pegawai();
        $data_penilaianpegawai = array(
            'pegawai' => $pegawai
        );
        $this->load->view('penilaianpegawai', $data_penilaianpegawai);
    }

    public function hitungnilaiIndikator($Nilairentang, $Nilaipembanding, $Bobotindikator)
    {
        return round(($Nilairentang / $Nilaipembanding) * $Bobotindikator, 2);
    }

    public function cariPeringkat($Bobot)
    {
        if ($Bobot >= 0 && $Bobot <= 45) {
            return 1;
        } else if ($Bobot >= 46 && $Bobot <= 60) {
            return 2;
        } else if ($Bobot >= 61 && $Bobot <= 75) {
            return 3;
        } else if ($Bobot >= 76 && $Bobot <= 85) {
            return 3;
        } else if ($Bobot >= 86 && $Bobot <= 100) {
            return 3;
        } else {
            return 0;
        }
    }

    public function cariSkala($Bobot)
    {
        if ($Bobot >= 0 && $Bobot <= 45) {
            return 'E';
        } else if ($Bobot >= 46 && $Bobot <= 60) {
            return 'D';
        } else if ($Bobot >= 61 && $Bobot <= 75) {
            return 'C';
        } else if ($Bobot >= 76 && $Bobot <= 85) {
            return 'B';
        } else if ($Bobot >= 86 && $Bobot <= 100) {
            return 'A';
        } else {
            return 'F';
        }
    }

    public function lihatpenilaianpegawai()
    {
        $this->Idpegawai = (int)$this->uri->segment(2);
        $tanggalmulai = $this->input->get('tanggalmulai');
        $tanggalselesai = $this->input->get('tanggalselesai');
        $this->Bobot = 0;

        $where_penilaianpegawai = array(
            'Idpegawai' => $this->Idpegawai,
            'Tanggalmulai' => $tanggalmulai,
            'Tanggalselesai' => $tanggalselesai
        );

        $data_penilaianpegawai = $this->PenilaianpegawaiModel->lihatpenilaianpegawai($where_penilaianpegawai);
        foreach ($data_penilaianpegawai as $data) {
            $this->Bobot = $this->Bobot + $data['Nilaiindikator'];
        }

        $json_penilaianpegawai = array(
            'data' => $data_penilaianpegawai,
            'bobot' => $this->Bobot,
            'peringkat' => $this->cariPeringkat($this->Bobot),
            'skala' => $this->cariSkala($this->Bobot)
        );
        echo json_encode($json_penilaianpegawai);
    }

    public function tampilPeringatan($isiPeringatan)
    {
        echo "<script>alert('" . $isiPeringatan . "');</script>";
    }
}

/* End of file PenilaianpegawaiController.php */

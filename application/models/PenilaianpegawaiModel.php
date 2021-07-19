<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class PenilaianpegawaiModel extends CI_Model {

    public function penilaianpegawai()
    {
        $penilaianpegawai = $this->db->select('*');
        $penilaianpegawai = $this->db->from('Penilaianpegawai');
        $penilaianpegawai = $this->db->join('Pegawai', 'Pegawai.Idpegawai = Penilaianpegawai.Idpegawai');
        $penilaianpegawai = $this->db->join('Indikator', 'Indikator.Idindikator = Penilaianpegawai.Idindikator');
        $penilaianpegawai = $this->db->get();
        return $penilaianpegawai->result_array();
    }

}

/* End of file PenilaianpegawaiModel.php */

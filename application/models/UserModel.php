<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{

    public function aksilogin($datauser)
    {
        $cari_user = $this->db->get_where('User', $datauser);
        return $cari_user;
    }

    public function cariDatapegawai($datapegawai)
    {
        $cari_pegawai = $this->db->select('*');
        $cari_pegawai = $this->db->from('Pegawai');
        $cari_pegawai = $this->db->join('Jabatan', 'Jabatan.Idjabatan = Pegawai.Idjabatan');
        $cari_pegawai = $this->db->where($datapegawai);
        $cari_pegawai = $this->db->get();
        return $cari_pegawai;
    }
}

/* End of file User.php */

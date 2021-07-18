<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{

    public function tambahuser($datauser)
    {
        $this->db->trans_begin();
        $this->db->insert('User', $datauser);
        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            return true;
        } else {
            return false;
        }
    }

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

    public function aksiubahpassword($data_ubahpassword)
    {
        $cari_user = $this->db->get_where('User', ['Idpegawai' => $data_ubahpassword['Idpegawai']]);
        $cari_user = $cari_user->result_array();

        foreach ($cari_user as $data) {
            if ($data['Password'] == $data_ubahpassword['passwordlama']) {
                $this->db->trans_begin();
                $this->db->where(['Idpegawai' => $data_ubahpassword['Idpegawai']]);
                $this->db->update('User', ['Password' => $data_ubahpassword['passwordbaru']]);
                $this->db->trans_complete();
                if ($this->db->trans_status()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
}

/* End of file User.php */

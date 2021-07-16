<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
	}

	private $username = '';
	private $password = '';

	public function login()
	{
		$this->load->view('login');
	}

	public function aksilogin()
	{
		$this->username = $this->input->post('username');
		$this->password = $this->input->post('password');

		if (isset($this->username) && isset($this->password)) {
			$datauser = array(
				'Username' => $this->username,
				'Password' => md5($this->password)
			);

			$cari_user = $this->UserModel->aksilogin($datauser);

			if ($cari_user->num_rows() > 0) {
				foreach ($cari_user->result_array() as $data) {
					$datapegawai = array('Idpegawai' => $data['Idpegawai']);
					$data_pegawai = $this->UserModel->cariDatapegawai($datapegawai);
				}

				foreach ($data_pegawai->result_array() as $data) {

					$data_session = array(
						'status_login' => true,
						'Idpegawai' => $data['Idpegawai'],
						'Namapegawai' => $data['Namapegawai'],
						'Alamat' => $data['Alamat'],
						'Jeniskelamin' => $data['Jeniskelamin'],
						'Tempatlahir' => $data['Tempatlahir'],
						'Tanggallahir' => $data['Tanggallahir'],
						'Jeniskartuidentitas' => $data['Jeniskartuidentitas'],
						'Nokartuidentitas' => $data['Nokartuidentitas'],
						'Agama' => $data['Agama'],
						'Notelepon' => $data['Notelepon'],
						'Status' => $data['Status'],
						'Jabatan' => $data['Jabatan'],
					);
				}

				$this->session->set_userdata($data_session);
				$this->tampilPeringatan("Berhasil Login");
			} else {
				$this->tampilPeringatan("Gagal Login");
				redirect('login', 'refresh');
			}
		} else {
			$this->tampilPeringatan("Pastikan Inputan Terisi");
		}
	}

	public function aksilogout()
	{
		$this->session->sess_destroy();
		$this->tampilPeringatan("Berhasil Logout");
		redirect('login', 'refresh');
	}

	public function tampilPeringatan($isiPeringatan)
	{
		echo "<script>alert('" . $isiPeringatan . "');</script>";
	}
}

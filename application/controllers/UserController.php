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

	private $username = null;
	private $password = null;

	private $Idpegawai = null;
	private $passwordlama = null;
	private $passwordbaru = null;
	private $passwordbaru2 = null;

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
				redirect('dashboard', 'refresh');
			} else {
				$this->tampilPeringatan("Gagal Login");
			}
		} else {
			$this->tampilPeringatan("Pastikan Inputan Terisi");
		}
		redirect('login', 'refresh');
	}

	public function aksilogout()
	{
		$this->session->sess_destroy();
		$this->tampilPeringatan("Berhasil Logout");
		redirect('login', 'refresh');
	}

	public function ubahpassword()
	{
		if ($this->cekStatuslogin()) {
			$this->load->view('ubahpassword');
		} else {
			$this->tampilPeringatan("Pastikan Sudah Melakukan Login");
			redirect('login', 'refresh');
		}
	}

	public function aksiubahpassword()
	{
		
		$this->Idpegawai = $this->session->userdata('Idpegawai');
		$this->passwordlama = $this->input->post('passwordlama');
		$this->passwordbaru = $this->input->post('passwordbaru');
		$this->passwordbaru2 = $this->input->post('passwordbaru2');

		if (isset($this->passwordlama) && isset($this->passwordbaru) && isset($this->passwordbaru2)) {
			if ($this->passwordbaru == $this->passwordbaru2) {
				$data_ubahpassword = array(
					'Idpegawai' => $this->Idpegawai,
					'passwordlama' => md5($this->passwordlama),
					'passwordbaru' => md5($this->passwordbaru)
				);

				$status_ubahpassword = $this->UserModel->aksiubahpassword($data_ubahpassword);

				if ($status_ubahpassword) {
					$this->tampilPeringatan("Berhasil Mengubah Password");
					$this->aksilogout();
				} else {
					$this->tampilPeringatan("Gagal Mengubah Password");
				}
				
			} else {
				$this->tampilPeringatan("Pastikan Password Baru Sama");
			}
			
		} else {
			$this->tampilPeringatan("Pastikan Inputan Terisi");
		}
		
		redirect('ubahpassword','refresh');
	}

	public function tampilPeringatan($isiPeringatan)
	{
		echo "<script>alert('" . $isiPeringatan . "');</script>";
	}

	public function cekStatuslogin()
	{
		if (!$this->session->userdata('status_login')) {
			return false;
		} else {
			return true;
		}
	}
}

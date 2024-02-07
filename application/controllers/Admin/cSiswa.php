<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cSiswa extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mSiswa');
	}

	public function index()
	{
		$data = array(
			'siswa' => $this->mSiswa->select()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/nav');
		$this->load->view('Admin/vSiswa', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function create()
	{
		$data = array(
			'id_user' => '1',
			'nama_siswa' => $this->input->post('nama'),
			'jk' => $this->input->post('jk'),
			'kelas' => $this->input->post('kelas'),
			'angkatan' => $this->input->post('angkatan'),
			'alamat' => $this->input->post('alamat')
		);
		$this->mSiswa->insert($data);
		$this->session->set_flashdata('success', 'Data Siswa berhasil disimpan!');
		redirect('Admin/cSiswa');
	}
	public function update($id)
	{
		$data = array(
			'id_user' => '1',
			'nama_siswa' => $this->input->post('nama'),
			'jk' => $this->input->post('jk'),
			'kelas' => $this->input->post('kelas'),
			'angkatan' => $this->input->post('angkatan'),
			'alamat' => $this->input->post('alamat')
		);
		$this->mSiswa->update($id, $data);
		$this->session->set_flashdata('success', 'Data Siswa berhasil diperbaharui!');
		redirect('Admin/cSiswa');
	}
	public function delete($id)
	{
		$this->mSiswa->delete($id);
		$this->session->set_flashdata('success', 'Data Siswa berhasil dihapus!');
		redirect('Admin/cSiswa');
	}
}

/* End of file cSiswa.php */

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wedding extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Model_wedding');
	}

	public function index()
	{
		if ($this->session->userdata('id')) {
			$data['error'] = '';
			$data['success'] = '';

			$userId = $this->session->userdata('id');

			$data['undangan'] = $this->Model_wedding->show($userId);
			$header['setting'] = $this->Model_wedding->get_setting_data($userId);


			$this->load->view('admin/view_header', $header);
			$this->load->view('admin/view_wedding', $data);
			$this->load->view('admin/view_footer');


		} else {
			redirect(base_url() . 'admin/view_login');
		}
	}

	public function update()
	{
		if ($this->session->userdata('id')) {
			$data['error'] = '';
			$data['success'] = '';

			$userId = $this->session->userdata('id');

			$data['undangan'] = $this->Model_wedding->show($userId);


			if (isset($_POST['form_wedding'])) {
				$userId = $this->session->userdata('id');
				$form_data = array(
					'kalimat_1' => $_POST['kalimat_1'],
					'kalimat_2' => $_POST['kalimat_2'],
					'nama_lengkap_pria' => $_POST['nama_lengkap_pria'],
					'nama_lengkap_wanita' => $_POST['nama_lengkap_wanita'],
					'nama_panggilan_pria' => $_POST['nama_panggilan_pria'],
					'nama_panggilan_wanita' => $_POST['nama_panggilan_wanita'],
					'alamat_pria' => $_POST['alamat_pria'],
					'alamat_wanita' => $_POST['alamat_wanita'],
					'orangtua_pria' => $_POST['orangtua_pria'],
					'orangtua_wanita' => $_POST['orangtua_wanita'],
					'acara_1' => $_POST['acara_1'],
					'waktu_acara_1' => $_POST['waktu_acara_1'],
					'acara_2' => $_POST['acara_2'],
					'waktu_acara_2' => $_POST['waktu_acara_2'],
					'hari_undangan' => $_POST['hari_undangan'],
					'tgl_undangan' => $_POST['tgl_undangan'],
					'ket_tempat' => $_POST['ket_tempat'],
					'alamat_lengkap' => $_POST['alamat_lengkap'],
					'google_maps' => $_POST['google_maps'],
					// 'google_calendar'		=> $_POST['google_calendar'],
					// 'google_map_direction'  => $_POST['google_map_direction'],
					'kata_pernikahan' => $_POST['kata_pernikahan'],
					'doa_pernikahan' => $_POST['doa_pernikahan'],
					'norek_pria' => $_POST['norek_pria'],
					'norek_wanita' => $_POST['norek_wanita'],
					'narek_pria' => $_POST['narek_pria'],
					'narek_wanita' => $_POST['narek_wanita'],
					'nabank_pria' => $_POST['nabank_pria'],
					'nabank_wanita' => $_POST['nabank_wanita']
				);

				$this->Model_wedding->update($form_data, $userId);

				$data['success'] = 'Data Pernikahan telah berhasil diupdate!';
			}

			$header['setting'] = $this->Model_wedding->get_setting_data($userId);
			$data['undangan'] = $this->Model_wedding->show($userId);

			$this->load->view('admin/view_header', $header);
			$this->load->view('admin/view_wedding', $data);
			$this->load->view('admin/view_footer');
		} else {
			redirect(base_url() . 'admin/view_login');
		}
	}

}
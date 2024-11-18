<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_home');
	}

	public function index()
	{
		$header['error'] = '';
		$header['success'] = '';

		// // Ambil parameter 'to' dari URL
		// if (isset($_GET['to'])) {
		// 	// Decode parameter 'to'
		// 	$decoded_id = base64_decode($_GET['to']);

		// 	// Ambil data nama tamu berdasarkan ID dari tabel tbl_invitation
		// 	$tamu = $this->Model_home->get_guest_by_id($decoded_id);

		// 	if ($tamu) {
		// 		$header['nama_tamu'] = "Mengundang " . htmlspecialchars($tamu['nama_lengkap']);
		// 	} else {
		// 		$header['nama_tamu'] = "Yth. Tamu Undangan";
		// 	}
		// } else {
		// 	$header['nama_tamu'] = "Yth. Tamu Undangan";
		// }

		if (isset($_POST['form1'])) {

			$valid = 1;

			$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
			$this->form_validation->set_rules('ucapan', 'Ucapan', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$valid = 0;
				$header['error'] = validation_errors();
			}

			if ($valid == 1) {

				$form_data = array(
					'nama_lengkap' => $_POST['nama_lengkap'],
					'ucapan' => $_POST['ucapan']
				);
				$this->Model_home->add($form_data);

				$header['success'] = 'Terimakasih atas semua do’a yang terpanjatkan untuk kebahagiaan dan kesempurnaan pernikahan Kami. Hanya do’a yang dapat Kami sampaikan, semoga semuanya juga bahagia';

				unset($_POST['nama_lengkap']);
				unset($_POST['ucapan']);
			}
		}

		$header['undangan'] = $this->Model_home->get_undangan_data();
		$header['guestbook'] = $this->Model_home->get_guestbook_data();

		$this->load->view('view_home', $header);
	}

	public function openInvitation()
	{
		$encodedName = $this->input->get('to'); // Ambil parameter `to` dari URL
		if (!$encodedName) {
			show_error('Nama undangan tidak ditemukan.', 400);
		}

		// Decode base64 untuk mendapatkan nama asli
		$name = base64_decode($encodedName);

		// Ambil data undangan berdasarkan nama
		$data['invitation'] = $this->Model_home->get_invitation_by_name($name);

		// Jika data tidak ditemukan
		if (empty($data['invitation'])) {
			show_error('Tidak ada undangan yang ditemukan untuk nama ini.', 404);
		}

		// Load view dan kirim data
		$this->load->view('view_open_undangan', $data);
	}





}



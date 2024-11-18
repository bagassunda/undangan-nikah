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
					'ucapan' => $_POST['ucapan'],
					'kontak' => $_POST['kontak'],
					'sosial_media' => $_POST['sosial_media'],
					'hadir' => $_POST['hadir']
				);

				$this->Model_home->add($form_data);

				$header['success'] = 'Terimakasih atas semua do’a yang terpanjatkan untuk kebahagiaan dan kesempurnaan pernikahan Kami. Hanya do’a yang dapat Kami sampaikan, semoga semuanya juga bahagia';

				unset($_POST['nama_lengkap']);
				unset($_POST['ucapan']);
				unset($_POST['kontak']);
				unset($_POST['sosial_media']);
				unset($_POST['hadir']);
			}
		}

		$userId = $this->session->userdata('id');

		$header['undangan'] = $this->Model_home->get_undangan_data($userId);
		$header['guestbook'] = $this->Model_home->get_guestbook_data();

		$this->load->view('view_home', $header);
	}

	public function openInvitation()
	{
		$encodedName = $this->input->get('to');
		if (!$encodedName) {
			redirect('home');
		}

		$name = base64_decode($encodedName);

		$invitation = $this->Model_home->get_invitation_by_name($name);

		if (empty($invitation)) {
			$this->session->set_flashdata('error', 'Undangan tidak ditemukan.');
			redirect('home');
		}

		$data['invitation'] = $invitation;

		$this->load->view('view_open_undangan', $data);
	}

}



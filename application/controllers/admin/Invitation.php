<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invitation extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Model_invitation');
	}

	public function index()
	{
		if ($this->session->userdata('id')) {
			$data['error'] = '';
			$data['success'] = '';

			$userId = $this->session->userdata('id');
			$invitations = $this->Model_invitation->show($userId);

			// Encode URL untuk setiap undangan
			foreach ($invitations as &$invitation) {
				$encodedName = base64_encode($invitation['nama_lengkap']);
				$invitation['url'] = base_url() . "home/openInvitation?to=" . $encodedName;
			}
	
			$data['invitation'] = $invitations;
			$header['setting'] = $this->Model_invitation->get_setting_data();


			$this->load->view('admin/view_header', $header);
			$this->load->view('admin/view_invitation', $data);
			$this->load->view('admin/view_footer');

		} else {
			redirect(base_url() . 'admin/view_login');
		}
	}

	public function add()
	{
		if ($this->session->userdata('id')) {
			$data['error'] = '';
			$data['success'] = '';

			$header['setting'] = $this->Model_invitation->get_setting_data();


			if (isset($_POST['form1'])) {

				$valid = 1;

				$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
				$this->form_validation->set_rules('url', 'URL', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$valid = 0;
					$data['error'] = validation_errors();
				}

				if ($valid == 1) {

					// Encode nama lengkap menjadi URL base64
					$encoded_url = "http://localhost/undangan-nikah/home/openInvitation?to=" . base64_encode($_POST['nama_lengkap']);
					
					$form_data = array(
						'nama_lengkap' => $_POST['nama_lengkap'],
						'url' => $encoded_url,
						'userId' => 1
					);
					$this->Model_invitation->add($form_data);

					$data['success'] = 'invitation berhasil ditambahkan!';
				}

				$data['encoded_url'] = isset($encoded_url) ? $encoded_url : '';

				$this->load->view('admin/view_header', $header);
				$this->load->view('admin/view_invitation_add', $data);
				$this->load->view('admin/view_footer');

			} else {
				$this->load->view('admin/view_header', $header);
				$this->load->view('admin/view_invitation_add', $data);
				$this->load->view('admin/view_footer');

			}

		} else {
			redirect(base_url() . 'admin/view_login');
		}
	}

	public function edit($id)
	{
		if ($this->session->userdata('id')) {

			// If there is no service in this id, then redirect
			$tot = $this->Model_invitation->invitation_check($id);
			if (!$tot) {
				redirect(base_url() . 'admin/invitation');
				exit;
			}

			$header['setting'] = $this->Model_invitation->get_setting_data();
			$data['error'] = '';
			$data['success'] = '';
			$error = '';

			if (isset($_POST['form1'])) {

				$valid = 1;

				$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
				$this->form_validation->set_rules('url', 'url', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$valid = 0;
					$data['error'] = validation_errors();
				}

				if ($valid == 1) {
					// Encode nama lengkap menjadi URL base64
					$encoded_url = "http://localhost/undangan-nikah/home/openInvitation?to=" . base64_encode($_POST['nama_lengkap']);

					// Updating Data
					$form_data = array(
						'nama_lengkap' => $_POST['nama_lengkap'],
						'url' => $encoded_url
					);
					$this->Model_invitation->update($id, $form_data);

					$data['success'] = 'invitation telah berhasil diupdate';
				}
				$data['encoded_url'] = isset($encoded_url) ? $encoded_url : '';

				$data['invitation'] = $this->Model_invitation->getData($id);

				$this->load->view('admin/view_header', $header);
				$this->load->view('admin/view_invitation_edit', $data);
				$this->load->view('admin/view_footer');

			} else {
				$data['invitation'] = $this->Model_invitation->getData($id);

				$this->load->view('admin/view_header', $header);
				$this->load->view('admin/view_invitation_edit', $data);
				$this->load->view('admin/view_footer');
			}

		} else {
			redirect(base_url() . 'admin');
		}
	}

	public function delete($id)
	{
		$tot = $this->Model_invitation->invitation_check($id);
		if (!$tot) {
			redirect(base_url() . 'admin/invitation');
			exit;
		}

		$this->Model_invitation->delete($id);

		redirect(base_url() . 'admin/invitation');
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('security');
		$this->load->model('m_user', 'user');
		$this->load->model('m_calon', 'calon');
	}

	public function index()
	{
		
	}

	public function detail($id)
	{
		$res = $this->user->getById($id);

		echo json_encode($res);
	}

	public function create($id)
	{
		$obj = $this->user->created($id);
		$rel = md5('relawan');

		if($obj == 'kosong') {
			// $res = array('response' => 'sukses');
			$this->session->set_flashdata('sukses', 'Berhasil menyimpan data');
			header('Location: '.base_url().'relawan/'.$rel.'_'.$id);
		} else if($obj == 'exist'){
			$this->session->set_flashdata('error', 'Gagal menyimpan data');
			header('Location: '.base_url().'relawan/'.$rel.'_'.$id);
			// $res = array('response' => 'fail');
		}
	}

	public function update($id)
	{
		$obj 	= $this->user->update();
		$rel = md5('relawan');

		if($obj) {
			// $res = array('response' => 'sukses');
			$this->session->set_flashdata('update', 'Berhasil update data');
			header('Location: '.base_url().'relawan/'.$rel.'_'.$id);
		} else {
			$this->session->set_flashdata('error', 'Gagal menyimpan data');
			header('Location: '.base_url().'relawan/'.$rel.'_'.$id);
			// $res = array('response' => 'fail');
		}
	}

	public function delete($user)
	{
		$obj = $this->user->delete($user);

		if($obj) {
			$res = array('response' => 'sukses');
		} else {
			$res = array('response' => 'error');
		}

		echo json_encode($res);
	}

	//load page user voting
	public function voting($id)
	{
		$id_user = decrypt_url($id);

		$data['user']  = $this->user->getById($id_user);
		$data['csatu'] = $this->db->get_where('data_csatu', array('user_id' => $id_user))->result();
		$data['calon'] = $this->calon->getAll();
		$data['tps']   = 'hasil_tps';

		//creating record for 'calon' if empty
		$this->user->cekRecord($id_user);

		$this->load->view('user/voting', $data);
	}

	public function tambah($user)
	{
		//init
		$id    = decrypt_url($user);
		$calon = decrypt_url($_POST['calon']);

		//checking data
		$obj = $this->user->getVote($id, $calon);
		if(empty($obj)) {
			$ins = $this->user->tambah($id, $calon);
			if($ins) { $res = array('response' => 'sukses'); } else { $res = array('response' => 'error'); }
		} else {
			$ins = $this->user->updateVote($id, $calon);
			if($ins) { $res = array('response' => 'sukses'); } else { $res = array('response' => 'error'); }
		}

		echo json_encode($res);
	}

	public function kurang($user)
	{
		$id = decrypt_url($user);
		$calon = decrypt_url($_POST['calon']);

		//checking data
		$obj = $this->user->getVote($id, $calon);
		if(empty($obj)) {
			// $ins = $this->user->tambah($id, $calon);
			if($ins) { $res = array('response' => 'sukses'); } else { $res = array('response' => 'error'); }
		} else {
			$ins = $this->user->kurang($id, $calon);
			if($ins) { $res = array('response' => 'sukses'); } else { $res = array('response' => 'error'); }
		}

		echo json_encode($res);
	}

	public function dataAkhir($user)
	{
		$id_user = decrypt_url($user);
		$data    = array(
			'suara_sah'			=> $this->input->post('sah'),
			'suara_tidak_sah'	=> $this->input->post('rusak'),
			'suara_golput'		=> $this->input->post('kosong'),
			'keterangan_tps'	=> $this->input->post('keterangan'),
		);

		$calon   = $this->calon->getAll();
		foreach ($calon as $key => $value) {
			$dt = array(
				'suara' => $this->input->post($value->id_calon),
			);
			$this->db->where(array('user_id' => $id_user, 'calon_id' => $value->id_calon));
			$this->db->update('data_csatu', $dt);
		}

		$this->db->where('id_user', $id_user);
		$upd = $this->db->update('user', $data);

		if ($upd) {
			$this->session->set_flashdata('sukses', 'simpan akhir sukses');
			header('Location: '.base_url().'voting/user-is_'.$user);
		} else {
			$this->session->set_flashdata('error', 'simpan akhir error');
			header('Location: '.base_url().'voting/user-is_'.$user);
		}
	}

	public function validateUser($user)
	{
		$obj = $this->user->validateUsers($user);
		if (count($obj) > 0) {
			$res = array('response' => 'exist');
		} else {
			$res = array('response' => 'kosong');
		}

		echo json_encode($res);
	}



}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calon extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_calon');
	}

	public function index()
	{
		
	}

	public function detail($calon)
	{
		$res = $this->m_calon->getById($calon);
		echo json_encode($res);
	}

	public function create($id)
	{
		$obj 	= $this->m_calon->created($id);
		$paslon = md5('paslon');

		if($obj) {
			// $res = array('response' => 'sukses');
			$this->session->set_flashdata('sukses', 'Berhasil menyimpan data');
			header('Location: '.base_url().'paslon/'.$paslon.'_'.$id);
		} else {
			$this->session->set_flashdata('error', 'Gagal menyimpan data');
			header('Location: '.base_url().'paslon/'.$paslon.'_'.$id);
			// $res = array('response' => 'fail');
		}

		// echo json_encode($res);
	}

	public function update($id)
	{
		$obj 	= $this->m_calon->update();
		$paslon = md5('paslon');

		if($obj) {
			// $res = array('response' => 'sukses');
			$this->session->set_flashdata('update', 'Berhasil menyimpan data');
			header('Location: '.base_url().'paslon/'.$paslon.'_'.$id);
		} else {
			$this->session->set_flashdata('error', 'Gagal menyimpan data');
			header('Location: '.base_url().'paslon/'.$paslon.'_'.$id);
			// $res = array('response' => 'fail');
		}
	}

	public function delete($calon)
	{
		$obj = $this->m_calon->delete($calon);

		if($obj) {
			$res = array('response' => 'sukses');
		} else {
			$res = array('response' => 'error');
		}

		echo json_encode($res);
	}

}

/* End of file Calon.php */
/* Location: ./application/controllers/Calon.php */
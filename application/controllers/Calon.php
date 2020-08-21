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

	public function create()
	{
		$obj = $this->m_calon->created();

		if($obj) {
			$res = array('response' => 'sukses');
		} else {
			$res = array('response' => 'fail');
		}

		echo json_encode($res);
	}

}

/* End of file Calon.php */
/* Location: ./application/controllers/Calon.php */
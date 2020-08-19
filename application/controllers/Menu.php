<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$data['header'] = 'Dashboard';

		$this->load->view('header', $data);
		$this->load->view('dashboard/admin', $data);
		$this->load->view('footer');
	}

	public function home($id)
	{
		$data['header'] = 'Dashboard';

		$this->load->view('header', $data);
		$this->load->view('dashboard/admin', $data);
		$this->load->view('footer');
	}

	public function calon($id)
	{
		$data['header'] = 'Pasangan Calon';

		$this->load->view('header', $data);
		$this->load->view('calon/view', $data);
		$this->load->view('footer');
	}

	public function user($id)
	{
		$data['header'] = 'Relawan';

		$this->load->view('header', $data);
		$this->load->view('user/view', $data);
		$this->load->view('footer');
	}

	public function tps($id)
	{
		$data['header'] = 'Laporan TPS';

		$this->load->view('header', $data);
		$this->load->view('laporan/lap_tps_view', $data);
		$this->load->view('footer');
	}

	public function laporan($id)
	{
		$data['header'] = 'Laporan Real';

		$this->load->view('header', $data);
		$this->load->view('laporan/lap_real_view', $data);
		$this->load->view('footer');
	}

	public function profile($id)
	{
		# code...
	}

	public function notfound()
	{
		$this->load->view('404');
	}



}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
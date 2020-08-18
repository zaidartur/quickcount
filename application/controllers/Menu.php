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
		$this->load->view('header');
		$this->load->view('dashboard/admin');
		$this->load->view('footer');
	}

	public function dashboard($id)
	{
		$this->load->view('header');
		$this->load->view('dashboard/admin');
		$this->load->view('footer');
	}

	public function calon($id)
	{
		# code...
	}

	public function user($id)
	{
		# code...
	}

	public function tps($id)
	{
		# code...
	}

	public function laporan($id)
	{
		# code...
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
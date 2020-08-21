<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('security');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('signin_admin');
	}

	public function user()
	{
		$this->load->view('signin_user');
	}

	public function login_admin()
	{
		$home = md5('home');
		$data = array(
			'username_admin'	=> $this->input->post('username'),
			'password'	=> $this->input->post('password'),
		);
		$res  = $this->db->get_where('admin', $data)->row();
		$id   = $res->id_admin;

		if(!empty($res)) {
			header('Location: '.base_url().'dashboard/'.$home.'_'.encrypt_url($id));
		} else {
			$this->session->set_flashdata('error', 'Login incorrect');
			header('Location: '.base_url());
		}
	}

	public function login_user()
	{
		# code...
	}
}

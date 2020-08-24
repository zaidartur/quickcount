<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->helper('security');
	}

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
			'password'			=> $this->input->post('password'),
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
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		);
		$res  = $this->db->get_where('user', $data)->row();
		$id   = $res->id_user;

		if(!empty($res)) {
			header('Location: '.base_url().'voting/user-is_'.encrypt_url($id));
		} else {
			$this->session->set_flashdata('error', 'Login incorrect');
			header('Location: '.base_url().'user-login');
		}
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	private $_admin  =  'admin';

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('security');
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
		//decrypt
		$admin_id 	= decrypt_url($id);

		$data['header'] = 'Dashboard';
		$data['admin']  = $this->db->get_where($this->_admin, array('id_admin' => $admin_id))->row();

		$this->load->view('header', $data);
		$this->load->view('dashboard/admin', $data);
		$this->load->view('footer');
	}

	public function calon($id)
	{
		//decrypt
		$admin_id 	= decrypt_url($id);

		$data['admin']  = $this->db->get_where($this->_admin, array('id_admin' => $admin_id))->row();
		$data['header'] = 'Pasangan Calon';

		$this->load->view('header', $data);
		$this->load->view('calon/view', $data);
		$this->load->view('footer');
	}

	public function user($id)
	{
		//decrypt
		$admin_id 	= decrypt_url($id);

		$data['admin']  = $this->db->get_where($this->_admin, array('id_admin' => $admin_id))->row();
		$data['header'] = 'Relawan';

		$this->load->view('header', $data);
		$this->load->view('user/view', $data);
		$this->load->view('footer');
	}

	public function tps($id)
	{
		//decrypt
		$admin_id 	= decrypt_url($id);

		$data['admin']  = $this->db->get_where($this->_admin, array('id_admin' => $admin_id))->row();
		$data['header'] = 'Laporan TPS';

		$this->load->view('header', $data);
		$this->load->view('laporan/lap_tps_view', $data);
		$this->load->view('footer');
	}

	public function laporan($id)
	{
		//decrypt
		$admin_id 	= decrypt_url($id);

		$data['admin']  = $this->db->get_where($this->_admin, array('id_admin' => $admin_id))->row();
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
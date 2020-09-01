<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	private $_admin  =  'admin';
	private $_calon  =  'calon';
	private $_live	 =  'live_voting';

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('security');
		$this->load->model('m_calon', 'calon');
		$this->load->model('m_user', 'user');
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
		$data['voting'] = $this->calon->voting();

		$this->load->view('header', $data);
		$this->load->view('dashboard/admin', $data);
		$this->load->view('footer');
	}

	public function calon($id)
	{
		//decrypt
		$admin_id 	= decrypt_url($id);

		$data['header'] = 'Pasangan Calon';
		$data['admin']  = $this->db->get_where($this->_admin, array('id_admin' => $admin_id))->row();
		$data['calon']  = $this->calon->getAll();

		$this->load->view('header', $data);
		$this->load->view('calon/view', $data);
		$this->load->view('footer');
	}

	public function user($id)
	{
		//decrypt
		$admin_id 	= decrypt_url($id);

		$data['header'] = 'Relawan';
		$data['admin']  = $this->db->get_where($this->_admin, array('id_admin' => $admin_id))->row();
		$data['user']	= $this->user->getAll();

		$this->load->view('header', $data);
		$this->load->view('user/view', $data);
		$this->load->view('footer');
	}

	public function tps($id)
	{
		//decrypt
		$admin_id 	= decrypt_url($id);

		$data['header'] = 'Laporan TPS';
		$data['admin']  = $this->db->get_where($this->_admin, array('id_admin' => $admin_id))->row();
		$data['tps']	= $this->user->getOrderAll();

		$this->load->view('header', $data);
		$this->load->view('laporan/lap_tps_view', $data);
		$this->load->view('footer');
	}

	public function laporan($id)
	{
		//decrypt
		$admin_id 	= decrypt_url($id);

		$data['header'] = 'Laporan Real';
		$data['admin']  = $this->db->get_where($this->_admin, array('id_admin' => $admin_id))->row();
		$data['tps']	= $this->user->getAll();
		$data['data_akhir'] = $this->user->isDataReal();

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

	public function grafik()
	{
		$data = $this->calon->voting();

		foreach ($data as $key => $value) {
			$res[$key] = array(
				'color'		=> $value->color_badge,
				'nomor'		=> $value->no_urut_calon,
				'nama'		=> $value->nama_calon,
				'voting'	=> $value->vote,
			);
		}

		echo json_encode($res);
	}



}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
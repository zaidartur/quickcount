<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	private $_user  = 'user';
	private $_tps   = 'hasil_tps';
	private $_calon = 'calon';
	private $_live  = 'live_voting';
	private $_csatu = 'data_csatu';

	//datatable
	var $column_order   = array(null, 'nama_user', 'alamat_user', 'email_user', 'username', 'password', 'no_tps', 'alamat_tps', 'dpt_tps');
	var $column_search  = array('nama_user', 'alamat_user', 'username', 'no_tps', 'alamat_tps', 'dpt_tps');
	var $order 			= array('nama_user' => 'asc');


	public function getAll()
	{
		return $this->db->get($this->_user)->result();
	}

	public function getOrderAll()
	{
		$this->db->order_by('no_tps', 'asc');
		return $this->db->get($this->_user)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_user, array('id_user' => $id))->row();
	}

	public function created($id)
	{
		//init
		$id_user  = uniqid();
		$id_admin = decrypt_url($id);

		//cek username
		$usr  = $this->db->get_where($this->_user, array('username' => $this->input->post('user')))->result();
		if (count($usr) > 0) {
			$res = 'exist';
		} else {
			$data = array(
				'id_user'			=> $id_user,
				'nama_user'			=> $this->input->post('nama'),
				'alamat_user'		=> $this->input->post('alamat'),
				'email_user'		=> $this->input->post('email'),
				'username'			=> $this->input->post('user'),
				'password'			=> $this->input->post('pass'),
				'no_tps'			=> $this->input->post('tps'),
				'alamat_tps'		=> $this->input->post('alamat_tps'),
				'dpt_tps'			=> $this->input->post('dpt'),
				'user_who_create'	=> $id_admin,
				'user_datetime'		=> date('Y-m-d H:i:s'),
			);
			
			$this->db->insert($this->_user, $data);
			$res = 'kosong';
		}

		return $res;
	}

	public function update()
	{
		$id_user = $this->input->post('user-id');
		$data = array(
			'nama_user'			=> $this->input->post('nama2'),
			'alamat_user'		=> $this->input->post('alamat2'),
			'email_user'		=> $this->input->post('email2'),
			'no_tps'			=> $this->input->post('tps2'),
			'alamat_tps'		=> $this->input->post('alamat_tps2'),
			'dpt_tps'			=> $this->input->post('dpt2'),
		);

		$this->db->where('id_user', $id_user);
		return $this->db->update($this->_user, $data);
	}

	public function delete($user)
	{
		//re-sum data total vote [start]
		$tps  = $this->db->get_where($this->_tps, array('user_id' => $user))->result();	

		foreach ($tps as $key => $value) {
			$live  = $this->db->get_where($this->_live, array('calon_id' => $value->calon_id))->row();		
			$hasil = intval($live->vote) - intval($value->jumlah_suara);
			$data  = array('vote' => $hasil);

			$this->db->where('calon_id', $value->calon_id);
			$this->db->update($this->_live, $data);
		}
		//re-sum data total vote [end]

		$this->db->where('user_id', $user);
		$this->db->delete($this->_tps);

		$this->db->where('id_user', $user);
		return $this->db->delete($this->_user);		
	}

	public function _uploadGambar($file, $path, $name)
	{
		// $fileName 	 = $_FILES[$file]['name'];
		$tmpFileName = $_FILES[$file]['tmp_name'];
		$fileName 	 = $name;

		$config['upload_path']          = $path;
    	$config['allowed_types']        = 'jpeg|jpg|png';
	    $config['overwrite']			= true;
	    $config['max_size']             = 1024; // 1MB
	    $config['file_name']			= $fileName;
	    $this->load->library('upload', $config);


	    if(file_exists($path.$fileName)) {
    		unlink($path.$fileName);
    		$this->upload->do_upload($file);
    		return $this->upload->data('file_name');
		} else {
			$this->upload->do_upload($file);
			return $this->upload->data('file_name');
		}
	}

	public function getVote($user, $calon)
	{
		return $this->db->get_where($this->_tps, array('user_id' => $user, 'calon_id' => $calon))->row();
	}

	public function tambah($user, $calon)
	{
		//init
		$id   = uniqid();
		$live = $this->db->get_where($this->_live, array('calon_id' => $calon))->row();
		$vote = intval($live->vote) + 1;

		$data = array(
			'id'			 => $id,
			'user_id'		 => $user,
			'calon_id'		 => $calon,
			'jumlah_suara'   => intval('1'),
		);
		$data2 = array('vote' => $vote);

		//for live-chart
		$this->db->where('calon_id', $calon);
		$this->db->update($this->_live, $data2);

		return $this->db->insert($this->_tps, $data);
	}

	public function updateVote($user, $calon)
	{
		$obj   = $this->getVote($user, $calon);
		$suara = intval($obj->jumlah_suara) + 1;
		$live = $this->db->get_where($this->_live, array('calon_id' => $calon))->row();
		$vote = intval($live->vote) + 1;

		$data  = array('jumlah_suara' => $suara);
		$data2 = array('vote' => $vote);

		//for live-chart
		$this->db->where('calon_id', $calon);
		$this->db->update($this->_live, $data2);

		$this->db->where(array('user_id' => $user, 'calon_id' => $calon));
		return $this->db->update($this->_tps, $data);
	}

	public function kurang($user, $calon)
	{
		$obj   = $this->getVote($user, $calon);
		$suara = intval($obj->jumlah_suara) - 1;
		$live = $this->db->get_where($this->_live, array('calon_id' => $calon))->row();
		$vote = intval($live->vote) - 1;

		$data  = array('jumlah_suara' => $suara);
		$data2 = array('vote' => $vote);

		//for live-chart
		$this->db->where('calon_id', $calon);
		$this->db->update($this->_live, $data2);

		$this->db->where(array('user_id' => $user, 'calon_id' => $calon));
		return $this->db->update($this->_tps, $data);
	}

	public function cekRecord($user)
	{
		$calon  = $this->db->get($this->_calon)->result();
		$tps 	= $this->db->get_where($this->_tps, array('user_id' => $user))->result();
		$csatu 	= $this->db->get_where($this->_csatu, array('user_id' => $user))->result();
		
		//check every record in 'hasil_tps' while signin
		foreach ($calon as $a => $b) {
			$check  = $this->db->get_where($this->_tps, array('user_id' => $user, 'calon_id' => $b->id_calon))->row();
			if (empty($check)) {
				$id    = uniqid();
				$obj   = array(
					'id'			=> $id,
					'user_id'		=> $user,
					'calon_id'		=> $b->id_calon,
					'jumlah_suara'	=> 0,
				);
				$this->db->insert($this->_tps, $obj);
			}

			$check2 = $this->db->get_where($this->_csatu, array('user_id' => $user, 'calon_id' => $b->id_calon))->row();
			if (empty($check2)) {
				$id2    = uniqid();
				$obj2   = array(
					'data_id'		=> $id2,
					'user_id'		=> $user,
					'calon_id'		=> $b->id_calon,
					'suara'			=> 0,
				);
				$this->db->insert($this->_csatu, $obj2);
			}
		}
	}

	public function isDataReal()
	{
		$data = array(
			'suara_sah !='			=> null,
			'suara_tidak_sah !='	=> null,
			'suara_golput !='		=> null,
		);
		$this->db->where($data);
		$this->db->order_by('no_tps', 'asc');
		return $this->db->get($this->_user)->result();
	}

	public function validateUsers($user)
	{
		return $this->db->get_where($this->_user, array('username' => $user))->result();
	}

	private function get_query()
	{
		$this->db->from($this->_user);

		$i = 0;

		foreach ($this->column_search as $item) {
			if ($_POST['search']['value']) {
				if ($i === 0) {
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($this->column_search) - 1 == $i) 
					$this->db->group_end();
			} 

			$i++;
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->get_query();
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->get_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->_user);
		return $this->db->count_all_results();
	}
	

}

/* End of file M_User.php */
/* Location: ./application/models/M_User.php */

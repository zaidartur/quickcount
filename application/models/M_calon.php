<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_calon extends CI_Model {

	private $_calon = 'calon';
	private $_live  = 'live_voting';

	public function getAll()
	{
		$this->db->order_by('no_urut_calon', 'asc');
		return $this->db->get($this->_calon)->result();
	}

	public function getById($calon)
	{
		$this->db->where('id_calon', $calon);
		return $this->db->get($this->_calon)->row();
	}

	public function voting()
	{
		$this->db->join($this->_calon.' b', 'a.calon_id = b.id_calon', 'left');
		$this->db->order_by('b.no_urut_calon', 'asc');
		return $this->db->get($this->_live.' a')->result();
	}

	public function created($id)
	{
		//init
		$file     = 'gambar';
		$path     = './assets/images/calon/';
		$id_calon = uniqid();
		$id_live  = uniqid();
		$id_admin = decrypt_url($id);

		if($_FILES[$file]['name'] == '') {
			$foto   = 'noimage.png';
		} else {
			$foto   = $this->_uploadGambar($file, $path, $id_calon);
		}

		$data = array(
			'id_calon'			=> $id_calon,
			'nama_calon'		=> $this->input->post('nama'),
			'alamat_calon'		=> $this->input->post('alamat'),
			'email_calon'		=> $this->input->post('email'),
			'image_calon'		=> $foto,
			'no_urut_calon'		=> $this->input->post('no_urut'),
			'calon_datetime'	=> date('Y-m-d H:i:s'),
			'calon_who_create'	=> $id_admin,
			'color_badge'		=> $this->input->post('clr'),
		);

		$data2 = array(
				'id_live'		=> $id_live,
				'calon_id'		=> $id_calon,
				'vote'			=> 0,
		);

		$insert = $this->db->insert($this->_calon, $data);
		$this->db->insert($this->_live, $data2);

		return $insert;
	}

	public function update()
	{
		$calon_id = $this->input->post('calon-id');		
		$file 	  = 'gambar';
		$path     = './assets/images/calon/';

		if($_FILES[$file]['name'] == '') {
			$foto   = $this->input->post('old_gambar');
		} else {
			$foto   = $this->_uploadGambar($file, $path, $calon_id);
		}

		$data = array(
			'nama_calon'		=> $this->input->post('nama2'),
			'alamat_calon'		=> $this->input->post('alamat2'),
			'email_calon'		=> $this->input->post('email2'),
			'image_calon'		=> $foto,
			'no_urut_calon'		=> $this->input->post('no_urut2'),
			'color_badge'		=> $this->input->post('clr2'),	
		);

		$this->db->where('id_calon', $calon_id);
		return $this->db->update($this->_calon, $data);
	}

	public function delete($calon)
	{
		$this->db->where('calon_id', $calon);
		$this->db->delete($this->_live);

		$this->db->where('id_calon', $calon);
		return $this->db->delete($this->_calon);
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

}

/* End of file M_Calon.php */
/* Location: ./application/models/M_Calon.php */

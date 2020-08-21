<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Calon extends CI_Model {

	private $_calon = 'calon';
	private $_live  = 'live_voting';

	public function created()
	{
		//init
		$file     = 'gambar';
		$path     = './assets/images/calon/';
		$id_calon = uniqid();
		$id_live  = uniqid();

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
			'no_urut_calon'		=> $this->input->post('urut'),
			'calon_datetime'	=> date('Y-m-d H:i:s'),
			'calon_who_create'	=> $this->input->post('admin'),
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
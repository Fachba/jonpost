<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_saran extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function tampilsaran()
	{
		$query=$this->db->query("SELECT * FROM `saran`");
		return $query;
	}

	public function tampilsaranstatus($baca)
	{
		$query=$this->db->query("SELECT * FROM `saran` WHERE baca=".$baca."");
		return $query;
	}

	public function saran()
	{
		$data = array(
		'nama_saran'	=> $this->input->post('nama_saran'),
		'saran'			=> $this->input->post('saran'),
		'baca'			=> 0,
		'tanggapan'		=> " "
		);

		$this->db->insert('saran', $data);
	}

	public function editstatus($no,$status)
	{
		$data = array(
		'baca'=>$status
		);

		$this->db->where('no', $no);
		$this->db->update('saran', $data);
	}

	public function hapus($id)
	{
		$this->db->where('no', $id);
		$this->db->delete('saran');
	}

}

/* End of file user.php */
/* Location: ./application/models/user.php */
 ?>
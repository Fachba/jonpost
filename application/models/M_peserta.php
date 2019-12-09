<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_peserta extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		//date_default_timezone_set("Asia/Jakarta");
	}

	public function caripeserta($idm,$idp)
	{
		$query=$this->db->query("SELECT * FROM `acara` JOIN acara_member USING(ida) JOIN peserta USING(idp) WHERE acara.idm=".$idm." AND idp=".$idp." ");
		return $query;
	}

	public function cekidp($idp)
	{
		$query=$this->db->query("SELECT * FROM `acara` JOIN acara_member USING(ida) JOIN peserta USING(idp) WHERE idp=".$idp."");
		return $query;
	}

	public function pesertaacara($ida)
	{
		$query=$this->db->query("SELECT * FROM `acara` JOIN acara_member USING(ida) JOIN peserta USING(idp) WHERE ida=".$ida."");
		return $query;
	}

	public function semuapeserta()
	{
		$query=$this->db->query("SELECT * FROM acara_member JOIN acara USING(ida) JOIN peserta USING(idp) ");
		return $query;
	}

	public function pesertamember($idm)
	{
		$query=$this->db->query("SELECT * FROM acara_member RIGHT JOIN acara USING(ida) JOIN peserta USING(idp) WHERE acara.idm=".$idm."");
		return $query;
	}

	public function pesertahadir($idm,$hadir)
	{
		$query=$this->db->query("SELECT * FROM `acara_member` JOIN acara USING(ida) JOIN peserta USING(idp) WHERE acara.idm=".$idm." AND hadir=".$hadir."");
		return $query;
	}

	public function pesertaacarahadir($id,$hadir)
	{
		$query=$this->db->query("SELECT * FROM `acara_member` JOIN acara USING(ida) JOIN peserta USING(idp) WHERE ida=".$id." AND hadir=".$hadir."");
		return $query;
	}

	public function pesertahtmlunas($id,$bill)
	{
		$query=$this->db->query("SELECT * FROM `acara` JOIN acara_member USING(ida) JOIN peserta USING(idp) WHERE acara.idm=".$id." AND peserta.bill=".$bill."");
		return $query;
	}

	public function pesertahtmacaralunas($id,$bill)
	{
		$query=$this->db->query("SELECT * FROM `acara` JOIN acara_member USING(ida) JOIN peserta USING(idp) WHERE ida=".$id." AND peserta.bill=".$bill."");
		return $query;
	}

	public function tambah($idp)
	{
		$data = array(
		'idp'				=> $idp,			
		'nama_peserta'		=> $this->input->post('nama'),
		'jk_peserta'		=> $this->input->post('jk'),
		'umur_peserta'		=> $this->input->post('umur'),
		'status_peserta'	=> $this->input->post('status'),
		'instansi_peserta'	=> $this->input->post('instansi'),
		'alamat_peserta'	=> $this->input->post('alamat'),
		'email_peserta'		=> $this->input->post('email'),
		'telp_peserta'		=> $this->input->post('telp')
		);

		$this->db->insert('peserta', $data);
	}

	public function tambahAcaraMember($ida,$idm,$idp)
	{
		$data = array(
		'ida'	=> $ida,
		'idm'	=> $idm,
		'idp'	=> $idp
		);

		$this->db->insert('acara_member', $data);
	}

	public function konfirmasi()
	{
		$idp=$this->input->post('idp');
		$data = array(
		'bill'			=> 1,
		'ket_peserta'	=> $this->input->post('message'),
		'nota'			=> $this->upload->data('file_name')
		);

		$this->db->where('idp', $idp);
		$this->db->update('peserta', $data);
	}

	public function verifikasi($idp,$bill)
	{
		$data = array(
		'bill'=>$bill
		);

		$this->db->where('idp', $idp);
		$this->db->update('peserta', $data);
	}

	public function pesertaid($id)
	{
		$this->db->where('idp', $id);
		return $this->db->get('peserta');
	}

	public function hadir($idp,$hadir)
	{
		$data = array(
		'hadir'=>$hadir
		);

		$this->db->where('idp', $idp);
		$this->db->update('peserta', $data);
	}

	public function hapus($idp)
	{
		$this->db->where('idp', $idp);
		$this->db->delete('peserta');
	}

}

/* End of file user.php */
/* Location: ./application/models/user.php */
 ?>
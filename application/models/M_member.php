<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_member extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function tampilmember()
	{
		$query=$this->db->query("SELECT idm,nama,jk,umur,status,email,aktif,username,password,count(ida) as acara,master FROM `member` left join acara using(idm) where master!=1 group by idm");
		return $query;
	}

	public function memberid($id)
	{
		$query=$this->db->query("SELECT * FROM `member` WHERE idm=".$id."");
		return $query;
	}

	public function tambah()
	{
		$data = array(
		'nama'		=> $this->input->post('nama'),
		'jk'		=> $this->input->post('jk'),
		'umur'		=> $this->input->post('umur'),
		'status'	=> $this->input->post('status'),
		'alamat'	=> $this->input->post('alamat'),
		'email'		=> $this->input->post('email'),
		'telp'		=> $this->input->post('telp'),
		'aktif'		=> 1,
		'username'	=> $this->input->post('username'),
		'password'	=> $this->input->post('password')
		);

		$this->db->insert('member', $data);
	}

	public function edit($id)
	{
		$data = array(
		'nama'		=> $this->input->post('nama'),
		'jk'		=> $this->input->post('jk'),
		'umur'		=> $this->input->post('umur'),
		'status'	=> $this->input->post('status'),
		'alamat'	=> $this->input->post('alamat'),
		'email'		=> $this->input->post('email'),
		'telp'		=> $this->input->post('telp'),
		'username'	=> $this->input->post('username'),
		'password'	=> $this->input->post('password')
		);

		$this->db->where('idm', $id);
		$this->db->update('member', $data);
	}

	public function aktif($idm,$status)
	{
		$data = array(
		'aktif'=>$status
		);

		$this->db->where('idm', $idm);
		$this->db->update('member', $data);
	}

	public function hapus($idm)
	{
		$this->db->where('idm', $idm);
		$this->db->delete('member');
	}

}

/* End of file user.php */
/* Location: ./application/models/user.php */
 ?>
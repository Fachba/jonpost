<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function login($username,$password)
	{
		$this->db->select('idm,nama,umur,jk,status,telp,alamat,username,password,email,master');
		$this->db->from('member');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$this->db->where('aktif',1);
		$query=$this->db->get();
		if($query->num_rows()==1)
		{
			return $query;
		}
		else
		{
			return false;
		}

	}

	public function regismember()
	{
		$data = array(
		'nama'		=> $this->input->post('nama'),
		'jk'		=> $this->input->post('jk'),
		'status'	=> $this->input->post('status'),
		'alamat'	=> $this->input->post('alamat'),
		'email'		=> $this->input->post('email'),
		'telp'		=> $this->input->post('telp'),
		'username'	=> $this->input->post('username'),
		'password'	=> $this->input->post('password')
		);

		$this->db->insert('member', $data);
	}

	public function editmember($id)
	{
		$data = array(
		'nama'		=> $this->input->post('nama'),
		'jk'		=> $this->input->post('jk'),
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

}

/* End of file user.php */
/* Location: ./application/models/user.php */
 ?>
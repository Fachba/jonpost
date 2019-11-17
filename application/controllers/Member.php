<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->helper('url','date','form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('M_member');

		$idm=$this->session->userdata('idm');
		if ($idm==null)
		{
			redirect('Login','refresh');
		}
	}

	public function index()
	{
		$master=$this->session->userdata('master');
		if ($master=1)
		{
			$data['member']=$this->M_member->tampilmember()->result();
        	$this->load->view('V_member.php', $data);
		}
		else
		{
			redirect('Posting/kosong','refresh');
		}
	}

	public function registrasi()
	{
		$this->M_member->tambah();
		$this->load->view('V_dashboard.php');	
	}

	public function edit()
	{
		$idm=$this->session->userdata('idm');
		$this->M_member->edit($idm);

		$cek=$this->M_member->memberid($idm)->row_array();
		$id = $cek['idm'];
		$nama = $cek['nama'];
		$umur = $cek['umur'];
		$jk = $cek['jk'];
		$status = $cek['status'];
		$telp = $cek['telp'];
		$alamat = $cek['alamat'];
		$email = $cek['email'];
		$master = $cek['master'];

		$this->session->set_userdata('idm',$id);
		$this->session->set_userdata('nama',$nama);
		$this->session->set_userdata('umur',$umur);
		$this->session->set_userdata('jk',$jk);
		$this->session->set_userdata('status',$status);
		$this->session->set_userdata('telp',$telp);
		$this->session->set_userdata('alamat',$alamat);
		$this->session->set_userdata('email',$email);
		$this->session->set_userdata('master',$master);

		redirect('Member/vedit','refresh');
	}

	public function vedit()
	{
		$idm=$this->session->userdata('idm');
		$data['ket']="edit";
		$data['member']=$this->M_member->memberid($idm)->row_array();
		$this->load->view('V_regis.php',$data);	
	}

	public function vdetail($idm)
	{
		$data['ket']="edit";
		$data['member']=$this->M_member->memberid($idm)->row_array();
		$this->load->view('V_regis.php',$data);	
	}

	public function editaktif($idm,$status)
	{
		$this->M_member->aktif($idm,$status);
		redirect('Member','refresh');
	}

	public function hapus($value)
    {
        $this->M_member->hapus($value);        
        redirect('Member/index','refresh');     
    }
}

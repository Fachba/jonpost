<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->helper('url','date','form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('M_login');
		$this->load->model('M_member');
	}

	public function index()
	{
		$this->load->view('V_login');
	}

	public function vregis()
	{	
		$data['ket']="tambah";
		$this->load->view('V_regis',$data);
	}

	public function registrasi()
	{
		$this->M_member->tambah();
		redirect('Login/cekLogin','refresh');	
	}

	public function cekLogin()
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','username','trim|required');
		$this->form_validation->set_rules('password','password','trim|required|callback_cekDb');
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view('V_login');
		} else 
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->session->set_userdata('username',$username);
			$this->session->set_userdata('password',$password);

			$cek=$this->M_login->login($username,$password)->row_array();
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

			redirect('Dashboard','refresh');
		}
	}

	public function cekDb($password)
	{
		$this->load->model('M_login');
		$username = $this->input->post('username');
		$result = $this->M_login->login($username,$password);
		if($result)
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('cekDb',"Login Gagal Username dan Password tidak valid");
			return false;
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('Login','refresh');
	}
}

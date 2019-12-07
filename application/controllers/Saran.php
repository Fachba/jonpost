<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Saran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date','url','form');
		$this->load->library('form_validation');
		$this->load->model('M_saran');

		$idm=$this->session->userdata('idm');
		$master=$this->session->userdata('master');
		if ($idm==null&&$master!=1)
		{
			redirect('Login','refresh');
		}
	}

	public function index()
	{
		$idm=$this->session->userdata('idm');
		$master=$this->session->userdata('master');
		if ($idm==null&&$master!=1)
		{
			redirect('Login','refresh');
		}
		else
		{
			$data['saran']=$this->M_saran->tampilsaran()->result();
        	$this->load->view('V_saran.php',$data);	
		}
	}

	public function cari()
	{
		$opsi=$this->input->post('option');
		//$idm=$this->session->userdata('idm');
		$data['nonmas']=0;
		if($opsi==10)
		{
			redirect('Saran','refresh');
		}
		else if($opsi!=10)
		{
			$data['saran']=$this->M_saran->tampilsaranstatus($opsi)->result();
			$this->load->view('V_saran.php',$data);
		}
	}

	public function vsaran()
	{
		$data['judul']="Saran";
		$this->load->view('posting/V_saran.php',$data);
	}

	public function saran()
	{
		$this->M_saran->saran();
		redirect('Posting/vsaran','refresh');
	}

	public function baca($no,$baca)
	{
		$this->M_saran->editstatus($no,$baca);
		redirect('Saran','refresh');
	}

	public function hapus($no)
	{
		$this->M_saran->hapus($no);
		redirect('Saran','refresh');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */ 
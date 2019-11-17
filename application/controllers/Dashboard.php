<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date','url','form');
		$this->load->library('form_validation');
		$this->load->model('M_acara');
		$idm=$this->session->userdata('idm');
		if ($idm==null)
		{
			redirect('Login','refresh');
		}
	}

	public function index()
	{
		$idm=$this->session->userdata('idm');
		$data['acara']=$this->M_acara->totalacara($idm)->row_array();
		$data['peserta']=$this->M_acara->totalpeserta($idm)->row_array();
		$data['htm']=$this->M_acara->totalhtm($idm)->row_array();
        $this->load->view('V_dashboard.php',$data);
	}

	public function Saran()
	{
		$data['saran']=$this->M_acara->tampilsaran()->result();
        $this->load->view('V_saran.php',$data);	
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */ 
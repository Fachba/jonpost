<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->helper('url','date','form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('M_peserta');

		$idm=$this->session->userdata('idm');
		if ($idm==null)
		{
			redirect('Login','refresh');
		}
	}

	public function index()
	{
		$idm=$this->session->userdata('idm');
		$data['nonmas']=0;
		$data['peserta']=$this->M_peserta->pesertamember($idm)->result();
		$this->load->view('V_peserta.php',$data);	
	}

	public function semua()
	{
		$master=$this->session->userdata('master');
		$data['nonmas']=1;
        if ($master=1)
        {
           $data['peserta']=$this->M_peserta->semuapeserta()->result();
			$this->load->view('V_peserta.php',$data);
        }
        else
        {
            redirect('Posting/kosong','refresh');
        }
	
	}

	public function cari()
	{
		$id=$this->input->post('id');
		$opsi=$this->input->post('option');
		$idm=$this->session->userdata('idm');
		$data['nonmas']=0;
		if ($id!=null)
		{
			$data['peserta']=$this->M_peserta->caripeserta($idm,$id)->result();
			$this->load->view('V_peserta.php',$data);
		}
		else if($opsi==0)
		{
			redirect('Peserta','refresh');
		}
		else if($opsi==1)
		{
			redirect('Peserta/pesertalunas/2','refresh');
		}
		else if($opsi==2)
		{
			redirect('Peserta/pesertalunas/1','refresh');
		}
		else if($opsi==3)
		{
			redirect('Peserta/pesertalunas/0','refresh');
		}
		else if($opsi==4)
		{
			redirect('Peserta/pesertahadir/1','refresh');
		}
		else if($opsi==5)
		{
			redirect('Peserta/pesertahadir/0','refresh');
		}
	}

	public function pesertahadir($hadir)
	{
		$idm=$this->session->userdata('idm');
		$data['nonmas']=0;
		$data['peserta']=$this->M_peserta->pesertahadir($idm,$hadir)->result();
		$this->load->view('V_peserta.php',$data);	
	}

	public function pesertalunas($bill)
	{
		$idm=$this->session->userdata('idm');
		$data['nonmas']=0;
		$data['peserta']=$this->M_peserta->pesertahtmlunas($idm,$bill)->result();
		$this->load->view('V_peserta.php',$data);	
	}

	public function pesertaacara($ida)
	{
		$idm=$this->session->userdata('idm');
		$data['nonmas']=0;
		$data['peserta']=$this->M_peserta->pesertaacara($ida)->result();
		$this->load->view('V_peserta.php',$data);	
	}

	public function pesertaacarahadir($ida,$hadir)
	{
		$idm=$this->session->userdata('idm');
		$data['nonmas']=0;
		$data['peserta']=$this->M_peserta->pesertaacarahadir($ida,$hadir)->result();
		$this->load->view('V_peserta.php',$data);	
	}

	public function pesertaacarahtm($ida,$htm)
	{
		$idm=$this->session->userdata('idm');
		$data['nonmas']=0;
		$data['peserta']=$this->M_peserta->pesertahtmacaralunas($ida,$htm)->result();
		$this->load->view('V_peserta.php',$data);	
	}

	public function detail($idp)
	{
		$data['ket']="detail";
		$idm=$this->session->userdata('idm');
		$data['peserta']=$this->M_peserta->cekidp($idp)->row_array();
		$this->load->view('V_peserta_detail.php',$data);	
	}

	public function editstatus($idp,$bill)
	{
		$this->M_peserta->verifikasi($idp,$bill);
		redirect('Peserta','refresh');
	}

	public function edithadir($idp,$hadir)
	{
		$this->M_peserta->hadir($idp,$hadir);
		redirect('Peserta','refresh');
	}

	public function hapus($value)
    {
        $res=$this->M_peserta->pesertaid($value)->result();
        if ($res)
        {
            $row = $res[0]; 
            $gambar=$row->nota;

            unlink("./assets/images/nota/".$gambar);
            $this->M_peserta->hapus($value);        
            redirect('Peserta/index','refresh');
        }        
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acara extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->helper('url','date','form');
		$this->load->library('form_validation');
		$this->load->library('session');
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
        $data['nonmas']=0;
        $data['acara']=$this->M_acara->tampilacarainfo($idm)->result();
        $this->load->view('V_acara.php', $data);
	}

    public function memberacara($idm)
    {
        $data['nonmas']=1;
        $data['acara']=$this->M_acara->tampilacarainfo($idm)->result();
        $this->load->view('V_acara.php', $data);
    }

    public function cari()
    {
        $idm=$this->session->userdata('idm');
        $opsi=$this->input->post('option');
        $data['nonmas']=0;
        if ($opsi==null)
        {
            redirect('Acara','refresh');
        }
        else
        {
            $data['acara']=$this->M_acara->tampilacarainfoaktif($idm,$opsi)->result();
            $this->load->view('V_acara.php', $data);
        }
    }

    public function semua()
    {
        $master=$this->session->userdata('master');
        if ($master=1)
        {
            $data['nonmas']=1;
            $data['acara']=$this->M_acara->tampilsemuaacarainfo()->result();
            $this->load->view('V_acara.php', $data);
        }
        else
        {
            redirect('Posting/kosong','refresh');
        }

        
    }

	public function editpost($ida,$status)
	{
		$this->M_acara->editstatus($ida,$status);
		redirect('Acara','refresh');
	}

	public function vtambah()
	{
		$data['ket']="tambah";
        $data['idm']=$this->session->userdata('idm');
        $this->load->view('V_acara_detail.php',$data);
	}

	public function vdetail($value)
    {
        $data['ket']="detail";
        $data['idm']=$this->session->userdata('idm');
        $idm=$this->session->userdata('idm');
        $data['acara']=$this->M_acara->acaraidmember($value,$idm)->row_array();

        $data['tpeserta']=$this->M_acara->totalpesertaacara($value)->row_array();
		$data['tpesertahadir']=$this->M_acara->totalpesertaacarahadir($value)->row_array();
		
		$data['thtm']=$this->M_acara->totalhtmacara($value)->row_array();
		$data['thtmlu']=$this->M_acara->totalhtmacaralunas($value)->row_array();
		$data['thtmve']=$this->M_acara->totalhtmacaraverifikasi($value)->row_array();
		$data['thtmbe']=$this->M_acara->totalhtmacarabelum($value)->row_array();

		if ($data['acara']==null)
		{
			redirect('Posting/kosong','refresh');
		}

        $this->load->view('V_acara_detail.php',$data);
    }

    public function vedit($value)
    {
        $data['ket']="edit";
        $data['idm']=$this->session->userdata('idm');
        $idm=$this->session->userdata('idm');
        $data['acara']=$this->M_acara->acaraidmember($value,$idm)->row_array();
        if ($data['acara']==null)
		{
			redirect('Posting/kosong','refresh');
		}
        $this->load->view('V_acara_detail.php',$data);
    }    

	public function tambah()
	{
		$config['upload_path']      = './assets/images/acara/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 1000000000;
        $config['max_width']        =10240;
        $config['max_height']       =7680;

        $this->load->library('upload',$config);
        if(! $this->upload->do_upload('image'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error',$error['error']);
            redirect('Acara/vtambah','refresh');
        }
        else
        {
            $image_data=$this->upload->data();

            $configer=array
            (
                'image_library'=>'gd2',
                'source_image'=>$image_data['full_path'],
                'maintain_ratio'=>TRUE,
                'width'=>1000,
                'height'=>1000,);

            $this->load->library('image_lib',$config);

            $this->image_lib->clear();
            $this->image_lib->initialize($configer);
            $this->image_lib->resize();
            
            $this->M_acara->tambah();

            redirect('Acara/index','refresh');
        }
	}

    public function edit($kode)
    {
        //$kode=$this->input->post('kode');

        $config['upload_path']      = './assets/images/acara/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 1000000000;
        $config['max_width']        =10240;
        $config['max_height']       =7680;

        $this->load->library('upload',$config);
        if ($this->upload->do_upload('image')==null)
        {
            $this->M_acara->edit_nf($kode);
            redirect('Acara/index','refresh');
        }
        else
        {
            if($this->upload->display_errors())
            {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error',$error['error']);
                redirect('Acara/vedit/'.$kode.'','refresh');
            }
            else
            {
                $idm=$this->session->userdata('idm');
                $res=$this->M_acara->acaraidmember($kode,$idm)->result();
                if ($res)
                {
                    $row = $res[0]; 
                    $gambar=$row->gambar;
                    unlink("./assets/images/acara/".$gambar);
                }

                $image_data=$this->upload->data();

                $configer=array
                (
                    'image_library'=>'gd2',
                    'source_image'=>$image_data['full_path'],
                    'maintain_ratio'=>TRUE,
                    'width'=>1000,
                    'height'=>1000,);

                $this->load->library('image_lib',$config);

                $this->image_lib->clear();
                $this->image_lib->initialize($configer);
                $this->image_lib->resize();
                
                $this->M_acara->edit($kode);
                redirect('Acara/index','refresh');
            }
        }
    }

    public function hapus($value)
    {
        $idm=$this->session->userdata('idm');        
        $res=$this->M_acara->acaraidmember($value,$idm)->result();
        if ($res)
        {
            $row = $res[0]; 
            $gambar=$row->gambar;

            unlink("./assets/images/acara/".$gambar);
            $this->M_acara->hapus($value,$idm);        
            redirect('Acara/index','refresh');
        }
    }
}

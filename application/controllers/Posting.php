<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date','url','form');
		$this->load->library('form_validation');
		$this->load->model('M_acara');
		$this->load->model('M_peserta');
		$this->load->library('pagination');
		// $idm=$this->session->userdata('idm');
		// if ($idm==null)
		// {
		// 	redirect('Login','refresh');
		// }
	}

	public function kosong()
	{
		$this->load->view('V_kosong.php');
	}

	public function index()
	{
		// konfigurasi class pagination
        $config['base_url']=base_url()."index.php/Posting/index";
            $config['total_rows']= $this->db->query("SELECT * FROM acara WHERE post=1;")->num_rows();
            $config['per_page']=6;
        $config['num_links'] = 2;
            $config['uri_segment']=3;
           
        //Tambahan untuk styling
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
 
        $config['first_link']='< Pertama ';
        $config['last_link']='Terakhir > ';
        $config['next_link']='>> ';
        $config['prev_link']='<< ';
        $this->pagination->initialize($config);

        // konfigurasi model dan view untuk menampilkan data
        $data['post']=$this->M_acara->getAll($config);
        $data['judul']="Posting";
        $this->load->view('posting/V_posting.php',$data);
	}

	public function detail($value)
	{
		$data['ida']=$value;
		$data['judul']="Detail Posting";
		$data['posting']=$this->M_acara->tampilacaradetail($value)->row_array();
		if ($data['posting']==null)
		{
			redirect('Posting/kosong','refresh');
		}
		$this->load->view('posting/V_posting_detail.php',$data);
	}

	public function vsaran()
	{
		$data['judul']="Saran";
		$this->load->view('posting/V_saran.php',$data);
	}

	public function saran()
	{
		$this->M_acara->saran();
		redirect('Posting/vsaran','refresh');
	}

	public function daftar($ida)
	{	
		$idm=$this->session->userdata('idm');
		if ($idm==null)
		{
			$idm=0;
		}
		$kode=rand(100,1000);
		$idp= $ida.$idm.$kode;

		$idps=$this->M_peserta->cekidp($idp)->result();
		while($idps!=null)
		{
			$kode=rand(1000,10000);
			$idp= $ida.$idm.$kode;
			$idps=$this->M_peserta->cekidp($idp)->result();
		}

		$this->M_peserta->tambah($idp);
		$this->M_peserta->tambahAcaraMember($ida,$idm,$idp);
		$cek=$this->M_acara->acaraid($ida)->row_array();
		$htm = $cek['htm'];
		if ($htm<1)
		{
			$this->M_peserta->verifikasi($idp,2);
		}
		redirect('Posting/vkonfirmasi/'.$idp.'','refresh');
	}

	public function vkonfirmasi($idp)
	{	
		$data['judul']="Konfirmasi";
		$data['input']=0;
		if ($idp==1)
		{
			$data['input']=1;
			$idp=$this->input->post('cari');
			if ($idp==null)
			{
				$idp=0;
			}
		}
		elseif ($idp==2)
		{
			$data['input']=2;
		}

		$data['idp']=$idp;
		$data['peserta']=$this->M_peserta->cekidp($idp)->row_array();
		$this->load->view('posting/V_posting_konfirmasi',$data);
	}

	public function konfirmasi()
	{
		$config['upload_path']      = './assets/images/nota/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 1000000000;
        $config['max_width']        =10240;
        $config['max_height']       =7680;

        $this->load->library('upload',$config);
        if(! $this->upload->do_upload('image'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error',$error['error']);
            redirect('Posting/vkonfirmasi/0','refresh');
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
            
           	$this->M_peserta->konfirmasi();
			redirect('Posting/vkonfirmasi/2','refresh');
        }
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */ 
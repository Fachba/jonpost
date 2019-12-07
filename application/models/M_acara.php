<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_acara extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function getAll($config){  
        $this->db->select('*');
	 	$this->db->where('post', 1);
        $hasilquery=$this->db->get('acara', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0)
         {
            foreach ($hasilquery->result() as $value)
            {
                $data[]=$value;
            }
            return $data;
        }      
    }

    public function tampilsemuaacara()
	{
		$query=$this->db->query("SELECT ida,organisasi,tema,tanggal,jam,htm,cotelp,post FROM `acara` GROUP BY ida");
		return $query;
	}

	public function tampilacara($id)
	{
		$query=$this->db->query("SELECT * FROM `acara` JOIN member USING(idm) WHERE idm=".$id."");
		return $query;
	}

	public function tampilsaran()
	{
		$query=$this->db->query("SELECT * FROM `saran`");
		return $query;
	}

	public function tampilsemuaacarainfo()
	{
		$query=$this->db->query("SELECT ida,organisasi,tema,tanggal,jam,htm,COUNT(idp) as tpeserta,SUM(htm) as thtm,cotelp,post FROM `acara` JOIN acara_member USING(ida) JOIN peserta USING(idp) GROUP BY ida");
		return $query;
	}

	public function tampilacarainfo($id)
	{
		$query=$this->db->query("SELECT * FROM `acara` WHERE acara.idm=".$id." ");
		return $query;
	}

	public function tampilacarainfoaktif($id,$aktif)
	{
		$query=$this->db->query("SELECT ida,organisasi,tema,tanggal,jam,htm,COUNT(idp) as tpeserta,SUM(htm) as thtm,cotelp,post FROM `acara` JOIN acara_member USING(ida) JOIN peserta USING(idp) WHERE acara.idm=".$id." AND post=".$aktif." GROUP BY ida");
		return $query;
	}

	public function tampilacaradetail($id)
	{
		$query=$this->db->query("SELECT * FROM `acara` JOIN member USING(idm) WHERE ida=".$id." AND post=1");
		return $query;
	}

	public function acaraidmember($id,$idm)
	{
		$this->db->where('ida', $id);
		//$this->db->where('idm', $idm);
		return $this->db->get('acara');
	}

	public function acaraid($id)
	{
		$this->db->where('ida', $id);
		return $this->db->get('acara');
	}

	public function totalacara($id)
	{
		$query=$this->db->query("SELECT COUNT(ida) as tacara FROM acara WHERE idm=".$id."");
		return $query;
	}

	public function totalpeserta($id)
	{
		$query=$this->db->query("SELECT COUNT(idp) as tpeserta FROM `acara_member` JOIN acara USING(ida) WHERE acara.idm=".$id."");
		return $query;
	}

	public function totalpesertaacara($id)
	{
		$query=$this->db->query("SELECT COUNT(idp) as tpeserta FROM `acara_member` JOIN acara USING(ida) JOIN peserta USING(idp) WHERE ida=".$id."");
		return $query;
	}

	public function totalpesertaacarahadir($id)
	{
		$query=$this->db->query("SELECT COUNT(idp) as tpeserta FROM `acara_member` JOIN acara USING(ida) JOIN peserta USING(idp) WHERE ida=".$id." AND hadir=1");
		return $query;
	}

	public function totalhtm($id)
	{
		$query=$this->db->query("SELECT SUM(htm) as thtm FROM `acara` JOIN acara_member USING(ida) JOIN peserta USING(idp) WHERE acara.idm=".$id." AND peserta.bill=2");
		return $query;
	}

	public function totalhtmacara($id)
	{
		$query=$this->db->query("SELECT SUM(htm) as thtm,count(idp) as peserta FROM `acara` JOIN acara_member USING(ida) JOIN peserta USING(idp) WHERE ida=".$id." ");
		return $query;
	}

	public function totalhtmacaralunas($id)
	{
		$query=$this->db->query("SELECT SUM(htm) as thtm,count(idp) as peserta FROM `acara` JOIN acara_member USING(ida) JOIN peserta USING(idp) WHERE ida=".$id." AND peserta.bill=2");
		return $query;
	}

	public function totalhtmacaraverifikasi($id)
	{
		$query=$this->db->query("SELECT SUM(htm) as thtm,count(idp) as peserta FROM `acara` JOIN acara_member USING(ida) JOIN peserta USING(idp) WHERE ida=".$id." AND peserta.bill=1");
		return $query;
	}

	public function totalhtmacarabelum($id)
	{
		$query=$this->db->query("SELECT SUM(htm) as thtm,count(idp) as peserta FROM `acara` JOIN acara_member USING(ida) JOIN peserta USING(idp) WHERE ida=".$id." AND peserta.bill=0");
		return $query;
	}

	public function saran()
	{
		$data = array(
		'nama_saran'	=> $this->input->post('nama_saran'),
		'saran'			=> $this->input->post('saran')
		);

		$this->db->insert('saran', $data);
	}

	public function tambah()
	{
		$data = array(
		'idm'			=> $this->session->userdata('idm'),
		'organisasi'	=> $this->input->post('organisasi'),
		'tema'			=> $this->input->post('tema'),
		'tempat'		=> $this->input->post('tempat'),
		'tanggal'		=> $this->input->post('tanggal'),
		'jam'			=> $this->input->post('jam'),
		'htm'			=> $this->input->post('htm'),
		'des'			=> $this->input->post('des'),
		'cotelp'		=> $this->input->post('telp'),
		'gambar'		=>$this->upload->data('file_name')
		);

		$this->db->insert('acara', $data);
	}

	public function edit($id)
	{
		$data = array(
		'organisasi'	=> $this->input->post('organisasi'),
		'tema'			=> $this->input->post('tema'),
		'tempat'		=> $this->input->post('tempat'),
		'tanggal'		=> $this->input->post('tanggal'),
		'jam'			=> $this->input->post('jam'),
		'htm'			=> $this->input->post('htm'),
		'des'			=> $this->input->post('des'),
		'cotelp'		=> $this->input->post('telp'),
		'gambar'		=>$this->upload->data('file_name')
		);

		$this->db->where('ida', $id);
		$this->db->update('acara', $data);
	}

	public function edit_nf($id)
	{
		$data = array(
		'organisasi'	=> $this->input->post('organisasi'),
		'tema'			=> $this->input->post('tema'),
		'tempat'		=> $this->input->post('tempat'),
		'tanggal'		=> $this->input->post('tanggal'),
		'jam'			=> $this->input->post('jam'),
		'htm'			=> $this->input->post('htm'),
		'des'			=> $this->input->post('des'),
		'cotelp'		=> $this->input->post('telp')
		);

		$this->db->where('ida', $id);
		$this->db->update('acara', $data);
	}

	public function editstatus($ida,$status)
	{
		$data = array(
		'post'=>$status
		);

		$this->db->where('ida', $ida);
		$this->db->update('acara', $data);
	}

	public function hapus($id,$idm)
	{
		$this->db->where('ida', $id);
		$this->db->delete('acara_member');
		
		$this->db->where('ida', $id);
		//$this->db->where('idm', $idm);
		$this->db->delete('acara');

	}

}

/* End of file user.php */
/* Location: ./application/models/user.php */
 ?>
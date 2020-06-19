<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . 'third_party/ssp.php';
class Clustering extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		date_default_timezone_set("Asia/Bangkok");
		$this->load->model('m_general');
	}
	
	////////////////////////////////////
	
	public function index()
    {
		if($this->session->userdata('lv_user') == "admin"){
			$this->load->view("v_admin_header");
		}else{
			$this->load->view("v_pengguna_header");
		}
        $this->load->view("v_clustering");
        $this->load->view("v_main_footer");
    }
	
	public function dataset_aksi_ubah_bulk()
    {
		$this->db->query("UPDATE tbl_dataset SET use_dataset='0'");
		if(isset($_POST['id_dataset'])){	
			$jumlah_id = count($this->input->post('id_dataset'), COUNT_RECURSIVE);
			for($x=0; $x<$jumlah_id; $x++){
				$where['id_dataset'] = $_POST['id_dataset'][$x];
				$data['clustering_dataset'] = $_POST['clustering_dataset'][$x];
				$data['use_dataset'] = 1;
				$this->m_general->edit("tbl_dataset", $where, $data);
			}
		}
		redirect('clustering/dataset_clustering');
    }
	
	public function dataset_clustering()
    {
		$data['c0'] = $this->m_general->countdata("tbl_dataset",array("clustering_dataset"=>0, "use_dataset"=>'1'));
		$data['c1'] = $this->m_general->countdata("tbl_dataset",array("clustering_dataset"=>1, "use_dataset"=>'1'));
		if($this->session->userdata('lv_user') == "admin"){
			$this->load->view("v_admin_header");
		}else{
			$this->load->view("v_pengguna_header");
		}
        $this->load->view("v_dataset_clustering",$data);
        $this->load->view("v_main_footer");
    }
	
	public function get_data_master_dataset_clustering()
	{
		$table = "
        (
SELECT a.*, 
CASE
	WHEN a.jenis_dataset='CG' THEN 'Cerai Gugat'
	WHEN a.jenis_dataset='CT' THEN 'Cerai Talak'
END as jenisdataset,
CONCAT(a.up_dataset,' Tahun') as updataset,
CONCAT(a.ut_dataset,' Tahun') as utdataset,
CONCAT(a.uk_dataset,' Tahun') as ukdataset,
CONCAT(a.ja_dataset,' Anak') as jadataset,
CONCAT(CHAR_LENGTH(a.alasan_dataset),' Alasan') as alasandataset
from tbl_dataset a where use_dataset='1' order by id_dataset ASC
        )temp";
		
        $primaryKey = 'id_dataset';
        $columns = array(
        array( 'db' => 'np_dataset',     'dt' => 'np_dataset' ),
        array( 'db' => 'jenisdataset',  'dt' => 'jenisdataset' ),
        array( 'db' => 'updataset',     'dt' => 'updataset' ),
        array( 'db' => 'utdataset',     'dt' => 'utdataset' ),
        array( 'db' => 'ukdataset',     'dt' => 'ukdataset' ),
        array( 'db' => 'jadataset',     'dt' => 'jadataset' ),
        array( 'db' => 'mediasi_dataset',     'dt' => 'mediasi_dataset' ),
        array( 'db' => 'alasandataset',     'dt' => 'alasandataset' ),
        array( 'db' => 'putusan_dataset',     'dt' => 'putusan_dataset' ),
        array( 'db' => 'clustering_dataset',     'dt' => 'clustering_dataset' ),
        array( 'db' => 'id_dataset',     'dt' => 'id_dataset' ),
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
        echo json_encode(
            SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns)
        );
	}
	
	
	////////////////////////////////////
}
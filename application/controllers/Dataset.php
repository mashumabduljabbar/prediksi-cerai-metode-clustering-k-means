<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . 'third_party/ssp.php';
class Dataset extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login" and $this->session->userdata('lv_user') != "admin"){
			redirect(base_url("login"));
		}
		date_default_timezone_set("Asia/Bangkok");
		$this->load->model('m_general');
	}
	
	////////////////////////////////////
	
	public function index()
    {
		$this->load->view("v_admin_header");
        $this->load->view("v_dataset");
        $this->load->view("v_main_footer");
    }
	
	////////////////////////////////////
	
	public function get_data_master_dataset()
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
from tbl_dataset a order by id_dataset ASC
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
	
	
	public function get_data_master_dataset_normalisasi()
	{
		$table = "
        (
select a.id_dataset, 
CASE
	WHEN a.up_dataset < 30 THEN 1
	WHEN a.up_dataset >=30 AND a.up_dataset <=40 THEN 2
	WHEN a.up_dataset > 40 THEN 3 
END as up_dataset,
CASE
	WHEN a.ut_dataset < 30 THEN 1
	WHEN a.ut_dataset >=30 AND a.ut_dataset <=40 THEN 2
	WHEN a.ut_dataset > 40 THEN 3 
END as ut_dataset,
CASE
	WHEN a.uk_dataset < 10 THEN 1
	WHEN a.uk_dataset >=10 AND a.uk_dataset <=20 THEN 2
	WHEN a.uk_dataset > 20 THEN 3 
END as uk_dataset,
a.ja_dataset,
CHAR_LENGTH(a.alasan_dataset) as alasan_dataset
from tbl_dataset a
        )temp";
		
        $primaryKey = 'id_dataset';
        $columns = array(
        array( 'db' => 'up_dataset',     'dt' => 'up_dataset' ),
        array( 'db' => 'ut_dataset',  'dt' => 'ut_dataset' ),
        array( 'db' => 'uk_dataset',     'dt' => 'uk_dataset' ),
        array( 'db' => 'ja_dataset',     'dt' => 'ja_dataset' ),
        array( 'db' => 'alasan_dataset',     'dt' => 'alasan_dataset' ),
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
	
	public function dataset_tambah()
    {
		$_POST['np_dataset_eksis'] = "0";
		$this->load->view("v_admin_header");
        $this->load->view("v_dataset_add", $_POST);
		$this->load->view("v_main_footer");
    }
	public function dataset_ubah($id_dataset="")
	{
		if($id_dataset!=""){
			$where = array("id_dataset" => $id_dataset);
			$data['tbl_dataset'] = $this->m_general->view_by("tbl_dataset",$where);
			$this->load->view("v_admin_header");
			$this->load->view('v_dataset_edit', $data);
			$this->load->view("v_main_footer");
		}else{
			redirect('dataset');
		}
	}
	public function dataset_aksi_tambah()
    {
		$id_terakhir = $this->m_general->bacaidterakhir("tbl_dataset", "id_dataset");
		$_POST['id_dataset'] = $id_terakhir;
		$np_dataset = $this->m_general->countdata("tbl_dataset", array("np_dataset" => $_POST['np_dataset']));
		if($np_dataset=="0"){
			$jumlah_id = count($this->input->post('id'), COUNT_RECURSIVE);
			$kd_alasan = "";
			for($x=0; $x<$jumlah_id; $x++){
				if($_POST['id'][$x]==1){
					$kd_alasan.=$_POST['kd_alasan'][$x];
				}
			}	
			unset($_POST['id']);
			unset($_POST['kd_alasan']);
			$_POST['alasan_dataset'] = $kd_alasan;
						
			$this->m_general->add("tbl_dataset", $_POST);
			redirect('dataset');
		}else{
			$_POST['np_dataset_eksis'] = "1";
			$this->load->view("v_admin_header");
			$this->load->view("v_dataset_add", $_POST);
			$this->load->view("v_main_footer");
		}
    }	
	public function dataset_aksi_ubah()
    {
		if(isset($_POST['id_dataset'])){			
			$where['id_dataset'] = $_POST['id_dataset'];
			$np_dataset = $this->input->post('np_dataset')[0];
			$np_dataset_old = $this->input->post('np_dataset')[1];
			
			if($np_dataset!=$np_dataset_old){
				$check_no_dataset = $this->m_general->countdata("tbl_dataset", array("np_dataset" => $np_dataset));
			}else{
				$check_no_dataset = 0;
			}
			
			$_POST['np_dataset'] = $np_dataset;
			
			if($check_no_dataset==0){	
				$this->m_general->edit("tbl_dataset", $where, $_POST);
				redirect('dataset');
			}else{
				$_POST['np_dataset_eksis'] = "1";
				$_POST['tbl_dataset'] = $this->m_general->view_by("tbl_dataset",$where);
				$this->load->view("v_admin_header");
				$this->load->view("v_dataset_edit", $_POST);
				$this->load->view("v_main_footer");
			}
		}else{
			redirect('dataset/dataset_ubah/');
		}
    }	
		
	public function dataset_aksi_hapus($id_dataset=""){
		if($id_dataset!=""){
			$where['id_dataset'] = $id_dataset;
			$this->m_general->hapus("tbl_dataset", $where);
			redirect('dataset');
		}else{
			redirect('dataset');
		}
	}
}
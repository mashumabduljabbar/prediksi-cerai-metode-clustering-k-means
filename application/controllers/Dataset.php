<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . 'third_party/ssp.php';
class Dataset extends CI_Controller {
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
		$this->load->view("v_admin_header");
        $this->load->view("v_dataset");
        $this->load->view("v_main_footer");
    }
	
	////////////////////////////////////
	
	public function get_data_master_dataset()
	{
		$table = "
        (
          select * from tbl_dataset order by np_dataset ASC
        )temp";
		
        $primaryKey = 'id_dataset';
        $columns = array(
        array( 'db' => 'np_dataset',     'dt' => 'np_dataset' ),
        array( 'db' => 'jenis_dataset',  'dt' => 'jenis_dataset' ),
        array( 'db' => 'up_dataset',     'dt' => 'up_dataset' ),
        array( 'db' => 'ut_dataset',     'dt' => 'ut_dataset' ),
        array( 'db' => 'uk_dataset',     'dt' => 'uk_dataset' ),
        array( 'db' => 'ja_dataset',     'dt' => 'ja_dataset' ),
        array( 'db' => 'mediasi_dataset',     'dt' => 'mediasi_dataset' ),
        array( 'db' => 'alasan_dataset',     'dt' => 'alasan_dataset' ),
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
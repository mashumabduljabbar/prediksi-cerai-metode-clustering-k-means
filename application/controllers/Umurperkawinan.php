<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . 'third_party/ssp.php';
class Umurperkawinan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login"  and $this->session->userdata('lv_user') != "admin"){
			redirect(base_url("login"));
		}
		date_default_timezone_set("Asia/Bangkok");
		$this->load->model('m_general');
	}
	
	////////////////////////////////////
	
	public function index()
    {
		$this->load->view("v_admin_header");
        $this->load->view("v_umurperkawinan");
        $this->load->view("v_main_footer");
    }
	
	////////////////////////////////////
	
	public function get_data_master_umurperkawinan()
	{
		$table = "
        (
          select * from tbl_umurperkawinan order by kd_umurperkawinan ASC
        )temp";
		
        $primaryKey = 'id_umurperkawinan';
        $columns = array(
        array( 'db' => 'kd_umurperkawinan',     'dt' => 'kd_umurperkawinan' ),
        array( 'db' => 'nilai_umurperkawinan',     'dt' => 'nilai_umurperkawinan' ),
        array( 'db' => 'id_umurperkawinan',     'dt' => 'id_umurperkawinan' ),
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
	public function umurperkawinan_tambah()
    {
		$_POST['kd_umurperkawinan'] = "0";
		$this->load->view("v_admin_header");
        $this->load->view("v_umurperkawinan_add", $_POST);
		$this->load->view("v_main_footer");
    }
	public function umurperkawinan_ubah($id_umurperkawinan="")
	{
		if($id_umurperkawinan!=""){
			$where = array("id_umurperkawinan" => $id_umurperkawinan);
			$data['tbl_umurperkawinan'] = $this->m_general->view_by("tbl_umurperkawinan",$where);
			$this->load->view("v_admin_header");
			$this->load->view('v_umurperkawinan_edit', $data);
			$this->load->view("v_main_footer");
		}else{
			redirect('umurperkawinan');
		}
	}
	public function umurperkawinan_aksi_tambah()
    {
		$id_terakhir = $this->m_general->bacaidterakhir("tbl_umurperkawinan", "id_umurperkawinan");
		$_POST['id_umurperkawinan'] = $id_terakhir;
		$kd_umurperkawinan = $this->m_general->countdata("tbl_umurperkawinan", array("kd_umurperkawinan" => $_POST['kd_umurperkawinan']));
		if($kd_umurperkawinan=="0"){
			$this->m_general->add("tbl_umurperkawinan", $_POST);
			redirect('umurperkawinan');
		}else{
			$_POST['kd_umurperkawinan_eksis'] = "1";
			$this->load->view("v_admin_header");
			$this->load->view("v_umurperkawinan_add", $_POST);
			$this->load->view("v_main_footer");
		}
    }	
	public function umurperkawinan_aksi_ubah()
    {
		if(isset($_POST['id_umurperkawinan'])){			
			$where['id_umurperkawinan'] = $_POST['id_umurperkawinan'];
			$kd_umurperkawinan = $this->input->post('kd_umurperkawinan')[0];
			$kd_umurperkawinan_old = $this->input->post('kd_umurperkawinan')[1];
			
			if($kd_umurperkawinan!=$kd_umurperkawinan_old){
				$check_no_umurperkawinan = $this->m_general->countdata("tbl_umurperkawinan", array("kd_umurperkawinan" => $kd_umurperkawinan));
			}else{
				$check_no_umurperkawinan = 0;
			}
			
			$_POST['kd_umurperkawinan'] = $kd_umurperkawinan;
			
			if($check_no_umurperkawinan==0){	
				$this->m_general->edit("tbl_umurperkawinan", $where, $_POST);
				redirect('umurperkawinan');
			}else{
				$_POST['kd_umurperkawinan_eksis'] = "1";
				$_POST['tbl_umurperkawinan'] = $this->m_general->view_by("tbl_umurperkawinan",$where);
				$this->load->view("v_admin_header");
				$this->load->view("v_umurperkawinan_edit", $_POST);
				$this->load->view("v_main_footer");
			}
		}else{
			redirect('umurperkawinan/umurperkawinan_ubah/');
		}
    }	
	public function umurperkawinan_aksi_hapus($id_umurperkawinan=""){
		if($id_umurperkawinan!=""){
			$where['id_umurperkawinan'] = $id_umurperkawinan;
			$this->m_general->hapus("tbl_umurperkawinan", $where);
			redirect('umurperkawinan');
		}else{
			redirect('umurperkawinan');
		}
	}
}
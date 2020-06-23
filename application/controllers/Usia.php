<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . 'third_party/ssp.php';
class Usia extends CI_Controller {
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
        $this->load->view("v_usia");
        $this->load->view("v_main_footer");
    }
	
	////////////////////////////////////
	
	public function get_data_master_usia()
	{
		$table = "
        (
          select * from tbl_usia order by kd_usia ASC
        )temp";
		
        $primaryKey = 'id_usia';
        $columns = array(
        array( 'db' => 'kd_usia',     'dt' => 'kd_usia' ),
        array( 'db' => 'nilai_usia',     'dt' => 'nilai_usia' ),
        array( 'db' => 'id_usia',     'dt' => 'id_usia' ),
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
	public function usia_tambah()
    {
		$_POST['kd_usia_eksis'] = "0";
		$this->load->view("v_admin_header");
        $this->load->view("v_usia_add", $_POST);
		$this->load->view("v_main_footer");
    }
	public function usia_ubah($id_usia="")
	{
		if($id_usia!=""){
			$where = array("id_usia" => $id_usia);
			$data['tbl_usia'] = $this->m_general->view_by("tbl_usia",$where);
			$this->load->view("v_admin_header");
			$this->load->view('v_usia_edit', $data);
			$this->load->view("v_main_footer");
		}else{
			redirect('usia');
		}
	}
	public function usia_aksi_tambah()
    {
		$id_terakhir = $this->m_general->bacaidterakhir("tbl_usia", "id_usia");
		$_POST['id_usia'] = $id_terakhir;
		$kd_usia = $this->m_general->countdata("tbl_usia", array("kd_usia" => $_POST['kd_usia']));
		if($kd_usia=="0"){
			$this->m_general->add("tbl_usia", $_POST);
			redirect('usia');
		}else{
			$_POST['kd_usia_eksis'] = "1";
			$this->load->view("v_admin_header");
			$this->load->view("v_usia_add", $_POST);
			$this->load->view("v_main_footer");
		}
    }	
	public function usia_aksi_ubah()
    {
		if(isset($_POST['id_usia'])){			
			$where['id_usia'] = $_POST['id_usia'];
			$kd_usia = $this->input->post('kd_usia')[0];
			$kd_usia_old = $this->input->post('kd_usia')[1];
			
			if($kd_usia!=$kd_usia_old){
				$check_no_usia = $this->m_general->countdata("tbl_usia", array("kd_usia" => $kd_usia));
			}else{
				$check_no_usia = 0;
			}
			
			$_POST['kd_usia'] = $kd_usia;
			
			if($check_no_usia==0){	
				$this->m_general->edit("tbl_usia", $where, $_POST);
				redirect('usia');
			}else{
				$_POST['kd_usia_eksis'] = "1";
				$_POST['tbl_usia'] = $this->m_general->view_by("tbl_usia",$where);
				$this->load->view("v_admin_header");
				$this->load->view("v_usia_edit", $_POST);
				$this->load->view("v_main_footer");
			}
		}else{
			redirect('usia/usia_ubah/');
		}
    }	
	public function usia_aksi_hapus($id_usia=""){
		if($id_usia!=""){
			$where['id_usia'] = $id_usia;
			$this->m_general->hapus("tbl_usia", $where);
			redirect('usia');
		}else{
			redirect('usia');
		}
	}
}
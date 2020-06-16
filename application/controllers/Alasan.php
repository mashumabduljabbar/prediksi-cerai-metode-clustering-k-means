<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . 'third_party/ssp.php';
class Alasan extends CI_Controller {
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
        $this->load->view("v_alasan");
        $this->load->view("v_main_footer");
    }
	
	////////////////////////////////////
	
	public function get_data_master_alasan()
	{
		$table = "
        (
          select * from tbl_alasan order by kd_alasan ASC
        )temp";
		
        $primaryKey = 'id_alasan';
        $columns = array(
        array( 'db' => 'kd_alasan',     'dt' => 'kd_alasan' ),
        array( 'db' => 'detail_alasan',     'dt' => 'detail_alasan' ),
        array( 'db' => 'id_alasan',     'dt' => 'id_alasan' ),
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
	public function alasan_tambah()
    {
		$_POST['kd_alasan_eksis'] = "0";
		$this->load->view("v_admin_header");
        $this->load->view("v_alasan_add", $_POST);
		$this->load->view("v_main_footer");
    }
	public function alasan_ubah($id_alasan="")
	{
		if($id_alasan!=""){
			$where = array("id_alasan" => $id_alasan);
			$data['tbl_alasan'] = $this->m_general->view_by("tbl_alasan",$where);
			$this->load->view("v_admin_header");
			$this->load->view('v_alasan_edit', $data);
			$this->load->view("v_main_footer");
		}else{
			redirect('alasan');
		}
	}
	public function alasan_aksi_tambah()
    {
		$id_terakhir = $this->m_general->bacaidterakhir("tbl_alasan", "id_alasan");
		$_POST['id_alasan'] = $id_terakhir;
		$kd_alasan = $this->m_general->countdata("tbl_alasan", array("kd_alasan" => $_POST['kd_alasan']));
		if($kd_alasan=="0"){
			$this->m_general->add("tbl_alasan", $_POST);
			redirect('alasan');
		}else{
			$_POST['kd_alasan_eksis'] = "1";
			$this->load->view("v_admin_header");
			$this->load->view("v_alasan_add", $_POST);
			$this->load->view("v_main_footer");
		}
    }	
	public function alasan_aksi_ubah()
    {
		if(isset($_POST['id_alasan'])){			
			$where['id_alasan'] = $_POST['id_alasan'];
			$kd_alasan = $this->input->post('kd_alasan')[0];
			$kd_alasan_old = $this->input->post('kd_alasan')[1];
			
			if($kd_alasan!=$kd_alasan_old){
				$check_no_alasan = $this->m_general->countdata("tbl_alasan", array("kd_alasan" => $kd_alasan));
			}else{
				$check_no_alasan = 0;
			}
			
			$_POST['kd_alasan'] = $kd_alasan;
			
			if($check_no_alasan==0){	
				$this->m_general->edit("tbl_alasan", $where, $_POST);
				redirect('alasan');
			}else{
				$_POST['kd_alasan_eksis'] = "1";
				$_POST['tbl_alasan'] = $this->m_general->view_by("tbl_alasan",$where);
				$this->load->view("v_admin_header");
				$this->load->view("v_alasan_edit", $_POST);
				$this->load->view("v_main_footer");
			}
		}else{
			redirect('alasan/alasan_ubah/');
		}
    }	
	public function alasan_aksi_hapus($id_alasan=""){
		if($id_alasan!=""){
			$where['id_alasan'] = $id_alasan;
			$this->m_general->hapus("tbl_alasan", $where);
			redirect('alasan');
		}else{
			redirect('alasan');
		}
	}
}
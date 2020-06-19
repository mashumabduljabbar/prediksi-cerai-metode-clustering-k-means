<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . 'third_party/ssp.php';
class Config extends CI_Controller {
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
		$data['tbl_config'] = $this->db->query("select * from tbl_config limit 1")->row();
		$this->load->view("v_admin_header");
		$this->load->view('v_config', $data);
		$this->load->view("v_main_footer");
	}
	
	public function config_aksi_ubah()
    {
		$this->m_general->edit("tbl_config", array("id_config>="=>0),$_POST);
		redirect('config/index/1');
    }
}
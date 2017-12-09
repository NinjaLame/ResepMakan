<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhs_account extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	public function index(){
		$this->load->view('apv_mahasiswa/templates/head.php');
		$this->load->view('apv_mahasiswa/templates/sidenav.php');
		$this->load->view('apv_mahasiswa/templates/topnav.php');
		$this->load->view('apv_mahasiswa/account.php');
		$this->load->view('apv_mahasiswa/templates/script.php');
	}
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index()
	{

		$this->load->view("Format/headerCa");
		$this->load->view('Dashboard/DashboardView');
		$this->load->view("Format/footerCa");
		$this->load->view("Format/scriptCa");
	}

	
}

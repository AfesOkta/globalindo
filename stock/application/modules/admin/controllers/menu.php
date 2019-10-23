<?php
class Menu extends Admin_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('pxmenu_m');
	}

	public function index() {
		$this->data['useDatatables'] = TRUE;
		$this->data['subView'] = 'admin/menu/list';
		$this->data['sAjaxSource'] = 'admin/menu/datatable';
		$this->load->view('common/_layouts/main',$this->data);
	}
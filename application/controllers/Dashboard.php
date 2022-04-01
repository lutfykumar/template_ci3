<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->pathView = 'admin';
  }

  public function index()
  {
    $this->data['page_title'] = 'Dashboard';
    // $this->load->view('admin/layouts/header', $this->data);
    $this->loadView('dashboard', $this->data);
  }
}

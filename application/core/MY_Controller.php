<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
  protected $pathView = '';
  protected $data = array();
  // protected $karyawan_id;
  // protected $sess_karyawan;

  public function __construct()
  {
    parent::__construct();
    // isLogin();
    $this->data['site_name'] = $this->config->item('site_name');
    $this->data['meta_description'] = $this->config->item('meta_description');
    $this->data['meta_keywords'] = $this->config->item('meta_keywords');
    $this->data['meta_author'] = $this->config->item('meta_author');
    $this->data['meta_robots_content'] = $this->config->item('meta_robots_content');
    $this->data['path_favicon_png'] = $this->config->item('path_favicon_png');
    $this->data['path_favicon_svg'] = $this->config->item('path_favicon_svg');
    $this->data['current_url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $this->load->model('m_pengaturan');
  }

  private function is_active()
  {
    $active_link = '';
    $one = $this->uri->segment(1) ? $this->uri->segment(1) : null;
    $two = $this->uri->segment(2) ? $this->uri->segment(2) : null;
    $three = $this->uri->segment(3) ? $this->uri->segment(3) : null;

    $active_link .= $one ? $one : FALSE;
    $active_link .= $two ? '/' . $two : FALSE;
    $active_link .= $three ? '/' . $three : FALSE;

    return $active_link;
  }

  protected function loadView($view, $bundle = array())
  {
    $this->data['active_url'] = $this->is_active();
    $menu['headers'] = $this->m_pengaturan->menu_headers();
    $menu['active_url'] = $this->is_active();
    $this->data['sidebar'] = $this->load->view('admin/layouts/sidebar', $menu, TRUE);
    if (count($bundle) > 0) {
      $this->data['content'] = $this->load->view($this->pathView . '/' . $view, $bundle, TRUE);
    } else {
      $this->data['content'] = $this->load->view($this->pathView . '/' . $view);
    }
    $this->load->view('admin/layouts/body', $this->data);
  }
}

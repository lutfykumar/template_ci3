<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_pengaturan extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  function menu_headers()
  {
    $sql = "SELECT a.* FROM s_menu a WHERE a.TAMPIL=1 AND a.HEADER_ID IS NULL AND a.PARENT_ID IS NULL ORDER BY a.URUT ASC";
    return $this->db->query($sql)->result();
  }
  function menu_sub_headers($header_id)
  {
    $sql = "SELECT a.* FROM s_menu a WHERE a.TAMPIL=1 AND a.HEADER_ID={$header_id} AND a.PARENT_ID IS NULL ORDER BY a.URUT ASC";
    return $this->db->query($sql)->result();
  }
  function menus($header_id, $sub_header)
  {
    $sql = "SELECT a.* FROM s_menu a WHERE a.TAMPIL=1 AND a.HEADER_ID={$header_id} AND a.PARENT_ID={$sub_header} ORDER BY a.URUT ASC";
    return $this->db->query($sql)->result();
  }
}

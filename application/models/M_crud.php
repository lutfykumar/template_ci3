<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_crud extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  function get($table)
  {
    return $this->db->get($table);
  }
  function get_where($table, $where)
  {
    return $this->db->get_where($table, $where);
  }
  function get_select($select = null, $table)
  {
    if (!empty($select)) {
      $this->db->select($select);
    }
    return $this->db->get($table);
  }
  function get_select_where($select = null, $table, $where)
  {
    if (!empty($select)) {
      $this->db->select($select);
    }
    return $this->db->get_where($table, $where);
  }
  function store($table, $data = array())
  {
    return $this->db->insert($table, $data);
  }
  function store_return_id($table, $data = array())
  {
    $this->db->insert($table, $data);
    return $this->db->insert_id();
  }
  function store_bulk($table, $data = array())
  {
    return $this->db->insert_batch($table, $data);
  }
  function update($where, $table, $data)
  {
    $this->db->where($where);
    return $this->db->update($table, $data);
  }
  function update_bulk($table, $data = array(), $pk)
  {
    return $this->db->update_batch($table, $data, $pk);
  }
  function delete($where, $table)
  {
    $this->db->where($where);
    return $this->db->delete($table);
  }
  function soft_delete($where, $table)
  {
    $this->db->where($where);
    $this->db->set('DELETED_AT', mnow());
    return $this->db->delete($table);
  }
  function truncate($table)
  {
    return $this->db->truncate($table);
  }
  function duplicateRecord($table, $primary_key_field, $primary_key_val)
  {
    $this->db->where($primary_key_field, $primary_key_val);
    $query = $this->db->get($table);
    $packages = [];
    foreach ($query->result() as $row) {
      $bundle = [];
      foreach ($row as $key => $val) {
        if ($key !== $primary_key_field) {
          $data[$key] = $val;
          $bundle[] = $data;
        }
      }
      $total_record = count($bundle) - 1;
      $packages[] = $bundle[$total_record];
    }
    return $this->db->insert_batch($table, $packages);
  }
  function get_datatables($query = NULL, $search_init = [], $data_where = "")
  {
    if (!empty($query)) {
      $search = htmlspecialchars($_POST['search']['value']);
      $limit = intval($this->input->post("length"));
      $start = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['start']}");
      $order = $this->input->post("order");
      $col = 0;
      $dir = "asc";
      $columns = $search_init;
      if (!empty($order)) {
        foreach ($order as $o) {
          $col = $o['column'];
          $dir = $o['dir'];
        }
      }
      if ($dir != "asc" && $dir != "desc") {
        $dir = "desc";
      }
      if (!isset($columns[$col])) {
        $order = null;
      } else {
        $order = $columns[$col];
      }
      if ($order != null) {
        $s_order = ' ORDER BY ' . $order . ' ' . $dir;
      } else {
        $s_order = '';
      }
      if (!empty($limit) or !empty($start)) {
        if ($limit !== intval(-1)) {
          $s_limit = ' LIMIT ' . $limit . ' OFFSET ' . $start;
        } else {
          $s_limit = '';
        }
      } else {
        $s_limit = '';
      }
      if ($data_where !== '') {
        $sql = $this->db->query($query . " WHERE  $data_where ");
      } else {
        $sql = $this->db->query($query);
      }
      $sql_count = $sql->num_rows();
      if (isset($search) && !empty($search)) {
        $arr_cari = implode(" LIKE '%" . $search . "%' OR ", $search_init) . " LIKE '%" . $search . "%'";
      } else {
        $arr_cari = NULL;
      }
      if (!empty($data_where)) {
        if (!empty($arr_cari)) {
          $sql_data = $this->db->query($query . " WHERE $data_where AND (" . $arr_cari . ")" . $s_order . $s_limit);
        } else {
          $sql_data = $this->db->query($query . " WHERE $data_where " . $s_order . $s_limit);
        }
      } else {
        if (!empty($arr_cari)) {
          $sql_data = $this->db->query($query . " WHERE (" . $arr_cari . ")" . $s_order . $s_limit);
        } else {
          $sql_data = $this->db->query($query . $s_order . $s_limit);
        }
      }
      if (isset($search)) {
        if (!empty($data_where)) {
          if (!empty($arr_cari)) {
            $sql_cari =  $this->db->query($query . " WHERE $data_where AND (" . $arr_cari . ")");
          } else {
            $sql_cari =  $this->db->query($query . " WHERE $data_where");
          }
        } else {
          if (!empty($arr_cari)) {
            $sql_cari =  $this->db->query($query . " WHERE (" . $arr_cari . ")");
          } else {
            $sql_cari =  $this->db->query($query);
          }
        }
        $sql_filter_count = $sql_cari->num_rows();
      } else {
        if (!empty($data_where)) {
          $sql_filter = $this->db->query($query . " WHERE $data_where");
        } else {
          $sql_filter = $this->db->query($query);
        }
        $sql_filter_count = $sql_filter->num_rows();
      }
      $res = array(
        'data' => $sql_data,
        'sql_count' => $sql_count,
        'sql_filter_count' => $sql_filter_count,
      );
    } else {
      $res = array(
        'data' => array(),
        'sql_count' => 0,
        'sql_filter_count' => 0,
      );
    }
    return $res;
  }
}

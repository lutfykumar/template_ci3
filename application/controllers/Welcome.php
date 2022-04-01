<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->model("m_crud");

		$r_snk = $this->m_crud->get('m_sdank');
		if ($r_snk->num_rows() > 0) {
			$dt_isi['lokasi_file'] = $r_snk->row()->LOKASI_FILE;
		}

		$r_faq = $this->m_crud->get('m_fdanq');
		$dt_isi['dt_faq']= $r_faq->result_array();
		$dt_isi['periode'] = array(
			array(
				'BULAN' => 'Maret',
				'BLN' => 3
			),
			array(
				'BULAN' => 'April',
				'BLN' => 4
			),
			array(
				'BULAN' => 'Mei',
				'BLN' => 5
			),
			array(
				'BULAN' => 'Juni',
				'BLN' => 6
			),
			array(
				'BULAN' => 'Juli',
				'BLN' => 7
			),
			array(
				'BULAN' => 'Agustus',
				'BLN' => 8
			),
			array(
				'BULAN' => 'September',
				'BLN' => 9
			),
			array(
				'BULAN' => 'Oktober',
				'BLN' => 10
			),
			array(
				'BULAN' => 'November',
				'BLN' => 11
			),
			array(
				'BULAN' => 'Desember',
				'BLN' => 12
			),
		);
		$dt_isi['bln'] = date('n');
		// $dt_isi['bln'] = 12;
		
		$this->load->view('home', $dt_isi);
	}

	function get_foto_pemenang()
	{
		$this->load->model("m_pemenang");
		$pr = $this->input->post(null, true);
		$res = $this->m_pemenang->q_pemenang($pr)->result_array();
		// $result = $res->result_array();
    	$arr=array();
    	foreach($res as $key => $v){
        	if(empty($v['FOTO_THUMB'])){
            	$url_foto='landing/images/empty-foto.jpg';
            }else{
            	if(empty(glob($v['FOTO_THUMB']))){
                	$url_foto='landing/images/empty-foto.jpg';
                }else{
                	$url_foto=$v['FOTO_THUMB'];
                }
            }
        	$arr[]=array(
				'ID_MENANG'=>$v['ID_MENANG'],
            	'PERIODE'=> $v['PERIODE'],
            	'FOTO_THUMB'=> $url_foto,
            	'HADIAH'=>$v['HADIAH'],
            	'NAMA_PEMENANG'=>$v['NAMA_PEMENANG'],
            	'AREA_PEMENANG'=>$v['AREA_PEMENANG'],
            	'KET_BULAN'=>$v['KET_BULAN']
        	);
        }
		echo json_encode($arr);
	}

	function get_detail_foto_pemenang()
	{
		$this->load->model("m_crud");
		$id_menang = $this->input->post('ID_MENANG');
		$where=array('ID_MENANG'=>$id_menang);
		$res = $this->m_crud->get_where('t_foto_pemenang', $where)->result_array();
		// $result = $r_snk->result_array();
    	$arr=array();
    	foreach($res as $key => $v){
        	if(empty($v['FOTO_ASLI'])){
            	$url_foto='landing/images/empty-foto.jpg';
            }else{
            	if(empty(glob($v['FOTO_ASLI']))){
                	$url_foto='landing/images/empty-foto.jpg';
                }else{
                	$url_foto=$v['FOTO_ASLI'];
                }
            }
        	$arr[]=array(
				'ID_FOTO_WIN'=>$v['ID_FOTO_WIN'],
            	'ID_MENANG'=> $v['ID_MENANG'],
            	'FOTO_ASLI'=> $url_foto,
            	'FOTO_THUMB'=>$v['FOTO_THUMB'],
            	'KET'=> empty($v['KET']) ?  '' : $v['KET']
        	);
        }
		echo json_encode($arr);
	}

	function get_produk()
	{
		$this->load->model("m_crud");
		$result = $this->m_crud->get('m_produk_promo');
		$row = $result->result_array();
		echo json_encode($row);
	}
}

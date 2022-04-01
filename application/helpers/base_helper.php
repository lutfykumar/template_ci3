<?php

if (!function_exists('dd')) {
	function dd($val)
	{
		var_dump($val);
		die();
	}
};
if (!function_exists('pq')) {
	function pq()
	{
		$CI = &get_instance();
		return print_r($CI->db->last_query());
	}
};
if (!function_exists('mnow')) {
	function mnow()
	{
		return date('Y-m-d H:i:s');
	}
}
if (!function_exists('sendJSON')) {
	function sendJSON($data = array())
	{
		$CI = &get_instance();
		$CI->output->set_content_type('application/json')->set_output(json_encode($data));
	}
}
if (!function_exists('sendJSONDT')) {
	function sendJSONDT($draw = 0, $recordsTotal = 0, $recordsFiltered = 0, $data = array())
	{
		$CI = &get_instance();
		$json = array(
			"draw" => $draw,
			"recordsTotal" => $recordsTotal,
			"recordsFiltered" => $recordsFiltered,
			"data" => $data
		);
		$CI->output->set_content_type('application/json')->set_output(json_encode($json));
	}
}
if (!function_exists('isAvatar')) {
	function isAvatar($val)
	{
		if (!empty($val)) {
			return base_url('filemanager/avatar/' . $val);
		} else {
			return base_url('filemanager/avatar/default.png');
		}
	}
}
if (!function_exists('roles_access')) {
	function roles_access()
	{
		$array = [1, 2, 3];
		return $array;
	}
}
if (!function_exists('format_indo')) {
	function format_indo($date)
	{
		date_default_timezone_set('Asia/Jakarta');
		// array hari dan bulan
		$Hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
		$Bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

		// pemisahan tahun, bulan, hari, dan waktu
		$tahun = substr($date, 0, 4);
		$bulan = substr($date, 5, 2);
		$tgl = substr($date, 8, 2);
		//   $waktu = substr($date,11,5);
		//   $hari = date("w",strtotime($date));
		$result = $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun;

		return $result;
	}
}
if (!function_exists('jenis_kelamin')) {
	function jenis_kelamin($val)
	{
		switch ($val) {
			case "1":
				return 'Male';
				break;
			case "2":
				return 'Female';
				break;
			default:
				return "-";
				break;
		}
	}
}
if (!function_exists('format_tgl_indo')) {
	function format_tgl_indo($date)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tahun = substr($date, 0, 4);
		$bulan = substr($date, 5, 2);
		$tgl = substr($date, 8, 2);
		$result = $tgl . "-" . $bulan . "-" . $tahun;

		return $result;
	}
}
if (!function_exists('format_tgl_insert')) {
	function format_tgl_insert($date)
	{
		date_default_timezone_set('Asia/Jakarta');
		$result = date('Y-m-d', strtotime($date));

		return $result;
	}
}
if (!function_exists('xss_checker')) {
	function xss_checker($str)
	{
		return htmlentities($str, ENT_QUOTES, 'UTF-8');
	}
}
if (!function_exists('encrypt_decrypt')) {
	function encrypt_decrypt($action, $string)
	{
		$output = false;

		$encrypt_method = "AES-256-CBC";
		$secret_key = 'HSD';
		$secret_iv = 'bangchan';

		// hash
		$key = hash('sha256', $secret_key);

		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a
		// warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);

		if ($action == 'encrypt') {
			$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
			$output = base64_encode($output);
		} else {
			if ($action == 'decrypt') {
				$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
			}
		}
		return $output;
	}
}
if (!function_exists('hitung_umur')) {
	function hitung_umur($tanggal_lahir)
	{
		if (!empty($tanggal_lahir)) {
			$birthDate = new DateTime($tanggal_lahir);
			$today = new DateTime("today");
			if ($birthDate > $today) {
				return '0';
			}
			$y = $today->diff($birthDate)->y;
			$data = $y . " tahun";
		} else {
			$data = '';
		}
		return $data;
	}
}

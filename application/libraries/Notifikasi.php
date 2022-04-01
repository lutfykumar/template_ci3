<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi
{
  public function send_notifikasi($to, $subject, $data)
  {
    $config['mailtype']     = 'html';
    $config['charset']      = 'utf-8';
    $config['protocol']     = 'smtp';
    $config['smtp_host']    = 'smtp.mailtrap.io';
    $config['smtp_user']    = '84b1dcaf08f12c';
    $config['smtp_pass']    = '4b1a383e157486';
    // $config['smtp_crypto']  = 'tls';
    $config['smtp_port']    = 2525;
    $config['crlf']         = "\r\n";
    $config['newline']      = "\r\n";
    $CI = &get_instance();
    $CI->load->library('email', $config);
    $CI->config->load('base');
    $CI->email->clear();
    $data['site_name'] =  $CI->config->item('site_name');
    $data['btnText'] =  'Lihat Detail';
    $message = $CI->load->view('mail/v_notifikasi', $data, TRUE);
    if (is_array($to)) {
      $tom = implode(',', $to);
    } else {
      $tom = $to;
    }
    $CI->email->from('noreply@putrabarusentosa.com', 'Putra Baru Sentosa');
    $CI->email->to($to);
    $CI->email->cc('admin@admin.com');
    $CI->email->subject($subject);
    $CI->email->message($message);
    if ($CI->email->send()) {
      $insert = [
        'SUBJECT' => $subject,
        'EMAIL' => $tom,
        'PESAN' => $message,
        'CATATAN' => 'Sukses Kirim Email',
        'CREATED_AT' => mnow(),
      ];
      $CI->m_crud->store('log_email', $insert);
    } else {
      $insert = [
        'SUBJECT' => $subject,
        'EMAIL' => $tom,
        'PESAN' => $CI->email->print_debugger(),
        'CATATAN' => 'Gagal Kirim Email',
        'CREATED_AT' => mnow(),
      ];
      $CI->m_crud->store('log_email', $insert);
    }

    return true;
  }

  // public function send_notif_email($to, $type, $subject, $view, $data)
  // {
  //   $config['mailtype']     = 'html';
  //   $config['charset']      = 'utf-8';
  //   $config['protocol']     = 'smtp';
  //   $config['smtp_host']    = 'smtp.mailtrap.io';
  //   $config['smtp_user']    = 'e9fe089a843f55';
  //   $config['smtp_pass']    = 'f1f5578624b681';
  //   // $config['smtp_crypto']  = 'tls';
  //   $config['smtp_port']    = 2525;
  //   $config['crlf']         = "\r\n";
  //   $config['newline']      = "\r\n";
  //   $CI = &get_instance();
  //   $CI->load->library('email', $config);

  //   $cc = $CI->plant->get_cc_email($type);
  //   $template = $CI->plant->get_email_template();
  //   $data['banner'] = base_url('filemanager/mail/' . $template->LOKASI_BANNER);
  //   $data['header'] = $template->HEADER;
  //   $data['footer'] = $template->FOOTER;
  //   if (count($data) > 0) {
  //     $message = $CI->load->view($view, $data, TRUE);
  //   } else {
  //     $message = $CI->load->view($view, TRUE);
  //   }
  //   if (is_array($to)) {
  //     $tom = implode(',', $to);
  //   } else {
  //     $tom = $to;
  //   }
  //   $CI->email->from('noreply@recruitment.kokola.co.id', 'Recruitment KOKOLA GROUP');
  //   $CI->email->to($to);
  //   $CI->email->cc($cc);
  //   $CI->email->subject($subject);
  //   $CI->email->message($message);
  //   if ($CI->email->send()) {
  //     $data = [
  //       'SUBJECT' => $subject,
  //       'EMAIL' => $tom,
  //       'PESAN' => $message,
  //       'CATATAN' => 'Sukses Kirim Email',
  //       'CREATED_AT' => mnow(),
  //     ];
  //     $CI->plant->store('log_email', $data);
  //   } else {
  //     $data = [
  //       'SUBJECT' => $subject,
  //       'EMAIL' => $tom,
  //       'PESAN' => $CI->email->print_debugger(),
  //       'CATATAN' => 'Gagal Kirim Email',
  //       'CREATED_AT' => mnow(),
  //     ];
  //     $CI->plant->store('log_email', $data);
  //   }
  //   return true;
  // }
}

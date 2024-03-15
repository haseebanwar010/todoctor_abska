<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('getsitedata')) {

    function getsitedata()
    {
        $CI =& get_instance();
       $query = $CI->db->get('site_settings');
        return $query->row();

    }
}
if ( ! function_exists('send_email_custom'))
{
     function send_email_custom($to, $from, $subject, $text) 
    {
         
         
         
         
        $CI =& get_instance();
        $smtp_host = 'ssl://mail.advocateservices4u.com';
        $smtp_port = 465;
        $smtp_username = 'email@advocateservices4u.com';
        $smtp_password = 'Welcome@Abaska123';

        $config = array();
        $config['mailpath']  = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol']  = 'smtp';
        $config['smtp_host'] = $smtp_host;
        $config['smtp_port'] = $smtp_port;
        $config['smtp_user'] = $smtp_username;
        $config['smtp_pass'] = $smtp_password;
        $config['mailtype'] = 'html';
        $config['charset']  = 'utf-8';
        $config['newline']  = "\r\n";
        $config['wordwrap'] = TRUE;

        $CI->load->library('email', array('mailtype' => 'html'));
        $CI->email->set_newline("\r\n");

        $CI->email->initialize($config);

        $CI->email->clear();
        $CI->email->to($to);
        $CI->email->from($from,"Tudoctor");
        $CI->email->subject($subject);
        $CI->email->message($text);

        $stat= $CI->email->send();
     
        //echo $CI->email->print_debugger();
        //exit;

        return $stat;
       
		
	}   
}


        

















<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mailer {
	public function Mailer() {
    require_once APPPATH.'libraries/phpmailer/class.phpmailer.php';
		require_once APPPATH.'libraries/phpmailer/class.smtp.php';
		$mailer = new PHPMailer();
		$CI =& get_instance();
		$CI->mailer = $mailer;
	}
}

?>

<?php

defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PHPMailer_Lib {

    public function _construct() {
        log_message('Debug', 'PHPMailer calss is loaded');
    }

    public function load() {
        //Include PHPMailer library files
        require_once APPPATH . 'third_party/Mailer/src/Exception.php';
        require_once APPPATH . 'third_party/Mailer/src/PHPMailer.php';
        require_once APPPATH . 'third_party/Mailer/src/SMTP.php';

        $mail = new PHPMailer;
        return $mail;
    }

}

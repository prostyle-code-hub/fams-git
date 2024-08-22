<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mail extends CI_Controller {

    public function __construct() {
        /* call CodeIgniter's default Constructor */
        parent::__construct();
    }

    public function index() {

        $this->load->library('phpmailer_lib');
        $mail = $this->phpmailer_lib->load();

        $mail->ClearAddresses();
        $mail->ClearAttachments();

        $mail->isSMTP();
        $mail->Host = 'smtp.alpha-prm.jp';
        $mail->SMTPAuth = true;
        $mail->Username = 'daiki_fams@dai-ki.co.jp';                     //SMTP username
        $mail->Password = 'qX8%Juve';
        $mail->SMTPSecure = 'ssl';           //Enable implicit TLS encryption
        $mail->Port = 465;


        $mail->setFrom('daiki_fams@dai-ki.co.jp', 'FAMS');
        $mail->addAddress('naleen.samarapperuma@gmail.com', 'Naleen');     //Add a recipient
// Add cc or bcc //$mail->addCC(); //$mail->addBCC();
// Email subject
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

        echo 'Message has been sent';
        //echo $status;
    }

}

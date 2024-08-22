<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Email_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function move_to_nus_mail() {
        $remarks = $this->input->post('remarks');
        $status = $this->input->post('application_status');
        $application_id = $this->input->post('application_id');
        $student_id = $this->input->post('student_id');

        $student = $this->db->get_where('student', array('id' => $student_id))->row_array();
        $agent_id = $student['created_by'];
//$student_name = $student['kanji_fn'].' '.$student['kanji_ln'];

        $agent = $this->db->get_where('users', array('id' => $agent_id))->row_array();
        $agent_email = $agent['email'];
        $agent_full_name = $agent['first_name'] . ' ' . $agent['last_name'];

        $data_agent['subject'] = "Change Document Status | Forign Applicant Management System";
        $data_agent['from'] = "daiki_fams@dai-ki.co.jp";
        $data_agent['to'] = $agent_email;
        $data_agent['to_name'] = $agent_full_name;

        $email_body_agent = "Hi Dear Agent, "
                . "Your Application (Application no) has been moved to NAS by the (Domestic User name) Domestic user. "
                . "Please note that all the documents under the Application form (Application ID) has been removed"
                . " from Cloud Storage and file are no longer accessiable from the system. </p>"
                . "<p>This is a system generated email please do not reply. Thanks</p>"
                . "<hr/>"
                . "<p>エージェント様</p>"
                . "<p>申請書 ($application_id) が $status </p>"
                . "<p>に変更されたことをお知らせいたします。これはシステムによって自動生成されたメールです。返信しないでください。</p>";

        $data_agent['content'] = $email_body_agent;
        $email_template = $this->load->view('email/application_review_mail_to_agent', $data_agent, TRUE);
        $this->send_smtp_mail($email_template, $data_agent['subject'], $data_agent['to'], $data_agent['from'], 'content');


        // Domestic       

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('role_id', 2);
        $domestic = $this->db->get();

        foreach ($domestic->result_array() as $key => $user) {
            $domestic_user_email = $user['email'];
            //if ($domestic_user_email != 'n-kondo@dai-ki.co.jp') {
            $domestic_user_name = $user['first_name'] . '' . $user['last_name'];
            $email_body_domestic_user = "<p>Hi Domestic user,</p>"
                    . "<p> Thanks for updating the Application form($application_id) status to ($status). System will notify to agent about the status. </p>"
                    . "<p>This is an system generated email. Please do not reply. Thanks</p>"
                    . "<hr/>"
                    . "<p>入管申請者各位</p>"
                    . "<p>申請書 ($application_id) のステータスを ($status) に更新していただきありがとうございます。</p>"
                    . "<p>システムは申請書のステータスをエージェントに通知します。</p>"
                    . "<p>これはシステムによって自動生成されたメールですので、返信しないでください。</p>";


            $data_domestic['subject'] = "Upload New Document | Forign Applicant Management System";
            $data_domestic['from'] = "daiki_fams@dai-ki.co.jp";
            $data_domestic['to'] = $domestic_user_email;
            $data_domestic['to_name'] = $domestic_user_name;
            $data_domestic['content'] = $email_body_domestic_user;

            //DELEETE 
            //echo $email_body_domestic_user;
            // ;
//echo $email_body_domestic;

            $email_template = $this->load->view('email/application_review_mail_to_domestic_user', $data_domestic, TRUE);
            $this->send_smtp_mail($email_template, $data_domestic['subject'], $data_domestic['to'], $data_domestic['from'], 'content');
            //}
        }
    }

    public function all_application_review_status_mail() {

        $remarks = $this->input->post('remarks');
        $status = $this->input->post('application_status');
        $application_id = $this->input->post('application_id');
        $student_id = $this->input->post('student_id');

        $student = $this->db->get_where('student', array('id' => $student_id))->row_array();
        $agent_id = $student['created_by'];
//$student_name = $student['kanji_fn'].' '.$student['kanji_ln'];

        $agent = $this->db->get_where('users', array('id' => $agent_id))->row_array();
        $agent_email = $agent['email'];
        $agent_full_name = $agent['first_name'] . ' ' . $agent['last_name'];

        $data_agent['subject'] = "Change Document Status | Forign Applicant Management System";
        $data_agent['from'] = "daiki_fams@dai-ki.co.jp";
        $data_agent['to'] = $agent_email;
        $data_agent['to_name'] = $agent_full_name;

        $email_body_agent = "Hi Dear Agent, "
                . "We are glad to inform you that the Application form($application_id) has been moved to $status </p>"
                . "<p>This is a system generated email please do not reply. Thanks</p>"
                . "<hr/>"
                . "<p>エージェント様</p>"
                . "<p>申請書 ($application_id) が $status </p>"
                . "<p>に変更されたことをお知らせいたします。これはシステムによって自動生成されたメールです。返信しないでください。</p>";

        $data_agent['content'] = $email_body_agent;
        $email_template = $this->load->view('email/application_review_mail_to_agent', $data_agent, TRUE);
        $this->send_smtp_mail($email_template, $data_agent['subject'], $data_agent['to'], $data_agent['from'], 'content');


        // Domestic       

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('role_id', 2);
        $domestic = $this->db->get();

        foreach ($domestic->result_array() as $key => $user) {
            $domestic_user_email = $user['email'];
            //if ($domestic_user_email != 'n-kondo@dai-ki.co.jp') {
            $domestic_user_name = $user['first_name'] . '' . $user['last_name'];
            $email_body_domestic_user = "<p>Hi Domestic user,</p>"
                    . "<p> Thanks for updating the Application form($application_id) status to ($status). System will notify to agent about the status. </p>"
                    . "<p>This is an system generated email. Please do not reply. Thanks</p>"
                    . "<hr/>"
                    . "<p>入管申請者各位</p>"
                    . "<p>申請書 ($application_id) のステータスを ($status) に更新していただきありがとうございます。</p>"
                    . "<p>システムは申請書のステータスをエージェントに通知します。</p>"
                    . "<p>これはシステムによって自動生成されたメールですので、返信しないでください。</p>";


            $data_domestic['subject'] = "Upload New Document | Forign Applicant Management System";
            $data_domestic['from'] = "daiki_fams@dai-ki.co.jp";
            $data_domestic['to'] = $domestic_user_email;
            $data_domestic['to_name'] = $domestic_user_name;
            $data_domestic['content'] = $email_body_domestic_user;

            //DELEETE 
            //echo $email_body_domestic_user;
            // ;
//echo $email_body_domestic;

            $email_template = $this->load->view('email/application_review_mail_to_domestic_user', $data_domestic, TRUE);
            $this->send_smtp_mail($email_template, $data_domestic['subject'], $data_domestic['to'], $data_domestic['from'], 'content');
            //}
        }
    }

    public function document_review_mail() {
//Inpu       
        $comment = $this->input->post('doc_comment');
        $new_status = $this->input->post('doc_status');
        $document_name = $this->input->post('document_name');
        $document_type = $this->input->post('document_type');
        $application_id = $this->input->post('application');
        $student_id = $this->input->post('student');

        $student = $this->db->get_where('student', array('id' => $student_id))->row_array();
        $agent_id = $student['created_by'];
//$student_name = $student['kanji_fn'].' '.$student['kanji_ln'];

        $agent = $this->db->get_where('users', array('id' => $agent_id))->row_array();
        $agent_email = $agent['email'];
        $agent_full_name = $agent['first_name'] . ' ' . $agent['last_name'];

        $data_agent['subject'] = "Change Document Status | Forign Applicant Management System";
        $data_agent['from'] = "daiki_fams@dai-ki.co.jp";
        $data_agent['to'] = $agent_email;
        $data_agent['to_name'] = $agent_full_name;

        $email_body_agent = "<p>Hi Dear Agent</p>"
                . "<p>Your Application Documentation ($document_name) ($document_type)  for the ($application_id) has been reviewed by the domestic user. "
                . "Your document has bee changed to  $new_status status with the comment bellow. </p>"
                . "$comment"
                . "<p>This is an system generated email. Please do not reply. Thanks</p>"
                . "<br/>"
                . "<hr/>"
                . "<p>エージェント様</p>"
                . "<p>（$application_id）の申請書類（$document_name）（$document_type）が申請代行者により審査されました。"
                . " 申請書は、以下のコメントとともに <ステータス名) ステータスに変更されました。 </p>"
                . "<p>（$comment）</p>"
                . "これはシステムが自動生成したメールです。 返信しないでください。";

        $data_agent['content'] = $email_body_agent;
        $email_template = $this->load->view('email/document_review_mail_to_agent', $data_agent, TRUE);
        $this->send_smtp_mail($email_template, $data_agent['subject'], $data_agent['to'], $data_agent['from'], 'content');

        // Domestic       

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('role_id', 2);
        $domestic = $this->db->get();

        foreach ($domestic->result_array() as $key => $user) {
            $domestic_user_email = $user['email'];
            //if ($domestic_user_email != 'n-kondo@dai-ki.co.jp') {
            $domestic_user_name = $user['first_name'] . '' . $user['last_name'];
            $email_body_domestic_user = "<p>Hi Domestic user,</p>"
                    . "<p> Thanks for reviewing the document ($document_name , $document_type) on Applicantion No $application_id "
                    . " The system will notify the agent about youre feedback. </p>"
                    . "<p>This is an system generated email. Please do not reply. Thanks</p>"
                    . "<hr/>"
                    . "<p>申請代行者各位</p>"
                    . "<p>申請番号 ($application_id) の文書 ($document_name , $document_type) をご確認いただきありがとうございます。</p>"
                    . "<p>システムはあなたのフィードバック内容をエージェントに通知します。</p>"
                    . "<p>これはシステムによって自動生成されたメールです。 </p>"
                    . "<p>返信しないでください。</p>";

            $data_domestic['subject'] = "Upload New Document | Forign Applicant Management System";
            $data_domestic['from'] = "daiki_fams@dai-ki.co.jp";
            $data_domestic['to'] = $domestic_user_email;
            $data_domestic['to_name'] = $domestic_user_name;
            $data_domestic['content'] = $email_body_domestic_user;

            //DELEETE 
            //echo $email_body_domestic_user;
            // ;
//echo $email_body_domestic;

            $email_template = $this->load->view('email/document_review_mail_to_domestic_user', $data_domestic, TRUE);
            $this->send_smtp_mail($email_template, $data_domestic['subject'], $data_domestic['to'], $data_domestic['from'], 'content');
            //}
        }
    }

    function password_reset_email($verification_code = '', $email = '') {
        $query = $this->db->get_where('users', array('email' => $email));
        if ($query->num_rows() > 0) {
            $email_data['subject'] = "Password reset request";
            $email_data['from'] = get_settings('system_email');
            $email_data['to'] = $email;
            $email_data['to_name'] = $query->row('first_name') . ' ' . $query->row('last_name');

            $email_data['message'] = 'You have requested a change of password from ' . get_settings('system_name') . '. Please change your new password from this link : <b style="cursor: pointer;
"><u>' . site_url('home/verification_code/') . $verification_code . '</u></b><br><br><p>Please use this link in under 15 minutes.</p>';
            $email_template = $this->load->view('email/common_template', $email_data, TRUE);
            $this->send_smtp_mail($email_template, $email_data['subject'], $email_data['to'], $email_data['from']);
            return true;
        } else {
            return false;
        }
    }

    public function send_email_domestic_user($to = "", $verification_code = "") {
        $to_name = $this->db->get_where('users', array('email' => $to))->row_array();

        $email_data['subject'] = "国内ユーザーアカウントの作成｜外国人申請者管理システム";
        $email_data['from'] = "daiki_fams@dai-ki.co.jp"; //get_settings('system_email');
        $email_data['to'] = $to;
        $email_data['to_name'] = $to_name['first_name'] . ' ' . $to_name['last_name'];
        $email_data['verification_code'] = $verification_code;

        $email_template = $this->load->view('email/email_verification_domestic', $email_data, TRUE);
        $this->send_smtp_mail($email_template, $email_data['subject'], $email_data['to'], $email_data['from'], 'verification');
    }

    public function send_email_verification_mail($to = "", $verification_code = "") {
        $to_name = $this->db->get_where('users', array('email' => $to))->row_array();

        $email_data['subject'] = "Activate your Portal | Forign Applicant Management System";
        $email_data['from'] = "daiki_fams@dai-ki.co.jp";
        $email_data['to'] = $to;
        $email_data['to_name'] = $to_name['first_name'] . ' ' . $to_name['last_name'];
        $email_data['verification_code'] = $verification_code;

        $email_template = $this->load->view('email/email_verification_agent', $email_data, TRUE);
        $this->send_smtp_mail($email_template, $email_data['subject'], $email_data['to'], $email_data['from'], 'verification');
    }

    public function create_new_application_mail_by_agent($last_id) {

//Agent 
//Input
        $student_id = $this->input->post('student_id');

//       
        $to_student = $this->db->get_where('student', array('id' => $student_id))->row_array();
        $agent = $to_student['created_by'];
        $student = $to_student['kanji_fn'] . '' . $to_student['kanji_ln'];

        $to_agent = $this->db->get_where('users', array('id' => $agent))->row_array();
        $to_agent_mail = $to_agent['email'];
        $to_agent_id = "AGN" . $to_agent['id'];
        $to_agent_name = $to_agent['first_name'] . ' ' . $to_agent['last_name'];

        $data_agent['subject'] = "Create New Application | Forign Applicant Management System";
        $data_agent['from'] = "daiki_fams@dai-ki.co.jp";
        $data_agent['to'] = $to_agent_mail;
        $data_agent['to_name'] = $to_agent_name;


        $email_body_agent = "<p>Hi Dear Agent,</p>"
                . "<p>We are glad to inform that the Application form (" . $last_id . ") has been created successfully & domestic users able to view your application form.  "
                . "  Now you can upload the documentations to the FAMS system and the system will notify domestic your to review the application form "
                . "<p>This is an system generated email. Please do not reply. Thanks</p>"
                . "<hr/>"
                . "<p>エージェント様へ</p>"
                . "申請書 (" . $last_id . ") が正常に作成され、国内ユーザーが申請書を参照できるようになった事をお知らせいたします。"
                . " これで、申請書をアップロードできるようになり、システムは国内ユーザーに申請書を審査するよう連絡します。"
                . "</p>"
                . "<p>これはシステムによって生成されたメールです。 返信しないでください。 ありがとう</p>";


        //DELETE
        // echo $email_body_agent;

        $data_agent['content'] = $email_body_agent;


        //OPEN
        $email_template = $this->load->view('email/new_application_email_to_agent', $data_agent, TRUE);
        $this->send_smtp_mail($email_template, $data_agent['subject'], $data_agent['to'], $data_agent['from'], 'content');
// Domestic       

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('role_id', 2);
        $domestic = $this->db->get();

        foreach ($domestic->result_array() as $key => $user) {
            $domestic_user_email = $user['email'];
            //if ($domestic_user_email != 'n-kondo@dai-ki.co.jp') {
            $domestic_user_name = $user['first_name'] . '' . $user['last_name'];
            $email_body_domestic_user = "<p>Hi Domestic User</p>"
                    . "<p> We are glad to inform that Agent (Aget ID $to_agent_id)($to_agent_name)"
                    . "inform that Agent $to_agent_name (Aget No $to_agent_id) has been created Application form $last_id for $student."
                    . "You are able to check the application form via https://daiki.training/user/student_application_domestic/view/$last_id "
                    . "by login to your domestic user accout.The system will notify to domestic user when the agent uploaded the documents to the FAMS system. </p>"
                    . "<p>Please note that this is system generated email and do not reply to this email. Thanks</p>"
                    . "<hr/>"
                    . "<p>入管申請者各位</p>"
                    . "<p>エージェント (エージェント ID $to_agent_id)($to_agent_name) が <$student> の申請書 <$last_id > として作成されたことをお知らせいたします。"
                    . "ユーザーアカウントでログインすると、( https://daiki.training/user/student_application_domestic/view/$last_id ）から申請書を確認することができます。エージェントがシステムに書類をアップロードすると、システムから申請代行者へ自動通知されます。</p>"
                    . "<p>これはシステムによって生成されたメールですので、このメールには返信しないでください。  </p>";

            $data_domestic['subject'] = "Upload New Document | Forign Applicant Management System";
            $data_domestic['from'] = "daiki_fams@dai-ki.co.jp";
            $data_domestic['to'] = $domestic_user_email;
            $data_domestic['to_name'] = $domestic_user_name;
            $data_domestic['content'] = $email_body_domestic_user;

            //DELEETE 
            //echo $email_body_domestic_user;
            // ;
//echo $email_body_domestic;

            $email_template = $this->load->view('email/new_application_email_to_domestic_user', $data_domestic, TRUE);
            $this->send_smtp_mail($email_template, $data_domestic['subject'], $data_domestic['to'], $data_domestic['from'], 'content');
            //}
        }
    }

    public function document_type_detail($doc) {


        switch ($doc) {
            case 'doc1':
                $doc_type_name = '(1)Application for Admission';
                break;
            case 'doc2':
                $doc_type_name = '(2) Resume';
                break;
            case 'doc3':
                $doc_type_name = '(3) Statement of Purpose';
                break;
            case 'doc4':
                $doc_type_name = '(4) Document for Sponsorship';
                break;
            case 'doc5':
                $doc_type_name = '(5) List of Family Members of the Sponsor';
                break;
            case 'doc6':
                $doc_type_name = '(6) Graduation Certificate of the Latest Education';
                break;
            case 'doc7':
                $doc_type_name = '(7) Enrollment Certificate';
                break;
            case 'doc8':
                $doc_type_name = '(8) Transcript of the Latest Education';
                break;
            case 'doc9':
                $doc_type_name = '(9) Certificate of JP Learning from JP School';
                break;
            case 'doc10':
                $doc_type_name = '(10) Pass Certificate of JP Language Test';
                break;
            case 'doc11':
                $doc_type_name = '(11) Copy of Passport(Applicant)';
                break;
            case 'doc12':
                $doc_type_name = '(12) Copy of ID card(Applicant)';
                break;
            case 'doc13':
                $doc_type_name = '(13) Birth Certificate(Applicant)';
                break;
            case 'doc14':
                $doc_type_name = '(14) Certificate of Relationship';
                break;
            case 'doc15':
                $doc_type_name = '(15) Copy of ID card(Sponsor)';
                break;
            case 'doc16':
                $doc_type_name = '(16) Deposit Balance Certificate(Sponsor)';
                break;
            case 'doc17':
                $doc_type_name = '(17) Certificate of occupation(Sponsor)';
                break;
            case 'doc18':
                $doc_type_name = '(18) Copy of Bank Book';
                break;
            case 'doc19':
                $doc_type_name = '(19) Income Certificate（Sponsor/3yaers）(Sponsor)';
                break;
            case 'doc20':
                $doc_type_name = '(20) Tax Certificate（Sponsor/3yaers）(Sponsor)';
                break;
            case 'doc21':
                $doc_type_name = '(21) Certificate of Incumbency(Applicant)';
                break;
            case 'doc22':
                $doc_type_name = '(22) Certificate of Residence or substitute for address verification(Applicant)';
                break;
            case 'doc23':
                $doc_type_name = '(23) Certificate of Residence or substitute documents(Sponsor)';
                break;
            case 'doc24':
                $doc_type_name = '(24) Reason of Re-apply';
                break;
            case 'doc25':
                $doc_type_name = '(25) Explanation of the Asset Formation Process(if needed/3years)';
                break;
            case 'doc26':
                $doc_type_name = '(26) Business License (in case of individual business owner)';
                break;
            
                return $doc_type_name;
        }
    }

    public function upload_new_document_mail($file_name) {
//Input
        $student_id = $this->input->post('student_id');
        $document = $this->input->post('material_type'); // doc1,doc2,..etc
        $document_type = $this->input->post('document_type'); // Original or Translated
        $applicaton_id = $this->input->post('app_id');

        $document_type_name = $this->document_type_detail($doc);

        $student = $this->db->get_where('student', array('id' => $student_id))->row_array();
        $agent_id = $student['created_by'];
        $student_name = $student['kanji_fn'] . ' ' . $student['kanji_ln'];

        $agent = $this->db->get_where('users', array('id' => $agent_id))->row_array();
        $agent_email = $agent['email'];
        $agent_full_name = $agent['first_name'] . ' ' . $agent['last_name'];

        $data_agent['subject'] = "Upload New Document | Forign Applicant Management System";
        $data_agent['from'] = "daiki_fams@dai-ki.co.jp";
        $data_agent['to'] = $agent_email;
        $data_agent['to_name'] = $agent_full_name;

        $email_body_agent = "<p>Hi Dear Agent</p>"
                . "<p> The  $document_type_name  has been succefully uploded to $applicaton_id. "
                . "The system will be notify Domestic User to review your document. </p>"
                . "<p>This is an system generated email. Please do not reply. Thanks</p>"
                . "<hr/>"
                . "<p>エージェント様へ </p>"
                . "<p><$document_type_name> は <$applicaton_id.> に正常にアップロードされました。 システムは申請代行者に文書を確認するよう自動通知します。</p>"
                . "<p>これはシステムによって生成されたメールです。 返信しないでください。</p>";

        $data_agent['content'] = $email_body_agent;

        $email_template = $this->load->view('email/upload_new_document_mail_to_agent', $data_agent, TRUE);
        //$email_template = $this->load->view('email/create_new_doc_email_agent', $data_agent, TRUE);
        $this->send_smtp_mail($email_template, $data_agent['subject'], $data_agent['to'], $data_agent['from'], 'content');

        // Domestic
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('role_id', 2);
        $domestic = $this->db->get();

        foreach ($domestic->result_array() as $key => $user) {
            $domestic_user_email = $user['email'];
            $domestic_user_name = $user['first_name'] . '' . $user['last_name'];
            $email_body_domestic_user = "<p>Dear Domestic User,</P>"
                    . "<p>We are glad to inform that Document $document - $document_type "
                    . "has been uploded by ($agent_full_name, $agent_id "
                    . " for Application form (Application ID: Applicant Name). Now you are able to review the document via "
                    . "your domestic user account. </p>"
                    . "<p> Document Review Link (<a href='student_materials_domestic/view/$student_id/$applicaton_id'>Document Review Link</a>)  </p> "
                    . "<p>Please note that this is system generated email and do not reply to this email. Thanks</p>"
                    . "<hr/>"
                    . "<br>"
                    . "<p>国内ユーザー様 <br>申請者 $student_name の書類($file_name) が、代理人 $agent_full_name により申請 ID $student_id の書類としてアップロードされました。</p>"
                    . "<p>以下のリンクから、国内ユーザーアカウントを使って書類を確認することができます：</p>"
                    . "ドキュメントレビューリンク (<a href='student_materials_domestic/view/$student_id/$applicaton_id'>Document Review Link</a>))<br>ありがとうございました。"
                    . "<small>これはシステムによって生成されたメールです。返信しないでください。</small>";

            $data_domestic['subject'] = "Upload New Document / 新規文書のアップロード｜FAMS";
            $data_domestic['from'] = "daiki_fams@dai-ki.co.jp";
            $data_domestic['to'] = $domestic_user_email;
            $data_domestic['to_name'] = $domestic_user_name;
            $data_domestic['content'] = $email_body_domestic_user;

            //echo $email_body_domestic;

            $email_template = $this->load->view('email/upload_new_document_mail_to_domestic_user', $data_domestic, TRUE);
            $this->send_smtp_mail($email_template, $data_domestic['subject'], $data_domestic['to'], $data_domestic['from'], 'content');
        }
    }

    public function re_upload_document_mail($file_name) {
//Input
        $student_id = $this->input->post('student_id');
        $document = $this->input->post('material_type');
        $document_type = $this->input->post('document_type');
        $applicaton_id = $this->input->post('app_id');
//

        $student = $this->db->get_where('student', array('id' => $student_id))->row_array();
        $agent_id = $student['created_by'];
        $student_name = $student['kanji_fn'] . ' ' . $student['kanji_ln'];

        $agent = $this->db->get_where('users', array('id' => $agent_id))->row_array();
        $agent_email = $agent['email'];
        $agent_full_name = $agent['first_name'] . ' ' . $agent['last_name'];

        $data_agent['subject'] = "Upload New Document | Forign Applicant Management System";
        $data_agent['from'] = "daiki_fams@dai-ki.co.jp";
        $data_agent['to'] = $agent_email;
        $data_agent['to_name'] = $agent_full_name;

        $email_body_agent = "<p>Hi Dear Agent, </p>"
                . "<p> The $document has been succefully Re-uploded to $applicaton_id. "
                . "The system will be notify Domestic User to review this document. Please note that the old document will "
                . "be removed from the system as the system keep this document as the last version.  </p>"
                . "<p> This is an system generated email. Please do not reply. Thanks </p>"
                . "<hr/>"
                . "<p>エージェント様</p>"
                . "<p>$document は ($applicaton_id) に正常に再アップロードされました。 システムは申請代行者にこの文書を確認するよう連絡します。</p>"
                . "<p>システムはこのドキュメントを最新バージョンとして保持するため、古いドキュメントはシステムから削除されることに注意してください。</p>"
                . "<p>これはシステムによって自動生成されたメールです。 返信しないでください。 </p>";

        $data_agent['content'] = $email_body_agent;
        $email_template = $this->load->view('email/re_upload_new_document_mail_to_agent', $data_agent, TRUE);
        $this->send_smtp_mail($email_template, $data_agent['subject'], $data_agent['to'], $data_agent['from'], 'content');
// Domestic
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('role_id', 2);
        $domestic = $this->db->get();

        foreach ($domestic->result_array() as $key => $user) {
            $domestic_user_email = $user['email'];
            $domestic_user_name = $user['first_name'] . '' . $user['last_name'];
            $email_body_domestic_user = "<p>Hi Domestic User,</p>"
                    . "<p>We are glad to inform that Document $document . $document_type"
                    . "has been -Re-uploded by ($agent_full_name and the $agent_id) for Application form ($applicaton_id: $student_name)."
                    . "Now you are able to review the document via your domestic user account. </p>"
                    . "<p>Document Review Link (<a href='https://daiki.training/uploads/student_materials_domestic/view/$student_id/$applicaton_id') </p>"
                    . "<p>Please note that this is system generated email and do not reply to this email. Thanks </p>"
                    . "<hr/>"
                    . "<p>入管申請者各位</p>"
                    . "<p>申請書（$applicaton_id: $student_name）の書類（$document）<（$document_type）が（$agent_full_name,$agent_id）により再アップロードされましたのでお知らせいたします。"
                    . " これで、申請代行者のユーザー アカウントを介して文書を確認できるようになりました。</p>"
                    . "<p>Document Review Link (<a href='https://daiki.training/uploads/student_materials_domestic/view/$student_id/$applicaton_id')</p>"
                    . "<p>これはシステムによって自動生成されたメールですので、このメールには返信しないでください。<p>";

            $data_domestic['subject'] = "Upload New Document | Forign Applicant Management System";
            $data_domestic['from'] = "daiki_fams@dai-ki.co.jp";
            $data_domestic['to'] = $domestic_user_email;
            $data_domestic['to_name'] = $domestic_user_name;
            $data_domestic['content'] = $email_body_domestic_user;

//echo $email_body_domestic;

            $email_template = $this->load->view('email/re_upload_new_document_mail_to_domestic_user', $data_domestic, TRUE);
            $this->send_smtp_mail($email_template, $data_domestic['subject'], $data_domestic['to'], $data_domestic['from'], 'content');
        }
    }

    public function send_smtp_mail($msg = NULL, $sub = NULL, $to = NULL, $from = NULL, $email_type = NULL, $verification_code = null) {
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
        $mail->addAddress($to, 'Foreign Applicant Management System');     //Add a recipient

        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $sub;
        $mail->Body = $msg;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->CharSet = 'utf-8';
        $mail->send();
    }

}

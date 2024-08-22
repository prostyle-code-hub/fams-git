<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
        /* cache control */
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    public function user_data($user_id) {
        $this->db->where('id', $user_id);
        return $this->db->get('users')->row_array();
    }

    public function get_admin_details() {
        return $this->db->get_where('users', array('role_id' => 1));
    }

    public function get_student() {
        $this->db->where('created_by', $this->session->userdata('user_id'));
        return $this->db->get('student');
    }

    public function delete_student($student_id) {
        $this->db->where('id', $student_id);
        $this->db->delete('student');
    }

    public function get_student_data($student_id) {
        $this->db->where('id', $student_id);
        return $this->db->get('student')->row();
    }

    public function delete_student_application($student_id) {
        $this->db->where('student_id', $student_id);
        $this->db->delete('student_details');


        $status['application'] = 0;
        $this->db->where('id', $student_id);
        $this->db->update('student', $status);
    }

    public function get_single_student($student_id) {

        $this->db->where('id', $student_id);
        return $this->db->get('student');
    }

    public function non_registed_students() {

        $this->db->where('created_by', $this->session->userdata('user_id'));
        $this->db->where('application', 0);
        return $this->db->get('student');
    }

    public function get_user($user_id = 0) {
        if ($user_id > 0) {
            $this->db->where('id', $user_id);
        }
        $this->db->where('role_id', 3);
        return $this->db->get('users');
    }

    public function get_domestic($user_id = 0) {
        $this->db->where('role_id', 2);
        return $this->db->get('users');
    }

    public function get_studentdata($student_id) {
        $this->db->where('id', $student_id);
        return $this->db->get('student')->row_array();
    }

    public function get_all_user($user_id = 0) {
        if ($user_id > 0) {
            $this->db->where('id', $user_id);
        }
        return $this->db->get('users');
    }

    // APP

    public function student_application_edit($student_id) {

        $this->db->select('* , student_details.id as app_id , student_details.status as app_status');
        $this->db->from('student_details');
        $this->db->join('student', 'student.id = student_details.student_id', 'left');
        $this->db->where('student_details.student_id', $student_id);
        return $this->db->get();
    }

    public function get_agent_by_student_id($student_id) {

        $this->db->where('id', $student_id);
        $student_data = $this->db->get('student')->row_array();

        $agent_id = $student_data['created_by'];

        $this->db->where('id', $agent_id);
        $agent_data = $this->db->get('users')->row_array();
        return $agent_data['first_name'] . ' ' . $agent_data['last_name'];
    }

    public function document_count($student_id = "") {
        
        if($student_id != ""){
           $this->db->where('student_id', $student_id);  
        }
               
        $query = $this->db->get('material');

        if ($query->num_rows() >= 1) {
            return 1;
        } else {
            return 0;
        }
    }

    public function travel_data($student_id) {
        $this->db->where('student_id', $student_id);
        $value = $this->db->get('student_details')->row_array();
        $application_id = $value['id'];

        $this->db->where('application_id', $application_id);
        return $this->db->get('applicant_travel_record');
    }

    public function student_application_list() {

        $user_id = $this->session->userdata('user_id');

//        $this->db->select('*,student_details.status as app_status');
//        $this->db->from('student_details');
//        $this->db->join('student', 'student.id = student_details.student_id', 'left');
//        $this->db->where('student_details.created_by', $user_id);
//        return $this->db->get();

        $this->db->select('student.id,student_details.id as app_id,student.kanji_fn,student.kanji_ln,student_details.created_at, ,student_details.status as app_status');
        $this->db->from('student_details');
        $this->db->join('student', 'student.id = student_details.student_id', 'left');
        $this->db->where('student_details.created_by', $user_id);
        return $this->db->get();
    }

    public function get_student_detail($student_id) {
        $this->db->where('id', $student_id);
        return $this->db->get('student')->row_array();
    }

    public function get_student_info($student_id) {
        $this->db->select('student_details.application_place,student.id,student.kanji_fn,student.kanji_fn,student.kanji_ln,student_details.id as app_id,student_details.institute_name,student_details.remarks,student_details.status,student_details.nas,student_details.created_at,student_details.dst');
        $this->db->from('student');
        $this->db->join('student_details', 'student_details.student_id = student.id', 'left');
        $this->db->where('student.id', $student_id);
        return $this->db->get();
//        
//        $this->db->where('id', $student_id);
//        return $this->db->get('student');
    }

    public function student_application_list_domestic() {

        //$user_id = $this->session->userdata('user_id');

        $this->db->select('student.id,student_details.id as app_id,student_details.nas,student.kanji_fn,student.kanji_ln,student_details.created_at, ,student_details.status as app_status');
        $this->db->from('student_details');
        $this->db->join('student', 'student.id = student_details.student_id', 'left');
        return $this->db->get();
    }

    public function immigration_information_add() {

        $file_name = time() . $_FILES["copy_of_resident_card"]['name'];

        $config['upload_path'] = './uploads/student_immigration_documents/';
        $config['allowed_types'] = 'pdf';
        $config['file_name'] = $file_name;

        $this->load->library('upload', $config);
        $this->upload->do_upload('copy_of_resident_card');


        $data['entry_date'] = $this->input->post('entry_date');
        $data['period_of_stay'] = $this->input->post('period_of_stay');
        $data['japan_address'] = $this->input->post('japan_address');
        $data['contact_in_person'] = $this->input->post('contact_in_person');
        $data['copy_of_resident_card'] = $file_name;


        $this->db->where('student_id', $this->input->post('student_id'));
        $this->db->update('student_details', $data);
    }

    public function student_details_add() {


        // input section 1
        $data['student_id'] = $this->input->post('student_id');

        $data['kanji_fn'] = $this->input->post('kanji_fn');
        $data['romaji_fn'] = $this->input->post('romaji_fn');

        $data['passport'] = $this->input->post('passport');
        $data['dst'] = $this->input->post('dst');

        $data['application_place'] = $this->input->post('application_place');
        $data['situation'] = $this->input->post('situation');
        $data['residence_ststus'] = $this->input->post('residence_ststus');

        $data['residence_no'] = $this->input->post('residence_no');

        $data['stay_period'] = $this->input->post('stay_period');
        $data['relationship'] = $this->input->post('relationship');

        $data['relatives_name'] = $this->input->post('relatives_name');

        $data['relatives_address'] = $this->input->post('relatives_address');
        $data['relatives_dob'] = $this->input->post('relatives_dob');

        $data['residence'] = $this->input->post('residence');

        $data['contact'] = $this->input->post('contact');

        $data['residence_status'] = $this->input->post('residence_status');
        $data['residence_card'] = $this->input->post('residence_card');

        $data['contact_rr_phone'] = $this->input->post('contact_rr_phone');
        $data['contact_work'] = $this->input->post('contact_work');
        $data['contact_school'] = $this->input->post('contact_school');
        $data['residence_charge_history'] = $this->input->post('residence_charge_history');
        $data['no_of_applicant'] = $this->input->post('no_of_applicant');
        $data['no_of_time_granted'] = $this->input->post('no_of_time_granted');
        $data['institute_name'] = $this->input->post('institute_name');

        $data['location'] = $this->input->post('location');
        $data['studiedhours'] = $this->input->post('studiedhours');
        $data['enteredday'] = $this->input->post('enteredday');
        $data['gradutionday'] = $this->input->post('gradutionday');

        /* $data['residencesta'] = "d"; // $this->input->post('residencesta');
          $data['rcardno'] = "3"; // $this->input->post('rcardno');
          $data['purpose'] = "asdfa"; //$this->input->post('purpose');
          $data['dateofentry'] = ""; //$this->input->post('dateofentry');
          $data['dateofdeparture'] = ""; //$this->input->post('dateofdeparture');
         */
        $data['examname'] = $this->input->post('examname');
        $data['grade'] = $this->input->post('grade');
        $data['results'] = $this->input->post('results');
        $data['examdate'] = $this->input->post('examdate');
        $data['marks'] = $this->input->post('marks');
        $data['credential#1'] = $this->input->post('credential#1');
        $data['credential#2'] = $this->input->post('credential#2');
        $data['criminalrecords'] = $this->input->post('criminalrecords');
        $data['departure_date'] = $this->input->post('departure_date');
        $data['departure_time'] = $this->input->post('departure_time');
        $data['departure_no'] = $this->input->post('departure_no');

        //input secton 2
        $data['created_by'] = $this->session->userdata('user_id');
        $data['created_at'] = date("Y-m-d");

        $this->db->insert('student_details', $data);

        // Add travel recodes
        $last_id = $this->db->insert_id();

        $travel_count = 0;
        while ($travel_count <= 5) {
            $residencesta = $this->input->post('residencesta'); // residence_status
            $travel['residencesta'] = $residencesta[$travel_count];

            if ($residencesta[$travel_count] != "") {
                $rcardno = $this->input->post('rcardno'); // residence_card_no
                $travel['rcardno'] = $rcardno[$travel_count];

                $purpose = $this->input->post('purpose'); // travel_purpose
                $travel['purpose'] = $purpose[$travel_count];

                $dateofentry = $this->input->post('dateofentry'); // entry_date
                $travel['dateofentry'] = $dateofentry[$travel_count];

                $dateofdeparture = $this->input->post('dateofdeparture'); // departure_date
                $travel['dateofdeparture'] = $dateofdeparture[$travel_count];

                $travel['application_id'] = $last_id;

                $this->db->insert('applicant_travel_record', $travel);
            }
            $travel_count++;
        }

        $student_id = $this->input->post('student_id');
        $status['application'] = 1;
        $this->db->where('id', $student_id);
        $this->db->update('student', $status);
    }

    public function family_data($student_id) {
//        $this->db->where('student_id', $student_id);
//        $value = $this->db->get('student_details')->row_array();      
//        $application_id = $value['id'];     

        $this->db->where('student_id', $student_id);
        return $this->db->get('student_family_record');
    }

    public function add_studentinfor() {

        // input section 1
        $data['sid'] = html_escape($this->input->post('sid'));
        $data['kanji_fn'] = html_escape($this->input->post('kanji_fn'));

        $data['romaji_fn'] = html_escape($this->input->post('romaji_fn'));
        $data['passport'] = html_escape($this->input->post('passport'));

        $data['passport_exp'] = html_escape($this->input->post('passport_exp'));
        $data['dst'] = html_escape($this->input->post('dst'));

        $data['applicationplace'] = html_escape($this->input->post('applicationplace'));

        $data['situation'] = html_escape($this->input->post('situation'));
        $data['residenceststus'] = html_escape($this->input->post('residenceststus'));

        $data['residenceno'] = html_escape($this->input->post('residenceno'));

        $data['periodofstay'] = html_escape($this->input->post('periodofstay'));
        $data['relationship'] = html_escape($this->input->post('relationship'));

        $data['name'] = html_escape($this->input->post('name'));

        $data['address'] = html_escape($this->input->post('address'));
        $data['dob'] = html_escape($this->input->post('dob'));

        $data['residence'] = html_escape($this->input->post('residence'));

        $data['contact'] = html_escape($this->input->post('contact'));
        $data['rstatus'] = html_escape($this->input->post('rstatus'));
        $data['rcd'] = html_escape($this->input->post('rcd'));
        $data['contactrr_phone'] = html_escape($this->input->post('contactrr_phone'));
        $data['contact_work'] = html_escape($this->input->post('contact_work'));
        $data['contact_school'] = html_escape($this->input->post('contact_school'));
        $data['residencechargehistory'] = html_escape($this->input->post('residencechargehistory'));
        $data['no_ofapplicant'] = html_escape($this->input->post('no_ofapplicant'));
        $data['no_oftimegranted'] = html_escape($this->input->post('no_oftimegranted'));
        $data['institutename'] = html_escape($this->input->post('institutename'));
        $data['location'] = html_escape($this->input->post('location'));
        $data['studiedhours'] = html_escape($this->input->post('studiedhours'));
        $data['enteredday'] = html_escape($this->input->post('enteredday'));
        $data['gradutionday'] = html_escape($this->input->post('gradutionday'));
        $data['residencesta'] = html_escape($this->input->post('residencesta'));
        $data['rcardno'] = html_escape($this->input->post('rcardno'));
        $data['purpose'] = html_escape($this->input->post('purpose'));
        $data['dateofentry'] = html_escape($this->input->post('dateofentry'));
        $data['dateofdeparture'] = html_escape($this->input->post('dateofdeparture'));
        $data['examname'] = html_escape($this->input->post('examname'));
        $data['grade'] = html_escape($this->input->post('grade'));
        $data['results'] = html_escape($this->input->post('results'));
        $data['examdate'] = html_escape($this->input->post('examdate'));
        $data['marks'] = html_escape($this->input->post('marks'));
        $data['credential#1'] = html_escape($this->input->post('credential#1'));
        $data['credential#2'] = html_escape($this->input->post('credential#2'));
        $data['criminalrecords'] = html_escape($this->input->post('criminalrecords'));
        $data['departureorder'] = html_escape($this->input->post('departureorder'));

        //input secton 2
        $data['created_by'] = $this->session->userdata('user_id');
        $data['created_at'] = date("Y-m-d");

        // print_r($data); exit();

        $this->db->insert('add_studentinfor', $data);
        // if ($this->db->error()) {
        //     print_r($this->db->error());
        // }
    }

    public function get_applicantlist() {

        $this->db->select('add_studentinfor.sid,add_studentinfor.kanji_fn, add_studentinfor.romaji_fn,add_studentinfor.location');
        $this->db->from('add_studentinfor');
        return $this->db->get();
    }

    public function update_rule_log() {
        $data['rule_updated_date'] = date("Y-m-d");
        $this->db->insert('school_rule_log', $data);
    }

    public function delete_rule($id) {
        $this->db->where('id', $id);
        $this->db->delete('school_rule');

        // reset agent status 
        //$this->db->insert('school_rule', $slide_data);
		
		/*// Disabled school rule rest function
        $this->db->set('read_rule', '0');
        $this->db->update('agents');*/
    }

    public function get_studentapplicantlistdata($student_id) {
        $this->db->select('*');
        $this->db->from('add_studentinfor');
        $this->db->join('immigration_info', 'add_studentinfor.sid = immigration_info.sid', 'left');
        $this->db->where('add_studentinfor.sid', $student_id);

        return $this->db->get()->row_array();
    }

    public function add_user($is_instructor = false, $is_admin = false) {
        $validity = $this->check_duplication('on_create', $this->input->post('email'));
        if ($validity == false) {
            $this->session->set_flashdata('error_message', get_phrase('email_duplication'));
        } else {
            $data['first_name'] = html_escape($this->input->post('first_name'));
            $data['last_name'] = html_escape($this->input->post('last_name'));
            $data['email'] = html_escape($this->input->post('email'));
            $data['password'] = sha1(html_escape($this->input->post('password')));
            $social_link['facebook'] = html_escape($this->input->post('facebook_link'));
            $social_link['twitter'] = html_escape($this->input->post('twitter_link'));
            $social_link['linkedin'] = html_escape($this->input->post('linkedin_link'));
            $data['social_links'] = json_encode($social_link);
            $data['biography'] = $this->input->post('biography');

            if ($is_admin) {
                $data['role_id'] = 1;
                $data['is_instructor'] = 1;
            } else {
                $data['role_id'] = 2;
            }

            $data['date_added'] = strtotime(date("Y-m-d H:i:s"));
            $data['wishlist'] = json_encode(array());
            $data['watch_history'] = json_encode(array());
            $data['status'] = 1;
            $data['image'] = md5(rand(10000, 10000000));

            // Add paypal keys
            $payment_keys = array();

            $paypal['production_client_id'] = html_escape($this->input->post('paypal_client_id'));
            $paypal['production_secret_key'] = html_escape($this->input->post('paypal_secret_key'));
            $payment_keys['paypal'] = $paypal;

            // Add Stripe keys
            $stripe['public_live_key'] = html_escape($this->input->post('stripe_public_key'));
            $stripe['secret_live_key'] = html_escape($this->input->post('stripe_secret_key'));
            $payment_keys['stripe'] = $stripe;

            // Add razorpay keys
            $razorpay['key_id'] = html_escape($this->input->post('key_id'));
            $razorpay['secret_key'] = html_escape($this->input->post('secret_key'));
            $payment_keys['razorpay'] = $razorpay;

            //All payment keys
            $data['payment_keys'] = json_encode($payment_keys);

            if ($is_instructor) {
                $data['is_instructor'] = 1;
            }

            $this->db->insert('users', $data);
            $user_id = $this->db->insert_id();

            // IF THIS IS A USER THEN INSERT BLANK VALUE IN PERMISSION TABLE AS WELL
            if ($is_admin) {
                $permission_data['admin_id'] = $user_id;
                $permission_data['permissions'] = json_encode(array());
                $this->db->insert('permissions', $permission_data);
            }

            $this->upload_user_image($data['image']);
            $this->session->set_flashdata('flash_message', get_phrase('user_added_successfully'));
        }
    }

    /*
     * Domestic User Section
     */

    public function add_domestic() {
        $created_by = $this->session->userdata('user_id'); //changes

        $agent['first_name'] = $this->input->post('first_name');
        $agent['last_name'] = $this->input->post('last_name');
        $agent['email'] = $this->input->post('email');
        $agent['password'] = sha1($this->input->post('temporary_password'));
        $agent['skype'] = $this->input->post('skype');
        $agent['role_id'] = '2';
        $agent['date_added'] = strtotime(date("Y-m-d H:i:s"));
        $agent['last_modified'] = strtotime(date("Y-m-d H:i:s"));
        $agent['verification_code'] = date("YmdHis");
        $agent['status'] = "1";
        $agent['image'] = "4e9ff6bc036422bac6ee68761dcb6fb4";

        $this->db->insert('users', $agent);
    }

    public function school_rule_pass($agent_id = "") {

        $this->db->where('user_id', $agent_id);
        $this->db->where('read_rule', 1);
        $query = $this->db->get('agents');

        if ($query->num_rows() >= 1) {
            $this->session->set_userdata('rule_pass', '1');
        } else {
            $this->session->set_userdata('rule_pass', '0');
        }
    }

    public function delete_domestic_user($user_id = "") {


        $this->db->where('id', $user_id);
        $this->db->delete('users');

        //$this->session->set_flashdata('flash_message', get_phrase('user_deleted_successfully'));
    }

    public function edit_domestic_user_profile() {

        $domestic_user_id = $this->input->post('domestic_user_id');

        $domestic['first_name'] = $this->input->post('first_name');
        $domestic['last_name'] = $this->input->post('last_name');
        $domestic['email'] = $this->input->post('email');
        $domestic['skype'] = $this->input->post('skype');


        $this->db->where('id', $domestic_user_id);
        $this->db->update('users', $domestic);


        $password = $this->input->post('password');
        if ($password != "") {
            //echo $this->input->post('password')."-".$domestic_user_id; exit();
            $domestic_pw['password'] = sha1($this->input->post('password'));
            $this->db->where('id', $domestic_user_id);
            $this->db->update('users', $domestic_pw);
        }
    }

    /*
     * Agents Section
     */

    public function edit_agent_profile() {


        $agent_id = $this->input->post('agent_id');

        $agent['first_name'] = $this->input->post('first_name');
        $agent['last_name'] = $this->input->post('last_name');
        $agent['email'] = $this->input->post('email');
        $agent['skype'] = $this->input->post('skype');
        $this->db->where('id', $agent_id);
        $this->db->update('users', $agent);


        //-------
        $agent_data['school'] = $this->input->post('school_name');
        $agent_data['representative_name'] = $this->input->post('representative_name');
        $agent_data['country'] = $this->input->post('country');
        $agent_data['address'] = $this->input->post('address');
        $agent_data['phone'] = $this->input->post('phone');
        $this->db->where('user_id', $agent_id);
        $this->db->update('agents', $agent_data);

        //-------
        $password = $this->input->post('password');
        if ($password != "") {
            //echo $this->input->post('password')."-".$domestic_user_id; exit();
            $agent_pw['password'] = sha1($this->input->post('password'));
            $this->db->where('id', $agent_id);
            $this->db->update('users', $agent_pw);
        }
    }

    // get last updated agent id
    public function get_agent_ID() {
        $this->db->select('id');
        $this->db->from('users');
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $last_value = $this->db->get();
        return $last_value;
    }

    public function add_agent($verification_code = "") {
        $created_by = $this->session->userdata('user_id'); //changes

        $agent['first_name'] = $this->input->post('first_name');
        $agent['last_name'] = $this->input->post('last_name');
        $agent['email'] = $this->input->post('email');
        $agent['password'] = sha1($this->input->post('password'));
        $agent['skype'] = $this->input->post('skype');
        $agent['role_id'] = '3'; //$this->input->post('country');
        $agent['date_added'] = strtotime(date("Y-m-d H:i:s"));
        $agent['last_modified'] = strtotime(date("Y-m-d H:i:s"));
        $agent['verification_code'] = $verification_code;
        $agent['status'] = "0";
        $agent['image'] = "4e9ff6bc036422bac6ee68761dcb6fb4";



        $this->db->insert('users', $agent);
        $insert_id = $this->db->insert_id();


        // agent tbl
        $agent_more_info['agent_no'] = $this->input->post('agent_no');
        $agent_more_info['school'] = $this->input->post('school_name');
        $agent_more_info['representative_name'] = $this->input->post('representative_name');
        $agent_more_info['address'] = $this->input->post('address');
        $agent_more_info['phone'] = $this->input->post('phone');
        $agent_more_info['country'] = $this->input->post('country');
        $agent_more_info['created_at'] = $this->input->post('registraion_at');
        $agent_more_info['read_rule'] = "0";
        $agent_more_info['user_id'] = $insert_id;

        $this->db->insert('agents', $agent_more_info);
    }

    public function delete_agent($user_id = "") {

        $this->db->where('id', $user_id);
        $this->db->delete('users');

        $this->db->where('user_id', $user_id);
        $this->db->delete('agents');

        //$this->session->set_flashdata('flash_message', get_phrase('user_deleted_successfully'));
    }

    public function edit_agent() {

        $created_by = $this->session->userdata('user_id'); //changes

        $agent_id = $this->input->post('agent_id');

        $agent['first_name'] = $this->input->post('first_name');
        $agent['last_name'] = $this->input->post('last_name');
        $agent['email'] = $this->input->post('email');
        //$agent['password'] = sha1($this->input->post('password'));
        $agent['skype'] = $this->input->post('skype');
        $agent['image'] = "4e9ff6bc036422bac6ee68761dcb6fb4";

        $this->db->where('id', $agent_id);
        $this->db->update('users', $agent);


        // agent tbl
        $agent_more_info['school'] = $this->input->post('school_name');
        $agent_more_info['representative_name'] = $this->input->post('representative_name');
        $agent_more_info['address'] = $this->input->post('address');
        $agent_more_info['phone'] = $this->input->post('phone');
        $agent_more_info['country'] = $this->input->post('country');

        $this->db->where('user_id', $agent_id);
        $this->db->update('agents', $agent_more_info);
    }

    //Agents list 
    public function basic_agent_data() {
        $this->db->select('users.id,users.image,users.first_name,users.last_name,users.email,agents.phone,users.status,users.id,agents.country,agents.country,agents.agent_no');
        $this->db->from('users');
        $this->db->join('agents', 'agents.user_id = users.id');
        $this->db->where('role_id', 3);
        $this->db->where('status !=', 4);
        return $this->db->get();
    }

    //Agents list 
    public function get_agents() {
        $this->db->select('users.id,users.image,users.first_name,users.last_name,users.status,users.id,agents.country,agents.country,agents.agent_no');
        $this->db->from('users');
        $this->db->join('agents', 'agents.user_id = users.id');
        $this->db->where('role_id', 3);
        $this->db->where('status !=', 4);
        return $this->db->get();
    }

    /* END - AGENTS SECTION */

    public function edit_agent_view($id) {


        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('agents', 'agents.user_id = users.id');
        $this->db->where('users.id', $id);
        return $this->db->get();
    }

    public function edit_domestic_view($id) {

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        return $this->db->get();
    }

    public function add_shortcut_user($is_instructor = false) {
        $validity = $this->check_duplication('on_create', $this->input->post('email'));
        if ($validity == false) {
            $response['status'] = 0;
            $response['message'] = get_phrase('this_email_already_exits') . '. ' . get_phrase('please_use_another_email');
            return json_encode($response);
        } else {
            $data['first_name'] = html_escape($this->input->post('first_name'));
            $data['last_name'] = html_escape($this->input->post('last_name'));
            $data['email'] = html_escape($this->input->post('email'));
            $data['password'] = sha1(html_escape($this->input->post('password')));
            $social_link['facebook'] = '';
            $social_link['twitter'] = '';
            $social_link['linkedin'] = '';
            $data['social_links'] = json_encode($social_link);
            $data['role_id'] = 2;
            $data['date_added'] = strtotime(date("Y-m-d H:i:s"));
            $data['wishlist'] = json_encode(array());
            $data['watch_history'] = json_encode(array());
            $data['status'] = 1;
            $data['image'] = md5(rand(10000, 10000000));

            // Add paypal keys
            $payment_keys = array();

            $paypal['production_client_id'] = '';
            $paypal['production_secret_key'] = '';
            $payment_keys['paypal'] = $paypal;

            // Add Stripe keys
            $stripe['public_live_key'] = '';
            $stripe['secret_live_key'] = '';
            $payment_keys['stripe'] = $stripe;

            // Add razorpay keys
            $razorpay['key_id'] = '';
            $razorpay['secret_key'] = '';
            $payment_keys['razorpay'] = $razorpay;

            //All payment keys
            $data['payment_keys'] = json_encode($payment_keys);

            if ($is_instructor) {
                $data['is_instructor'] = 1;
            }
            $this->db->insert('users', $data);

            $this->session->set_flashdata('flash_message', get_phrase('user_added_successfully'));
            $response['status'] = 1;
            return json_encode($response);
        }
    }

    public function check_duplication($action = "", $email = "", $user_id = "") {
        $duplicate_email_check = $this->db->get_where('users', array('email' => $email));

        if ($action == 'on_create') {
            if ($duplicate_email_check->num_rows() > 0) {
                if ($duplicate_email_check->row()->status == 1) {
                    return false;
                } else {
                    return 'unverified_user';
                }
            } else {
                return true;
            }
        } elseif ($action == 'on_update') {
            if ($duplicate_email_check->num_rows() > 0) {
                if ($duplicate_email_check->row()->id == $user_id) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        }
    }

    public function edit_user($user_id = "") { // Admin does this editing
        $validity = $this->check_duplication('on_update', $this->input->post('email'), $user_id);
        if ($validity) {
            $data['first_name'] = html_escape($this->input->post('first_name'));
            $data['last_name'] = html_escape($this->input->post('last_name'));

            if (isset($_POST['email'])) {
                $data['email'] = html_escape($this->input->post('email'));
            }
            $social_link['facebook'] = html_escape($this->input->post('facebook_link'));
            $social_link['twitter'] = html_escape($this->input->post('twitter_link'));
            $social_link['linkedin'] = html_escape($this->input->post('linkedin_link'));
            $data['social_links'] = json_encode($social_link);
            $data['biography'] = $this->input->post('biography');
            $data['title'] = html_escape($this->input->post('title'));
            $data['skills'] = html_escape($this->input->post('skills'));
            $data['last_modified'] = strtotime(date("Y-m-d H:i:s"));

            if (isset($_FILES['user_image']) && $_FILES['user_image']['name'] != "") {
                unlink('uploads/user_image/' . $this->db->get_where('users', array('id' => $user_id))->row('image') . '.jpg');
                $data['image'] = md5(rand(10000, 10000000));
                $this->upload_user_image($data['image']);
            }

            // Update paypal keys
            $payment_keys = array();

            $paypal['production_client_id'] = html_escape($this->input->post('paypal_client_id'));
            $paypal['production_secret_key'] = html_escape($this->input->post('paypal_secret_key'));
            $payment_keys['paypal'] = $paypal;

            // Update Stripe keys
            $stripe['public_live_key'] = html_escape($this->input->post('stripe_public_key'));
            $stripe['secret_live_key'] = html_escape($this->input->post('stripe_secret_key'));
            $payment_keys['stripe'] = $stripe;

            // Update razorpay keys
            $razorpay['key_id'] = html_escape($this->input->post('key_id'));
            $razorpay['secret_key'] = html_escape($this->input->post('secret_key'));
            $payment_keys['razorpay'] = $razorpay;

            //All payment keys
            $data['payment_keys'] = json_encode($payment_keys);

            $this->db->where('id', $user_id);
            $this->db->update('users', $data);
            $this->session->set_flashdata('flash_message', get_phrase('user_update_successfully'));
        } else {
            $this->session->set_flashdata('error_message', get_phrase('email_duplication'));
        }
    }

    public function unlock_screen_by_password($password = "") {
        $password = sha1($password);
        return $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'password' => $password))->num_rows();
    }

    public function register_user($data) {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function register_user_update_code($data) {
        $update_code['verification_code'] = $data['verification_code'];
        $update_code['password'] = $data['password'];
        $this->db->where('email', $data['email']);
        $this->db->update('users', $update_code);
    }

    public function my_courses($user_id = "") {
        if ($user_id == "") {
            $user_id = $this->session->userdata('user_id');
        }
        return $this->db->get_where('enrol', array('user_id' => $user_id));
    }

    public function upload_user_image($image_code) {
        if (isset($_FILES['user_image']) && $_FILES['user_image']['name'] != "") {
            move_uploaded_file($_FILES['user_image']['tmp_name'], 'uploads/user_image/' . $image_code . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('user_update_successfully'));
        }
    }

    public function update_account_settings($user_id) {
        $validity = $this->check_duplication('on_update', $this->input->post('email'), $user_id);
        if ($validity) {
            if (!empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['confirm_password'])) {
                $user_details = $this->get_user($user_id)->row_array();
                $current_password = $this->input->post('current_password');
                $new_password = $this->input->post('new_password');
                $confirm_password = $this->input->post('confirm_password');
                if ($user_details['password'] == sha1($current_password) && $new_password == $confirm_password) {
                    $data['password'] = sha1($new_password);
                } else {
                    $this->session->set_flashdata('error_message', get_phrase('mismatch_password'));
                    return;
                }
            }
            $this->db->where('id', $user_id);
            $this->db->update('users', $data);
            $this->session->set_flashdata('flash_message', get_phrase('updated_successfully'));
        } else {
            $this->session->set_flashdata('error_message', get_phrase('email_duplication'));
        }
    }

    public function change_password($user_id) {
        $data = array();
        if (!empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['confirm_password'])) {
            $user_details = $this->get_all_user($user_id)->row_array();
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');
            $confirm_password = $this->input->post('confirm_password');

            if ($user_details['password'] == sha1($current_password) && $new_password == $confirm_password) {
                $data['password'] = sha1($new_password);
            } else {
                $this->session->set_flashdata('error_message', get_phrase('mismatch_password'));
                return;
            }
        }

        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
        $this->session->set_flashdata('flash_message', get_phrase('password_updated'));
    }

    public function get_instructor($id = 0) {
        if ($id > 0) {
            return $this->db->get_where('users', array('id' => $id, 'is_instructor' => 1));
        } else {
            return $this->db->get_where('users', array('is_instructor' => 1));
        }
    }

    public function get_instructor_by_email($email = null) {
        return $this->db->get_where('users', array('email' => $email, 'is_instructor' => 1));
    }

    public function get_admins($id = 0) {
        if ($id > 0) {
            return $this->db->get_where('users', array('id' => $id, 'role_id' => 1));
        } else {
            return $this->db->get_where('users', array('role_id' => 1));
        }
    }

    public function get_number_of_active_courses_of_instructor($instructor_id) {
        $multi_instructor_course_ids = $this->crud_model->multi_instructor_course_ids_for_an_instructor($instructor_id);

        $this->db->where('user_id', $instructor_id);
        if ($multi_instructor_course_ids && count($multi_instructor_course_ids)) {
            $this->db->or_where_in('id', $multi_instructor_course_ids);
        }
        $result = $this->db->get('course')->num_rows();
        return $result;
    }

    public function get_user_image_url($user_id) {
        $user_profile_image = $this->db->get_where('users', array('id' => $user_id))->row('image');
        if (file_exists('uploads/user_image/' . $user_profile_image . '.jpg'))
            return base_url() . 'uploads/user_image/' . $user_profile_image . '.jpg';
        else
            return base_url() . 'uploads/user_image/placeholder.png';
    }

    public function get_instructor_list() {
        $query1 = $this->db->get_where('course', array('status' => 'active'))->result_array();
        $instructor_ids = array();
        $query_result = array();
        foreach ($query1 as $row1) {
            if (!in_array($row1['user_id'], $instructor_ids) && $row1['user_id'] != "") {
                array_push($instructor_ids, $row1['user_id']);
            }
        }
        if (count($instructor_ids) > 0) {
            $this->db->where_in('id', $instructor_ids);
            $query_result = $this->db->get('users');
        } else {
            $query_result = $this->get_admin_details();
        }

        return $query_result;
    }

    public function update_instructor_paypal_settings($user_id = '') {
        $user_details = $this->get_all_user($user_id)->row_array();
        $payment_keys = json_decode($user_details['payment_keys'], true);
        // Update paypal keys
        $paypal['production_client_id'] = html_escape($this->input->post('paypal_client_id'));
        $paypal['production_secret_key'] = html_escape($this->input->post('paypal_secret_key'));
        $payment_keys['paypal'] = $paypal;

        //All payment keys
        $data['payment_keys'] = json_encode($payment_keys);

        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
    }

    public function update_instructor_stripe_settings($user_id = '') {
        $user_details = $this->get_all_user($user_id)->row_array();
        $payment_keys = json_decode($user_details['payment_keys'], true);
        // Update stripe keys
        $stripe['public_live_key'] = html_escape($this->input->post('stripe_public_key'));
        $stripe['secret_live_key'] = html_escape($this->input->post('stripe_secret_key'));
        $payment_keys['stripe'] = $stripe;

        //All payment keys
        $data['payment_keys'] = json_encode($payment_keys);

        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
    }

    public function update_instructor_razorpay_settings($user_id = '') {
        $user_details = $this->get_all_user($user_id)->row_array();
        $payment_keys = json_decode($user_details['payment_keys'], true);
        // Update razorpay keys
        $razorpay['key_id'] = html_escape($this->input->post('key_id'));
        $razorpay['secret_key'] = html_escape($this->input->post('secret_key'));
        $payment_keys['razorpay'] = $razorpay;

        //All payment keys
        $data['payment_keys'] = json_encode($payment_keys);

        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
    }

    // POST INSTRUCTOR APPLICATION FORM AND INSERT INTO DATABASE IF EVERYTHING IS OKAY
    public function post_instructor_application() {
        // FIRST GET THE USER DETAILS
        $user_details = $this->get_all_user($this->input->post('id'))->row_array();

        // CHECK IF THE PROVIDED ID AND EMAIL ARE COMING FROM VALID USER
        if ($user_details['email'] == $this->input->post('email')) {

            // GET PREVIOUS DATA FROM APPLICATION TABLE
            $previous_data = $this->get_applications($user_details['id'], 'user')->num_rows();
            // CHECK IF THE USER HAS SUBMITTED FORM BEFORE
            if ($previous_data > 0) {
                $this->session->set_flashdata('error_message', get_phrase('already_submitted'));
                redirect(site_url('user/become_an_instructor'), 'refresh');
            }
            $data['user_id'] = $this->input->post('id');
            $data['address'] = $this->input->post('address');
            $data['phone'] = $this->input->post('phone');
            $data['message'] = $this->input->post('message');
            if (isset($_FILES['document']) && $_FILES['document']['name'] != "") {
                if (!file_exists('uploads/document')) {
                    mkdir('uploads/document', 0777, true);
                }
                $accepted_ext = array('doc', 'docs', 'pdf', 'txt', 'png', 'jpg', 'jpeg');
                $path = $_FILES['document']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                if (in_array(strtolower($ext), $accepted_ext)) {
                    $document_custom_name = random(15) . '.' . $ext;
                    $data['document'] = $document_custom_name;
                    move_uploaded_file($_FILES['document']['tmp_name'], 'uploads/document/' . $document_custom_name);
                } else {
                    $this->session->set_flashdata('error_message', get_phrase('invalide_file'));
                    redirect(site_url('user/become_an_instructor'), 'refresh');
                }
            }
            $this->db->insert('applications', $data);
            $this->session->set_flashdata('flash_message', get_phrase('application_submitted_successfully'));
            redirect(site_url('user/become_an_instructor'), 'refresh');
        } else {
            $this->session->set_flashdata('error_message', get_phrase('user_not_found'));
            redirect(site_url('user/become_an_instructor'), 'refresh');
        }
    }

    // GET INSTRUCTOR APPLICATIONS
    public function get_applications($id = "", $type = "") {
        if ($id > 0 && !empty($type)) {
            if ($type == 'user') {
                $applications = $this->db->get_where('applications', array('user_id' => $id));
                return $applications;
            } else {
                $applications = $this->db->get_where('applications', array('id' => $id));
                return $applications;
            }
        } else {
            $this->db->order_by("id", "DESC");
            $applications = $this->db->get_where('applications');
            return $applications;
        }
    }

    // GET APPROVED APPLICATIONS
    public function get_approved_applications() {
        $applications = $this->db->get_where('applications', array('status' => 1));
        return $applications;
    }

    // GET PENDING APPLICATIONS
    public function get_pending_applications() {
        $applications = $this->db->get_where('applications', array('status' => 0));
        return $applications;
    }

    //UPDATE STATUS OF INSTRUCTOR APPLICATION
    public function update_status_of_application($status, $application_id) {
        $application_details = $this->get_applications($application_id, 'application');
        if ($application_details->num_rows() > 0) {
            $application_details = $application_details->row_array();
            if ($status == 'approve') {
                $application_data['status'] = 1;
                $this->db->where('id', $application_id);
                $this->db->update('applications', $application_data);

                $instructor_data['is_instructor'] = 1;
                $this->db->where('id', $application_details['user_id']);
                $this->db->update('users', $instructor_data);

                $this->session->set_flashdata('flash_message', get_phrase('application_approved_successfully'));
                redirect(site_url('admin/instructor_application'), 'refresh');
            } else {
                $this->db->where('id', $application_id);
                $this->db->delete('applications');
                $this->session->set_flashdata('flash_message', get_phrase('application_deleted_successfully'));
                redirect(site_url('admin/instructor_application'), 'refresh');
            }
        } else {
            $this->session->set_flashdata('error_message', get_phrase('invalid_application'));
            redirect(site_url('admin/instructor_application'), 'refresh');
        }
    }

    // ASSIGN PERMISSION
    public function assign_permission() {
        $argument = html_escape($this->input->post('arg'));
        $argument = explode('-', $argument);
        $admin_id = $argument[0];
        $module = $argument[1];

        // CHECK IF IT IS A ROOT ADMIN
        if (is_root_admin($admin_id)) {
            return false;
        }

        $permission_data['admin_id'] = $admin_id;
        $previous_permissions = json_decode($this->get_admins_permission_json($permission_data['admin_id']), TRUE);

        if (in_array($module, $previous_permissions)) {
            $new_permission = array();
            foreach ($previous_permissions as $permission) {
                if ($permission != $module) {
                    array_push($new_permission, $permission);
                }
            }
        } else {
            array_push($previous_permissions, $module);
            $new_permission = $previous_permissions;
        }

        $permission_data['permissions'] = json_encode($new_permission);

        $this->db->where('admin_id', $admin_id);
        $this->db->update('permissions', $permission_data);
        return true;
    }

    // GET ADMIN'S PERMISSION JSON
    public function get_admins_permission_json($admin_id) {
        $admins_permissions = $this->db->get_where('permissions', ['admin_id' => $admin_id])->row_array();
        return $admins_permissions['permissions'];
    }

    // GET MULTI INSTRUCTOR DETAILS WITH COURSE ID
    public function get_multi_instructor_details_with_csv($csv) {
        $instructor_ids = explode(',', $csv);
        $this->db->where_in('id', $instructor_ids);
        return $this->db->get('users')->result_array();
    }

    public function error_files($application_id = 0) {
        $this->db->where('app_id', $application_id);
        $this->db->where('status', 2);
        $query = $this->db->get('material');

        if ($query->num_rows() >= 1) {
            return 1;
        } else {
            return 0;
        }
    }

    public function email_address_status() {
        $email = $this->input->post('email');

        $this->db->where('email', $email);
        $query = $this->db->get('users');

        if ($query->num_rows() >= 1) {
            return 1;
        } else {
            return 0;
        }
    }

}

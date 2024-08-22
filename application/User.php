<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->database();
        $this->load->library('session');
        /* cache control */
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

        $agent_id = $this->session->userdata('user_id');
        $this->user_model->school_rule_pass($agent_id);
    }

    public function get_protected_routes($method) {
        // IF ANY FUNCTION DOES NOT REQUIRE PUBLIC INSTRUCTOR, PUT THE NAME HERE.
        $unprotected_routes = ['save_course_progress'];

        if (!in_array($method, $unprotected_routes)) {
            if (get_settings('allow_instructor') != 1) {
                redirect(site_url('home'), 'refresh');
            }
        }
    }

    public function index() {
        if ($this->session->userdata('user_login') == true) {
            $this->dashboard();
        } else {
            redirect(site_url('login'), 'refresh');
        }
    }

    public function dashboard() {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }


        if ($this->session->userdata('role_id') == '3') {
            $page_data['page_name'] = 'dashboard_agent';
        } else {
            $page_data['page_name'] = 'dashboard_domestic';
        }

        $page_data['page_title'] = get_phrase('dashboard');
        $page_data['tag'] = 'dashboard';
        $this->load->view('backend/index.php', $page_data);
    }

    /*
     * DOMESTIC USER SECTION 
     */

    // Main actions
    public function domestic($param1 = "", $param2 = "") {

        if ($param1 == "add") {

            // temp pw generator
            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $pass = array(); //remember to declare $pass as an array
            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            $temp_pw = implode($pass); //turn the array into a string
            //

            $page_data['page_name'] = 'domestic_add';
            $page_data['temp_pw'] = $temp_pw;
            $page_data['tag'] = 'domestic_add';
            $page_data['page_title'] = get_phrase('agent_add');
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == "edit") {

            $page_data['page_name'] = 'domestic_edit';
            $page_data['tag'] = 'domestic_list';
            $page_data['page_title'] = get_phrase('domestic_edit');
            $page_data['edit_domestic'] = $this->user_model->edit_domestic_view($param2);
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == "view") {
            $page_data['page_name'] = 'agent_view';
            $page_data['tag'] = 'agent_list';
            $page_data['page_title'] = get_phrase('agent_view');
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == "delete") {

            $this->user_model->delete_domestic_user($param2);

            $page_data['page_name'] = 'domestic';
            $page_data['page_title'] = get_phrase('domestic_list');
            $page_data['tag'] = 'domestic_list';
            $page_data['users'] = $this->user_model->get_domestic($param2);
            $this->load->view('backend/index', $page_data);
        } else {
            $page_data['page_name'] = 'domestic';
            $page_data['page_title'] = get_phrase('domestic_list');
            $page_data['tag'] = 'domestic_list';
            $page_data['users'] = $this->user_model->get_domestic($param2);
            $this->load->view('backend/index', $page_data);
        }
    }

    public function add_domestic() {


        $this->user_model->add_domestic();

        $temporary_pw = $this->input->post('temporary_password');
        $this->email_model->send_email_domestic_user($this->input->post('email'), $temporary_pw);

        $page_data['page_name'] = 'domestic';
        $page_data['page_title'] = get_phrase('domestic_list');
        $page_data['tag'] = 'domestic_list';
        $page_data['users'] = $this->user_model->get_domestic($param2);
        $this->load->view('backend/index', $page_data);
    }

    public function create_new_student_application($param1 = "", $param2 = "") {

        if ($param1 == 'new') {
            $non_reg_student = $this->input->post('non_reg_student');
            $url = "user/student_application/create/" . $non_reg_student;
            redirect(site_url($url), 'refresh');
        } else {
            $page_data['page_name'] = 'select_students';
            $page_data['page_title'] = get_phrase('student_new_application');
            $page_data['tag'] = 'student_application_new';
            $page_data['students'] = $this->user_model->non_registed_students();
            $this->load->view('backend/index', $page_data);
        }
    }

    public function edit_domestic_user_profile() {

        $this->user_model->edit_domestic_user_profile();

        $page_data['page_name'] = 'manage_profile_domestic';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data'] = $this->db->get_where('users', array('id' => $this->session->userdata('user_id')))->result_array();
        $this->load->view('backend/index', $page_data);
    }

    public function edit_domestic_user() {

        $this->user_model->edit_domestic_user_profile();

        $page_data['page_name'] = 'domestic';
        $page_data['page_title'] = get_phrase('domestic_list');
        $page_data['tag'] = 'domestic_list';
        $page_data['users'] = $this->user_model->get_domestic($param2);
        $this->load->view('backend/index', $page_data);
    }

    /*
     * ->AGENTS SECTION
     */

    public function edit_agent_profile() {
        $this->user_model->edit_agent_profile();

//        $page_data['page_name'] = 'manage_profile_agent';
//        $page_data['page_title'] = get_phrase('manage_profile');
//        $page_data['edit_data'] = $this->db->get_where('users', array('id' => $this->session->userdata('user_id')))->result_array();
//        $this->load->view('backend/index', $page_data);

        $page_data['page_name'] = 'manage_profile_agent';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data'] = $this->user_model->edit_agent_view($this->session->userdata('user_id'));
        //$page_data['edit_data'] = $this->db->get_where('users', array('id' => $this->session->userdata('user_id')))->result_array();
        $this->load->view('backend/index', $page_data);
    }

    public function agents($param1 = "", $param2 = "") {

        if ($param1 == "add") {

            $query = $this->user_model->get_agent_ID();
            $next_id = 0;
            foreach ($query->result() as $row) {
                $next_id = $row->id;
            }

            $next_id = "AG" . $next_id + 1;

            // $temporary password generator
            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $pass = array(); //remember to declare $pass as an array
            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            $temporary_pw = implode($pass); //turn the array into a string

            $page_data['page_name'] = 'agent_add';
            $page_data['reg_date'] = date('Y-m-d');

            $page_data['agent_no'] = $next_id;
            $page_data['temp_pw'] = $temporary_pw;
            $page_data['tag'] = 'agent_list';
            $page_data['page_title'] = get_phrase('agent_add');
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == "edit") {
            $page_data['page_name'] = 'agent_edit';
            $page_data['tag'] = 'agent_list';
            $page_data['page_title'] = get_phrase('agent_edit');
            $page_data['edit_agent'] = $this->user_model->edit_agent_view($param2);
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == "view") {
            $page_data['page_name'] = 'agent_view';
            $page_data['tag'] = 'agent_list';
            $page_data['page_title'] = get_phrase('agent_view');
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == "delete") {

            $this->user_model->delete_agent($param2);

            $page_data['page_name'] = 'agents';
            $page_data['page_title'] = get_phrase('agent_list');
            $page_data['tag'] = 'agent_list';
            $page_data['users'] = $this->user_model->get_agents();
            $this->load->view('backend/index', $page_data);
        } else {
            $page_data['page_name'] = 'agents';
            $page_data['page_title'] = get_phrase('agent_list');
            $page_data['tag'] = 'agent_list';
            $page_data['users'] = $this->user_model->get_agents();
            $this->load->view('backend/index', $page_data);
        }
    }

    public function add_agents() {

        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $email = $this->input->post('email');
        $password = sha1($this->input->post('password'));
        $skype = $this->input->post('skype');

        if (($first_name != "") && ($last_name != "") && ($email != "")) {
            $verification_code = date("Ymdhis");
            $this->user_model->add_agent($verification_code);

            //$temporary_pw = $this->input->post('password');
            $this->email_model->send_email_verification_mail($this->input->post('email'), $verification_code);
        }
        $page_data['page_name'] = 'agents';
        $page_data['page_title'] = get_phrase('agent_list');
        $page_data['tag'] = 'agent_list';
        $page_data['users'] = $this->user_model->get_agents();
        $this->load->view('backend/index', $page_data);
    }

    public function edit_agents() {

        $this->user_model->edit_agent();

        $page_data['page_name'] = 'agents';
        $page_data['page_title'] = get_phrase('agent_list');
        $page_data['tag'] = 'agent_list';
        $page_data['users'] = $this->user_model->get_agents();
        $this->load->view('backend/index', $page_data);
    }

    public function users($param1 = "", $param2 = "") {
        //echo "test"; exit();
        /* if ($this->session->userdata('admin_login') != true) {
          redirect(site_url('login'), 'refresh');
          } */

        // CHECK ACCESS PERMISSION
        //check_permission('user');
        //check_permission('student');

        if ($param1 == "add") {
            $this->user_model->add_user();
            redirect(site_url('admin/users'), 'refresh');
        } elseif ($param1 == "edit") {
            $this->user_model->edit_user($param2);
            redirect(site_url('admin/users'), 'refresh');
        } elseif ($param1 == "delete") {
            $this->user_model->delete_user($param2);
            redirect(site_url('admin/users'), 'refresh');
        }

        $page_data['page_name'] = 'users';
        $page_data['page_title'] = get_phrase('agent_list');
        $page_data['tag'] = 'agent_list';
        $page_data['users'] = $this->user_model->get_agent($param2);
        $this->load->view('backend/index', $page_data);
    }

    public function user_form($param1 = "", $param2 = "") {
//        if ($this->session->userdata('admin_login') != true) {
//            redirect(site_url('login'), 'refresh');
//        }
//
//        // CHECK ACCESS PERMISSION
//        check_permission('user');
//        check_permission('student');

        if ($param1 == 'add_aget') {
            $page_data['page_name'] = 'agent_add';
            $page_data['page_title'] = get_phrase('agent_add');
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'edit_user_form') {
            $this_user_role = strtolower($this->session->userdata('role'));

            if ($this_user_role == 'agent') {
                $page_data['page_name'] = 'agent_profile_edit';
                $page_data['user_id'] = $param2;
                $page_data['page_title'] = get_phrase('agent_edit');
                $page_data['edit_agent'] = $this->user_model->edit_agent_view($param2);
                $this->load->view('backend/index', $page_data);
            } else {
                $page_data['page_name'] = 'domestic_profile_edit';
                $page_data['user_id'] = $param2;
                $page_data['page_title'] = get_phrase('domestic_user_edit');
                $page_data['edit_domestic'] = $this->user_model->edit_domestic_view($param2);
                $this->load->view('backend/index', $page_data);
            }
        }
    }

    public function rules() {

        $file_name = time() . $_FILES["slide"]['name'];

        $config['upload_path'] = './uploads/slide/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        //$config['max_size'] = 100;
        $config['file_name'] = $file_name;


        // echo $file_name;
        //$Extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $created_by = $this->session->userdata('user_id'); //changes


        $slide_data['title'] = $this->input->post('screen_title');
        $slide_data['slide'] = $file_name;
        $slide_data['created_date'] = date('Y-m-d');
        $slide_data['created_by'] = $created_by;
        $slide_data['status'] = 1;


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('slide')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_form', $error);
        } else {

            $this->db->insert('school_rule', $slide_data);

            // reset agent status 
            //$this->db->insert('school_rule', $slide_data);
            $this->db->set('read_rule', '0');
            $this->db->update('agents');


            $page_data['page_name'] = 'update_rule';
            $page_data['page_title'] = get_phrase('update_school_rule');
            $page_data['tag'] = 'school_rule';
            $page_data['rules'] = $this->crud_model->get_school_rules();
            $this->load->view('backend/index', $page_data);
        }
    }

    public function update_new_rule() {
        // School stuff
        $page_data['page_name'] = 'update_rule';
        $page_data['page_title'] = get_phrase('update_school_rule');
        $page_data['tag'] = 'school_rule';
        $page_data['rules'] = $this->crud_model->get_school_rules();
        $this->load->view('backend/index', $page_data);
    }

    public function school_rule($param2 = "") {
        // School stuff
        $page_data['page_name'] = 'school_rule';
        $page_data['page_title'] = get_phrase('school_rule');
        $page_data['tag'] = 'school_rule';
        $created_at = $this->crud_model->latest_update();
        $page_data['created_at'] = $created_at->created_date;
        $page_data['rules'] = $this->crud_model->get_school_rules($param2);
        $this->load->view('backend/index', $page_data);
    }

    public function school_rules() {

        // find next id
        $get_rows = $this->crud_model->get_rule_list();
        $count = 0;
        $next_id = 0;

        foreach ($get_rows->result() as $rule_lists) {
            $next_id = $rule_lists->id;
            if ($count == 1) {
                break;
            }
            $count = 1;
        }

        $slide = $this->crud_model->load_rules();
        $this_rule_img = "";
        $this_rule_id = "";

        foreach ($slide as $img) {
            $this_rule_img = $img['slide'];
            $this_rule_id = $img['id'];
        }

        /**/

        // rule list group

        $link_group = $this->crud_model->get_school_rules();

        $list = array();
        foreach ($link_group->result() as $rule_lists) {
            $rule_id = $rule_lists->id;
            $user_id = $this->session->userdata('user_id');
            $complete = $this->crud_model->check_rule_status($rule_id, $user_id);

            $rule_list = $rule_lists->title;
            if ($complete == 1) {
                $list[] = '<li class="list-group-item" style="background-color:#E5E4E2"><a href="' . site_url('user/school_rules_test/' . $rule_id) . '">' . $rule_list . '</a></li>';
            } else {
                $list[] = '<li class="list-group-item" style="">' . $rule_list . '</li>';
            }
        }

        /**/
        $created_at = $this->crud_model->latest_update();

        //answer

        $answer = $this->crud_model->rule_answer($this_rule_id);

        $text = explode(",", $answer->answer);
        $op1 = "";
        $op2 = "";
        $op3 = "";

        $x = 1;
        foreach ($text as $txt) {
            if ($x == 1) {
                $op1 = $txt;
            }
            if ($x == 2) {
                $op2 = $txt;
            }
            if ($x == 3) {
                $op3 = $txt;
            }
            $x++;
        }

        $page_data['q1_op'] = $op1;
        $page_data['q2_op'] = $op2;
        $page_data['q3_op'] = $op3;


        $page_data['slide_id'] = $this_rule_id;
        $page_data['rule_lists'] = $list;
        $page_data['next_id'] = $next_id;
        $page_data['slide_img'] = $this_rule_img;
        $page_data['created_at'] = $created_at->created_date;

        $page_data['page_name'] = 'rules';

        $page_data['page_title'] = get_phrase('school_rule');
        $page_data['tag'] = 'school_rule_read';

        $this->load->view('backend/index', $page_data);
    }

    public function school_rules_test($param2 = "") {

        //save values 
        $this->crud_model->save_rule_results();

        if ($this->input->post('complete') == 1) {
            $page_data['mini_test'] = 1;
        } else {
            $page_data['mini_test'] = 0;
        }

        if ($this->input->post('end') == 1) {
            //update complete status
            $this->crud_model->save_rule_status();

            redirect(site_url('user/success_rule'), 'refresh');
        }

        // find next id
        $get_rows = $this->crud_model->get_rule_list();
        $count = 0;
        $next_id = 0;

        foreach ($get_rows->result() as $rule_lists) {
            $next_id = $rule_lists->id;

            if ($count == 1) {
                break;
            }
            if ($next_id == $param2) {
                $count = 1;
            }
        }

        $slide = $this->crud_model->get_single_slide($param2);
        $this_rule_img = "";
        $this_rule_id = "";

        foreach ($slide as $img) {
            $this_rule_img = $img['slide'];
            $this_rule_id = $img['id'];
        }


        // rule list group

        $link_group = $this->crud_model->get_school_rules();
        $list = array();
        foreach ($link_group->result() as $rule_lists) {
            $rule_id = $rule_lists->id;
            $user_id = $this->session->userdata('user_id');
            $complete = $this->crud_model->check_rule_status($rule_id, $user_id);

            $rule_list = $rule_lists->title;
            if ($complete == 1) {
                $list[] = '<li class="list-group-item" style="background-color:#E5E4E2"><a href="' . site_url('user/school_rules_test/' . $rule_id) . '">' . $rule_list . '</a></li>';
            } else {
                $list[] = '<li class="list-group-item" style="">' . $rule_list . '</li>';
            }
        }

        /**/
        $answer = $this->crud_model->rule_answer($this_rule_id);

        $text = explode(",", $answer->answer);
        $op1 = "";
        $op2 = "";
        $op3 = "";

        $x = 1;
        foreach ($text as $txt) {
            if ($x == 1) {
                $op1 = $txt;
            }
            if ($x == 2) {
                $op2 = $txt;
            }
            if ($x == 3) {
                $op3 = $txt;
            }
            $x++;
        }

        $page_data['q1_op'] = $op1;
        $page_data['q2_op'] = $op2;
        $page_data['q3_op'] = $op3;


        if ($next_id == $this_rule_id) {
            $page_data['rule_complete'] = "1";
        } else {
            $page_data['rule_complete'] = "0";
        }

        $created_at = $this->crud_model->latest_update();
        $page_data['slide_id'] = $this_rule_id;
        $page_data['rule_lists'] = $list;
        $page_data['slide_img'] = $this_rule_img;
        $page_data['next_id'] = $next_id;
        $page_data['created_at'] = $created_at->created_date;

        $page_data['page_name'] = 'rules';

        $page_data['page_title'] = get_phrase('school_rule');
        $page_data['tag'] = 'school_rule_read';

        $this->load->view('backend/index', $page_data);
    }

    /*
     * Students
     */

    public function success_rule() {
        $page_data['page_name'] = 'school_rule_success';
        $page_data['page_title'] = get_phrase('success_rule');
        $page_data['tag'] = 'school_rule';
        $this->load->view('backend/index.php', $page_data);
    }

    public function student_data($param1 = "", $param2 = "") {  // domestic      
        if ($param1 == 'view') {
            $page_data['page_name'] = 'student_view_domestic';
            $page_data['page_title'] = get_phrase('student_view');
            $page_data['tag'] = 'student_edit';
            $page_data['students'] = $this->user_model->get_single_student($param2);
            $this->load->view('backend/index', $page_data);
        }
    }

    public function student($param1 = "", $param2 = "") {

        if ($this->session->userdata('rule_pass') != '1') {
            redirect(site_url('user'), 'refresh');
        }

        if ($param1 == 'add') {
            $page_data['page_name'] = 'student_add';
            $page_data['page_title'] = get_phrase('student_add');
            $page_data['tag'] = 'student_add';
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'edit') {

            $page_data['page_name'] = 'student_edit';
            $page_data['page_title'] = get_phrase('student_edit');
            $page_data['tag'] = 'student_edit';
            $page_data['students'] = $this->user_model->get_single_student($param2);
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'delete') {

            $this->user_model->delete_student($param2);
            $page_data['page_name'] = 'students';
            $page_data['page_title'] = get_phrase('students');
            $page_data['tag'] = 'student_list';
            $page_data['students'] = $this->user_model->get_student();
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'view') {

            $page_data['page_name'] = 'student_view';
            $page_data['page_title'] = get_phrase('student_view');
            $page_data['tag'] = 'student_edit';
            $page_data['students'] = $this->user_model->get_single_student($param2);
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'create_application') {

            $page_data['page_name'] = 'student_application';
            $page_data['page_title'] = get_phrase('student_application');
            $page_data['tag'] = 'student_application';
            $page_data['student'] = $this->user_model->get_studentdata($param2);
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'search') {

            unset(
                    $_SESSION['kanji_fn'],
                    $_SESSION['kanji_ln'],
                    $_SESSION['romaji_fn'],
                    $_SESSION['romaji_ln'],
                    $_SESSION['gender'],
                    $_SESSION['citizenship'],
                    $_SESSION['occupation'],
                    $_SESSION['sponsor_surname'],
                    $_SESSION['sponsor_name']
            );

            $page_data['page_name'] = 'student_search';
            $page_data['page_title'] = get_phrase('student_search');
            $page_data['tag'] = 'student_search';
            $this->load->view('backend/index', $page_data);
        } else {

            $page_data['page_name'] = 'students';
            $page_data['page_title'] = get_phrase('students');
            $page_data['tag'] = 'student_list';
            $page_data['students'] = $this->user_model->get_student();
            $this->load->view('backend/index', $page_data);
        }
    }

    public function student_application_domestic($param1 = "", $param2 = "") {

        if ($param1 == 'view') {
            // application create form
            $page_data['page_name'] = 'student_app_view_domestic';
            $page_data['page_title'] = get_phrase('student_application');
            $page_data['tag'] = 'student_application';
            $page_data['students_app'] = $this->user_model->student_application_edit($param2);
            $page_data['travel'] = $this->user_model->travel_data($param2);
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'edit') {
            // application create form
            $page_data['page_name'] = 'student_app_edit_domestic';
            $page_data['page_title'] = get_phrase('student_application');
            $page_data['tag'] = 'student_application';
            $page_data['students_app'] = $this->user_model->student_application_edit($param2);
            $page_data['travel'] = $this->user_model->travel_data($param2);
            $this->load->view('backend/index', $page_data);
        } else {
            $page_data['page_name'] = 'student_app_list_domestic';
            $page_data['page_title'] = get_phrase('student_view');
            $page_data['tag'] = 'list_of_application';
            $page_data['students'] = $this->user_model->student_application_list_domestic();
            $this->load->view('backend/index', $page_data);
        }
    }

    public function student_immigration_information($param1 = "", $param2 = "") {
        if ($param1 == 'add') {
            // application create form
            $this->user_model->immigration_information_add();

            $page_data['page_name'] = 'student_app_list_domestic';
            $page_data['page_title'] = get_phrase('student_view');
            $page_data['tag'] = 'student_app';
            $page_data['students'] = $this->user_model->student_application_list_domestic();
            $this->load->view('backend/index', $page_data);
        }
    }

    public function student_application($param1 = "", $param2 = "") {
        if ($this->session->userdata('rule_pass') != '1') {
            redirect(site_url('user'), 'refresh');
        }

        if ($param1 == 'view') {
            // application create form
            $page_data['page_name'] = 'student_application_view';
            $page_data['page_title'] = get_phrase('student_application');
            $page_data['tag'] = 'student_application';
            $page_data['students_app'] = $this->user_model->student_application_edit($param2);
            $page_data['travel'] = $this->user_model->travel_data($param2);
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'create') {
            // application create form
            $page_data['page_name'] = 'student_application_add';
            $page_data['page_title'] = get_phrase('student_application');
            $page_data['tag'] = 'student_application';
            $page_data['student'] = $this->user_model->get_student_detail($param2);
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'add') {
            // application add

            $this->user_model->student_details_add();

            $page_data['page_name'] = 'student_application_list';
            $page_data['page_title'] = get_phrase('student_application');
            $page_data['tag'] = 'student_application';
            $page_data['students'] = $this->user_model->student_application_list();
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'edit') {

            $page_data['page_name'] = 'student_application_edit';
            $page_data['page_title'] = get_phrase('student_application');
            $page_data['tag'] = 'student_application';
            $page_data['students_app'] = $this->user_model->student_application_edit($param2);
            $page_data['travel'] = $this->user_model->travel_data($param2);
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'update') {

            $this->load->model('agent_model');
            $this->agent_model->student_details_update();

            $page_data['page_name'] = 'student_application_list';
            $page_data['page_title'] = get_phrase('student_application');
            $page_data['tag'] = 'student_application';
            $page_data['students'] = $this->user_model->student_application_list();
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'delete') {
            $this->user_model->delete_student_application($param2);

            $page_data['page_name'] = 'student_application_list';
            $page_data['page_title'] = get_phrase('student_view');
            $page_data['tag'] = 'student_edit';
            $page_data['students'] = $this->user_model->student_application_list();
            $this->load->view('backend/index', $page_data);
        } else {
            $page_data['page_name'] = 'student_application_list';
            $page_data['page_title'] = get_phrase('Application_List');
            $page_data['tag'] = 'student_application_list';
            $page_data['students'] = $this->user_model->student_application_list();
            $this->load->view('backend/index', $page_data);
        }
    }

    public function student_materials_domestic($param1 = "", $param2 = "") {

        $this->load->model('domestic_model');

        if ($param1 == 'view') {

            $data['page_name'] = 'student_materials_domestic';
            $data['page_title'] = get_phrase('Application_List');
            $data['tag'] = 'student_application_list';
            $data['students'] = $this->user_model->get_student_info($param2);
            $data['materials'] = $this->domestic_model->materials()->result_array();
            $this->load->view('backend/index', $data);
        } elseif ($param1 == 'add') {

            $student_id = $this->input->post('student_id');
            $material_type = $this->input->post('material_type');
            $file_name = time() . '_' . $material_type . '_' . $_FILES["material"]['name'];

            $config['upload_path'] = './uploads/document/student_document/';
            $config['allowed_types'] = 'png';
            $config['file_name'] = $file_name;


            $this->agent_model->add_materials($file_name);

            $this->load->library('upload', $config);
            $this->upload->do_upload('material');

            $data['page_name'] = 'student_materials';
            $data['page_title'] = get_phrase('Application_List');
            $data['tag'] = 'student_application_list';
            $data['students'] = $this->user_model->get_student_info($student_id);
            $this->load->view('backend/index', $data);
        }
    }

    public function student_materials($param1 = "", $param2 = "", $param3 = "", $param4 = "") {

        $this->load->model('agent_model');

        if ($param1 == 'page') {
            $data['page_name'] = 'student_materials';
            $data['page_title'] = get_phrase('Application_List');
            $data['tag'] = 'student_application_list';

            $data['students'] = $this->user_model->get_student_info($param2);
            $data['materials'] = $this->agent_model->materials($param3)->result_array();
            $this->load->view('backend/index', $data);
        } elseif ($param1 == 'add') {

            $app_id = $this->input->post('app_id');
            $student_id = $this->input->post('student_id');
            $material_type = $this->input->post('material_type');

            $file_name = time() . '_' . $material_type . '_' . $_FILES["material"]['name'];
            $file_name = str_replace(' ', '_', $file_name);

            $config['upload_path'] = './uploads/document/student_document/';
            $config['allowed_types'] = 'pdf';
            $config['file_name'] = $file_name;


            $this->agent_model->add_materials($file_name);

            $this->load->library('upload', $config);
            $this->upload->do_upload('material');

            $data['page_name'] = 'student_materials';
            $data['page_title'] = get_phrase('Application_List');
            $data['tag'] = 'student_application_list';
            $data['students'] = $this->user_model->get_student_info($student_id);
            $data['materials'] = $this->agent_model->materials($app_id)->result_array();
            $this->load->view('backend/index', $data);
        } elseif ($param1 == 'update_document') {

            $app_id = $this->input->post('app_id');
            $student_id = $this->input->post('student_id');

            $material_type = $this->input->post('material_type');
            $file_name = time() . '_' . $material_type . '_' . $_FILES["material"]['name'];
            $file_name = str_replace(' ', '_', $file_name);

            $config['upload_path'] = './uploads/document/student_document/';
            $config['allowed_types'] = 'pdf';
            $config['file_name'] = $file_name;


            $this->agent_model->update_materials($file_name);

            $this->load->library('upload', $config);
            $this->upload->do_upload('material');

            $data['page_name'] = 'student_materials';
            $data['page_title'] = get_phrase('Application_List');
            $data['tag'] = 'student_application_list';
            $data['students'] = $this->user_model->get_student_info($student_id);
            $data['materials'] = $this->agent_model->materials($app_id)->result_array();
            $this->load->view('backend/index', $data);
        } elseif ($param1 == 'delete') {

            $this->agent_model->delete_material($param2);

            $data['page_name'] = 'student_materials';
            $data['page_title'] = get_phrase('Application_List');
            $data['tag'] = 'student_application_list';
            $data['students'] = $this->user_model->get_student_info($param3);
            $data['materials'] = $this->agent_model->materials($param4)->result_array();
            $this->load->view('backend/index', $data);
        }
    }

    public function search_student() {

        $data['search_result'] = $this->user_model->searchData();

        $data['page_name'] = 'student_search';
        $data['page_title'] = get_phrase('result_view');
        $data['tag'] = 'student_applicant_list';

        $this->load->view('backend/index', $data);
    }

    public function search_application($param1 = "", $param2 = "") {

        if ($param1 == 'search') {
            $this->load->model('agent_model');
            $data['search_result'] = $this->agent_model->search_application();
        } else {
            unset(
                    //$_SESSION['applicant_id'],
                    $_SESSION['student_name_kanji'],
                    $_SESSION['student_name_romaji']
                    //$_SESSION['nationality'],
                    //$_SESSION['desired_enrollment_date'],
                    //$_SESSION['application_status'],
                    //$_SESSION['where_to_apply'],
            );
        }


        $data['page_name'] = 'search_application';
        $data['page_title'] = get_phrase('application_search');
        $data['tag'] = 'applicant_search';

        $this->load->view('backend/index', $data);
    }

    public function search_application_domestic($param1 = "", $param2 = "") {

        if ($param1 == 'search') {
            $this->load->model('domestic_model');
            $data['search_result'] = $this->domestic_model->search_application();
        } else {
            unset(
                    //$_SESSION['applicant_id'],
                    $_SESSION['student_name_kanji'],
                    $_SESSION['student_name_romaji']
                    //$_SESSION['nationality'],
                    //$_SESSION['desired_enrollment_date'],
                    //$_SESSION['application_status'],
                    //$_SESSION['where_to_apply'],
            );
        }


        $data['page_name'] = 'search_application_domestic';
        $data['page_title'] = get_phrase('search_application_domestic');
        $data['tag'] = 'search_application_domestic';

        $this->load->view('backend/index', $data);
    }

    public function add_studentinfor() {

        $this->user_model->add_studentinfor();
        redirect(site_url('user/student'), 'refresh');
    }

//add_new_user
    // Student Registration
    public function add_student() {



        $this->user_model->student_add();

        //$page_data['page_name'] = 'students';
        //$page_data['page_title'] = get_phrase('student_list');
        //$page_data['tag'] = 'student_list';
        //$page_data['students'] = $this->user_model->get_student();  
        //$this->student();
        redirect(site_url('user/student'), 'refresh');
        //$this->load->view('backend/index', $page_data);
    }

    public function student_edit() {


        $this->user_model->student_edit();



        //$page_data['page_name'] = 'students';
        //$page_data['page_title'] = get_phrase('student_list');
        //$page_data['tag'] = 'student_list';
        //$page_data['students'] = $this->user_model->get_student();  
        //$this->student();
        redirect(site_url('user/student'), 'refresh');
        //$this->load->view('backend/index', $page_data);
    }

    public function delete_rule($param1 = "") {
        //delete slide
        $this->user_model->delete_rule($param1);

        $page_data['page_name'] = 'update_rule';
        $page_data['page_title'] = get_phrase('update_school_rule');
        $page_data['tag'] = 'school_rule';
        $page_data['rules'] = $this->crud_model->get_school_rules();
        $this->load->view('backend/index', $page_data);
    }

    public function get_content() {
        $slide_id = $this->input->post('id');
        if ($slide_id == "") {
            $slide_id = 0;
            $slide = $this->crud_model->get_slide($slide_id);
        } else {
            $slide = $this->crud_model->get_slide($slide_id);
        }

        if ($slide->slide != "") {
            $url = base_url('uploads/slide/' . $slide->slide);
            echo '<img src=' . $url . ' class="img-fluid" width="100%">';
        } else {
            echo get_phrase('empty_slide');
        }
    }

    public function stuff_information($param2 = "") {
        // School stuff
        $page_data['page_name'] = 'stuff_information';
        $page_data['page_title'] = get_phrase('stuff_information');
        $page_data['tag'] = 'stuff_info';
        $page_data['users'] = $this->crud_model->get_school_stuff($param2);
        $this->load->view('backend/index', $page_data);
    }

    public function instructor_authorization($method) {
        // IF THE USER IS NOT AN INSTRUCTOR HE/SHE CAN NEVER ACCESS THE OTHER FUNCTIONS EXCEPT FOR BELOW FUNCTIONS.
        if ($this->session->userdata('is_instructor') != 1) {
            $unprotected_routes = ['become_an_instructor', 'manage_profile', 'save_course_progress'];

            if (!in_array($method, $unprotected_routes)) {
                redirect(site_url('user/become_an_instructor'), 'refresh');
            }
        }
    }

    public function courses() {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $page_data['selected_category_id'] = isset($_GET['category_id']) ? $_GET['category_id'] : "all";
        $page_data['selected_instructor_id'] = $this->session->userdata('user_id');
        $page_data['selected_price'] = isset($_GET['price']) ? $_GET['price'] : "all";
        $page_data['selected_status'] = isset($_GET['status']) ? $_GET['status'] : "all";
        $page_data['courses'] = $this->crud_model->filter_course_for_backend($page_data['selected_category_id'], $page_data['selected_instructor_id'], $page_data['selected_price'], $page_data['selected_status']);
        $page_data['page_name'] = 'courses-server-side';
        $page_data['categories'] = $this->crud_model->get_categories();
        $page_data['page_title'] = get_phrase('active_courses');
        $this->load->view('backend/index', $page_data);
    }

    // This function is responsible for loading the course data from server side for datatable SILENTLY
    public function get_courses() {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $courses = array();
        // Filter portion
        $filter_data['selected_category_id'] = $this->input->post('selected_category_id');
        $filter_data['selected_instructor_id'] = $this->input->post('selected_instructor_id');
        $filter_data['selected_price'] = $this->input->post('selected_price');
        $filter_data['selected_status'] = $this->input->post('selected_status');

        // Server side processing portion
        $columns = array(
            0 => '#',
            1 => 'title',
            2 => 'category',
            3 => 'lesson_and_section',
            4 => 'enrolled_student',
            5 => 'status',
            6 => 'price',
            7 => 'actions',
            8 => 'course_id'
        );

        // Coming from databale itself. Limit is the visible number of data
        $limit = html_escape($this->input->post('length'));
        $start = html_escape($this->input->post('start'));
        $order = "";
        $dir = $this->input->post('order')[0]['dir'];

        $totalData = $this->lazyload->count_all_courses($filter_data);
        $totalFiltered = $totalData;

        // This block of code is handling the search event of datatable
        if (empty($this->input->post('search')['value'])) {
            $courses = $this->lazyload->courses($limit, $start, $order, $dir, $filter_data);
        } else {
            $search = $this->input->post('search')['value'];
            $courses = $this->lazyload->course_search($limit, $start, $search, $order, $dir, $filter_data);
            $totalFiltered = $this->lazyload->course_search_count($search);
        }

        // Fetch the data and make it as JSON format and return it.
        $data = array();
        if (!empty($courses)) {
            foreach ($courses as $key => $row) {
                $instructor_details = $this->user_model->get_all_user($row->user_id)->row_array();
                $category_details = $this->crud_model->get_category_details_by_id($row->sub_category_id)->row_array();
                $sections = $this->crud_model->get_section('course', $row->id);
                $lessons = $this->crud_model->get_lessons('course', $row->id);
                $enroll_history = $this->crud_model->enrol_history($row->id);

                $status_badge = "badge-success-lighten";
                if ($row->status == 'pending') {
                    $status_badge = "badge-danger-lighten";
                } elseif ($row->status == 'draft') {
                    $status_badge = "badge-dark-lighten";
                }

                $price_badge = "badge-dark-lighten";
                $price = 0;
                if ($row->is_free_course == null) {
                    if ($row->discount_flag == 1) {
                        $price = currency($row->discounted_price);
                    } else {
                        $price = currency($row->price);
                    }
                } elseif ($row->is_free_course == 1) {
                    $price_badge = "badge-success-lighten";
                    $price = get_phrase('free');
                }

                $view_course_on_frontend_url = site_url('home/course/' . rawurlencode(slugify($row->title)) . '/' . $row->id);
                $edit_this_course_url = site_url('user/course_form/course_edit/' . $row->id);
                $section_and_lesson_url = site_url('user/course_form/course_edit/' . $row->id);

                if ($row->status == 'active' || $row->status == 'pending') {
                    $course_status_changing_action = "confirm_modal('" . site_url('user/course_actions/draft/' . $row->id) . "')";
                    $course_status_changing_message = get_phrase('mark_as_drafted');
                } else {
                    $course_status_changing_action = "confirm_modal('" . site_url('user/course_actions/publish/' . $row->id) . "')";
                    $course_status_changing_message = get_phrase('publish_this_course');
                }

                $delete_course_url = "confirm_modal('" . site_url('user/course_actions/delete/' . $row->id) . "')";

                if ($row->course_type != 'scorm') {
                    $section_and_lesson_menu = '<li><a class="dropdown-item" href="' . $section_and_lesson_url . '">' . get_phrase("section_and_lesson") . '</a></li>';
                } else {
                    $section_and_lesson_menu = "";
                }

                $action = '
                <div class="dropright dropright">
                <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="' . $view_course_on_frontend_url . '" target="_blank">' . get_phrase("view_course_on_frontend") . '</a></li>
                <li><a class="dropdown-item" href="' . $edit_this_course_url . '">' . get_phrase("edit_this_course") . '</a></li>
                ' . $section_and_lesson_menu . '
                <li><a class="dropdown-item" href="javascript::" onclick="' . $course_status_changing_action . '">' . $course_status_changing_message . '</a></li>
                <li><a class="dropdown-item" href="javascript::" onclick="' . $delete_course_url . '">' . get_phrase("delete") . '</a></li>
                </ul>
                </div>
                ';

                $nestedData['#'] = $key + 1;

                $instructor_names = "";
                if ($row->multi_instructor) {
                    $instructors = $this->user_model->get_multi_instructor_details_with_csv($row->user_id);
                    foreach ($instructors as $counterForThis => $instructor) {
                        $instructor_names .= $instructor['first_name'] . ' ' . $instructor['last_name'];
                        $instructor_names .= $counterForThis + 1 == count($instructors) ? '' : ', ';
                    }
                } else {
                    $instructor_names = $instructor_details['first_name'] . ' ' . $instructor_details['last_name'];
                }

                $nestedData['title'] = '<strong><a href="' . site_url('user/course_form/course_edit/' . $row->id) . '">' . $row->title . '</a></strong><br>
                <small class="text-muted">' . get_phrase('instructor') . ': <b>' . $instructor_names . '</b></small>';


                $nestedData['category'] = '<span class="badge badge-dark-lighten">' . $category_details['name'] . '</span>';

                if ($row->course_type == 'scorm') {
                    $nestedData['lesson_and_section'] = '<span class="badge badge-info-lighten">' . get_phrase('scorm_course') . '</span>';
                } elseif ($row->course_type == 'general') {
                    $nestedData['lesson_and_section'] = '
                    <small class="text-muted"><b>' . get_phrase('total_section') . '</b>: ' . $sections->num_rows() . '</small><br>
                    <small class="text-muted"><b>' . get_phrase('total_lesson') . '</b>: ' . $lessons->num_rows() . '</small>';
                }

                $nestedData['enrolled_student'] = '<small class="text-muted"><b>' . get_phrase('total_enrolment') . '</b>: ' . $enroll_history->num_rows() . '</small>';

                $nestedData['status'] = '<span class="badge ' . $status_badge . '">' . get_phrase($row->status) . '</span>';

                $nestedData['price'] = '<span class="badge ' . $price_badge . '">' . $price . '</span>';

                $nestedData['actions'] = $action;

                $nestedData['course_id'] = $row->id;

                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );

        echo json_encode($json_data);
    }

    public function course_actions($param1 = "", $param2 = "") {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == "add") {
            $course_id = $this->crud_model->add_course();
            redirect(site_url('user/course_form/course_edit/' . $course_id), 'refresh');
        } elseif ($param1 == "edit") {
            $this->is_the_course_belongs_to_current_instructor($param2);
            $this->crud_model->update_course($param2);

            // CHECK IF LIVE CLASS ADDON EXISTS, ADD OR UPDATE IT TO ADDON MODEL
            if (addon_status('live-class')) {
                $this->load->model('addons/Liveclass_model', 'liveclass_model');
                $this->liveclass_model->update_live_class($param2);
            }

            // CHECK IF JITSI LIVE CLASS ADDON EXISTS, ADD OR UPDATE IT TO ADDON MODEL
            if (addon_status('jitsi-live-class')) {
                $this->load->model('addons/jitsi_liveclass_model', 'jitsi_liveclass_model');
                $this->jitsi_liveclass_model->update_live_class($param2);
            }

            redirect(site_url('user/course_form/course_edit/' . $param2));
        } elseif ($param1 == 'add_shortcut') {
            echo $this->crud_model->add_shortcut_course();
        } elseif ($param1 == 'delete') {
            $this->is_the_course_belongs_to_current_instructor($param2);
            $this->crud_model->delete_course($param2);
            redirect(site_url('user/courses'), 'refresh');
        } elseif ($param1 == 'draft') {
            $this->is_the_course_belongs_to_current_instructor($param2);
            $this->crud_model->change_course_status('draft', $param2);
            redirect(site_url('user/courses'), 'refresh');
        } elseif ($param1 == 'publish') {
            $this->is_the_course_belongs_to_current_instructor($param2);
            $this->crud_model->change_course_status('pending', $param2);
            redirect(site_url('user/courses'), 'refresh');
        }
    }

    public function course_form($param1 = "", $param2 = "") {

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'add_course') {
            $page_data['languages'] = $this->crud_model->get_all_languages();
            $page_data['categories'] = $this->crud_model->get_categories();
            $page_data['page_name'] = 'course_add';
            $page_data['page_title'] = get_phrase('add_course');
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'add_course_shortcut') {
            $page_data['languages'] = $this->crud_model->get_all_languages();
            $page_data['categories'] = $this->crud_model->get_categories();
            $this->load->view('backend/user/course_add_shortcut', $page_data);
        } elseif ($param1 == 'course_edit') {
            $this->is_the_course_belongs_to_current_instructor($param2);
            $page_data['page_name'] = 'course_edit';
            $page_data['course_id'] = $param2;
            $page_data['page_title'] = get_phrase('edit_course');
            $page_data['languages'] = $this->crud_model->get_all_languages();
            $page_data['categories'] = $this->crud_model->get_categories();
            $this->load->view('backend/index', $page_data);
        }
    }

    public function payout_settings($param1 = "") {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'paypal_settings') {
            $this->user_model->update_instructor_paypal_settings($this->session->userdata('user_id'));
            $this->session->set_flashdata('flash_message', get_phrase('updated'));
            redirect(site_url('user/payout_settings'), 'refresh');
        }
        if ($param1 == 'stripe_settings') {
            $this->user_model->update_instructor_stripe_settings($this->session->userdata('user_id'));
            $this->session->set_flashdata('flash_message', get_phrase('updated'));
            redirect(site_url('user/payout_settings'), 'refresh');
        }

        if ($param1 == 'razorpay_settings') {
            $this->user_model->update_instructor_razorpay_settings($this->session->userdata('user_id'));
            $this->session->set_flashdata('flash_message', get_phrase('updated'));
            redirect(site_url('user/payout_settings'), 'refresh');
        }

        $page_data['page_name'] = 'payment_settings';
        $page_data['page_title'] = get_phrase('payout_settings');
        $this->load->view('backend/index', $page_data);
    }

    public function sales_report($param1 = "") {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 != "") {
            $date_range = $this->input->get('date_range');
            $date_range = explode(" - ", $date_range);
            $page_data['timestamp_start'] = strtotime($date_range[0] . ' 00:00:00');
            $page_data['timestamp_end'] = strtotime($date_range[1] . ' 23:59:59');
        } else {
            $page_data['timestamp_start'] = strtotime(date("m/01/Y 00:00:00"));
            $page_data['timestamp_end'] = strtotime(date("m/t/Y 23:59:59"));
        }

        $page_data['payment_history'] = $this->crud_model->get_instructor_revenue($this->session->userdata('user_id'), $page_data['timestamp_start'], $page_data['timestamp_end']);
        $page_data['page_name'] = 'sales_report';
        $page_data['page_title'] = get_phrase('sales_report');
        $this->load->view('backend/index', $page_data);
    }

    public function preview($course_id = '') {
        if ($this->session->userdata('user_login') != 1)
            redirect(site_url('login'), 'refresh');

        $this->is_the_course_belongs_to_current_instructor($course_id);
        if ($course_id > 0) {
            $courses = $this->crud_model->get_course_by_id($course_id);
            if ($courses->num_rows() > 0) {
                $course_details = $courses->row_array();
                redirect(site_url('home/lesson/' . rawurlencode(slugify($course_details['title'])) . '/' . $course_details['id']), 'refresh');
            }
        }
        redirect(site_url('user/courses'), 'refresh');
    }

    public function sections($param1 = "", $param2 = "", $param3 = "") {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param2 == 'add') {
            $this->is_the_course_belongs_to_current_instructor($param1);
            $this->crud_model->add_section($param1);
            $this->session->set_flashdata('flash_message', get_phrase('section_has_been_added_successfully'));
        } elseif ($param2 == 'edit') {
            $this->is_the_course_belongs_to_current_instructor($param1, $param3, 'section');
            $this->crud_model->edit_section($param3);
            $this->session->set_flashdata('flash_message', get_phrase('section_has_been_updated_successfully'));
        } elseif ($param2 == 'delete') {
            $this->is_the_course_belongs_to_current_instructor($param1, $param3, 'section');
            $this->crud_model->delete_section($param1, $param3);
            $this->session->set_flashdata('flash_message', get_phrase('section_has_been_deleted_successfully'));
        }
        redirect(site_url('user/course_form/course_edit/' . $param1));
    }

    public function lessons($course_id = "", $param1 = "", $param2 = "") {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if ($param1 == 'add') {
            $this->is_the_course_belongs_to_current_instructor($course_id);
            $this->crud_model->add_lesson();
            $this->session->set_flashdata('flash_message', get_phrase('lesson_has_been_added_successfully'));
            redirect('user/course_form/course_edit/' . $course_id);
        } elseif ($param1 == 'edit') {
            $this->is_the_course_belongs_to_current_instructor($course_id, $param2, 'lesson');
            $this->crud_model->edit_lesson($param2);
            $this->session->set_flashdata('flash_message', get_phrase('lesson_has_been_updated_successfully'));
            redirect('user/course_form/course_edit/' . $course_id);
        } elseif ($param1 == 'delete') {
            $this->is_the_course_belongs_to_current_instructor($course_id, $param2, 'lesson');
            $this->crud_model->delete_lesson($param2);
            $this->session->set_flashdata('flash_message', get_phrase('lesson_has_been_deleted_successfully'));
            redirect('user/course_form/course_edit/' . $course_id);
        } elseif ($param1 == 'filter') {
            redirect('user/lessons/' . $this->input->post('course_id'));
        }
        $page_data['page_name'] = 'lessons';
        $page_data['lessons'] = $this->crud_model->get_lessons('course', $course_id);
        $page_data['course_id'] = $course_id;
        $page_data['page_title'] = get_phrase('lessons');
        $this->load->view('backend/index', $page_data);
    }

    // Manage Quizes
    public function quizes($course_id = "", $action = "", $quiz_id = "") {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($action == 'add') {
            $this->is_the_course_belongs_to_current_instructor($course_id);
            $this->crud_model->add_quiz($course_id);
            $this->session->set_flashdata('flash_message', get_phrase('quiz_has_been_added_successfully'));
        } elseif ($action == 'edit') {
            $this->is_the_course_belongs_to_current_instructor($course_id, $quiz_id, 'quize');
            $this->crud_model->edit_quiz($quiz_id);
            $this->session->set_flashdata('flash_message', get_phrase('quiz_has_been_updated_successfully'));
        } elseif ($action == 'delete') {
            $this->is_the_course_belongs_to_current_instructor($course_id, $quiz_id, 'quize');
            $this->crud_model->delete_lesson($quiz_id);
            $this->session->set_flashdata('flash_message', get_phrase('quiz_has_been_deleted_successfully'));
        }
        redirect(site_url('user/course_form/course_edit/' . $course_id));
    }

    // Manage Quize Questions
    public function quiz_questions($quiz_id = "", $action = "", $question_id = "") {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $quiz_details = $this->crud_model->get_lessons('lesson', $quiz_id)->row_array();

        if ($action == 'add') {
            $this->is_the_course_belongs_to_current_instructor($quiz_details['course_id'], $quiz_id, 'quize');
            $response = $this->crud_model->add_quiz_questions($quiz_id);
            echo $response;
        } elseif ($action == 'edit') {
            if ($this->db->get_where('question', array('id' => $question_id, 'quiz_id' => $quiz_id))->num_rows() <= 0) {
                $this->session->set_flashdata('error_message', get_phrase('you_do_not_have_right_to_access_this_quiz_question'));
                redirect(site_url('user/courses'), 'refresh');
            }

            $response = $this->crud_model->update_quiz_questions($question_id);
            echo $response;
        } elseif ($action == 'delete') {
            if ($this->db->get_where('question', array('id' => $question_id, 'quiz_id' => $quiz_id))->num_rows() <= 0) {
                $this->session->set_flashdata('error_message', get_phrase('you_do_not_have_right_to_access_this_quiz_question'));
                redirect(site_url('user/courses'), 'refresh');
            }

            $response = $this->crud_model->delete_quiz_question($question_id);
            $this->session->set_flashdata('flash_message', get_phrase('question_has_been_deleted'));
            redirect(site_url('user/course_form/course_edit/' . $quiz_details['course_id']));
        }
    }

    function manage_profile() {
        $page_data['page_name'] = 'manage_profile';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data'] = $this->db->get_where('users', array('id' => $this->session->userdata('user_id')))->result_array();
        $this->load->view('backend/index', $page_data);
        //redirect(site_url('home/profile/user_profile'), 'refresh');
    }

    function manage_profile_domestic() {
        $page_data['page_name'] = 'manage_profile_domestic';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data'] = $this->db->get_where('users', array('id' => $this->session->userdata('user_id')))->result_array();
        $this->load->view('backend/index', $page_data);
        //redirect(site_url('home/profile/user_profile'), 'refresh');
    }

    function manage_profile_agent() {
        $page_data['page_name'] = 'manage_profile_agent';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data'] = $this->user_model->edit_agent_view($this->session->userdata('user_id'));
        //$page_data['edit_data'] = $this->db->get_where('users', array('id' => $this->session->userdata('user_id')))->result_array();
        $this->load->view('backend/index', $page_data);
        //redirect(site_url('home/profile/user_profile'), 'refresh');
    }

    function invoice($payment_id = "") {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $page_data['page_name'] = 'invoice';
        $page_data['payment_details'] = $this->crud_model->get_payment_details_by_id($payment_id);
        $page_data['page_title'] = get_phrase('invoice');
        $this->load->view('backend/index', $page_data);
    }

    public function student_application_list($param1 = "", $param2 = "") {

        if ($param1 == "view") {
            $page_data['page_name'] = 'studentapplicantfullview';
            $page_data['tag'] = 'applicant_list';
            $page_data['page_title'] = get_phrase('studentapplicantfullview');
            $page_data['student'] = $this->user_model->get_studentapplicantlistdata($param2);
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'edit') {
            $page_data['page_name'] = 'studentlist_edit';
            $page_data['page_title'] = get_phrase('studentlist_edit');
            $page_data['tag'] = 'applicant_list';
            $page_data['student'] = $this->user_model->get_studentapplicantlistdata($param2);
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == "delete") {
            $this->user_model->delete_student($param2);
            $page_data['page_name'] = 'applicationlist';
            $page_data['page_title'] = get_phrase('applicants_list');
            $page_data['tag'] = 'applicant_list';
            $page_data['student'] = $this->user_model->get_applicantlist();
            $this->load->view('backend/index', $page_data);
        } else {
            $page_data['page_name'] = 'student_application_list';
            $page_data['page_title'] = get_phrase('applicants_list');
            $page_data['tag'] = 'applicant_list';
            $page_data['users'] = $this->user_model->get_applicantlist();
            $this->load->view('backend/index', $page_data);
        }
    }

    function become_an_instructor() {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        // CHEKING IF A FORM HAS BEEN SUBMITTED FOR REGISTERING AN INSTRUCTOR
        if (isset($_POST) && !empty($_POST)) {
            $this->user_model->post_instructor_application();
        }

        // CHECK USER AVAILABILITY
        $user_details = $this->user_model->get_all_user($this->session->userdata('user_id'));
        if ($user_details->num_rows() > 0) {
            $page_data['user_details'] = $user_details->row_array();
        } else {
            $this->session->set_flashdata('error_message', get_phrase('user_not_found'));
            $this->load->view('backend/index', $page_data);
        }
        $page_data['page_name'] = 'become_an_instructor';
        $page_data['page_title'] = get_phrase('become_an_instructor');
        $this->load->view('backend/index', $page_data);
    }

    // PAYOUT REPORT
    public function payout_report() {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $page_data['page_name'] = 'payout_report';
        $page_data['page_title'] = get_phrase('payout_report');

        $page_data['payouts'] = $this->crud_model->get_payouts($this->session->userdata('user_id'), 'user');
        $page_data['total_pending_amount'] = $this->crud_model->get_total_pending_amount($this->session->userdata('user_id'));
        $page_data['total_payout_amount'] = $this->crud_model->get_total_payout_amount($this->session->userdata('user_id'));
        $page_data['requested_withdrawal_amount'] = $this->crud_model->get_requested_withdrawal_amount($this->session->userdata('user_id'));

        if (addon_status('ebook')) {
            $this->db->select_sum('instructor_revenue');
            $this->db->where('ebook.user_id', $this->session->userdata('user_id'));
            $this->db->where('ebook_payment.instructor_payment_status', 0);
            $this->db->from('ebook_payment');
            $this->db->join('ebook', 'ebook_payment.ebook_id = ebook.ebook_id');
            $ebook_total_pending_amount = $this->db->get()->row('instructor_revenue');

            $page_data['total_pending_amount'] = $page_data['total_pending_amount'] + $ebook_total_pending_amount;
        }

        $this->load->view('backend/index', $page_data);
    }

    // HANDLED WITHDRAWAL REQUESTS
    public function withdrawal($action = "") {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($action == 'request') {
            $this->crud_model->add_withdrawal_request();
        }

        if ($action == 'delete') {
            $this->crud_model->delete_withdrawal_request();
        }

        redirect(site_url('user/payout_report'), 'refresh');
    }

    // Ajax Portion
    public function ajax_get_video_details() {
        $video_details = $this->video_model->getVideoDetails($_POST['video_url']);
        echo $video_details['duration'];
    }

    // this function is responsible for managing multiple choice question
    function manage_multiple_choices_options() {
        $page_data['number_of_options'] = $this->input->post('number_of_options');
        $this->load->view('backend/user/manage_multiple_choices_options', $page_data);
    }

    // This function checks if this course belongs to current logged in instructor
    function is_the_course_belongs_to_current_instructor($course_id, $id = null, $type = null) {
        $course_details = $this->crud_model->get_course_by_id($course_id)->row_array();

        if ($course_details['multi_instructor']) {
            $instructor_ids = explode(',', $course_details['user_id']);
            if (!in_array($this->session->userdata('user_id'), $instructor_ids)) {
                $this->session->set_flashdata('error_message', get_phrase('you_do_not_have_right_to_access_this_course'));
                redirect(site_url('user/courses'), 'refresh');
            }
        } else {
            if ($course_details['user_id'] != $this->session->userdata('user_id')) {
                $this->session->set_flashdata('error_message', get_phrase('you_do_not_have_right_to_access_this_course'));
                redirect(site_url('user/courses'), 'refresh');
            }
        }

        if ($type == 'section' && $this->db->get_where('section', array('id' => $id, 'course_id' => $course_id))->num_rows() <= 0) {
            $this->session->set_flashdata('error_message', get_phrase('you_do_not_have_right_to_access_this_section'));
            redirect(site_url('user/courses'), 'refresh');
        }
        if ($type == 'lesson' && $this->db->get_where('lesson', array('id' => $id, 'course_id' => $course_id))->num_rows() <= 0) {
            $this->session->set_flashdata('error_message', get_phrase('you_do_not_have_right_to_access_this_lesson'));
            redirect(site_url('user/courses'), 'refresh');
        }
        if ($type == 'quize' && $this->db->get_where('lesson', array('id' => $id, 'course_id' => $course_id))->num_rows() <= 0) {
            $this->session->set_flashdata('error_message', get_phrase('you_do_not_have_right_to_access_this_quize'));
            redirect(site_url('user/courses'), 'refresh');
        }
    }

    public function ajax_sort_section() {
        $section_json = $this->input->post('itemJSON');
        $this->crud_model->sort_section($section_json);
    }

    public function ajax_sort_lesson() {
        $lesson_json = $this->input->post('itemJSON');
        $this->crud_model->sort_lesson($lesson_json);
    }

    public function ajax_sort_question() {
        $question_json = $this->input->post('itemJSON');
        $this->crud_model->sort_question($question_json);
    }

    // Mark this lesson as completed codes
    function save_course_progress() {
        $response = $this->crud_model->save_course_progress();
        echo $response;
    }

    // REMOVING INSTRUCTOR FROM COURSE
    public function remove_an_instructor($course_id, $instructor_id) {
        $course_details = $this->crud_model->get_course_by_id($course_id)->row_array();

        if ($course_details['creator'] == $instructor_id) {
            $this->session->set_flashdata('error_message', get_phrase('course_creator_can_be_removed'));
            redirect('admin/course_form/course_edit/' . $course_id);
        }

        if ($course_details['multi_instructor']) {
            $instructor_ids = explode(',', $course_details['user_id']);

            if (in_array($instructor_id, $instructor_ids) && in_array($this->session->userdata('user_id'), $instructor_ids)) {
                if (count($instructor_ids) > 1) {
                    if (($key = array_search($instructor_id, $instructor_ids)) !== false) {
                        unset($instructor_ids[$key]);

                        $data['user_id'] = implode(",", $instructor_ids);
                        $this->db->where('id', $course_id);
                        $this->db->update('course', $data);

                        $this->session->set_flashdata('flash_message', get_phrase('instructor_has_been_removed'));
                        if ($this->session->userdata('user_id') == $instructor_id) {
                            redirect('user/courses/');
                        } else {
                            redirect('user/course_form/course_edit/' . $course_id);
                        }
                    }
                } else {
                    $this->session->set_flashdata('error_message', get_phrase('a_course_should_have_at_least_one_instructor'));
                    redirect('user/course_form/course_edit/' . $course_id);
                }
            } else {
                $this->session->set_flashdata('error_message', get_phrase('invalid_instructor_id'));
                redirect('user/course_form/course_edit/' . $course_id);
            }
        } else {
            $this->session->set_flashdata('error_message', get_phrase('a_course_should_have_at_least_one_instructor'));
            redirect('user/course_form/course_edit/' . $course_id);
        }
    }

    //Blog start
    function add_blog() {
        $page_data['page_title'] = get_phrase('add_blog');
        $page_data['page_name'] = 'blog_add';
        $this->load->view('backend/index', $page_data);
    }

    function edit_blog($blog_id = "") {
        $page_data['blog'] = $this->crud_model->get_blogs($blog_id)->row_array();
        $page_data['page_title'] = get_phrase('edit_blog');
        $page_data['page_name'] = 'blog_edit';
        $this->load->view('backend/index', $page_data);
    }

    function blog($param1 = "", $param2 = "") {
        if (!get_frontend_settings('instructors_blog_permission')) {
            $this->session->set_flashdata('error_message', get_phrase('access_to_the_blog_section_denied'));
            redirect(site_url('user/dashboard'), 'refresh');
        }


        if ($param1 == 'add') {
            $this->crud_model->add_blog();
            $this->session->set_flashdata('flash_message', get_phrase('blog_added_successfully'));
            redirect(site_url('user/pending_blog'), 'refresh');
        } elseif ($param1 == 'update') {
            if ($this->check_validity($param2)) {
                $this->crud_model->update_blog($param2);
            }
            $this->session->set_flashdata('flash_message', get_phrase('blog_updated_successfully'));
            redirect(site_url('user/blog'), 'refresh');
        } elseif ($param1 == 'status') {
            if ($this->check_validity($param2)) {
                $this->crud_model->update_blog_status($param2);
            }
            $this->session->set_flashdata('flash_message', get_phrase('blog_status_has_been_updated'));
            redirect(site_url('user/blog'), 'refresh');
        } elseif ($param1 == 'delete') {
            if ($this->check_validity($param2)) {
                $this->crud_model->blog_delete($param2);
            }
            $this->session->set_flashdata('flash_message', get_phrase('blog_deleted_successfully'));
            redirect(site_url('user/blog'), 'refresh');
        }
        $page_data['blogs'] = $this->crud_model->get_blogs_by_user_id($this->session->userdata('user_id'));
        $page_data['page_title'] = get_phrase('blog');
        $page_data['page_name'] = 'blog';
        $this->load->view('backend/index', $page_data);
    }

    function pending_blog($param1 = "", $param2 = "") {
        if ($param1 == 'delete') {
            if ($this->check_validity($param2)) {
                $this->crud_model->blog_delete($param2);
            }
            $this->session->set_flashdata('flash_message', get_phrase('blog_deleted_successfully'));
            redirect(site_url('user/pending_blog'), 'refresh');
        }
        $page_data['pending_blogs'] = $this->crud_model->get_instructors_pending_blog($this->session->userdata('user_id'));
        $page_data['page_title'] = get_phrase('pending_blog');
        $page_data['page_name'] = 'pending_blog';
        $this->load->view('backend/index', $page_data);
    }

    function check_validity($blog_id = "") {
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->where('blog_id', $blog_id);
        $query = $this->db->get('blogs');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //End Blog
}

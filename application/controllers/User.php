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

        $this->load->model('agent_model');
        $this->load->model('domestic_model');

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $role = $this->session->userdata('role_id');
        if ($role == '3') {

            $agent_id = $this->session->userdata('user_id');

            $page_data['wid_reg_applicants'] = $this->agent_model->count_reg_applicants($agent_id);
            $page_data['wid_req_applicants'] = $this->agent_model->count_req_applicants($agent_id);
            $page_data['wid_app_not_completed'] = $this->agent_model->count_app_not_completed($agent_id);
            $page_data['wid_app_completed'] = $this->agent_model->count_app_completed($agent_id);
        } elseif ($role == '2') {

            $page_data['widget_reg_applicants'] = $this->domestic_model->count_reg_applicants();
            $page_data['widget_req_applicants'] = $this->domestic_model->count_req_applicants();
            $page_data['widget_app_not_completed'] = $this->domestic_model->count_app_not_completed();
            $page_data['widget_app_completed'] = $this->domestic_model->count_app_completed();
        }

        // Pass additional data to the view
        $page_data['role'] = $role;

        if ($this->session->userdata('role_id') == '3') {
            $page_data['page_name'] = 'dashboard_agent';
        } else {
            $page_data['page_name'] = 'dashboard_domestic';
        }

        $page_data['page_title'] = get_phrase('dashboard');
        $page_data['tag'] = 'dashboard';
        $this->load->view('backend/index.php', $page_data);
    }

    public function call_user() {

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $this->load->model('agent_model');

        $page_data['page_name'] = 'call_user';
        $page_data['page_title'] = get_phrase('domestic_list');
        $page_data['tag'] = 'call_user';
        $page_data['users'] = $this->agent_model->domestic_user_list();
        $this->load->view('backend/index', $page_data);
    }

    /*
     * DOMESTIC USER SECTION 
     */

    // Main actions
    public function domestic($param1 = "", $param2 = "") {

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

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

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        //check existing email addresses
        $existing_email = $this->user_model->email_address_status();
        if ($existing_email == 1) {
            $url = 'user/domestic/add';
            $this->session->set_flashdata('error_message', get_phrase('There is already a user with that email!'));
            redirect(site_url($url), 'refresh');
        }

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

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

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

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $this->user_model->edit_domestic_user_profile();

        $page_data['page_name'] = 'manage_profile_domestic';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data'] = $this->db->get_where('users', array('id' => $this->session->userdata('user_id')))->result_array();
        $this->load->view('backend/index', $page_data);
    }

    public function edit_domestic_user() {

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $user_id = $this->input->post('domestic_user_id');
        $input_email = $this->input->post('email');
        $user_data = $this->user_model->user_data($user_id);

        if ($input_email != $user_data['email']) {

            //check existing email addresses
            $existing_email = $this->user_model->email_address_status();
            if ($existing_email == 1) {

                $domestic_user_id = $this->input->post('domestic_user_id');
                $url = 'user/domestic/edit/' . $domestic_user_id;
                $this->session->set_flashdata('error_message', get_phrase('There is already a user with that email!'));
                redirect(site_url($url), 'refresh');
            }
        }

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

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $this->user_model->edit_agent_profile();

        $page_data['page_name'] = 'manage_profile_agent';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data'] = $this->user_model->edit_agent_view($this->session->userdata('user_id'));
        $this->load->view('backend/index', $page_data);
    }

    public function agents($param1 = "", $param2 = "") {

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

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
            $page_data['users'] = $this->user_model->basic_agent_data();
            $this->load->view('backend/index', $page_data);
        }
    }

    public function add_agents() {

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        //check existing email addresses
        $existing_email = $this->user_model->email_address_status();
        if ($existing_email == 1) {
            $url = 'user/agents/add';
            $this->session->set_flashdata('error_message', get_phrase('There is already a user with that email!'));
            redirect(site_url($url), 'refresh');
        }

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

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $user_id = $this->input->post('agent_id');
        $input_email = $this->input->post('email');
        $user_data = $this->user_model->user_data($user_id);

        if ($input_email != $user_data['email']) {

            //check existing email addresses
            $existing_email = $this->user_model->email_address_status();
            if ($existing_email == 1) {
                $agent_id = $this->input->post('agent_id');
                $url = 'user/agents/edit/' . $agent_id;
                $this->session->set_flashdata('error_message', get_phrase('There is already a user with that email!'));
                redirect(site_url($url), 'refresh');
            }
        }




        $this->user_model->edit_agent();

        $page_data['page_name'] = 'agents';
        $page_data['page_title'] = get_phrase('agent_list');
        $page_data['tag'] = 'agent_list';
        $page_data['users'] = $this->user_model->get_agents();
        $this->load->view('backend/index', $page_data);
    }

    public function users($param1 = "", $param2 = "") {

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

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

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

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

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $file_name = time() . $_FILES["slide"]['name'];

        $config['upload_path'] = './uploads/slide/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        //$config['max_size'] = 100;
        $config['file_name'] = $file_name;

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

            /* //Disabled school rule rest function
              $this->db->set('read_rule', '0');
              $this->db->update('agents'); */


            $page_data['page_name'] = 'update_rule';
            $page_data['page_title'] = get_phrase('update_school_rule');
            $page_data['tag'] = 'school_rule';
            $page_data['num_of_rules'] = $this->crud_model->count_school_active_rules();
            $page_data['rules'] = $this->crud_model->get_school_rules();
            $this->load->view('backend/index', $page_data);
        }
    }

    //reset rules by cron job
    public function reset_school_rules() {

        /*
          // Disabled school rule rest function
          $this->db->set('read_rule', '0');
          $this->db->update('agents');

          //delete old rule records
          $this->db->empty_table('school_rule_test');
         */
    }

    public function update_new_rule() {

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        // School stuff
        $page_data['page_name'] = 'update_rule';
        $page_data['page_title'] = get_phrase('update_school_rule');
        $page_data['tag'] = 'school_rule';
        $page_data['num_of_rules'] = $this->crud_model->count_school_active_rules();
        $page_data['rules'] = $this->crud_model->get_school_rules();
        $this->load->view('backend/index', $page_data);
    }

    public function school_rule($param2 = "") {

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        // School stuff
        $page_data['page_name'] = 'school_rule';
        $page_data['page_title'] = get_phrase('school_rule');
        $page_data['tag'] = 'school_rule';
        $created_at = $this->crud_model->latest_update();
        $page_data['created_at'] = $created_at->created_date;
        $page_data['num_of_rules'] = $this->crud_model->count_school_active_rules();
        $page_data['rules'] = $this->crud_model->get_school_rules($param2);
        $this->load->view('backend/index', $page_data);
    }

    public function school_rules() {

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
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
        $current_page = 1;
        $total_pages = $this->crud_model->count_school_active_rules();
        foreach ($link_group->result() as $rule_lists) {
            $rule_id = $rule_lists->id;
            $user_id = $this->session->userdata('user_id');
            $complete = $this->crud_model->check_rule_status($rule_id, $user_id);

            //$rule_page_name = $rule_lists->title;

            $rule_page_name = 'Page - ' . $current_page . '/' . $total_pages;
            if ($complete == 1) {
                $list[] = '<li class="list-group-item" style="background-color:#E5E4E2"><a href="' . site_url('user/school_rules_test/' . $rule_id) . '">' . $rule_page_name . '</a></li>';
            } else {
                $list[] = '<li class="list-group-item" style="">' . $rule_page_name . '</li>';
            }
            $current_page++;
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

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

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
        $current_page = 1;
        $total_pages = $this->crud_model->count_school_active_rules();
        foreach ($link_group->result() as $rule_lists) {
            $rule_id = $rule_lists->id;
            $user_id = $this->session->userdata('user_id');
            $complete = $this->crud_model->check_rule_status($rule_id, $user_id);

            //$rule_page_name = $rule_lists->title;

            $rule_page_name = 'Page - ' . $current_page . '/' . $total_pages;
            if ($complete == 1) {
                $list[] = '<li class="list-group-item" style="background-color:#E5E4E2"><a href="' . site_url('user/school_rules_test/' . $rule_id) . '">' . $rule_page_name . '</a></li>';
            } else {
                $list[] = '<li class="list-group-item" style="">' . $rule_page_name . '</li>';
            }
            $current_page++;
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

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $page_data['page_name'] = 'school_rule_success';
        $page_data['page_title'] = get_phrase('success_rule');
        $page_data['tag'] = 'school_rule';
        $this->load->view('backend/index.php', $page_data);
    }

    public function student_data($param1 = "", $param2 = "") {  // domestic    
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'view') {
            $page_data['page_name'] = 'student_view_domestic';
            $page_data['page_title'] = get_phrase('student_view');
            $page_data['tag'] = 'list_of_application';
            $page_data['students'] = $this->user_model->get_single_student($param2);
            $this->load->view('backend/index', $page_data);
        }
    }

    public function student($param1 = "", $param2 = "") {

        $this->load->model('agent_model');

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($this->session->userdata('rule_pass') != '1') {
            redirect(site_url('user'), 'refresh');
        }

        if ($param1 == 'add') { // 
            $page_data['page_name'] = 'student_add';
            $page_data['page_title'] = get_phrase('student_add');
            $page_data['tag'] = 'student_add';
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'create_student') {
            if ($this->session->userdata('user_login') != true) {
                redirect(site_url('login'), 'refresh');
            }

            $this->agent_model->student_add();
            redirect(site_url('user/student'), 'refresh');
        } elseif ($param1 == 'edit_student') {
            if ($this->session->userdata('user_login') != true) {
                redirect(site_url('login'), 'refresh');
            }
            $this->agent_model->student_edit();
            redirect(site_url('user/student'), 'refresh');
        } elseif ($param1 == 'edit') {
            $page_data['page_name'] = 'student_edit';
            $page_data['page_title'] = get_phrase('student_edit');
            $page_data['tag'] = 'student_edit';
            $page_data['students'] = $this->user_model->get_single_student($param2);
            $page_data['families'] = $this->user_model->family_data($param2);
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
            $page_data['tag'] = 'student_list';
            $page_data['students'] = $this->user_model->get_single_student($param2);
            $page_data['families'] = $this->user_model->family_data($param2);
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'create_application') {

            $page_data['page_name'] = 'student_application';
            $page_data['page_title'] = get_phrase('student_application');
            $page_data['tag'] = 'student_application';
            $page_data['student'] = $this->user_model->get_studentdata($param2);
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'search') {
            
        } else {

            $page_data['page_name'] = 'students';
            $page_data['page_title'] = get_phrase('students');
            $page_data['tag'] = 'student_list';
            $page_data['students'] = $this->user_model->get_student();
            $this->load->view('backend/index', $page_data);
        }
    }

    public function student_application_domestic($param1 = "", $param2 = "") {

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($this->session->userdata('role_id') != 2) {
            redirect(site_url('login/logout'), 'refresh');
        }

        $this->load->model('domestic_model');

        if ($param1 == 'view') {
            // application create form
            $page_data['page_name'] = 'student_app_view_domestic';
            $page_data['page_title'] = get_phrase('student_application');
            $page_data['tag'] = 'list_of_application';
            $page_data['agent'] = $this->user_model->get_agent_by_student_id($param2);
            $page_data['documents'] = $this->user_model->document_count($param2);
            $page_data['students_app'] = $this->user_model->student_application_edit($param2);
            $page_data['travel'] = $this->user_model->travel_data($param2);
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'edit') {
            // application create form
            $page_data['page_name'] = 'student_app_edit_domestic';
            $page_data['page_title'] = get_phrase('student_application');
            $page_data['tag'] = 'list_of_application';
            $page_data['agent'] = $this->user_model->get_agent_by_student_id($param2);
            $page_data['students_app'] = $this->user_model->student_application_edit($param2);
            $page_data['travel'] = $this->user_model->travel_data($param2);
            $this->load->view('backend/index', $page_data);
        } else {
            $page_data['page_name'] = 'student_app_list_domestic';
            $page_data['page_title'] = get_phrase('student_view');
            $page_data['tag'] = 'list_of_application';

            $students = $this->user_model->student_application_list_domestic();
            $application_list_data = array();

            foreach ($students->result_array() as $key => $student) {
                $application_list_data[] = array(
                    'student_id' => $student['id'],
                    'app_id' => $student['app_id'],
                    'student_name' => $student['kanji_fn'] . ' ' . $student['kanji_ln'],
                    'created_at' => $student['created_at'],
                    'status' => $student['app_status'],
                    'nas' => $student['nas'],
                    'documents' => $this->user_model->document_count($student['id']),
                    'error' => $this->user_model->error_files($student['app_id'])
                );
            }

            //$page_data['doc_error'] = $this->user_model->error_files();
            //$page_data['documents'] = $this->user_model->document_count();
            $page_data['students'] = $application_list_data;

            // print_r($this->user_model->student_application_list_domestic()); exit();
            $this->load->view('backend/index', $page_data);
        }
    }

    public function student_immigration_information($param1 = "", $param2 = "") {

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $this->load->model('domestic_model');

        if ($param1 == 'add') {

            // application create form           
            //$this->user_model->immigration_information_add();
            $this->domestic_model->immigration_information_add();

            $link = 'user/student_application_domestic/';
            redirect(site_url($link), 'refresh');
        }
    }

    public function student_application($param1 = "", $param2 = "") {

        $this->load->model('agent_model');
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($this->session->userdata('rule_pass') != '1') {
            redirect(site_url('user'), 'refresh');
        }

        if ($param1 == 'view') {
            // application create form
            $page_data['page_name'] = 'student_application_view';
            $page_data['page_title'] = get_phrase('student_application');
            $page_data['tag'] = 'student_application_list';
            $page_data['students_app'] = $this->user_model->student_application_edit($param2);
            $page_data['travel'] = $this->user_model->travel_data($param2);
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'create') {
            // application create form
            $page_data['page_name'] = 'student_application_add';
            $page_data['page_title'] = get_phrase('student_application');
            $page_data['tag'] = 'student_application_new';
            $page_data['student'] = $this->user_model->get_student_detail($param2);
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'add') {
            // application add
            $last_id = $this->agent_model->create_application_add_by_agent();
            $this->email_model->create_new_application_mail_by_agent($last_id);

            $link = 'user/student_application/';
            redirect(site_url($link), 'refresh');
        } elseif ($param1 == 'edit') {

            $page_data['page_name'] = 'student_application_edit';
            $page_data['page_title'] = get_phrase('student_application');
            $page_data['tag'] = 'student_application_list';
            $page_data['students_app'] = $this->user_model->student_application_edit($param2);
            $page_data['travel'] = $this->user_model->travel_data($param2);
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'update') {

            $this->load->model('agent_model');
            $this->agent_model->student_details_update();

            $page_data['page_name'] = 'student_application_list';
            $page_data['page_title'] = get_phrase('student_application');
            $page_data['tag'] = 'student_application';
//            $page_data['students'] = $this->user_model->student_application_list();
//            $this->load->view('backend/index', $page_data);

            $link = '/user/student_application/';
            redirect(site_url($link), 'refresh');
        } elseif ($param1 == 'delete') {
            $this->user_model->delete_student_application($param2);

            $page_data['page_name'] = 'student_application_list';
            $page_data['page_title'] = get_phrase('student_view');
            $page_data['tag'] = 'student_edit';
//            $page_data['students'] = $this->user_model->student_application_list();
//            $this->load->view('backend/index', $page_data);

            $link = '/user/student_application/';
            redirect(site_url($link), 'refresh');
        } else {
            $page_data['page_name'] = 'student_application_list';
            $page_data['page_title'] = get_phrase('Application_List');
            $page_data['tag'] = 'student_application_list';
            $students = $this->user_model->student_application_list();

            $application_list_data = array();
            foreach ($students->result_array() as $key => $student) {
                $application_list_data[] = array(
                    'student_id' => $student['id'],
                    'app_id' => $student['app_id'],
                    'student_name' => $student['kanji_fn'] . ' ' . $student['kanji_ln'],
                    'created_at' => $student['created_at'],
                    'documents' => $this->user_model->document_count($student['id']),
                    'status' => $student['app_status'],
                    'error' => $this->user_model->error_files($student['app_id'])
                );
            }

            // print_r($application_list_data);

            $page_data['students'] = $application_list_data;

            $this->load->view('backend/index', $page_data);
        }
    }

    public function document_review($param1 = "") {


        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $this->load->model('domestic_model');

        $student_id = $this->input->post('student_id');
        $application_id = $this->input->post('application_id');

        if ($param1 == 'update_single_document') {
            //$this->domestic_model->application_review();
            $this->domestic_model->single_document_status_update();
            // email notification 
            // $this->email_model->all_application_review_status_mail();
        }

        if ($param1 == 'update_all_document') {
            //$this->domestic_model->application_review();
            $this->domestic_model->all_document_status_update();
            // email notification 
            $this->email_model->all_application_review_status_mail();
        }
        $link = 'user/student_materials_domestic/view/' . $student_id . '/' . $application_id;
        redirect(site_url($link), 'refresh');
    }

    public function student_material_review($param1 = "") { // check and delete this function
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $this->load->model('domestic_model');

        $student_id = $this->input->post('student_id');
        $application_id = $this->input->post('application_id');

        if ($param1 == 'update') {
            //$this->domestic_model->application_review();
            $this->domestic_model->all_document_status_update();
            // email notification 
            $this->email_model->all_application_review_status_mail();

            $link = 'user/student_materials_domestic/view/' . $student_id . '/' . $application_id;
            redirect(site_url($link), 'refresh');
        }
    }

    /* public function document_review($param1 = "") {

      if ($this->session->userdata('user_login') != true) {
      redirect(site_url('login'), 'refresh');
      }

      $this->load->model('domestic_model');

      $student_id = $this->input->post('student_id');
      if ($param1 == 'update') {
      //$this->domestic_model->application_document_review();
      $this->domestic_model->single_document_status_update();

      // email notification
      $this->email_model->document_review_mail();

      $data['page_name'] = 'student_materials_domestic';
      $data['page_title'] = get_phrase('Application_List');
      $data['tag'] = 'student_application_list';

      $student_url = $this->input->post('student');
      $application_url = $this->input->post('application');

      $link = 'user/student_materials_domestic/view/' . $student_url . '/' . $application_url;
      redirect(site_url($link), 'refresh');
      }
      } */

    public function student_materials_domestic($param1 = "", $param2 = "", $param3 = "") {

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($this->session->userdata('role_id') != 2) {
            redirect(site_url('login/logout'), 'refresh');
        }

        $this->load->model('domestic_model');

        if ($param1 == 'view') {
            $data['page_name'] = 'student_materials_domestic';
            $data['page_title'] = get_phrase('Application_List');
            $data['tag'] = 'list_of_application';

            $data['student_url_id'] = $param2;
            $data['application_url_id'] = $param3;

            $data['all_document_status'] = $this->domestic_model->all_document_status($param3);
            $data['students'] = $this->user_model->get_student_info($param2);
            $data['materials'] = $this->domestic_model->materials($param3)->result_array();
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

    //Document management for all users
    public function document_management($param1 = "", $param2 = "", $param3 = "", $param4 = "") {
        // p1 = function type, p2 = document ID
        $this->load->model('domestic_model');

        
        if ($param1 == 'delete_doc_by_domestic_user') {
            $document_id = $param2;
            $this->domestic_model->delete_single_document($document_id);
            
            $url = 'user/student_materials_domestic/view/' . $param3 . '/' . $param4;
            redirect(site_url($url), 'refresh');
        }
    }

    public function student_materials($param1 = "", $param2 = "", $param3 = "", $param4 = "") {

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $this->load->model('agent_model');

        if ($param1 == 'page') {

            $data['doc1'] = $this->agent_model->document_check('doc1', $param2, $param3);
            $data['doc2'] = $this->agent_model->document_check('doc2', $param2, $param3);
            $data['doc3'] = $this->agent_model->document_check('doc3', $param2, $param3);
            $data['doc4'] = $this->agent_model->document_check('doc4', $param2, $param3);
            $data['doc5'] = $this->agent_model->document_check('doc5', $param2, $param3);
            $data['doc6'] = $this->agent_model->document_check('doc6', $param2, $param3);
            $data['doc7'] = $this->agent_model->document_check('doc7', $param2, $param3);
            $data['doc8'] = $this->agent_model->document_check('doc8', $param2, $param3);
            $data['doc9'] = $this->agent_model->document_check('doc9', $param2, $param3);
            $data['doc10'] = $this->agent_model->document_check('doc10', $param2, $param3);
            $data['doc11'] = $this->agent_model->document_check('doc11', $param2, $param3);
            $data['doc12'] = $this->agent_model->document_check('doc12', $param2, $param3);
            $data['doc13'] = $this->agent_model->document_check('doc13', $param2, $param3);
            $data['doc14'] = $this->agent_model->document_check('doc14', $param2, $param3);
            $data['doc15'] = $this->agent_model->document_check('doc15', $param2, $param3);
            $data['doc16'] = $this->agent_model->document_check('doc16', $param2, $param3);
            $data['doc17'] = $this->agent_model->document_check('doc17', $param2, $param3);
            $data['doc18'] = $this->agent_model->document_check('doc18', $param2, $param3);
            $data['doc19'] = $this->agent_model->document_check('doc19', $param2, $param3);
            $data['doc20'] = $this->agent_model->document_check('doc20', $param2, $param3);
            $data['doc21'] = $this->agent_model->document_check('doc21', $param2, $param3);
            $data['doc22'] = $this->agent_model->document_check('doc22', $param2, $param3);
            $data['doc23'] = $this->agent_model->document_check('doc23', $param2, $param3);
            $data['doc24'] = $this->agent_model->document_check('doc24', $param2, $param3);
            $data['doc25'] = $this->agent_model->document_check('doc25', $param2, $param3);
            $data['doc26'] = $this->agent_model->document_check('doc26', $param2, $param3);
            $data['doc27'] = $this->agent_model->document_check('doc26', $param2, $param3);
            $data['doc28'] = $this->agent_model->document_check('doc26', $param2, $param3);

            $data['page_name'] = 'student_materials';
            $data['page_title'] = get_phrase('Application_List');
            $data['tag'] = 'student_application_list';
            $data['students'] = $this->user_model->get_student_info($param2);
            $data['materials'] = $this->agent_model->materials($param3)->result_array();
            $this->load->view('backend/index', $data);
        } elseif ($param1 == 'add') {

//            
//            $available_doc = $this->agent_model->check_duplicate_documents();
//            
//            $app_id = $this->input->post('app_id');
//            $student_id = $this->input->post('student_id');
//            $material_type_val = $this->input->post('material_type');
//            $document_type = $this->input->post('document_type');
//            $material_type = $this->find_document_type($material_type_val);
//            $student_data = $this->user_model->get_student_data($student_id);
//            $student_name = $student_data->kanji_fn . '_' . $student_data->kanji_ln;
//
//            $file_name = time() . '_' . $material_type . '_' . $_FILES["material"]['name'];
//            $file_name = $app_id . '_' . $material_type . '_' . $student_name . '_' . $document_type;
//            $file_name = str_replace(' ', '_', $file_name);
//
//            $file_name = $file_name . '.pdf';
//            $config['upload_path'] = './uploads/document/student_document/';
//            $config['allowed_types'] = 'pdf';
//            $config['file_name'] = $file_name;
//
//            $this->agent_model->add_materials($file_name);
//
//            // Send email notification
//            $this->email_model->upload_new_document_mail($file_name);
//
//            //exit();
//            $this->load->library('upload', $config);
//            $this->upload->do_upload('material');
//
//
//            //document upload log 
//            $this->agent_model->document_upload_log();
//
//            $data['page_name'] = 'student_materials';
//            $data['page_title'] = get_phrase('Application_List');
//            $data['tag'] = 'student_application_list';
//            $data['students'] = $this->user_model->get_student_info($student_id);
//            $data['materials'] = $this->agent_model->materials($app_id)->result_array();
//            $this->load->view('backend/index', $data);

            $available_doc = $this->agent_model->check_duplicate_documents();

            $app_id = $this->input->post('app_id');
            $student_id = $this->input->post('student_id');
            $material_type_val = $this->input->post('material_type');
            $document_type = $this->input->post('document_type');
            $material_type = $this->find_document_type($material_type_val);
            $student_data = $this->user_model->get_student_data($student_id);

            if ($document_type == 'original') {
                $document_type = '原本';
            } else {
                $document_type = '翻訳';
            }

            if ($available_doc == '0') {

                $student_name = $student_data->kanji_fn . '_' . $student_data->kanji_ln;

                $file_name = time() . '_' . $material_type . '_' . $_FILES["material"]['name'];
                //$file_name = $app_id . '_' . $material_type . '_' . $student_name . '_' . $document_type;
                $file_name = $material_type . '_' . $student_name . '_' . $document_type;

                $file_name = str_replace(' ', '_', $file_name);

                $file_name = $file_name . '.pdf';
                $config['allowed_types'] = 'pdf';
                $config['upload_path'] = './uploads/document/student_document/';
                $config['allowed_types'] = 'pdf';
                $config['file_name'] = $file_name;

                //exit();
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('material')) {
                    $this->agent_model->add_materials($file_name);
                    // Send email notification
                    $this->email_model->upload_new_document_mail($file_name);
                    //document upload log 
                    $this->agent_model->document_upload_log();
                }
            }


            $url = 'user/student_materials/page/' . $student_id . '/' . $app_id;
            redirect(site_url($url), 'refresh');
        } elseif ($param1 == 'update_document') {

            $app_id = $this->input->post('app_id');
            $student_id = $this->input->post('student_id');
            $material_type_val = $this->input->post('material_type');
            $document_type = $this->input->post('document_type');
            $material_type = $this->find_document_type($material_type_val);
            $student_data = $this->user_model->get_student_data($student_id);
            $student_name = $student_data->kanji_fn . '_' . $student_data->kanji_ln;

            $file_name = time() . '_' . $material_type . '_' . $_FILES["material"]['name'];

            //$file_name = $app_id . '_' . $material_type . '_' . $student_name . '_' . $document_type;
            $file_name = $material_type . '_' . $student_name . '_' . $document_type;
            $file_name = str_replace(' ', '_', $file_name);

            $file_name = $file_name . '.pdf';

            if (file_exists("./uploads/document/student_document/$file_name"))
                unlink("./uploads/document/student_document/$file_name");

            $config['upload_path'] = './uploads/document/student_document/';
            $config['allowed_types'] = 'pdf';
            $config['allowed_types'] = 'pdf';
            $config['file_name'] = $file_name;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('material')) {
                $this->agent_model->update_materials($file_name);
                $this->email_model->re_upload_document_mail($file_name);
            }

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

    public function find_document_type($doc) {

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $doc_type_name = "";
        switch ($doc) {
            case 'doc1':
                $doc_type_name = '入学 願書 ※申請者署名'; //'Application for Admission'; //
                break;
            case 'doc2':
                $doc_type_name = '履歴書 ※申請者署名'; //'Resume';
                break;
            case 'doc3':
                $doc_type_name = '留学理由書※申請者署名'; //'Statement of Purpose';
                break;
            case 'doc4':
                $doc_type_name = '経費支弁書※申請者署名'; //'Document for Sponsorship';
                break;
            case 'doc5':
                $doc_type_name = '経費支弁者の家族および同居者一覧 ※申請者署名'; //'List of Family Members of the Sponsor';
                break;
            case 'doc6':
                $doc_type_name = '卒業証明書（最終学歴）'; //'Graduation Certificate of the Latest Education';
                break;
            case 'doc7':
                $doc_type_name = '在学証明書（本人）'; //'Enrollment Certificate';
                break;
            case 'doc8':
                $doc_type_name = '学業成績表（最終学歴）'; //'Transcript of the Latest Education';
                break;
            case 'doc9':
                $doc_type_name = '日本語学習証明 (学校)'; //'Certificate of JP Learning from JP School';
                break;
            case 'doc10':
                $doc_type_name = '日本語学習証明 (試験)'; //'Pass Certificate of JP Language Test';
                break;
            case 'doc11':
                $doc_type_name = 'パスポートのコピー（本人）'; //'Copy of Passport(Applicant)';
                break;
            case 'doc12':
                $doc_type_name = '※発行が間に合わない場合は身分証明書'; //'Copy of ID card(Applicant)';
                break;
            case 'doc13':
                $doc_type_name = '出生 証明書（本人）'; //'Birth Certificate(Applicant)';
                break;
            case 'doc14':
                $doc_type_name = ''; //'Certificate of Relationship';
                break;
            case 'doc15':
                $doc_type_name = '身分証明書（支弁者）'; //'Copy of ID card(Sponsor)';
                break;
            case 'doc16':
                $doc_type_name = '預貯金残高証明書（支弁者）'; //'Deposit Balance Certificate(Sponsor)';
                break;
            case 'doc17':
                $doc_type_name = '在職証明書（支弁者）'; //'Certificate of occupation(Sponsor)';
                break;
            case 'doc18':
                $doc_type_name = '通帳明細（支弁者／1年分）'; //'Copy of Bank Book';
                break;
            case 'doc19':
                $doc_type_name = '収入証明書（支弁者／1年分）'; //'Income Certificate（Sponsor/3yaers）(Sponsor)';
                break;
            case 'doc20':
                $doc_type_name = '納税証明書（支弁者／1年分）'; //'Tax Certificate（Sponsor/3yaers）(Sponsor)';
                break;
            case 'doc21':
                $doc_type_name = '在職証明書（本人／在職中の場合）'; //'Certificate of Incumbency(Applicant)';
                break;
            case 'doc22':
                $doc_type_name = '住民票 又は 現住所の立証書類（本人、支弁者'; //'Certificate of Residence or substitute for address verification(Applicant)';
                break;
            case 'doc23':
                $doc_type_name = ''; //'Certificate of Residence or substitute documents(Sponsor)';
                break;
            case 'doc24':
                $doc_type_name = ''; //'Reason of Re-apply';
                break;
            case 'doc25':
                $doc_type_name = ''; //'Explanation of the Asset Formation Process(if needed/3years)';
                break;
            case 'doc26':
                $doc_type_name = ''; //'Business License (in case of individual business owner)';
                break;
        }

        return $doc_type_name;
    }

    public function search_student($param1 = "", $param2 = "") {
        $this->load->model('agent_model');

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'search') {
            $show_reg_students = $this->input->post('show_reg_students');

            if ($show_reg_students == 1) {

                $data['search_result'] = $this->agent_model->detail_student_search();
            } else {

                $data['search_result'] = $this->agent_model->student_search();
            }
        } else {
            unset(
                    $_SESSION['kanji_fn'],
                    $_SESSION['kanji_ln'],
                    $_SESSION['romaji_fn'],
                    $_SESSION['romaji_ln'],
                    $_SESSION['gender'],
                    $_SESSION['citizenship'],
                    $_SESSION['occupation'],
                    $_SESSION['show_reg_students'],
                    $_SESSION['application_status'],
                    $_SESSION['sponsor_surname']
            );
        }

        $data['page_name'] = 'student_search';
        $data['page_title'] = get_phrase('student_search');
        $data['tag'] = 'student_search';
        $this->load->view('backend/index', $data);
    }

    public function search_application($param1 = "", $param2 = "") {

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'search') {
            $this->load->model('agent_model');
            $search_result = $this->agent_model->search_application();

            $application_list_data = array();
            foreach ($search_result->result_array() as $key => $student) {
                $application_list_data[] = array(
                    'student_id' => $student['id'],
                    'app_id' => $student['app_id'],
                    'student_name' => $student['kanji_fn'] . ' ' . $student['kanji_ln'],
                    'created_at' => $student['created_at'],
                    'status' => $student['app_status'],
                    'error' => $this->user_model->error_files($student['app_id'])
                );
            }

            $data['search_result'] = $application_list_data;
        } else {
            unset(
                    $_SESSION['applicant_id'],
                    $_SESSION['student_fn'],
                    $_SESSION['student_ln'],
                    $_SESSION['nationality'],
                    $_SESSION['dst'],
                    $_SESSION['application_status'],
                    $_SESSION['application_place'],
            );
        }


        $data['page_name'] = 'search_application';
        $data['page_title'] = get_phrase('application_search');
        $data['tag'] = 'applicant_search';

        $this->load->view('backend/index', $data);
    }

    public function search_application_domestic($param1 = "", $param2 = "") {

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $this->load->model('domestic_model');
        if ($param1 == 'search') {

            $search_result = $this->domestic_model->search_application();

            $application_list_data = array();
            foreach ($search_result->result_array() as $key => $student) {
                $application_list_data[] = array(
                    'student_id' => $student['id'],
                    'app_id' => $student['app_id'],
                    'student_name' => $student['kanji_fn'] . ' ' . $student['kanji_ln'],
                    'created_at' => $student['created_at'],
                    'nas' => $student['nas'],
                    'status' => $student['app_status'],
                    'error' => $this->user_model->error_files($student['app_id'])
                );
            }

            $data['search_result'] = $application_list_data;
        } else {
            unset(
                    $_SESSION['applicant_id'],
                    $_SESSION['agent_id'],
                    $_SESSION['student_fn'],
                    $_SESSION['student_ln'],
                    $_SESSION['nationality'],
                    $_SESSION['dst'],
                    $_SESSION['application_status'],
                    $_SESSION['application_place'],
            );
        }

        $data['agents'] = $this->domestic_model->get_agents_list();

        $data['page_name'] = 'search_application_domestic';
        $data['page_title'] = get_phrase('search_application_domestic');
        $data['tag'] = 'search_application_domestic';

        $this->load->view('backend/index', $data);
    }

    public function add_studentinfor() { // CF
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $this->user_model->add_studentinfor();
        redirect(site_url('user/student'), 'refresh');
    }

//    // Student Registration
//    public function add_student() { //// CF
//        
//        if ($this->session->userdata('user_login') != true) {
//            redirect(site_url('login'), 'refresh');
//        }
//        
//        $this->load->model('agent_model');
//        $this->agent_model->student_add();
//
//        redirect(site_url('user/student'), 'refresh');
//    }
//    public function student_edit() {
//
//        if ($this->session->userdata('user_login') != true) {
//            redirect(site_url('login'), 'refresh');
//        }
//
//        $this->load->model('agent_model');
//        $this->agent_model->student_edit();
//
//        redirect(site_url('user/student'), 'refresh');
//    }

    public function delete_rule($param1 = "") {

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        //delete slide
        $this->user_model->delete_rule($param1);

        $url = "user/update_new_rule";
        redirect(site_url($url), 'refresh');

//        $page_data['page_name'] = 'update_rule';
//        $page_data['page_title'] = get_phrase('update_school_rule');
//        $page_data['tag'] = 'school_rule';
//        $page_data['num_of_rules'] = $this->crud_model->count_school_active_rules();
//        $page_data['rules'] = $this->crud_model->get_school_rules();
//        $this->load->view('backend/index', $page_data);
    }

    public function get_content() {

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

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

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // School stuff
        $page_data['page_name'] = 'stuff_information';
        $page_data['page_title'] = get_phrase('stuff_information');
        $page_data['tag'] = 'stuff_info';
        $page_data['users'] = $this->crud_model->get_school_stuff($param2);
        $this->load->view('backend/index', $page_data);
    }

    public function courses() {

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

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

    function manage_profile() {

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $page_data['page_name'] = 'manage_profile';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data'] = $this->db->get_where('users', array('id' => $this->session->userdata('user_id')))->result_array();
        $this->load->view('backend/index', $page_data);
        //redirect(site_url('home/profile/user_profile'), 'refresh');
    }

    function manage_profile_domestic() {

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $page_data['page_name'] = 'manage_profile_domestic';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data'] = $this->db->get_where('users', array('id' => $this->session->userdata('user_id')))->result_array();
        $this->load->view('backend/index', $page_data);
        //redirect(site_url('home/profile/user_profile'), 'refresh');
    }

    function manage_profile_agent() {

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $page_data['page_name'] = 'manage_profile_agent';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data'] = $this->user_model->edit_agent_view($this->session->userdata('user_id'));
        //$page_data['edit_data'] = $this->db->get_where('users', array('id' => $this->session->userdata('user_id')))->result_array();
        $this->load->view('backend/index', $page_data);
        //redirect(site_url('home/profile/user_profile'), 'refresh');
    }

    public function student_application_list($param1 = "", $param2 = "") {

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

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

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $response = $this->crud_model->save_course_progress();
        echo $response;
    }

    function check_validity($blog_id = "") {

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->where('blog_id', $blog_id);
        $query = $this->db->get('blogs');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function download_all_materials() {

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $this->load->model('domestic_model');
        $student_id = $this->input->post('student_id');

        // Retrieve all files for the student from the database
        //$materials = $this->user_model->getMaterialsByStudentId($student_id);
        $materials = $this->domestic_model->get_materials_by_student_id($student_id);

        // Create a ZIP archive and add materials to it
        $zip = new ZipArchive();
        $zip_file_path = 'uploads/document/student_document/materials_' . $student_id . '.zip';

        if ($zip->open($zip_file_path, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($materials as $material) {
                $file_path = 'uploads/document/student_document/' . $material['file'];
                if (file_exists($file_path)) {
                    $zip->addFile($file_path, $material['file']);
                }
            }
            $zip->close();

            //echo base_url() . 'uploads/document/student_document/';
            $file = 'materials_' . $student_id . '.zip';
            $path = base_url() . 'uploads/document/student_document/';
            $t = $path . '/' . $file;

            //echo base_url().$zip_file_path; exit();
            // Set the response data
            $response_data['zip_url'] = $t;

            // Send the response as JSON
            echo json_encode($response_data);
        } else {
            // If ZIP creation fails, return an error response
            $response_data['error'] = 'Failed to create ZIP file';
            echo json_encode($response_data);
        }
    }

    public function move_to_nas($param1 = "", $param2 = "", $param3 = "") {

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'download') {

            //ZIP file

            $this->load->model('domestic_model');
            $student_id = $param2;

            // Retrieve all files for the student from the database
            //$materials = $this->user_model->getMaterialsByStudentId($student_id);
            $materials = $this->domestic_model->get_materials_by_student_id($student_id);

            // Create a ZIP archive and add materials to it
            $zip = new ZipArchive();
            $zip_file_path = 'uploads/document/student_document/materials_' . $student_id . '.zip';

            if ($zip->open($zip_file_path, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
                foreach ($materials as $material) {
                    $file_path = 'uploads/document/student_document/' . $material['file'];
                    if (file_exists($file_path)) {
                        $zip->addFile($file_path, $material['file']);
                    }
                }
                $zip->close();
            }

            force_download('uploads/document/student_document/materials_' . $param2 . '.zip', NULL);
        } else {
            $this->db->set('nas', '1');
            $this->db->where('student_id', $param1);
            $this->db->update('student_details');

            $url = "user/student_materials_domestic/view/" . $param1 . '/' . $param2;
            redirect($url, 'refresh');
            //redirect(site_url($url));
        }
    }

    public function update_application_status() {

        $this->load->model('domestic_model');

        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }


        $this->domestic_model->update_application_status();

        $page_data['page_name'] = 'student_app_list_domestic';
        $page_data['page_title'] = get_phrase('student_view');
        $page_data['tag'] = 'list_of_application';
        $students = $this->domestic_model->student_application_list_domestic();

        $application_list_data = array();
        foreach ($students->result_array() as $key => $student) {
            $application_list_data[] = array(
                'student_id' => $student['id'],
                'app_id' => $student['app_id'],
                'student_name' => $student['kanji_fn'] . ' ' . $student['kanji_ln'],
                'created_at' => $student['created_at'],
                'status' => $student['app_status'],
                'nas' => $student['nas'],
                'error' => $this->user_model->error_files($student['app_id'])
            );
        }

        //$page_data['doc_error'] = $this->user_model->error_files();
        $page_data['students'] = $application_list_data;

        $this->load->view('backend/index', $page_data);
    }
}

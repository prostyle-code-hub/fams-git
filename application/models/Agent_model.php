<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Agent_model extends CI_Model {

    function __construct() {
        parent::__construct();
        /* cache control */
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    public function domestic_user_list() {
        $this->db->where('role_id', 2);
        return $this->db->get('users');
    }

    public function add_materials($file_name = "") {

        $data['app_id'] = $this->input->post('app_id');
        $data['type'] = $this->input->post('material_type');
        $data['document_type'] = $this->input->post('document_type');
        $data['file'] = $file_name;
        $data['created_at'] = date("Y-m-d");
        $data['status'] = 1;
        $data['doc_remarks'] = "";
        $data['student_id'] = $this->input->post('student_id');
        
        $this->db->insert('material', $data);        
        
        $data_app['status'] = 1;
        $this->db->where('id', $this->input->post('app_id'));
        $this->db->update('student_details', $data_app);
    }

    public function delete_material($material_id) {
        $this->db->where('id', $material_id);
        $this->db->delete('material');
    }

    public function update_materials($file_name = "") {
        $material_id = $this->input->post('material_id');

        $data['file'] = $file_name;
        $data['created_at'] = date("Y-m-d");
        $data['status'] = 1;

        $this->db->where('id', $material_id);
        $this->db->update('material', $data);
    }

    public function materials($app_id) {
        $this->db->where('app_id', $app_id);
        $result = $this->db->get('material');
        return $result;
    }

    public function document_check($doc, $param2, $param3) {//student , application
        $doc_name = $doc;
        $this->db->where('type', $doc_name);
        $this->db->where('student_id', $param2);
        $query = $this->db->get('material');
        $count = $query->num_rows();
        return $count;
    }

    public function document_upload_log() { // materials log
        $data['document_name'] = $this->input->post('material_type');
        $data['document_type'] = $this->input->post('document_type');
        $data['student_id'] = $this->input->post('student_id');
        $data['agent_id'] = $this->session->userdata('user_id');

        $this->db->insert('document_upload_log', $data);
    }

    // Student application details update
    public function student_details_update() {

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

        $student_id = $this->input->post('student_id');
        $this->db->where('student_id', $student_id);
        $this->db->update('student_details', $data);

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

                $application_id_tbl = $this->input->post('application_id_tbl'); // departure_date
                $travel_id = $application_id_tbl[$travel_count];

                //$travel['application_id'] = $last_id;

                $this->db->where('id', $travel_id);
                $this->db->update('applicant_travel_record', $travel);
                //$this->db->insert('applicant_travel_record', $travel);
            }
            $travel_count++;
        }
    }

    /*
     * Student Applications
     */

    public function student_add() {


        // input section 1
        $data['kanji_fn'] = $this->input->post('kanji_fname');
        $data['kanji_ln'] = $this->input->post('kanji_lname');

        $data['romaji_fn'] = html_escape($this->input->post('romaji_fname'));
        $data['romaji_ln'] = html_escape($this->input->post('romajii_lname'));

        $data['gender'] = html_escape($this->input->post('gender'));
        $data['dob'] = html_escape($this->input->post('dob'));

        $data['spouse'] = html_escape($this->input->post('spouse'));

        $data['first_middle_name_spouse'] = html_escape($this->input->post('first_middle_name_spouse'));
        $data['last_name_spouse'] = html_escape($this->input->post('last_name_spouse'));

        $data['birth_country'] = html_escape($this->input->post('birth_country'));


        $data['citizenship'] = html_escape($this->input->post('citizenship'));

        $data['permanent_address'] = html_escape($this->input->post('permanent_address'));
        $data['occupation'] = html_escape($this->input->post('occupation'));

        $data['passport'] = html_escape($this->input->post('passport_number'));
        $data['passport_create'] = html_escape($this->input->post('passport_create'));
        $data['passport_exp'] = html_escape($this->input->post('passport_exp'));

        $data['future_plan'] = html_escape($this->input->post('future_plan'));
        $data['future_plan_detail'] = html_escape($this->input->post('future_plan_detail'));

        $data['current_address'] = html_escape($this->input->post('current_address'));
        $data['contact_ap_fixed'] = html_escape($this->input->post('contact_ap_fixed'));
        $data['contact_ap_mobile'] = html_escape($this->input->post('contact_ap_mobile'));
        $data['contact_ap_mail'] = html_escape($this->input->post('contact_ap_mail'));
        $data['contact_ap_fax'] = html_escape($this->input->post('contact_ap_fax'));


        //FI1
        $data['fr_1'] = html_escape($this->input->post('family_relationship_1'));
        $data['fname_1'] = html_escape($this->input->post('family_first_and_lastname_1'));
        $data['fdob_1'] = html_escape($this->input->post('family_dob_1'));
        $data['fp_1'] = html_escape($this->input->post('family_profession_1'));
        $data['faddress_1'] = html_escape($this->input->post('family_current_address_1'));
        $data['flife_1'] = html_escape($this->input->post('family_life_and_death_1'));

        //FI2
        $data['fr_2'] = html_escape($this->input->post('family_relationship_2'));
        $data['fname_2'] = html_escape($this->input->post('family_first_and_lastname_2'));
        $data['fdob_2'] = html_escape($this->input->post('family_dob_2'));
        $data['fp_2'] = html_escape($this->input->post('family_profession_2'));
        $data['faddress_2'] = html_escape($this->input->post('family_current_address_2'));
        $data['flife_2'] = html_escape($this->input->post('family_life_and_death_2'));

        //FI3
        $data['fr_3'] = html_escape($this->input->post('family_relationship_3'));
        $data['fname_3'] = html_escape($this->input->post('family_first_and_lastname_3'));
        $data['fdob_3'] = html_escape($this->input->post('family_dob_3'));
        $data['fp_3'] = html_escape($this->input->post('family_profession_3'));
        $data['faddress_3'] = html_escape($this->input->post('family_current_address_3'));
        $data['flife_3'] = html_escape($this->input->post('family_life_and_death_3'));

        //FI4
        $data['fr_4'] = html_escape($this->input->post('family_relationship_4'));
        $data['fname_4'] = html_escape($this->input->post('family_first_and_lastname_4'));
        $data['fdob_4'] = html_escape($this->input->post('family_dob_4'));
        $data['fp_4'] = html_escape($this->input->post('family_profession_4'));
        $data['faddress_4'] = html_escape($this->input->post('family_current_address_4'));
        $data['flife_4'] = html_escape($this->input->post('family_life_and_death_4'));

        //FI5
        $data['fr_5'] = html_escape($this->input->post('family_relationship_5'));
        $data['fname_5'] = html_escape($this->input->post('family_first_and_lastname_5'));
        $data['fdob_5'] = html_escape($this->input->post('family_dob_5'));
        $data['fp_5'] = html_escape($this->input->post('family_profession_5'));
        $data['faddress_5'] = html_escape($this->input->post('family_current_address_5'));
        $data['flife_5'] = html_escape($this->input->post('family_life_and_death_5'));


        $data['sponsor_surname'] = html_escape($this->input->post('sponsor_surname'));
        $data['sponsor_name'] = html_escape($this->input->post('sponsor_name'));
        $data['sponsor_relationship'] = html_escape($this->input->post('sponsor_relationship'));
        $data['sponsor_present_address'] = html_escape($this->input->post('sponsor_present_address'));
        $data['sponsor_annual_income'] = html_escape($this->input->post('sponsor_annual_income'));
        $data['sponsor_company'] = html_escape($this->input->post('sponsor_company'));
        $data['sponsor_position'] = html_escape($this->input->post('sponsor_position'));
        $data['sponsor_company_address'] = html_escape($this->input->post('sponsor_company_address'));
        $data['sponsor_contact_sp_fixed'] = html_escape($this->input->post('sponsor_contact_sp_fixed'));
        $data['sponsor_contact_sp_mobile'] = html_escape($this->input->post('sponsor_contact_sp_mobile'));
        $data['sponsor_contact_sp_w_fixed'] = html_escape($this->input->post('sponsor_contact_sp_w_fixed'));

        //input secton 2
        $data['created_by'] = $this->session->userdata('user_id');
        $data['created_at'] = date("Y-m-d");

        $this->db->insert('student', $data);

        // Family
        $last_id = $this->db->insert_id();


        $family_count = 0;

        while ($family_count <= 5) {

            $family_relationship = $this->input->post('family_relationship'); // residence_status
            $family['family_relationship'] = $family_relationship[$family_count];

            if ($family_relationship[$family_count] != "") {


                $family_first_and_lastname = $this->input->post('family_first_and_lastname'); // residence_card_no
                $family['family_first_and_lastname'] = $family_first_and_lastname[$family_count];

                $family_dob = $this->input->post('family_dob'); // travel_purpose
                $family['family_dob'] = $family_dob[$family_count];

                $family_profession = $this->input->post('family_profession'); // entry_date
                $family['family_profession'] = $family_profession[$family_count];

                $family_current_address = $this->input->post('family_current_address'); // departure_date
                $family['family_current_address'] = $family_current_address[$family_count];

                $family_life_and_death = $this->input->post('family_life_and_death'); // departure_date
                $family['family_life_and_death'] = $family_life_and_death[$family_count];

                $family['student_id'] = $last_id;

                $this->db->insert('student_family_record', $family);
            }

            $family_count++;
        }
    }

    public function student_edit() {

        // input section 1
        $data['kanji_fn'] = html_escape($this->input->post('kanji_fname'));
        $data['kanji_ln'] = html_escape($this->input->post('kanji_lname'));

        $data['romaji_fn'] = html_escape($this->input->post('romaji_fname'));
        $data['romaji_ln'] = html_escape($this->input->post('romajii_lname'));

        $data['gender'] = html_escape($this->input->post('gender'));
        $data['dob'] = html_escape($this->input->post('dob'));

        $data['spouse'] = html_escape($this->input->post('spouse'));

        $data['first_middle_name_spouse'] = html_escape($this->input->post('first_middle_name_spouse'));
        $data['last_name_spouse'] = html_escape($this->input->post('last_name_spouse'));

        $data['birth_country'] = html_escape($this->input->post('birth_country'));

        $data['permanent_address'] = html_escape($this->input->post('permanent_address'));
        $data['citizenship'] = html_escape($this->input->post('citizenship'));

        $data['occupation'] = html_escape($this->input->post('occupation'));

        $data['passport'] = html_escape($this->input->post('passport_number'));
        $data['passport_create'] = html_escape($this->input->post('passport_create'));
        $data['passport_exp'] = html_escape($this->input->post('passport_exp'));

        $data['future_plan'] = html_escape($this->input->post('future_plan'));
        $data['future_plan_detail'] = html_escape($this->input->post('future_plan_detail'));

        $data['current_address'] = html_escape($this->input->post('current_address'));
        $data['contact_ap_fixed'] = html_escape($this->input->post('contact_ap_fixed'));
        $data['contact_ap_mobile'] = html_escape($this->input->post('contact_ap_mobile'));
        $data['contact_ap_mail'] = html_escape($this->input->post('contact_ap_mail'));
        $data['contact_ap_fax'] = html_escape($this->input->post('contact_ap_fax'));

        //FI1
        $data['fr_1'] = html_escape($this->input->post('family_relationship_1'));
        $data['fname_1'] = html_escape($this->input->post('family_first_and_lastname_1'));
        $data['fdob_1'] = html_escape($this->input->post('family_dob_1'));
        $data['fp_1'] = html_escape($this->input->post('family_profession_1'));
        $data['faddress_1'] = html_escape($this->input->post('family_current_address_1'));
        $data['flife_1'] = html_escape($this->input->post('family_life_and_death_1'));

        //FI2
        $data['fr_2'] = html_escape($this->input->post('family_relationship_2'));
        $data['fname_2'] = html_escape($this->input->post('family_first_and_lastname_2'));
        $data['fdob_2'] = html_escape($this->input->post('family_dob_2'));
        $data['fp_2'] = html_escape($this->input->post('family_profession_2'));
        $data['faddress_2'] = html_escape($this->input->post('family_current_address_2'));
        $data['flife_2'] = html_escape($this->input->post('family_life_and_death_2'));

        //FI3
        $data['fr_3'] = html_escape($this->input->post('family_relationship_3'));
        $data['fname_3'] = html_escape($this->input->post('family_first_and_lastname_3'));
        $data['fdob_3'] = html_escape($this->input->post('family_dob_3'));
        $data['fp_3'] = html_escape($this->input->post('family_profession_3'));
        $data['faddress_3'] = html_escape($this->input->post('family_current_address_3'));
        $data['flife_3'] = html_escape($this->input->post('family_life_and_death_3'));

        //FI4
        $data['fr_4'] = html_escape($this->input->post('family_relationship_4'));
        $data['fname_4'] = html_escape($this->input->post('family_first_and_lastname_4'));
        $data['fdob_4'] = html_escape($this->input->post('family_dob_4'));
        $data['fp_4'] = html_escape($this->input->post('family_profession_4'));
        $data['faddress_4'] = html_escape($this->input->post('family_current_address_4'));
        $data['flife_4'] = html_escape($this->input->post('family_life_and_death_4'));

        //FI5
        $data['fr_5'] = html_escape($this->input->post('family_relationship_5'));
        $data['fname_5'] = html_escape($this->input->post('family_first_and_lastname_5'));
        $data['fdob_5'] = html_escape($this->input->post('family_dob_5'));
        $data['fp_5'] = html_escape($this->input->post('family_profession_5'));
        $data['faddress_5'] = html_escape($this->input->post('family_current_address_5'));
        $data['flife_5'] = html_escape($this->input->post('family_life_and_death_5'));

        $data['sponsor_surname'] = html_escape($this->input->post('sponsor_surname'));
        $data['sponsor_name'] = html_escape($this->input->post('sponsor_name'));
        $data['sponsor_relationship'] = html_escape($this->input->post('sponsor_relationship'));
        $data['sponsor_present_address'] = html_escape($this->input->post('sponsor_present_address'));
        $data['sponsor_annual_income'] = html_escape($this->input->post('sponsor_annual_income'));
        $data['sponsor_company'] = html_escape($this->input->post('sponsor_company'));
        $data['sponsor_position'] = html_escape($this->input->post('sponsor_position'));
        $data['sponsor_company_address'] = html_escape($this->input->post('sponsor_company_address'));
        $data['sponsor_contact_sp_fixed'] = html_escape($this->input->post('sponsor_contact_sp_fixed'));
        $data['sponsor_contact_sp_mobile'] = html_escape($this->input->post('sponsor_contact_sp_mobile'));
        $data['sponsor_contact_sp_w_fixed'] = html_escape($this->input->post('sponsor_contact_sp_w_fixed'));

        $this->db->where('id', $this->input->post('student_id'));
        $this->db->update('student', $data);

        $family_count = 0;

        while ($family_count <= 5) {

            $family_relationship = $this->input->post('family_relationship'); // residence_status
            $family['family_relationship'] = $family_relationship[$family_count];

            if ($family_relationship[$family_count] != "") {


                $family_first_and_lastname = $this->input->post('family_first_and_lastname'); // residence_card_no
                $family['family_first_and_lastname'] = $family_first_and_lastname[$family_count];

                $family_dob = $this->input->post('family_dob'); // travel_purpose
                $family['family_dob'] = $family_dob[$family_count];

                $family_profession = $this->input->post('family_profession'); // entry_date
                $family['family_profession'] = $family_profession[$family_count];

                $family_current_address = $this->input->post('family_current_address'); // departure_date
                $family['family_current_address'] = $family_current_address[$family_count];

                $family_life_and_death = $this->input->post('family_life_and_death'); // departure_date
                $family['family_life_and_death'] = $family_life_and_death[$family_count];



                $family_id = $application_id_tbl = $this->input->post('family_id'); // departure_date
                $travel_id = $family_id[$family_count];

                $this->db->where('id', $travel_id);
                $this->db->update('student_family_record', $family);
            }

            $family_count++;
        }
    }

    

    public function search_application() { //search students
        // Start building the query
        $applicant_id = $this->input->post('applicant_id');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $nationality = $this->input->post('nationality');
        $desired_enrollment_date = $this->input->post('dst');
        $application_status = $this->input->post('application_status');
        $application_place = $this->input->post('application_place');


        if (!empty($applicant_id)) {
            $this->db->like('student.id', $applicant_id);
            $this->session->set_userdata('applicant_id', $applicant_id);
        } else {
            $this->session->unset_userdata('applicant_id');
        }

        if (!empty($first_name)) {
            $this->db->like('student.kanji_fn', $first_name);
            $this->session->set_userdata('student_fn', $first_name);
        } else {
            $this->session->unset_userdata('student_fn');
        }

        if (!empty($last_name)) {
            $this->db->like('student.kanji_ln', $last_name);
            $this->session->set_userdata('student_ln', $last_name);
        } else {
            $this->session->unset_userdata('student_ln');
        }

        if (!empty($nationality)) {
            $this->db->like('student.citizenship', $nationality);
            $this->session->set_userdata('nationality', $nationality);
        } else {
            $this->session->unset_userdata('nationality');
        }

        if (!empty($desired_enrollment_date)) {
            $this->db->like('student_details.dst', $desired_enrollment_date);
            $this->session->set_userdata('dst', $desired_enrollment_date);
        } else {
            $this->session->unset_userdata('dst');
        }

        if (!empty($application_status)) {
            $this->db->like('student_details.status', $application_status);
            $this->session->set_userdata('application_status', $application_status);
        } else {
            $this->session->unset_userdata('application_status');
        }

        if (!empty($application_place)) {
            $this->db->like('student_details.application_place', $application_place);
            $this->session->set_userdata('application_place', $application_place);
        } else {
            $this->session->unset_userdata('application_place');
        }


        // Execute the query
        $agent_id = $this->session->userdata('user_id');


        $this->db->select('*,student_details.status as app_status,student_details.id as app_id');
        $this->db->from('student_details');
        $this->db->join('student', 'student.id = student_details.student_id', 'left');
        $this->db->where('student_details.created_by', $agent_id);
        return $this->db->get();
    }

    // Dashboard
    public function count_reg_applicants($agent_id) {
        $qry = "SELECT * FROM student WHERE created_by = " . $agent_id;
        $query = $this->db->query($qry);
        return $query->num_rows();
    }

    public function count_req_applicants($agent_id) {
        $qry = "SELECT * FROM student_details WHERE created_by = " . $agent_id;
        $query = $this->db->query($qry);
        return $query->num_rows();
    }

    public function count_app_not_completed($agent_id) {

        $qry = "SELECT * FROM student_details WHERE created_by = " . $agent_id . " AND status != 6";
        $query = $this->db->query($qry);
        return $query->num_rows();
    }

    public function count_app_completed($agent_id) {
        $qry = "SELECT * FROM student_details WHERE created_by = " . $agent_id . " AND  status = 6";
        $query = $this->db->query($qry);
        return $query->num_rows();
    }

    public function check_duplicate_documents() {
        $app_id = $this->input->post('app_id');
        $material_type_val = $this->input->post('material_type');
        $document_type = $this->input->post('document_type');

        $qry = "SELECT * FROM material WHERE app_id = " . $app_id . " "
                . "AND  type = '" . $material_type_val . "' "
                . "AND document_type = '" . $document_type . "'";

        $query = $this->db->query($qry);
        return $query->num_rows();
    }

    
    public function detail_student_search() {
        // Start building the query

        
        $kanji_fname = $this->input->post('kanji_fname');
        $kanji_lname = $this->input->post('kanji_lname');
        $romaji_fname = $this->input->post('romaji_fname');
        $romajii_lname = $this->input->post('romajii_lname');
        $gender = $this->input->post('gender');
        $citizenship = $this->input->post('citizenship');
        $occupation = $this->input->post('occupation');
        $sponsor_surname = $this->input->post('sponsor_surname');
        $show_reg_students = $this->input->post('show_reg_students');
        $application_status = $this->input->post('application_status');

        // Add conditions based on input values

        $this->session->set_userdata('show_reg_students', $show_reg_students);



        if (!empty($kanji_fname)) {
            $this->db->like('student.kanji_fn', $kanji_fname);
            $this->session->set_userdata('kanji_fn', $kanji_fname);
        } else {
            $this->session->unset_userdata('kanji_fn');
        }

        if (!empty($kanji_lname)) {
            $this->db->like('student.kanji_ln', $kanji_lname);
            $this->session->set_userdata('kanji_ln', $kanji_lname);
        } else {
            $this->session->unset_userdata('kanji_ln');
        }

        if (!empty($romaji_fname)) {
            $this->db->like('student.romaji_fn', $romaji_fname);
            $this->session->set_userdata('romaji_fn', $romaji_fname);
        } else {
            $this->session->unset_userdata('romaji_fn');
        }

        if (!empty($romajii_lname)) {
            $this->db->like('student.romaji_ln', $romajii_lname);
            $this->session->set_userdata('romaji_ln', $romajii_lname);
        } else {
            $this->session->unset_userdata('romaji_ln');
        }

        if (!empty($gender)) {
            $this->db->where('student.gender', $gender);
            $this->session->set_userdata('gender', $gender);
        } else {
            $this->session->unset_userdata('gender');
        }

        if (!empty($citizenship)) {
            $this->db->where('student.citizenship', $citizenship);
            $this->session->set_userdata('citizenship', $citizenship);
        } else {
            $this->session->unset_userdata('citizenship');
        }

        if (!empty($occupation)) {
            $this->db->like('student.occupation', $occupation);
            $this->session->set_userdata('occupation', $occupation);
        } else {
            $this->session->unset_userdata('occupation');
        }

        if (!empty($sponsor_surname)) {
            $this->db->like('student.sponsor_surname', $sponsor_surname);
            $this->session->set_userdata('sponsor_surname', $sponsor_surname);
        } else {
            $this->session->unset_userdata('sponsor_surname');
        }
        
        if (!empty($application_status)) {
            $this->db->like('student_details.status', $application_status);
            $this->session->set_userdata('application_status', $application_status);
        } else {
            $this->session->unset_userdata('application_status');
        }

        // Execute the query
        $agent_id = $this->session->userdata('user_id');
        
        $this->db->select('*,student_details.kanji_fn as kanji_fn,student_details.status as app_status,student_details.id as app_id');
        $this->db->from('student');
        $this->db->join('student_details', 'student_details.student_id = student.id', 'left');
        $this->db->where('student.created_by', $agent_id);
        $this->db->where('student.application', 1);
        $query = $this->db->get();

        //$agent_id = $this->session->userdata('user_id');
        //$this->db->where('created_by', $agent_id);
        //$query = $this->db->get('student');
        return $query->result();
    }

    public function student_search() {
        // Start building the query
        
        
        $kanji_fname = $this->input->post('kanji_fname');
        $kanji_lname = $this->input->post('kanji_lname');
        $romaji_fname = $this->input->post('romaji_fname');
        $romajii_lname = $this->input->post('romajii_lname');
        $gender = $this->input->post('gender');
        $citizenship = $this->input->post('citizenship');
        $occupation = $this->input->post('occupation');
        $sponsor_surname = $this->input->post('sponsor_surname');

        // Add conditions based on input values
        if (!empty($kanji_fname)) {
            $this->db->like('kanji_fn', $kanji_fname);
            $this->session->set_userdata('kanji_fn', $kanji_fname);
        } else {
            $this->session->unset_userdata('kanji_fn');
        }

        if (!empty($kanji_lname)) {
            $this->db->like('kanji_ln', $kanji_lname);
            $this->session->set_userdata('kanji_ln', $kanji_lname);
        } else {
            $this->session->unset_userdata('kanji_ln');
        }

        if (!empty($romaji_fname)) {
            $this->db->like('romaji_fn', $romaji_fname);
            $this->session->set_userdata('romaji_fn', $romaji_fname);
        } else {
            $this->session->unset_userdata('romaji_fn');
        }

        if (!empty($romajii_lname)) {
            $this->db->like('romaji_ln', $romajii_lname);
            $this->session->set_userdata('romaji_ln', $romajii_lname);
        } else {
            $this->session->unset_userdata('romaji_ln');
        }

        if (!empty($gender)) {
            $this->db->where('gender', $gender);
            $this->session->set_userdata('gender', $gender);
        } else {
            $this->session->unset_userdata('gender');
        }

        if (!empty($citizenship)) {
            $this->db->where('citizenship', $citizenship);
            $this->session->set_userdata('citizenship', $citizenship);
        } else {
            $this->session->unset_userdata('citizenship');
        }

        if (!empty($occupation)) {
            $this->db->like('occupation', $occupation);
            $this->session->set_userdata('occupation', $occupation);
        } else {
            $this->session->unset_userdata('occupation');
        }

        if (!empty($sponsor_surname)) {

            $this->db->like('sponsor_surname', $sponsor_surname);
            $this->session->set_userdata('sponsor_surname', $sponsor_surname);
        } else {
            $this->session->unset_userdata('sponsor_surname');
        }


        // Execute the query
        $agent_id = $this->session->userdata('user_id');
        $this->db->where('created_by', $agent_id);
        $query = $this->db->get('student');
        return $query->result();
    }
    
    public function create_application_add_by_agent(){
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
            
            if($residencesta[$travel_count] != ""){
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
        
        return $last_id;
    }
    
}

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Domestic_model extends CI_Model {

    function __construct() {
        parent::__construct();
        /* cache control */
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    public function application_document_review() {

        $review['comment'] = $this->input->post('doc_comment');
        $review['status'] = $this->input->post('doc_status');

        $material_id = $this->input->post('mid');

        $this->db->where('id', $material_id);
        $this->db->update('material', $review);
    }

    public function single_document_status_update() {

        $review['doc_remarks'] = $this->input->post('doc_remarks');
        $review['status'] = $this->input->post('doc_status');

        $material_id = $this->input->post('mid');

        $this->db->where('id', $material_id);
        $this->db->update('material', $review);
    }

    //document status bulk update
    public function all_document_status_update() {

        //document update
        $review['doc_remarks'] = $this->input->post('remarks');
        $review['status'] = $this->input->post('application_status');
        $application_id = $this->input->post('application_id');
        $document_status = $this->input->post('all_doc_status');

        $review['status'] = $document_status;
        $this->db->where('app_id', $application_id);
        $this->db->update('material', $review);

        //if (($document_status == 1) || ($document_status == 3) || ($document_status == 4)) {
        //document status change        
        $review_application['status'] = $document_status;
        $review_application['remarks'] = $this->input->post('remarks');
        $this->db->where('id', $application_id);
        $this->db->update('student_details', $review_application);
        // }
    }

    public function application_review() {

        $review['remarks'] = $this->input->post('remarks');
        $review['status'] = $this->input->post('application_status');

        $application_id = $this->input->post('application_id');

        $this->db->where('id', $application_id);
        $this->db->update('student_details', $review);

        //document status change        
        $review_doc['status'] = $this->input->post('application_status');

        $this->db->where('app_id', $application_id);
        $this->db->update('material', $review_doc);
    }

    public function materials($application_id) {
        $this->db->where('app_id', $application_id);
        $result = $this->db->get('material');
        return $result;
    }

    public function get_materials_by_student_id($student_id) {
        $this->db->select('file');
        $this->db->where('student_id', $student_id);
        $query = $this->db->get('material');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    /*
     * Student Applications
     */

    public function search_application() { //search students
        // Start building the query
        $applicant_id = $this->input->post('applicant_id');
        $agent_id = $this->input->post('agent');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $nationality = $this->input->post('nationality');
        $desired_enrollment_date = $this->input->post('dst');
        $application_status = $this->input->post('application_status');
        $application_place = $this->input->post('application_place');
        // Add conditions based on input values



        if (!empty($applicant_id)) {
            $this->db->like('student.id', $applicant_id);
            $this->session->set_userdata('applicant_id', $applicant_id);
        } else {
            $this->session->unset_userdata('applicant_id');
        }

        if (!empty($agent_id)) {
            $this->db->like('student.created_by', $agent_id);
            $this->session->set_userdata('agent_id', $agent_id);
        } else {
            $this->session->unset_userdata('$agent_id');
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

        $this->db->select('student.id,student_details.id as app_id,student.kanji_fn,student.kanji_ln,student_details.created_at, student_details.nas,student_details.status as app_status');
        $this->db->from('student_details');
        $this->db->join('student', 'student.id = student_details.student_id', 'left');
        return $this->db->get();

//        $this->db->select('*,student_details.status as app_status');
//        $this->db->from('student_details');
//        $this->db->join('student', 'student.id = student_details.student_id', 'left');

        return $this->db->get();
    }

    // Dashboard
    public function count_reg_applicants() {
        return $this->db->count_all('student');
    }

    public function count_req_applicants() {
        return $this->db->count_all('student_details');
    }

    public function count_app_not_completed() {
        $this->db->where('status !=', '6');
        $this->db->from('student_details');
        return $this->db->count_all_results();
    }

    public function count_app_completed() {
        $this->db->where('status', '6');
        $this->db->from('student_details');
        return $this->db->count_all_results();
    }

    public function get_agents_data() {
        $this->db->select('users.id,users.image,users.first_name,users.last_name,users.status,users.id,agents.country,agents.country,agents.agent_no');
        $this->db->from('users');
        $this->db->join('agents', 'agents.user_id = users.id');
        $this->db->where('role_id', 3);
        $this->db->where('status !=', 4);
        return $this->db->get();
    }

    public function get_agents_list() {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('role_id', 3);
        $this->db->where('status ', 1);
        return $this->db->get();
    }

    public function document_count($application_id) {
        $this->db->where('app_id', $application_id);
        $this->db->from('material');
        return $this->db->count_all_results();
    }

    public function all_document_status($application_id) {
        $doc_count = $this->document_count($application_id);
        $reset_dropdown = 0;

        if ($doc_count >= 1) {

            $this->db->where('app_id', $application_id);
            $first_status = $this->db->get('material')->row();

            $status_one = $first_status->status;
            //echo $status_one;

            $result = $this->db->get_where('material', array('app_id' => $application_id))->result_array();

            foreach ($result as $status) {

                $status_tow = $status['status'];
                //echo $status_tow;
                if ($status_one != $status_tow) {
                    $reset_dropdown = 1;
                    break;
                }
            }


            //$reset_dropdown = 0;
        } else {
            $reset_dropdown = 1;
        }
        return $reset_dropdown;
    }

    public function update_application_status() {

        $application_status = $this->input->post('application_status');
        $application_id = $this->input->post('app_id');

        $this->db->set('status', $application_status);
        $this->db->where('id', $application_id);
        $this->db->update('student_details');
    }

    public function student_application_list_domestic() {

        //$user_id = $this->session->userdata('user_id');

        $this->db->select('student.id,student_details.id as app_id,student.kanji_fn,student_details.nas,student.kanji_ln,student_details.created_at, ,student_details.status as app_status');
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

    public function delete_single_document($document_id) {
        $this->db->where('id', $document_id);
        $this->db->delete('material');
    }
}

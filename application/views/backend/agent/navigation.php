<ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item <?php
    if ($tag == 'dashboard') {
        echo "active open";
    }
    ?>">
        <a href="<?php echo base_url() ?>" class="menu-link">
            <i class="menu-icon tf-icons ti ti-home"></i>
            <div><?= get_phrase('dashboard'); ?></div>    
        </a>        
    </li>

    <!-- Learn before use -->

    <li class="menu-item <?php
    if ($tag == 'school_rule_read') {
        echo "open";
    }
    ?>">
        <a href="javascript:void(0);" class="menu-link menu-toggle" >
            <i class="menu-icon tf-icons ti ti-pencil"></i>
            <div><?= get_phrase('learn_before_use') ?></div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item <?php
            if ($tag == 'school_rule_read') {
                echo "active open";
            }
            ?>">                
                <a href="<?php echo site_url('user/school_rules'); ?>" class="menu-link">
                    <div><?= get_phrase('school_rule') ?></div>
                </a>
            </li>                   
        </ul>            
    </li>


    <!-- Applicant -->  

    <?php //if($this->session->userdata('rule_pass') != 0){ ?>
    <li class="menu-item <?php
    if (($tag == 'student_add') || ($tag == 'student_search') || ($tag == 'student_list')) {
        echo "open";
    }
    ?>">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-man"></i>
            <div><?= get_phrase('Applicant') ?></div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item <?php
            if ($tag == 'student_add') {
                echo "active open";
            }
            ?>">
                <a href="<?php echo site_url('user/student/add'); ?>" class="menu-link">
                    <div><?= get_phrase('Registration of Applicant') ?></div>
                </a>
            </li>                   
        </ul>
        <ul class="menu-sub">
            <li class="menu-item <?php
            if ($tag == 'student_list') {
                echo "active open";
            }
            ?>">
                <a href="<?php echo site_url('user/student'); ?>" class="menu-link">
                    <div><?= get_phrase('Applicant List') ?></div>
                </a>
            </li>                   
        </ul>
        <ul class="menu-sub">
            <li class="menu-item <?php
            if ($tag == 'student_search') {
                echo "active open";
            }
            ?>">
                <a href="<?php echo site_url('user/search_student'); ?>" class="menu-link">
                    <div><?= get_phrase('Search Applicant') ?></div>
                </a>
            </li>                   
        </ul>
    </li>
    <?php // } ?>


    <!-- Agent information -->

    <li class="menu-item">
        <a href="/user/manage_profile_agent/" class="menu-link" id="myprofile">
            <i class="menu-icon tf-icons ti ti-users"></i>
            <div><?= get_phrase('agent_info') ?></div>
        </a>
    </li>


    <!-- Application form -->    

    <?php // if($this->session->userdata('rule_pass') != 0){ ?>
    <li class="menu-item <?php
    if ($tag == 'student_application_new' || $tag == 'applicant_search' || $tag == 'student_application_list') {
        echo "open";
    }
    ?>">
        <a href="javascript:void(0);" class="menu-link menu-toggle" >
            <i class="menu-icon tf-icons ti ti-file"></i>
            <div><?= get_phrase('Application Form') ?></div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item <?php
            if ($tag == 'student_application_new') {
                echo "active open";
            }
            ?>">
                <a href="<?php echo site_url('user/create_new_student_application/'); ?>" class="menu-link">
                    <div><?= get_phrase('New Application Form') ?></div>
                </a>
            </li>                   
        </ul>
        <ul class="menu-sub">
            <li class="menu-item <?php
            if ($tag == 'student_application_list') {
                echo "active open";
            }
            ?>">
                <a href="<?php echo site_url('user/student_application/'); ?>" class="menu-link">
                    <div><?= get_phrase('Applicatio Form List') ?></div>
                </a>
            </li>                   
        </ul>
        <ul class="menu-sub">
            <li class="menu-item <?php
            if ($tag == 'applicant_search') {
                echo "active open";
            }
            ?>">
                <a href="<?php echo site_url('user/search_application/'); ?>" class="menu-link">
                    <div><?= get_phrase('Search Application Forms') ?></div>
                </a>
            </li>                   
        </ul>
    </li>
    <?php // } ?>

    <!-- Call user -->  
    <li class="menu-item <?php
    if ($tag == 'call_user') {
        echo "active open";
    }
    ?>">
        <a href="<?php echo site_url('user/call_user/'); ?>" class="menu-link">
            <i class="menu-icon tf-icons ti ti-phone"></i>
            <div><?= get_phrase('call_user') ?></div>
        </a>
    </li>


</ul>
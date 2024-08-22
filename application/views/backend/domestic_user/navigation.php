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

    <!-- School information -->
    <?php //if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2) { ?>
    <li class="menu-item <?php
    if ($tag == 'stuff_info' || $tag == 'school_rule') {
        echo "open";
    }
    ?>">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-color-swatch"></i>
            <div><?= get_phrase('school_stuff') ?></div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item <?php
            if ($tag == 'stuff_info') {
                echo "active open";
            }
            ?>">
                <a href="<?php echo site_url('user/stuff_information'); ?>" class="menu-link">
                    <div><?= get_phrase('stuff_info') ?></div>
                </a>
            </li>
            <li class="menu-item <?php
            if ($tag == 'school_rule') {
                echo "active open";
            }
            ?>">
                <a href="<?php echo site_url('user/school_rule'); ?>" class="menu-link">
                    <div><?= get_phrase('school_rule') ?></div>
                </a>               
            </li>

        </ul>
    </li>
    <?php //} ?>

    <!-- Agent -->
    <?php //if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2) { ?>
    <li class="menu-item <?php
    if ($tag == 'agent_list') {
        echo "open";
    }
    ?>">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-users"></i>
            <div><?= get_phrase('agent') ?></div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item <?php
            if ($tag == 'agent_list') {
                echo "active open";
            }
            ?>">
                <a href="<?php echo site_url('user/agents'); ?>" class="menu-link">
                    <div><?= get_phrase('agent_list') ?></div>
                </a>
            </li>                           
        </ul>
    </li>
    <?php // } ?>

    <!-- Domestic user -->    
    <?php //if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2) { ?>
    <li class="menu-item <?php
    if ($tag == 'domestic_list' || $tag == 'domestic_add') {
        echo "open";
    }
    ?>">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-users"></i>
            <div><?= get_phrase('domestic_user') ?></div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item <?php
            if ($tag == 'domestic_list') {
                echo "active open";
            }
            ?>">
                <a href="<?php echo site_url('user/domestic'); ?>" class="menu-link">
                    <div><?= get_phrase('domestic_user_list') ?></div>
                </a>

            </li>
            <li class="menu-item <?php
            if ($tag == 'domestic_add') {
                echo "active open";
            }
            ?>">
                <a href="<?php echo site_url('user/domestic/add'); ?>" class="menu-link">
                    <div><?= get_phrase('new_domestic_user') ?></div>
                </a>               
            </li>            
        </ul>
    </li>
    <?php // } ?>

    <!-- Applicant -->    
    <?php //if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2) { ?>
    <li class="menu-item <?php
    if ($tag == 'list_of_application' || $tag == 'search_application_domestic') {
        echo "open";
    }
    ?>" >
        <a href="javascript:void(0);" class="menu-link menu-toggle" >
            <i class="menu-icon tf-icons ti ti-brand-firebase"></i>
            <div><?= get_phrase('Applicant') ?></div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item <?php
            if ($tag == 'list_of_application') {
                echo "active open";
            }
            ?>">         
                <a href="<?php echo site_url('user/student_application_domestic/'); ?>" class="menu-link">
                    <div><?= get_phrase('List of Applicant') ?></div>
                </a>
            </li>                   
        </ul>
        <ul class="menu-sub">
            <li class="menu-item <?php
            if ($tag == 'search_application_domestic') {
                echo "active open";
            }
            ?>"">
                <a href="<?php echo site_url('user/search_application_domestic/'); ?>" class="menu-link">
                    <div><?= get_phrase('Search Applicant') ?></div>
                </a>
            </li>                   
        </ul>
    </li>  
    <?php // } ?>

</ul>
<a>
    <i class="ft-users"></i>
    <span data-i18n="" class="menu-title">Students</span>
</a>
<?php if ($role_permission[5]['add_status']!='') { ?>
<ul class="menu-content" style="">
    <li class="has-sub nav-item <?php echo (@$active_menu=='view_quotes' || @$active_menu=='add_quotes'?'open':'')?>">
    <a><i class="ft-users"></i><span data-i18n="" class="menu-title">Record</span></a>
        <?php if ($role_permission[5]['add_status']!='') { ?>
            <ul class="menu-content" style="">
                <li class="<?php echo (@$active_menu=='add_quotes'?'active':'')?>">
                    <a href="<?=site_url('Admin/add_quotes');?>" class="menu-item">Add Record</a>
                </li>
                <li class="<?php echo (@$active_menu=='add_quotes'?'active':'')?>">
                    <a href="<?=site_url('Admin/add_quotes');?>" class="menu-item">View Record</a>
                </li>
            </ul>
        <?php } ?>
    </li>
</ul>
<?php } if ($role_permission[5]['view_status']!='') { ?>
<ul class="menu-content" style="">
    <li class="has-sub nav-item <?php echo (@$active_menu=='view_quotes' || @$active_menu=='add_quotes'?'open':'')?>">
    <a><i class="ft-users"></i><span data-i18n="" class="menu-title">Attendance</span></a>
        <?php if ($role_permission[5]['add_status']!='') { ?>
            <ul class="menu-content" style="">
                <li class="<?php echo (@$active_menu=='add_quotes'?'active':'')?>">
                    <a href="<?=site_url('Admin/add_quotes');?>" class="menu-item">Add Attendance</a>
                </li>
                <li class="<?php echo (@$active_menu=='add_quotes'?'active':'')?>">
                    <a href="<?=site_url('Admin/add_quotes');?>" class="menu-item">View Attendance</a>
                </li>
            </ul>
        <?php } ?>
    </li>
</ul>
<?php } if ($role_permission[5]['view_status']!='') { ?>
<ul class="menu-content" style="">
    <li class="has-sub nav-item <?php echo (@$active_menu=='view_quotes' || @$active_menu=='add_quotes'?'open':'')?>">
    <a><i class="ft-users"></i><span data-i18n="" class="menu-title">Result</span></a>
        <?php if ($role_permission[5]['add_status']!='') { ?>
            <ul class="menu-content" style="">
                <li class="<?php echo (@$active_menu=='add_quotes'?'active':'')?>">
                    <a href="<?=site_url('Admin/add_quotes');?>" class="menu-item">Add Result</a>
                </li>
                <li class="<?php echo (@$active_menu=='add_quotes'?'active':'')?>">
                    <a href="<?=site_url('Admin/add_quotes');?>" class="menu-item">View Result</a>
                </li>
                <li class="<?php echo (@$active_menu=='add_quotes'?'active':'')?>">
                    <a href="<?=site_url('Admin/add_quotes');?>" class="menu-item">Generate Marksheet</a>
                </li>
            </ul>
        <?php } ?>
    </li>
</ul>
<?php } ?>
   
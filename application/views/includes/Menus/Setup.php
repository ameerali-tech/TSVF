<a><i class="ft-users"></i><span data-i18n="" class="menu-title">Setup</span></a>
<?php if ($role_permission[5]['add_status']!='') { ?>
    <ul class="menu-content" style="">
    <?php if (@$role_permission[5]['view_status']!='' || @$role_permission[5]['add_status']!='' || @$role_permission[5]['edit_status']!='' || @$role_permission[5]['delete_status']!='' ) { ?>
        <li class="has-sub nav-item <?php echo (@$active_menu=='view_quotes' || @$active_menu=='add_quotes'?'open':'')?>">
            <a><i class="ft-users"></i><span data-i18n="" class="menu-title">Classes</span></a>
            <?php if ($role_permission[5]['add_status']!='') { ?>
                <ul class="menu-content" style="">
                    <li class="<?php echo (@$active_menu=='add_quotes'?'active':'')?>">
                        <a href="<?=site_url('Admin/add_quotes');?>" class="menu-item">Add Classes</a>
                    </li>
                    <li class="<?php echo (@$active_menu=='add_quotes'?'active':'')?>">
                        <a href="<?=site_url('Admin/add_quotes');?>" class="menu-item">View Classes</a>
                    </li>
                </ul>
            <?php } ?>
        </li>
    <?php }  ?>
    </ul>
    <?php } if ($role_permission[5]['view_status']!='') { ?>
    <ul class="menu-content" style="">
    <?php if (@$role_permission[5]['view_status']!='' || @$role_permission[5]['add_status']!='' || @$role_permission[5]['edit_status']!='' || @$role_permission[5]['delete_status']!='' ) { ?>
        <li class="has-sub nav-item <?php echo (@$active_menu=='view_quotes' || @$active_menu=='add_quotes'?'open':'')?>">
            <a><i class="ft-users"></i><span data-i18n="" class="menu-title">Sections</span></a>
            <?php if ($role_permission[5]['add_status']!='') { ?>
                <ul class="menu-content" style="">
                    <li class="<?php echo (@$active_menu=='add_quotes'?'active':'')?>">
                        <a href="<?=site_url('Admin/add_quotes');?>" class="menu-item">Add Sections</a>
                    </li>
                    <li class="<?php echo (@$active_menu=='add_quotes'?'active':'')?>">
                        <a href="<?=site_url('Admin/add_quotes');?>" class="menu-item">View Sections</a>
                    </li>
                </ul>
            <?php } ?>
        </li>
    <?php }  ?>
    </ul>
    <?php } if ($role_permission[5]['view_status']!='') { ?>
    <ul class="menu-content" style="">
    <?php if (@$role_permission[5]['view_status']!='' || @$role_permission[5]['add_status']!='' || @$role_permission[5]['edit_status']!='' || @$role_permission[5]['delete_status']!='' ) { ?>
        <li class="has-sub nav-item <?php echo (@$active_menu=='view_quotes' || @$active_menu=='add_quotes'?'open':'')?>">
            <a><i class="ft-users"></i><span data-i18n="" class="menu-title">Groups</span></a>
            <?php if ($role_permission[5]['add_status']!='') { ?>
                <ul class="menu-content" style="">
                    <li class="<?php echo (@$active_menu=='add_quotes'?'active':'')?>">
                        <a href="<?=site_url('Admin/add_quotes');?>" class="menu-item">Add Groups</a>
                    </li>
                    <li class="<?php echo (@$active_menu=='add_quotes'?'active':'')?>">
                        <a href="<?=site_url('Admin/add_quotes');?>" class="menu-item">View Groups</a>
                    </li>
                </ul>
            <?php } ?>
        </li>
    <?php }  ?>
    </ul>
    <?php } if ($role_permission[5]['view_status']!='') { ?>
    <ul class="menu-content" style="">
    <?php if (@$role_permission[5]['view_status']!='' || @$role_permission[5]['add_status']!='' || @$role_permission[5]['edit_status']!='' || @$role_permission[5]['delete_status']!='' ) { ?>
        <li class="has-sub nav-item <?php echo (@$active_menu=='view_quotes' || @$active_menu=='add_quotes'?'open':'')?>">
            <a><i class="ft-users"></i><span data-i18n="" class="menu-title">Subjects</span></a>
            <?php if ($role_permission[5]['add_status']!='') { ?>
                <ul class="menu-content" style="">
                    <li class="<?php echo (@$active_menu=='add_quotes'?'active':'')?>">
                        <a href="<?=site_url('Admin/add_quotes');?>" class="menu-item">Add Subjects</a>
                    </li>
                    <li class="<?php echo (@$active_menu=='add_quotes'?'active':'')?>">
                        <a href="<?=site_url('Admin/add_quotes');?>" class="menu-item">View Subjects</a>
                    </li>
                </ul>
            <?php } ?>
        </li>
    <?php }  ?>
    </ul>
    <?php } if ($role_permission[5]['view_status']!='') { ?>
    <ul class="menu-content" style="">
    <?php if (@$role_permission[5]['view_status']!='' || @$role_permission[5]['add_status']!='' || @$role_permission[5]['edit_status']!='' || @$role_permission[5]['delete_status']!='' ) { ?>
        <li class="has-sub nav-item <?php echo (@$active_menu=='view_quotes' || @$active_menu=='add_quotes'?'open':'')?>">
            <a><i class="ft-users"></i><span data-i18n="" class="menu-title">Sessions</span></a>
            <?php if ($role_permission[5]['add_status']!='') { ?>
                <ul class="menu-content" style="">
                    <li class="<?php echo (@$active_menu=='add_quotes'?'active':'')?>">
                        <a href="<?=site_url('Admin/add_quotes');?>" class="menu-item">Add Sessions</a>
                    </li>
                    <li class="<?php echo (@$active_menu=='add_quotes'?'active':'')?>">
                        <a href="<?=site_url('Admin/add_quotes');?>" class="menu-item">View Sessions</a>
                    </li>
                </ul>
            <?php } ?>
        </li>
    <?php }  ?>
    </ul>
    <?php } if ($role_permission[5]['view_status']!='') { ?>
    <ul class="menu-content" style="">
    <?php if (@$role_permission[5]['view_status']!='' || @$role_permission[5]['add_status']!='' || @$role_permission[5]['edit_status']!='' || @$role_permission[5]['delete_status']!='' ) { ?>
        <li class="<?php echo (@$active_menu=='view_quotes' || @$active_menu=='add_quotes'?'open':'')?>">
            <a><i class="ft-users"></i><span data-i18n="" class="menu-title">Promote</span></a>
        </li>
    <?php }  ?>
    </ul>
<?php } ?>

<a>
    <i class="ft-users"></i>
    <span data-i18n="" class="menu-title">Users</span>
</a>
<?php if (@$role_permission[1]['add_status']!='') { ?>
<ul class="menu-content" style="">
    <li class="<?php echo (@$active_menu=='add_users'?'active':'')?>">
        <a href="<?=site_url('admin/add_users');?>" class="menu-item">Add Users</a>
    </li>
</ul>
<?php } if (@$role_permission[1]['view_status']!='') { ?>
<ul class="menu-content" style="">
    <li class="<?php echo (@$active_menu=='view_user'?'active':'')?>">
        <a href="<?=site_url('admin/view_users');?>" class="menu-item">View Users</a>
    </li>
</ul>
<?php } if (@$role_permission[0]['view_status']!='') { ?>
<ul class="menu-content">
    <li class="<?php echo (@$active_menu=='view_userroll'?'active':'')?>">
        <a href="<?=site_url('admin/view_role');?>" class="menu-item">View Users Rolls</a>
    </li>
</ul>
<?php } ?>
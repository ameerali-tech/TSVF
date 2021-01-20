<a>
    <i class="ft-users"></i>
    <span data-i18n="" class="menu-title">Expenses</span>
</a>
<?php if ($role_permission[5]['add_status']!='') { ?>
<ul class="menu-content">
    <li class="<?php echo (@$active_menu=='view_quotes' || @$active_menu=='add_quotes'?'open':'')?>">
        <a><i class="ft-users"></i><span data-i18n="" class="menu-title">Add Expenses</span></a>
    </li>
</ul>
<?php } if ($role_permission[5]['view_status']!='') { ?>
<ul class="menu-content">
    <li class="<?php echo (@$active_menu=='view_quotes' || @$active_menu=='add_quotes'?'open':'')?>">
        <a><i class="ft-users"></i><span data-i18n="" class="menu-title">View Expenses</span></a>
    </li>
</ul>
<ul class="menu-content">
    <li class="<?php echo (@$active_menu=='view_quotes' || @$active_menu=='add_quotes'?'open':'')?>">
        <a><i class="ft-users"></i><span data-i18n="" class="menu-title">Voucher</span></a>
    </li>
</ul>
<?php } ?>
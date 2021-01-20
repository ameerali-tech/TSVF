<a>
    <i class="ft-users"></i>
    <span data-i18n="" class="menu-title">Fees</span>
</a>
<?php if ($role_permission[5]['add_status']!='') { ?>
<ul class="menu-content" style="">
    <li class="<?php echo (@$active_menu=='view_quotes' || @$active_menu=='add_quotes'?'open':'')?>">
        <a><i class="ft-users"></i><span data-i18n="" class="menu-title">Challan</span></a>
    </li>
</ul>
<?php } if ($role_permission[5]['view_status']!='') { ?>
<ul class="menu-content" style="">
    <li class="<?php echo (@$active_menu=='view_quotes' || @$active_menu=='add_quotes'?'open':'')?>">
        <a><i class="ft-users"></i><span data-i18n="" class="menu-title">Payment</span></a>
    </li>
</ul>
<?php } ?>
   
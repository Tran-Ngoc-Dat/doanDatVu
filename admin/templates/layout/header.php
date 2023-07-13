<?php
    $countNotify = 0;

    /* Newsletter */
    if(isset($config['newsletter']))
    {
        $newsletterNotify = array();
        foreach($config['newsletter'] as $k => $v) 
        {
            $emailNotify = $d->rawQuery("select id from #_newsletter where type = ? and status = ''",array($k));
            $newsletterNotify[$k] = array();
            $newsletterNotify[$k]['title'] = $v['title_main'];
            $newsletterNotify[$k]['notify'] = count($emailNotify);
            $countNotify += $newsletterNotify[$k]['notify'];
        }
    }

    /* Order */
    if(isset($config['order']['active']) && $config['order']['active'] == true)
    {
        $orderNotify = $d->rawQuery("select id from #_order where order_status = 1");
        $countNotify += count($orderNotify);
    }
?>
<!-- Header -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light text-sm">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item nav-item-hello d-sm-inline-block">
            <a class="nav-link"><span class="text-split">Xin chào, <?=$_SESSION[$loginAdmin]['fullname']?>!</span></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications -->
        <li class="nav-item d-sm-inline-block">
            <a href="../" target="_blank" class="nav-link"><i class="fas fa-reply"></i></a>
        </li>
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu-info" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fas fa-cogs"></i></a>
            <ul aria-labelledby="dropdownSubMenu-info" class="dropdown-menu dropdown-menu-right border-0 shadow">
                <li>
                    <a href="index.php?source=user&act=info_admin" class="dropdown-item">
                        <i class="fas fa-user-cog"></i>
                        <span>Thông tin admin</span>
                    </a>
                </li>
                <div class="dropdown-divider"></div>
                <li>
                    <a href="index.php?source=user&act=info_admin&changepass=1" class="dropdown-item">
                        <i class="fas fa-key"></i>
                        <span>Đổi mật khẩu</span>
                    </a>
                </li>
                <div class="dropdown-divider"></div>
                <li>
                    <a href="index.php?source=setting&act=update&changepass=2" class="dropdown-item">
                        <i class="fas fa-cogs"></i>
                        <span>Thông tin website</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="nav-item d-sm-inline-block">
            <a href="index.php?source=user&act=logout" class="nav-link"><i class="fas fa-sign-out-alt mr-1"></i>Đăng xuất</a>
        </li>
    </ul>
</nav>
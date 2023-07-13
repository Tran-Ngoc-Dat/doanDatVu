<!-- Main Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 text-sm">
    <!-- Logo -->
    <a class="brand-link" href="index.php">
        <img class="brand-image" src="assets/images/logo-main.png" alt="Logo">
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent text-sm" data-widget="treeview"
                role="menu" data-accordion="false">
                <!-- Bảng điều khiển -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php" title="Bảng điều khiển">
                        <i class="nav-icon text-sm fas fa-tachometer-alt"></i>
                        <p>Bảng điều khiển</p>
                    </a>
                </li>

                <!-- Sản phẩm -->
                <?php if (isset($config['product'])) { ?>
                    <li class="nav-item has-treeview">
                        <a class="nav-link" href="#" title="Quản lý sản phẩm">
                            <i class="nav-icon text-sm fas fa-boxes"></i>
                            <p>
                                Quản lý sản phẩm
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a class="nav-link " href="index.php?source=product&act=category"
                                    title="Danh mục sản phẩm">
                            <i class="nav-icon text-sm fas fa-boxes"></i>
                                    <p>Danh mục sản phẩm</p>
                                </a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php?source=product&act=man"
                                    title="Sản phẩm"><i class="nav-icon text-sm fas fa-box"></i>
                                    <p>Sản phẩm</p>
                                </a></li>
                        </ul>
                    </li>
                <?php } ?>

                <li class="nav-item">
                    <a class="nav-link" href="index.php?source=order&act=man" title="Quản lý đơn hàng">
                        <i class="nav-icon text-sm fas fa-shopping-cart"></i>
                        <p>Quản lý đơn hàng</p>
                    </a>
                </li>

                <!-- Bài viết (Theo Type) -->
                <li class="nav-item has-treeview ">
                    <a class="nav-link" href="#" title="Quản lý bài viết">
                        <i class="nav-icon text-sm far fa-newspaper"></i>
                        <p>
                            Quản lý bài viết
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php foreach ($config['news'] as $k => $v) {
                            if (!isset($disabled['news'][$k]) && empty($v['dropdown'])) { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?source=news&act=man&type=<?= $k ?>"
                                        title="<?= $v['title_main'] ?>"><i
                                            class="nav-icon text-sm far fa-caret-square-right"></i>
                                        <p>
                                            <?= $v['title_main'] ?>
                                        </p>
                                    </a>
                                </li>
                            <?php }
                        } ?>
                    </ul>
                </li>
                <!-- Multi -->
                <li class="nav-item has-treeview">
                    <a class="nav-link" href="#" title="Quản lý hình ảnh - video">
                        <i class="nav-icon text-sm fas fa-photo-video"></i>
                        <p>
                            Quản lý hình ảnh & video
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (isset($config['photo']['photo_static'])) { ?>
                            <?php foreach ($config['photo']['photo_static'] as $k => $v) {
                                if ($com == 'photo' && $_GET['type'] == $k && $act == 'photo_static')
                                    $active = "active"; ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?source=photo&act=photo_static&type=<?= $k ?>"
                                        title="<?= $v['title_main'] ?>"><i
                                            class="nav-icon text-sm far fa-caret-square-right"></i>
                                        <p>
                                            <?= $v['title_main'] ?>
                                        </p>
                                    </a>
                                </li>
                            <?php }

                            ?>
                        <?php } ?>
                        <?php if (isset($config['photo']['man_photo'])) { ?>
                            <?php foreach ($config['photo']['man_photo'] as $k => $v) {
                                if (!isset($disabled['photo'][$k])) {
                                    $none = "";
                                    $active = "";
                                    if (isset($is_permission) && $is_permission == true) if ($func->checkPermission('photo', 'man_photo', $k, null, 'phrase-1'))
                                        $none = "d-none";
                                    if ($com == 'photo' && $_GET['type'] == $k && ($act == 'man_photo' || $act == 'add_photo' || $act == 'edit_photo'))
                                        $active = "active"; ?>
                                    <li class="nav-item <?= $none ?>">
                                        <a class="nav-link <?= $active ?>"
                                            href="index.php?source=photo&act=man_photo&type=<?= $k ?>"
                                            title="<?= $v['title_main_photo'] ?>"><i
                                                class="nav-icon text-sm far fa-caret-square-right"></i>
                                            <p>
                                                <?= $v['title_main_photo'] ?>
                                            </p>
                                        </a>
                                    </li>
                                <?php }
                            } ?>
                        <?php } ?>
                    </ul>
                </li>

                <!-- User -->
                
                    <li class="nav-item has-treeview <?= $menuopen ?> <?= $none ?>">
                        <a class="nav-link <?= $active ?>" href="#" title="Quản lý user">
                            <i class="nav-icon text-sm fas fa-users"></i>
                            <p>
                                Quản lý tài khoản
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php if (isset($config['permission']['active']) && $config['permission']['active'] == true) {
                                $active = "";
                                if ($act == 'permission_group' || $act == 'add_permission_group' || $act == 'edit_permission_group') $active = "active"; ?>
                                <li class="nav-item"><a class="nav-link <?= $active ?>" href="index.php?source=user&act=permission_group" title="Nhóm quyền"><i class="nav-icon text-sm far fa-caret-square-right"></i>
                                        <p>Nhóm quyền</p>
                                    </a></li>
                            <?php } ?>
                            <?php
                            $active = "";
                            if ($act == 'info_admin') $active = "active";
                            ?>
                            
                            <?php if (isset($config['user']['admin']) && $config['user']['admin'] == true) {
                                $active = "";
                                if ($act == 'man_admin' || $act == 'add_admin' || $act == 'edit_admin') $active = "active"; ?>
                                <li class="nav-item"><a class="nav-link <?= $active ?>" href="index.php?source=user&act=man_admin" title="Tài khoản admin"><i class="nav-icon text-sm far fa-caret-square-right"></i>
                                        <p>Tài khoản admin</p>
                                    </a></li>
                            <?php } ?>
                            <?php if (isset($config['user']['member']) && $config['user']['member'] == true) {
                                $active = "";
                                if ($com == 'user' && ($act == 'man_member' || $act == 'add_member' || $act == 'edit_member')) $active = "active"; ?>
                                <li class="nav-item"><a class="nav-link <?= $active ?>" href="index.php?source=user&act=man_member" title="Tài khoản khách"><i class="nav-icon text-sm far fa-caret-square-right"></i>
                                        <p>Tài khoản khách</p>
                                    </a></li>
                            <?php } ?>
                        </ul>
                    </li>
            </ul>
        </nav>
    </div>
</aside>
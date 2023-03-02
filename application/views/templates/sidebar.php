<div class="main-wrapper">

    <div class="header header-one">

        <div class="header-left header-left-one">
            <a href="<?= base_url('user'); ?>" class="logo">
                PPDB MAN 2 Kota Cirebon
            </a>
            <a href="<?= base_url('user'); ?>" class="white-logo">
                <img src="<?= base_url('assets/'); ?>img/icon.png" alt="Logo">
            </a>
            <a href="<?= base_url('user'); ?>" class="logo logo-small">
                <img src="<?= base_url('assets/'); ?>img/icon.png" alt="Logo" width="30" height="30">
            </a>
        </div>


        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fas fa-bars"></i>
        </a>


        <div class="top-nav-search">

        </div>


        <a class="mobile_btn" id="mobile_btn">
            <i class="fas fa-bars"></i>
        </a>


        <ul class="nav nav-tabs user-menu">

            <li class="nav-item dropdown has-arrow main-drop">
                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                    <span class="user-img">
                        <img src="<?= base_url('assets/img/profiles/') . $user['image']; ?>" alt="">
                        <span class="status online"></span>
                    </span>
                    <span><?= $user['name']; ?></span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#"><i data-feather="user" class="me-1"></i> Profile</a>
                    <a class="dropdown-item" href="#"><i data-feather="settings" class="me-1"></i> Settings</a>
                    <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>"><i data-feather="log-out" class="me-1"></i> Logout</a>
                </div>
            </li>

        </ul>

    </div>


    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>


                    <!-- QUERY MENU -->
                    <?php
                    $role_id = $this->session->userdata('role_id');
                    $queryMenu = "SELECT `user_menu`.`id`, `menu`
                    FROM `user_menu` JOIN `user_access_menu`
                      ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                   WHERE `user_access_menu`.`role_id` = $role_id
                ORDER BY `user_access_menu`.`menu_id` ASC
                ";
                    $menu = $this->db->query($queryMenu)->result_array();
                    ?>


                    <!-- LOOPING MENU -->
                    <?php foreach ($menu as $m) : ?>

                        <li class="menu-title"><span><?= $m['menu']; ?></span></li>



                        <li>

                        </li>

                        <!-- SIAPKAN SUB-MENU SESUAI MENU -->
                        <?php
                        $menuId = $m['id'];
                        $querySubMenu = "SELECT *
                       FROM `user_sub_menu` JOIN `user_menu` 
                         ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                      WHERE `user_sub_menu`.`menu_id` = $menuId
                        AND `user_sub_menu`.`is_active` = 1
                ";
                        $subMenu = $this->db->query($querySubMenu)->result_array();
                        ?>

                        <?php foreach ($subMenu as $sm) : ?>
                            <?php if ($title == $sm['title']) : ?>
                                <li class="active">
                                <?php else : ?>
                                <li class="">
                                <?php endif; ?>
                                <a href="<?= base_url($sm['url']); ?>"><i class="<?= $sm['icon']; ?>"></i> <span><?= $sm['title']; ?></span></a>
                                </li>
                            <?php endforeach; ?>


                        <?php endforeach; ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                                <i class="fas fa-fw fa-sign-out-alt"></i>
                                <span>Logout</span></a>
                        </li>

                </ul>
            </div>
        </div>
    </div>


    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Selamat Datang !!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><?= $user['name']; ?></li>
                        </ul>
                    </div>
                </div>
            </div>